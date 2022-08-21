<?php

namespace App\Policies;

use App\Models\User;
use App\Models\committee;
use App\Models\member;
use Illuminate\Auth\Access\HandlesAuthorization;

class committeePolicy
{
    use HandlesAuthorization;

    public function before(User $user, $abilities)
    {
        if ($user->type == 'super-admin') {

            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //return true;
        return  $user->hasAbility('committee.view');
    }
    

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\committee  $committee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, committee $committee)
    {
        $members = member::select('employee_employeeID')->where('committee_committeeID', $committee->committeeID)->get();

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
        return  $user->hasAbility('committee.add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\committee  $committee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, committee $committee)
    {  
        
        $members = member::where('committee_committeeID', $committee->committeeID)->get();
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
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\committee  $committee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, committee $committee)
    {
        $members = member::where('committee_committeeID', $committee->committeeID)->get();
        $employeesID = array();
        foreach ($members as $member) {
            if($member->memberDescription=='أمين سر اللجنة'||$member->memberDescription=='نائب رئيس اللجنة' ||$member->memberDescription=='رئيس اللجنة' ){
            $employeesID[] = $member->employee_employeeID;
            }
        }
      
        if (in_array($user->employeeID, $employeesID)/*&& $user->hasAbility('committee.delete')*/) {
            return true;
        } 
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\committee  $committee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, committee $committee)
    {
        $members = member::where('committee_committeeID', $committee->committeeID)->get();
        $employeesID = array();
        foreach ($members as $member) {
            if($member->memberDescription=='أمين سر اللجنة'||$member->memberDescription=='نائب رئيس اللجنة' ||$member->memberDescription=='رئيس اللجنة' ){
            $employeesID[] = $member->employee_employeeID;
            }
        }
      
        if (in_array($user->employeeID, $employeesID)/*&& $user->hasAbility('committee.delete')*/) {
            return true;
        } 
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\committee  $committee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, committee $committee)
    {
        $members = member::where('committee_committeeID', $committee->committeeID)->get();
        $employeesID = array();
        foreach ($members as $member) {
            if($member->memberDescription=='أمين سر اللجنة'||$member->memberDescription=='نائب رئيس اللجنة' ||$member->memberDescription=='رئيس اللجنة' ){
            $employeesID[] = $member->employee_employeeID;
            }
        }
      
        if (in_array($user->employeeID, $employeesID)/*&& $user->hasAbility('committee.delete')*/) {
            return true;
        } 
        return false;
    }

    public function topic(User $user, committee $committee)
    {
        $members = member::where('committee_committeeID', $committee->committeeID)->get();
        $employeesID = array();
        foreach ($members as $member) {
            $employeesID[] = $member->employee_employeeID;
        }
      
        if (in_array($user->employeeID, $employeesID)/*&& $user->hasAbility('committee.delete')*/) {
            return true;
        } 
        return false;
    }
}
