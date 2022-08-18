<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\roleUser;
use App\Models\User;
use Illuminate\Http\Request;

class roleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleUsers=roleUser::with('user','role')->get();
        return view('pages/roles/viewRoleUsers')->with('roleUsers' ,$roleUsers );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roleUser = roleUser::select('user_id')->get();
        $roles = role::all();
       // dd($roleUser->toArray());
        $users = User::whereNotIn('id', $roleUser->toArray())->get();
        return view('pages/roles/createRoleUser')->with(['roles' => $roles, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           //dd($request->all());
           $roleUser = roleUser::create($request->all());
           return redirect()->route('roles.index')->with('success', 'تمت الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
