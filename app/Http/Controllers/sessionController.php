<?php

namespace App\Http\Controllers;

use App\Http\Requests\sessionRequest;
use App\Models\committee;
use App\Models\discussiontopic;
use App\Models\employee;
use App\Models\member;
use App\Models\session;
use App\Models\sessionmember;
use App\Models\sessiontopic;
use App\Models\User;
use App\Notifications\sessionNotification;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Caster\RedisCaster;
use Symfony\Contracts\Service\Attribute\Required;

class sessionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($committeeID)
    {
        $session = session::where('committee_committeeID', $committeeID)->first();
        $this->authorize('member', $session);

        $sessions = session::where('committee_committeeID', $committeeID)->get();
        return view('pages/sessions/showSessions')->with('sessions', $sessions);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mySessions()
    {
        $this->authorize('view', session::class);


        $employeeID = Auth::user()->employee_employeeID;
        $today = date('Y-m-d');
        $afterThreeDays = date('Y-m-d', strtotime('+3 days'));
        $beforThreeDays = date('Y-m-d', strtotime('-3 days'));

        $sessions = session::where('sessionDate', '>', $today)->where('sessionDate', '<', $afterThreeDays)->get();

        $members = member::where('employee_employeeID', $employeeID)->with('employee', 'committee')->get();
        $previousSessions = array();
        $upcomingSessions = array();

        foreach ($members as $member) {
            $temps = session::where('committee_committeeID', $member->committee->committeeID)->where('sessionDate', '<', $today)->orderBy('sessionDate')->with('committee')->get();
            foreach ($temps as $temp) {
                $previousSessions[] = $temp;
            }
            $temps = session::where('committee_committeeID', $member->committee->committeeID)->where('sessionDate', '>=', $today)->orderBy('sessionDate')->with('committee')->get();
            foreach ($temps as $temp) {
                $upcomingSessions[] = $temp;
            }
            $temps = [];
        }

        return view('pages/sessions/mySessions')->with(['previousSessions' => $previousSessions, 'upcomingSessions' => $upcomingSessions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($committeeID)
    {
        $session = session::where('committee_committeeID', $committeeID)->first();
        $this->authorize('chief', $session);

        $committee = committee::where('committeeID', $committeeID)->select('committeeID', 'committeeName')->first();
        // dd($committee->toArray());
        return view('pages/sessions/addSession')->with('committee', $committee);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(sessionRequest $request)
    {
        $session = session::where('committee_committeeID', $request['committeeID'])->first();
        $this->authorize('member', $session);


        $committeeID = $request['committeeID'];
        $sessionNum = session::where('committee_committeeID', $committeeID)->get();
        $sessionID = count($sessionNum) + 1;

        $session = new session();
        $session->sessionID =  $sessionID;
        $session->sessionRoom =  $request['firstSessionPlace'];
        $session->sessionDate =  $request['firstSessionDate'];
        $session->sessionStartAt =   $request['firstSessionTimeStart'];
        $session->sessionEndAt =   $request['firstSessionTimeEnd'];
        $session->committee_committeeID =  $request['committeeID'];
        $session->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Committees $commitiesController 
     * @return \Illuminate\Http\Response
     */
    public function showSessionTopics($committeeID)
    {
        $topics = discussiontopic::where(['committee_committeeID' => $committeeID,])->with('employee', 'committee')->get();
        //  dd($topics->toArray());
        return view('pages/sessions/showSessionTopics')->with('topics', $topics);
    }

    /**
     * prepareSession
     *
     * @param \App\Models\Committees $commitiesController
     * @return \Illuminate\Http\Response
     */
    public function prepareSession($committeeID, $sessionID)
    {
        $session = session::where('committee_committeeID', $committeeID)->first();
        $this->authorize('chief', $session);

        $topics = discussiontopic::where(['committee_committeeID' => $committeeID,])->with('committee')->with('session')->with('employee')->get();
        $session = session::where(['committee_committeeID' => $committeeID, 'sessionID' => $sessionID])->with('committee')->first();
        $date = date('Y-m-d');
        //dd($topics->toArray());
        return view('pages/sessions/prepareSession')->with(['topics' => $topics, 'session' => $session])->with('date', $date);
    }

    /**
     *sessionConfirmation
     *
     */
    public function sessionConfirmation(Request $request)
    {
        $session = session::where('committee_committeeID', $request['committeeID'])->first();
        $this->authorize('chief', $session);
        // dd($request->all()); 
        $request->validate(
            [
                'topicID' => ['required', "min:1"]
            ],
            [
                'topicID.required' => 'يجب إضافة مواضيع النقاش',
            ]
        );

        for ($i = 0; $i < count($request['topicID']); $i++) {
            $session = new sessiontopic();
            $session->committee_committeeID = $request['committeeID'];
            $session->session_sessionID = $request['sessionID'];
            $session->discussiontopic_topicID  = $request['topicID'][$i];
            $session->save();
            discussiontopic::where('committee_committeeID', $request['committeeID'])->where('topicID', $request['topicID'][$i])->update(['isDiscussed' => 'inProgress']);
        }


        //update session datte and time
        $newDate = $request['SessionDate'];
        $newStartTime = $request['SessionTimeStart'];
        $newEndTime = $request['SessionTimeEnd'];
        $newPlace = $request['SessionPlace'];

        $session = session::where(['sessionID' => $request['sessionID'], 'committee_committeeID' => $request['committeeID']])->first();
        if ($request['updateSession'] == 1) {
            $session->sessionDate = $newDate;
            $session->sessionStartAt = $newStartTime;
            $session->sessionEndAt = $newEndTime;
            $session->sessionRoom = $newPlace;
            $session->save();
        }

        //send notification
        $session = session::where(['sessionID' => $request['sessionID'], 'committee_committeeID' => $request['committeeID']])->with('committee')->first();

        $employees = member::where('committee_committeeID', $request['committeeID'])->with('employee')->get();

        foreach ($employees as $employee) {
            $user = User::where('employeeID', $employee->employee_employeeID)->first();
            $user->notify(new sessionNotification($session));
        }
        // dd($employeesPhones); send sms foe all member in this array

        return redirect()->back();
    }

    /**
     *
     *
     *
     **/
    public function sessionReport_create($committeeID, $sessionID)
    {
        $session = session::where('committee_committeeID', $committeeID)->first();
        $this->authorize('chief', $session);

        $session = session::where(['committee_committeeID' => $committeeID, 'sessionID' => $sessionID])->with('committee')->first();
        $members = member::where('committee_committeeID', $committeeID)->orderBy('memberID', 'ASC')->with('employee')->get();
        $topics = sessionTopic::where(['committee_committeeID' => $committeeID, 'session_sessionID' => $sessionID])->with('committee')->with('discussiontopic')->get();
        $topicDetails = array();
        $count = 0;
        foreach ($topics as $topic) {
            $topicDetails[$topic->discussiontopic_topicID] = discussiontopic::where('topicID', $topic->discussiontopic_topicID)->get();
            $count++;
        }
        // dd($session->status);
        if ($session->status == 'ready') {
            $notReady = 0;
            return view('pages/sessions/sessionReport')->with(['session' => $session, 'members' => $members, 'topics' => $topics, 'topicDetails' => $topicDetails, 'notReady' => $notReady]);
        } else {
            $notReady = 1;

            return view('pages/sessions/sessionReport')->with(['notReady' => $notReady]);
        }
    }

    /**
     *
     *
     *
     **/
    public function sessionReport_store(Request $request)
    {
        $session = session::where('committee_committeeID', $request['committeeID'])->first();
        $this->authorize('chief', $session);

        // dd($request->all());
        $membersCount = count($request['memberID']);
        $topicsCount = count($request['topicID']);

        $request->validate([
            'attendee' => ['required', "min:$membersCount"],
            'deliberation' => ['required', "min:$topicsCount"],
            'decision' => ['required', "min:$topicsCount"],
            'tracking' => ['required', "min:$topicsCount"],
            'attendee.*' => ['required'],
            'deliberation.*' => ['required'],
            'decision.*' => ['required'],
            'tracking.*' => ['required'],

        ], [
            'attendee.required' => 'يجب تحديد الحضور',
            'attendee.min' => 'يجب تحديد الحضور لجميع الأعضاء',

            'deliberation.required' => 'يجب  إضافة مداولات البنود',
            'deliberation.min' => 'يجب  إضافة المداولات لجميع البنود',
            'deliberation.*.required' => 'يجب  إضافة المداولات لجميع البنود',

            'decision.required' => 'يجب إضافة قرارات البنود',
            'decision.min' => 'يجب إضافة القرارات لجميع البنود',
            'decision.*.required' => 'يجب إضافة القرارات لجميع البنود',

            'tracking.required' => 'يجب تحديد حالة متابعة البنود',
            'tracking.min'  => 'يجب تحديد حالة متابعة لجميع البنود',
            'tracking.*.required'  => 'يجب تحديد حالة متابعة لجميع البنود',

        ]);
        /* شغال
            sessiontopic::where(['committee_committeeID' => $committeeID, 'session_sessionID' => $sessionID, 'discussiontopic_topicID' => $topicID])->update([
                'deliberations' => $request['deliberation'][$topicID],
                'decisions' => $request['decision'][$topicID],
                'executionDepartment' => $request['executionDepartment'][$topicID],
                'executionDeadline' => $request['executionDeadline'][$topicID],
                //$que->user->notify(new UserNotification($sessiontopic) )
                //اليوز صاحب السؤال
                //
            ]);  */

        $committeeID =  $request['committeeID'];
        $sessionID = $request['sessionID'];
        foreach ($request['topicID'] as $topicID) {
            sessiontopic::where(['committee_committeeID' => $committeeID, 'session_sessionID' => $sessionID, 'discussiontopic_topicID' => $topicID])->update([
                'deliberations' => $request['deliberation'][$topicID],
                'decisions' => $request['decision'][$topicID],
                'executionDepartment' => $request['executionDepartment'][$topicID],
                'executionDeadline' => $request['executionDeadline'][$topicID],
            ]);
            //notifications
            $sessiontopic = sessiontopic::where(['committee_committeeID' => $committeeID, 'session_sessionID' => $sessionID, 'discussiontopic_topicID' => $topicID])->with('committee')->first();
            $department = $request['executionDepartment'][$topicID];
            $employees = employee::where('employeeDepartment', $department)->get();
            foreach ($employees as $employee) {
                $user = User::where('employeeID', $employee->employeeID)->first();
                $user->notify(new UserNotification($sessiontopic));
            }
        }



        foreach ($request['attendee'] as $memberID => $attendee) {
            $sessionmember = new sessionmember();
            $sessionmember->committee_committeeID = $committeeID;
            $sessionmember->session_sessionID = $sessionID;
            $sessionmember->member_memberID = $memberID;

            if ($attendee == 'attendant')  $sessionmember->attendee = 'حاضر';
            else if ($attendee == 'absent') $sessionmember->attendee = 'متغيب';
            else if ($attendee == 'apologized') $sessionmember->attendee = 'معتذر';
              $sessionmember->save();
        }
        foreach ($request['tracking'] as $topicID => $status) {

            discussiontopic::where(['committee_committeeID' => $committeeID, 'session_sessionID' => $sessionID, 'topicID' => $topicID])->update([
                'isDiscussed' => $status,
            ]);
        }
        session::where(['committee_committeeID' => $committeeID, 'sessionID' => $sessionID])->update(['status' => 'dead']);


        $user = Auth::user();

        return redirect()->back();
    }




    public function printReport($committeeID, $sessionID)
    {
        $session = session::where('committee_committeeID', $committeeID)->first();
        $this->authorize('member', $session);
        
        $session = session::where(['committee_committeeID' => $committeeID, 'sessionID' => $sessionID])->with('committee')->first();
        $members = sessionmember::where(['committee_committeeID' => $committeeID, 'session_sessionID' => $sessionID])->orderBy('member_memberID', 'ASC')->with('member')->get();
        //dd($members->member->employee->employeeName);
        $topics = sessionTopic::where(['committee_committeeID' => $committeeID, 'session_sessionID' => $sessionID])->with('committee')->with('discussiontopic')->get();
        $topicDetails = array();
        $count = 0;
        foreach ($topics as $topic) {
            $topicDetails[$topic->discussiontopic_topicID] = discussiontopic::where('topicID', $topic->discussiontopic_topicID)->get();
            $count++;
        }

        if ($session->status == 'dead') {
            $notReady = 0;
           
            return view('pages/sessions/printReport')->with(['session' => $session, 'members' => $members, 'topics' => $topics, 'topicDetails' => $topicDetails, 'notReady' => $notReady]);
        } else {
            $notReady = 1;

            return view('pages/sessions/printReport')->with(['notReady' => $notReady]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Committees $commitiesController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Committees $commitiesController
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
