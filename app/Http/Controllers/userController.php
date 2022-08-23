<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\member;
use App\Models\role;
use App\Models\roleUser;
use App\Models\session;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use DataTables;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
  public function create()
  {
    $employees=employee::all();
    $roles=role::all();
    return view('pages/users/addUser')->with(['employees'=>$employees , 'roles'=>$roles]);
  }
  public function store(Request $request)
  {
    $request->validate([
      'name' => ['required', 'string'],
      'email' => ['required', 'email', 'unique:users,email'],
      'password' => ['required', 'between:3,50', 'confirmed'],
      'employeeID' => ['required'],
      'image' => ['nullable', 'image'],
    ]);
    $name = $request['name'];
    $email = $request['email'];
    $password = $request['password'];
    $employeeID = $request['employeeID'];
    $avatar = null;

    if ($request->file('image')) {
      $image = $request->file('image');
      $path = 'uploads/usersImages/';
      $imageName = time() + rand(1, 1000000) . '.' . $image->getClientOriginalExtension();
      Storage::disk('local')->put($path . $imageName, file_get_contents($image));
      $avatar = $path . $imageName;
    }
    $user = new user();
    $user->name = $name;
    $user->email = $email;
    $user->password = Hash::make($password);
    $user->employeeID = $employeeID;
    $user->avatar = $avatar;
    $user->save();

    $roleUser=new roleUser();
    $roleUser->role_id =$request['role_id'] ;
    $roleUser->role_id =$user->id ;
    $status = 1;
dd($user->id);
    return redirect(route('showUsers'))->with('AddStatus', $status);
  }

  public function index(Request $request)
  {


    //  $paginate=3;
    // $users =user::paginate($paginate);
    /* foreach($users as $user ){
        $imagePath= Storage::url($user->avatar);
        $user->avatar=$imagePath;
    }*/
    // $user->save();
    //  dd($users);
    //  $users =user::->select()->->paginate($paginate)
    // return view('pages/users/showUsers')->with('users',$users); */

    //yarja datatabel

    $users = User::latest()->get();

    if ($request->ajax()) {
      $data = User::latest()->get();
      return datatables()::of($users)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {

          $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';

          $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';

          return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


    return view('pages/users/showUsers', compact('users')); //->with('users',$users);
  }

  public function show($id)
  {
    $user = Auth::user();
    return view('pages/users/userProfile')->with('user', $user);
  }



  public function edit($id)
  {
    $user = user::findorfail($id);
    return view('pages/users/updateUser')->with('user', $user);
  }


  public function update(Request $request, $id)
  {
    $user = user::findorfail($id);
    $request->validate([
      'name' => ['required', 'string'],
      'email' => ['required', 'email', "unique:users,email,$id"],
      'image' => ['nullable'],
    ]);

    $name = $request['name'];
    $email = $request['email'];

    if ($request->file('image')) {
      $image = $request->file('image');
      $path = '/uploads/usersImages/';
      $imageName = time() + rand(1, 1000000) . '.' . $image->getClientOriginalExtension();
      Storage::disk('local')->put($path . $imageName, file_get_contents($image));
      $avatar = $path . $imageName;
      $user->avatar = $avatar;
    }


    $user->name = $name;
    $user->email = $email;
    $user->save();

    $status = 1;

    return redirect(route('showUsers'))->with('updateStatus', $status);
  }
/*
home page
*/
  public function home(){

    $employeeID = Auth::user()->employeeID;
    $today = date('Y-m-d');
        
    $members = member::where('employee_employeeID', $employeeID)->with('employee', 'committee')->get();
    $upcomingSessions = array();

    foreach ($members as $member) {
        $temps = session::where('committee_committeeID', $member->committee->committeeID)->where('sessionDate',$today)->orderBy('sessionStartAt')->with('committee')->get();
        foreach ($temps as $temp) {
            $upcomingSessions[] = $temp;
        }
        $temps = [];
    }
    return view('pages/home')->with('upcomingSessions',$upcomingSessions);
  }
}
