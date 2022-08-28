@extends('pages.parent')


@section('page_name','الأعضاء')

@section('main_path','الأعضاء')
@section('sub_path','إضافة عضو')



@section('styles')
<style>
.form {
    margin-left: 5%;
}

#submit {
    width: 20%;
}
</style>
@endsection

@section('content')
<div class="card-body pt-9 pb-0">
    @if(session()->has('AddStatus'))
    @if(session('AddStatus'))
    <div class="mb-2 alert alert-success">user added successfully
        <img src="https://www.svgrepo.com/show/13650/success.svg" alt="Icon Success" style="width: 20px;height: 20px;">
    </div>
    @endif
    @endif

    @if($errors->any())
    <ul class="mb-2 alert alert-danger">
        @foreach ($errors->all() as $message)
        <li>{{$message}}</li>

        @endforeach
    </ul>
    @endif
    <!--begin::Row-->
    <div class="row g-6 g-xl-9">
        <!--begin::Col-->
        <div class="col-10 col-xxl-4">
            <!--begin::Card-->
            <div class="card shadow-sm card-bordered">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                    <h3>إضافة مستخدم جديد</h3>
                    <form class="form col-7"  enctype="multipart/form-data" action="{{route('addUser.store')}}"
                        method="post">
                        @csrf
                        <input class="form-control bg-transparent " type="text" placeholder="الاسم"
                            name="name" id="name"><br>
                        <input class="form-control bg-transparent " type="email" placeholder="الايميل"
                            name="email"><br>
                        <input class="form-control bg-transparent " type="password" placeholder="كلمة السر"
                            name="password"><br>
                        <input class="form-control bg-transparent " type="password"
                            placeholder="تأكيد كلمة السر" name="password_confirmation"><br>
                        <select class="form-control bg-transparent " name="employeeID" id="employeeID">
                            <option value="" disabled selected hidden>اختر الموظف</option>
                            @foreach($employees as $employee)
                            <option value="{{$employee->employeeID}}">
                                {{$employee->employeeID}}--{{$employee->employeeName}}
                            </option>
                            @endforeach
                        </select><br>
                        <select class="form-control bg-transparent " name="role_id">
                            <option value="" disabled selected hidden>اختر الصلاحية</option>

                            <option value=""></option>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select><br>
                        <input type="submit" class="btn btn-sm fw-bold btn-primary mx-20 mb-5" id="submit" value="حفظ">
                    </form>

                </div>
            </div>
        </div>
        <!--begin::Col
        <div class="col-md-6 col-xxl-4">
            <!- -begin::Card-- >
            <div class="card shadow-sm card-bordered">
                <!- -begin::Card body- ->
                <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                <img src="{{asset('assets/media/avatars/addUser.png')}}" alt="">
                </div>
            </div>
        </div>-->
    </div>
</div>
@endsection

@section('scripts')
@endsection