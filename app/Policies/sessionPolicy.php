<?php

namespace App\Policies;

use App\Models\member;
use App\Models\User;
use App\Models\session;
use Illuminate\Auth\Access\HandlesAuthorization;

class sessionPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $abilities)
    {
        if ($user->type == 'super-admin') {
            return true;
        }
    }
    
    public function member(User $user, session $session)
    {
        $members = member::select('employee_employeeID')->where('committee_committeeID', $session->committee_committeeID)->get();

        $employeesID = array();
        foreach ($members as $member) {
            $employeesID[] = $member->employee_employeeID;
        }
        if (in_array($user->employeeID, $employeesID) ) {
            return true;
        }
        return false;
    } 

    public function chief(User $user, session $session)
    {  
         
        $members = member::where('committee_committeeID', $session->committee_committeeID)->get();
        $employeesID = array();
        foreach ($members as $member) {
            if($member->memberDescription=='أمين سر اللجنة'||$member->memberDescription=='نائب رئيس اللجنة' ||$member->memberDescription=='رئيس اللجنة' ){
            $employeesID[] = $member->employee_employeeID;
            }
        }
      
        if (in_array($user->employeeID, $employeesID)) {
            return true;
        } 
        return false;
  
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
         
        $members = member::where('committee_committeeID',5)->get();
        $employeesID = array();
        foreach ($members as $member) {
            if($member->memberDescription=='أمين سر اللجنة'||$member->memberDescription=='نائب رئيس اللجنة' ||$member->memberDescription=='رئيس اللجنة' ){
            $employeesID[] = $member->employee_employeeID;
            }
        }
      
        if (in_array($user->employeeID, $employeesID)/*&& $user->hasAbility('committee.edit')*/) {
            return true;
        } 
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\session  $session
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, session $session)
    {
        $members = member::select('employee_employeeID')->where('committee_committeeID', $session->committee_committeeID)->get();

        $employeesID = array();
        foreach ($members as $member) {
            $employeesID[] = $member->employee_employeeID;
        }
        if (in_array($user->employeeID, $employeesID) /*&& $user->hasAbility('committee.view')*/) {
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\session  $session
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, session $session)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\session  $session
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, session $session)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\session  $session
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, session $session)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\session  $session
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, session $session)
    {
        //
    }
}
