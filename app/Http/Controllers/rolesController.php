<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\roleUser;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;


class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  Gate::authorize('role.view');
        $this->authorize('viewAny',role::class);

        $roles = role::all();
        return view('pages/roles/viewRole')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',role::class);
    
        return view('pages/roles/createRole', ['role' => new role,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //dd($request->all());
        $this->authorize('create',role::class);

        $request->validate([
            'name' => ['required', 'string'],
            'abilities' => ['required', 'array']
        ], [
            'name.required' => 'أضف اسم الصلاحية',
            'abilities.required' => 'اختر الصلاحيات المطلوبة'
        ]);

        $role = role::create($request->all());
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = role::findOrFail($id);

        $this->authorize('update',$role);

        return view('pages/roles/updateRole')->with('role', $role);
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

        $request->validate([
            'name' => ['required', 'string'],
            'abilities' => ['required', 'array']
        ], [
            'name.required' => 'أضف اسم الصلاحية',
            'abilities.required' => 'اختر الصلاحيات المطلوبة'
        ]);
        $role = role::findOrFail($id);

        $this->authorize('update',$role);


        $role->update($request->all());
        return redirect()->route('roles.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = role::findOrFail($id);
        $this->authorize('delete',$role);

        role::destroy($id);
        return redirect()->route('roles.index')->with('success', 'تم الحذف بنجاح');
    }


}
