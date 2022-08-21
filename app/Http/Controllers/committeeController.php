<?php

namespace App\Http\Controllers;

use App\Http\Requests\committeeRequest as RequestsCommitteeRequest;
use App\Models\committee;
use App\Models\discussiontopic;
use App\Models\employee;
use App\Models\task;
use App\Models\regulation;
use App\Models\session;
use App\Models\member;
use App\Models\sessionmember;
use App\Models\sessiontopic;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\MessageBag;



class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if( Gate::denies('committee.view')){
        //     abort(403);
        // }
        // Gate::authorize('committee.view');

        $this->authorize('viewAny', committee::class);

        $committees = committee::withoutTrashed()->where(['status' => 'active'])->with('tasks')->with('regulations')->with('members')->with('sessions')->get();
        $myCommittees = array();
        $userID = Auth::user()->employeeID;
        foreach ($committees as $committee) {
            foreach ($committee->members as $member) {
                if ($member->employee_employeeID == $userID) {
                    $myCommittees[] = $committee;
                }
            }
        }
        // dd($myCommittees);
        $members = member::with('employee')->get();

        return  view('pages/committees/showCommittees')->with('committees', $myCommittees)->with('members', $members);
    }

    public function indexAll()
    {

        $committees = committee::withoutTrashed()->where(['status' => 'active'])->with('tasks')->with('regulations')->with('members')->with('sessions')->get();

        // dd($myCommittees);
        $members = member::with('employee')->get();

        return  view('pages/committees/showCommittees')->with('committees', $committees)->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        Gate::authorize('committee.add');

        $employees = employee::get();
        //dd( $employees);
        return view('pages/committees/addCommittee')->with('employees', $employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsCommitteeRequest $request)
    {
        Gate::authorize('committee.add');

        // dd($request->all());
        Request()->flash();

        $committeeNum = $request['commNumber'];
        $committeeName = $request['commName'];
        $committeeDate = $request['commDate'];
        $temp = str_replace("-", "", $committeeDate);
        $committeeID = $temp . $committeeNum;
        $request->request->add(['committeeID' => $committeeID]);

        //if($request->validate()->fails());


        $request->validate(
            [
                'committeeID' => ['unique:committees,committeeID'],
            ],
            [
                'committeeID.unique' => 'رقم اللجنة مستخدم مسبقاً'

            ]
        );

        $membersCount = count($request["membersGroup"]);
        $tasksCount = count($request["tasksGroup"]);
        $regulationsCount = count($request["regulationsGroup"]);


        if (session()->has('errors')) {
            $x = session('x');
            return redirect()->withInput()->with('membersCount', $membersCount)->with('tasksCount', 4)->with('regulationsCount', $regulationsCount);
        }

        /* 
        ** begin committees section
        */
        $sessionRegularity = $request['isRegular'];

        $committee = new committee();
        $committee->committeeID = $committeeID;
        $committee->committeeName = $committeeName;
        $committee->committeeDate = $committeeDate;
        $committee->isRegular = $sessionRegularity;
        $committee->save();


        /* 
        ** begin members section
        */

        $members = array(array());
        for ($i = 0; $i < count($request["membersGroup"]); $i++) {
            //   $members[$i]['memberID']=$request["membersGroup"][$i]["memberID"];
            $members[$i]['memberName'] = $request["membersGroup"][$i]["memberName"];
            //  $members[$i]['memberJobTitel']=$request["membersGroup"][$i]["memberJobTitel"];
            $members[$i]['memberDescription'] = $request["membersGroup"][$i]["memberDescription"];
        }

        // insert into database

        foreach ($members as $key => $value) {
            $member = new member();
            $membersNum = member::where('committee_committeeID', $committeeID)->get();
            $memberID = count($membersNum) + 1;
            $member->memberID = $memberID;
            $member->committee_committeeID = $committeeID;

            foreach ($value as $key1 => $value1) {
                if ($key1 == 'memberName') {
                    $employee = employee::where('employeeName', $value1)->first();
                    $employee_ID = $employee->employeeID;
                    $member->employee_employeeID  = $employee_ID;
                }
                if ($key1 == 'memberDescription')
                    $member->memberDescription = $value1;
            }

            $member->save();
        }



        /* 
        ** begin tasks section
        */
        $tasks = array(array());
        for ($j = 0; $j < count($request["tasksGroup"]); $j++) {
            $tasks[$j]['taskID'] = $j + 1;
            $tasks[$j]['taskDescription'] = $request['tasksGroup'][$j]['taskDescription'];
        }

        // insrt into DB

        foreach ($tasks as $key => $value) {
            $task = new task();
            foreach ($value as $key1 => $value1) {
                if ($key1 == 'taskID')
                    $task->taskID = $value1;
                if ($key1 == 'taskDescription')
                    $task->taskDescription = $value1;
            }
            $task->committee_committeeID = $committeeID;
            $task->save();
        }



        /* 
        ** begin regulations section
        */

        $regulations = array(array());
        for ($u = 0; $u < count($request['regulationsGroup']); $u++) {
            $regulations[$u]['regulationID'] = $u + 1;
            $regulations[$u]['regulationDescription'] = $request['regulationsGroup'][$u]['regulationDescription'];
        }


        // insrt into DB

        foreach ($regulations as $key => $value) {
            $regulation = new regulation();
            foreach ($value as $key1 => $value1) {
                if ($key1 == 'regulationID')
                    $regulation->regulationID = $value1;
                if ($key1 == 'regulationDescription')
                    $regulation->regulationDescription = $value1;
            }
            $regulation->committee_committeeID = $committeeID;
            $regulation->save();
        }


        /* 
        ** begin sessions section
        */


        $firstSessionDate = $request['firstSessionDate'];
        $firstSessionTimeStart = $request['firstSessionTimeStart'];
        $firstSessionTimeEnd = $request['firstSessionTimeEnd'];
        $firstSessionPlace = $request['firstSessionPlace'];

        $sessionNum = session::where('committee_committeeID', $committeeID)->get();
        $sessionID = count($sessionNum) + 1;

        if ($sessionRegularity != null) {
            $session = new session();
            $session->sessionID = $sessionID;
            $session->sessionRoom = $firstSessionPlace;
            $session->sessionDate = $firstSessionDate;
            $session->sessionStartAt = $firstSessionTimeStart;
            $session->sessionEndAt = $firstSessionTimeEnd;
            $session->committee_committeeID = $committeeID;
            $session->save();
        }

        // when success
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Committees $commitiesController
     * @return \Illuminate\Http\Response
     */
    public function show($committeeID)
    {
        //Gate::authorize('committee.view');
        $committee = committee::where('committeeID', $committeeID)->first();
        $this->authorize('view', $committee);

        $today = date('Y-m-d');
        $afterThreeDays = date('Y-m-d', strtotime('+3 days'));
        $beforThreeDays = date('Y-m-d', strtotime('-3 days'));

        $sessions = session::where('sessionDate', '>', $today)->where('sessionDate', '<', $afterThreeDays)->get();
        foreach ($sessions as $session) {
            $session->status = 'inProgress';
            $session->save();
        }

        $oldSessions = session::where('sessionDate', '<', $today)->get();
        foreach ($oldSessions as $oldSession) {
            $oldSession->status = 'dead';
            $oldSession->save();
        }

        $todaySessions = session::where('sessionDate', '=', $today)->get();
        foreach ($todaySessions as $todaySessions) {
            $todaySessions->status = 'ready';
            $todaySessions->save();
        }

        $committee = committee::where('committeeID', $committeeID)->with('sessions', 'members', 'regulations', 'tasks', 'sessiontopics')->first();
        $sessions = $committee->sessions;
        $nearSessions = array();
        foreach ($sessions as $session) {
            if ( $session->sessionDate <= $afterThreeDays && $session->sessionDate >= $beforThreeDays) {
                $nearSessions[] = $session;
            }
        }
        return view('pages/committees/committee')->with(['committee'=> $committee ,'nearSessions'=>$nearSessions]);
    }
    public function newShow($committeeID)
    {
        //Gate::authorize('committee.view');
        $committee = committee::where('committeeID', $committeeID)->first();
        $this->authorize('view', $committee);

        $today = date('Y-m-d');
        $afterThreeDays = date('Y-m-d', strtotime('+3 days'));
        $beforThreeDays = date('Y-m-d', strtotime('-3 days'));

        $sessions = session::where('sessionDate', '>', $today)->where('sessionDate', '<', $afterThreeDays)->get();
        foreach ($sessions as $session) {
            $session->status = 'inProgress';
            $session->save();
        }

        $oldSessions = session::where('sessionDate', '<', $today)->get();
        foreach ($oldSessions as $oldSession) {
            $oldSession->status = 'dead';
            $oldSession->save();
        }

        $todaySessions = session::where('sessionDate', '=', $today)->get();
        foreach ($todaySessions as $todaySessions) {
            $todaySessions->status = 'ready';
            $todaySessions->save();
        }

        $committee = committee::where('committeeID', $committeeID)->with('sessions', 'members', 'regulations', 'tasks', 'sessiontopics')->first();
        $sessions = $committee->sessions;
        $nearSessions = array();
        foreach ($sessions as $session) {
            if ( $session->sessionDate <= $afterThreeDays && $session->sessionDate >= $beforThreeDays) {
                $nearSessions[] = $session;
            }
        }
        return view('pages/committees/committee-details')->with(['committee'=> $committee ,'nearSessions'=>$nearSessions]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Committees $commitiesController
     * @return \Illuminate\Http\Response
     */
    public function edit($committeeID)
    {
        // Gate::authorize('committee.edit');
        $committee = committee::where('committeeID', $committeeID)->first();
        $this->authorize('update', $committee);


        $employees = employee::get();
        $members = member::where('committee_committeeID', $committeeID)->with('employee')->get();
        $tasks = task::where('committee_committeeID', $committeeID)->get();
        $regulations = regulation::where('committee_committeeID', $committeeID)->get();
        $sessions = session::where('committee_committeeID', $committeeID)->get();

        return view('pages/committees/updatecommittee')->with([
            'committee' => $committee,
            'employees' => $employees,
            'members' => $members,
            'tasks' => $tasks,
            'regulations' => $regulations,
            'sessions' => $sessions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Committees $commitiesController
     * @return \Illuminate\Http\Response
     *   
     */
    public function update(Request $request, $committeeID)
    {
        $committee = committee::where('committeeID', $committeeID)->first();
        $this->authorize('update', $committee);

        // dd($request->all());
        if ($request["membersGroup"][0]['memberName'] != null) {
            $test = 1;
            for ($i = 0; $i < count($request["membersGroup"]); $i++) {
                $employeeID = employee::where('employeeName', $request["membersGroup"][$i]["memberName"])->first();
                $member = member::where('committee_committeeID', $committeeID)->where('employee_employeeID', $employeeID->employeeID)->first();
                if ($member != null) $test = 0;
            }
            $request->request->add(['memberID' => $test]);

            $request->validate([
                'commName' => ['required'],
                'membersGroup.*.memberDescription' => ['required_with:membersGroup.*.memberName'],
                'memberID' => ['accepted'],
            ], [
                'memberID.accepted' => 'هذا العضو مضاف فعلاً'
            ]);
        }


        $committeeName = $request['commName'];
        $committee = committee::where('committeeID', $committeeID)->first();
        $committee->committeeName = $committeeName;
        $committee->save();
        // committee::update()->where('committeeID', $committeeID);

        /* 
        ** begin members section
        */
        $members = array(array());
        for ($i = 0; $i < count($request["membersGroup"]); $i++) {
            $members[$i]['memberName'] = $request["membersGroup"][$i]["memberName"];
            $members[$i]['memberDescription'] = $request["membersGroup"][$i]["memberDescription"];
        }

        if ($request['membersGroup'][0]['memberName'] != null) {
            foreach ($members as $key => $value) {
                $member = new member();
                $membersNum = member::where('committee_committeeID', $committeeID)->get();
                $memberID = count($membersNum) + 1;

                $member->memberID = $memberID;
                $memberID++;
                $member->committee_committeeID = $committeeID;

                foreach ($value as $key1 => $value1) {
                    if ($key1 == 'memberName') {
                        $employee = employee::where('employeeName', $value1)->first();
                        $employee_ID = $employee->employeeID;
                        $member->employee_employeeID  = $employee_ID;
                    }
                    if ($key1 == 'memberDescription')
                        $member->memberDescription = $value1;
                }

                $member->save();
            }
        }

        /* 
        ** begin tasks section
        */
        $tasks = array(array());
        for ($j = 0; $j < count($request["tasksGroup"]); $j++) {
            $tasks[$j]['taskID'] = $j + 1;
            $tasks[$j]['taskDescription'] = $request['tasksGroup'][$j]['taskDescription'];
        }
        if ($request['tasksGroup'][0]['taskDescription'] != null) {

            foreach ($tasks as $key => $value) {
                $tasksNum = task::where('committee_committeeID', $committeeID)->get();
                $taskID = count($tasksNum) + 1;
                $task = new task();
                $task->taskID = $taskID;
                foreach ($value as $key1 => $value1) {
                    if ($key1 == 'taskDescription')
                        $task->taskDescription = $value1;
                }
                $task->committee_committeeID = $committeeID;
                $task->save();
            }
        }
        /* 
        ** begin regulations section
        */

        $regulations = array(array());
        for ($u = 0; $u < count($request['regulationsGroup']); $u++) {
            $regulations[$u]['regulationID'] = $u + 1;
            $regulations[$u]['regulationDescription'] = $request['regulationsGroup'][$u]['regulationDescription'];
        }
        if ($request['regulationsGroup'][0]['regulationDescription'] != null) {

            foreach ($regulations as $key => $value) {
                $regulationsNum = regulation::where('committee_committeeID', $committeeID)->get();
                $regulationID = count($regulationsNum) + 1;

                $regulation = new regulation();
                $regulation->regulationID = $regulationID;

                foreach ($value as $key1 => $value1) {
                    if ($key1 == 'regulationDescription')
                        $regulation->regulationDescription = $value1;
                }
                $regulation->committee_committeeID = $committeeID;
                $regulation->save();
            }
        }
        return redirect()->route('committee', $committeeID);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Committees $commitiesController
     * @return \Illuminate\Http\Response
     */

    public function deleteMember($employeeID, $committeeID, $memberID)
    {
        $committee = committee::where('committeeID', $committeeID)->first();
        $this->authorize('update', $committee);

        $member = DB::table('members')->where(['committee_committeeID' => $committeeID, 'employee_employeeID' => $employeeID, 'memberID' => $memberID])->delete();

        // $member->forceDelete();

        $members = member::where('memberID', '>', $memberID)->where('committee_committeeID', $committeeID)->get();
        $temp = $memberID;
        foreach ($members as $member) {
            $member->memberID = $temp;
            $member->save();
            $temp++;
        }
        return redirect()->back();
    }

    public function deleteTask($taskID, $committeeID)
    {
        $committee = committee::where('committeeID', $committeeID)->first();
        $this->authorize('update', $committee);


        $task = task::where('taskID', $taskID)->where('committee_committeeID', $committeeID)->first();
        $task->delete();

        $tasks = task::where('taskID', '>', $taskID)->where('committee_committeeID', $committeeID)->get();
        $temp = $taskID;
        foreach ($tasks as $task) {
            $task->taskID = $temp;
            $task->save();
            $temp++;
        }
        return   redirect()->back();
    }

    public function deleteRegulation($regulationID, $committeeID)
    {
        $committee = committee::where('committeeID', $committeeID)->first();
        $this->authorize('update', $committee);

        $regulation = regulation::where(['regulationID' => $regulationID, 'committee_committeeID' => $committeeID])->first();
        $regulation->delete();

        $regulations = regulation::where('regulationID', '>', $regulationID)->where('committee_committeeID', $committeeID)->get();
        $temp = $regulationID;
        foreach ($regulations as $regulation) {
            $regulation->regulationID = $temp;
            $regulation->save();
            $temp++;
        }
        return redirect()->back();
    }


    /**
     * add new DiscussionTopics
     *
     * @param \App\Models\Committees $commitiesController
     * @return \Illuminate\Http\Response
     */
    public function createTopics($committeeID)
    {
        $committee = committee::where('committeeID', $committeeID)->first();
        $this->authorize('topic', $committee);

        $user = Auth::user();
        $userID = $user->employeeID;
        //$userID = 20105025;
        $committee = member::select('committee_committeeID')->where('employee_employeeID', $userID)->where('committee_committeeID', $committeeID)->first();
        if ($committee != null) {
            $committee = committee::where('committeeID', $committeeID)->first();
            return view('pages/sessions/addDiscussionTopics')->with('committee', $committee);
        } else return view('pages/sessions/addDiscussionTopics')->with('fail', 'fail');
    }

    public function storeTopics(Request $request)
    {
        $committee = committee::where('committeeID', $request['committeeID'])->first();
        $this->authorize('topic', $committee);

        $user = Auth::user();
        $userID = $user->employeeID;

        // dd($request->all());
        //check if this committee has one session at least or not yet
        $request->validate([
            'committeeID' => ['required'],
            'TopicsGroup.*.TopicDescription' => ['required'],
            //  'TopicsGroup.*.ResolutionDescription' => ['required'],
        ], [
            'committeeID.required' => 'يجب اختيار لجنة',
            'TopicsGroup.*.TopicDescription.required' => 'يجب إضافة حقل البند',
            //  'TopicsGroup.*.ResolutionDescription.required' => 'يجب إضافة مشروع القرار المقترح'

        ]);
        $committeeID = $request['committeeID'];
        $date = date('Y-m-d');
        $session = session::orderBy('sessionDate')->where('committee_committeeID', $committeeID)->where('sessionDate', '>', $date)->first();

        if ($session == null) {
            return redirect()->back()->with('session', 'لا يوجد جلسات قادمة لهذه اللجنة');
            // $errors= new MessageBag();
            //     $errors->add('session', 'Your custom error message!');
            // $request->request->add(['sessions' => $sessions]);

            // $request->validate(
            //     [
            //         'sessions' => ['unique:committees,committeeID'],
            //     ],
            //     [
            //         'committeeID.unique' => 'رقم اللجنة مستخدم مسبقاً'

            //     ]
            // );

        }
        $topics = array(array());
        for ($i = 0; $i < count($request['TopicsGroup']); $i++) {
            $topics[$i]['TopicDescription'] = $request['TopicsGroup'][$i]['TopicDescription'];
            $topics[$i]['ResolutionDescription'] = $request['TopicsGroup'][$i]['ResolutionDescription'];
        }

        $topicsNum = discussiontopic::where('committee_committeeID', $committeeID)->get();
        $count = count($topicsNum) + 1;
        foreach ($topics as $key => $value) {
            $discussiontopic = new discussiontopic();
            $discussiontopic->topicID = $count;
            foreach ($value as $key1 => $value1) {
                if ($key1 == 'TopicDescription')
                    $discussiontopic->TopicDescription = $value1;
                if ($key1 == 'ResolutionDescription')
                    $discussiontopic->ResolutionDescription = $value1;
            }
            $discussiontopic->committee_committeeID  = $committeeID;
            $discussiontopic->session_sessionID  = $session->sessionID;
            //$discussiontopic->employeeID  = $request['userID'];
            $discussiontopic->employee_employeeID  = $userID;

            $discussiontopic->save();
            $count++;
        }

        return redirect()->back();
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Committees $commitiesController
     * @return \Illuminate\Http\Response
     */
    public function destroy($committeeID)
    {
        $committee = committee::where('committeeID', $committeeID)->first();
        $this->authorize('delete', $committee);

        committee::where('committeeID', $committeeID)->update(['status' => 'deactivated',]);
        committee::where('committeeID', $committeeID)->delete();
        member::where('committee_committeeID', $committeeID)->delete();
        session::where('committee_committeeID', $committeeID)->delete();
        task::where('committee_committeeID', $committeeID)->delete();
        regulation::where('committee_committeeID', $committeeID)->delete();
        sessiontopic::where('committee_committeeID', $committeeID)->delete();
        sessionmember::where('committee_committeeID', $committeeID)->delete();
        discussiontopic::where('committee_committeeID', $committeeID)->delete();


        // dd($committee);
        return redirect()->route('showCommittee');
    }



    /** activate an deactivted committee
     * restore the specified resource from storage.
     *
     * @param \App\Models\Committees $commitiesController
     * @return \Illuminate\Http\Response
     */
    public function restore($committeeID)
    {
        committee::where('committeeID', $committeeID)->restore();

        $committee = committee::where('committeeID', $committeeID)->first();
        $this->authorize('delete', $committee);

        member::where('committee_committeeID', $committeeID)->restore();
        session::where('committee_committeeID', $committeeID)->restore();
        task::where('committee_committeeID', $committeeID)->restore();
        regulation::where('committee_committeeID', $committeeID)->restore();
        sessiontopic::where('committee_committeeID', $committeeID)->restore();
        sessionmember::where('committee_committeeID', $committeeID)->restore();
        discussiontopic::where('committee_committeeID', $committeeID)->restore();
        committee::withTrashed()->where('committeeID', $committeeID)->update(['status' => 'active',]);


        // dd($committee);
        return redirect()->route('showCommittee');
    }
}
