the pre- shoeusers blade page

@extends('pages.parent')

@section('title','Wellcome to Dashboard')

@section('page_name','Users')

@section('main_path','Users')
@section('sub_path','show Users')



@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
.cards {
    background-color: #1b1b29;
    border-radius: 7px;
  
}
</style>
@endsection

@section('content')

<div class="card-body pt-9 pb-0">


    @if(session()->has('updateStatus'))
    @if(session('updateStatus'))
    <div class="mb-2 alert alert-success">user informations updated successfully 
    <img src="https://www.svgrepo.com/show/13650/success.svg" alt="Icon Success"style="width: 20px;height: 20px;">
    </div>
    @endif
    @endif

<img src="D:/laravel/metronicProject/storage/app/uploads/usersImages/1658690581.png" alt="">

    @foreach($users as $user)

    <div class="cards">
        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-100px symbol-fixed position-relative ">
                        <img src="{{$user->avatar}}"
                            alt="{{$user->name}}">
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 flex-grow-1 bd-highlight">
                    <div class="d-flex align-items-center mb-2">
                        <label for="" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Name:
                            {{$user->name}}</label>
                    </div>
                </div>

                <div class="p-2 bd-highlight">
                    <div class="d-flex align-items-center mb-2 ">
                        <label for="" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">E-mail:
                            {{$user->email}}</label>
                    </div>
                </div>

            </div>

            <div class="p-2 bd-highlight">
                <div class="float-end">
                    <a class="btn btn-sm fw-bold btn-primary" href="{{URL('updateUser').'/'.$user->id}}">edit</a>
                </div>
            </div>

        </div>
    </div>
    @endforeach
</div>

<div class="d-flex align-items-center m-4">
    {{$users->links("pagination::bootstrap-5")}}
</div>

@endsection

@section('scripts')
@endsection





















$('#createNewBook').click(function () {
    $('#saveBtn').val("create-book");
    $('#book_id').val('');
    $('#bookForm').trigger("reset");
    $('#modelHeading').html("Create New Book");
    $('#ajaxModel').modal('show');
});
$('body').on('click', '.editBook', function () {
  var book_id = $(this).data('id');
  $.get("{{ route('showUsers') }}" +'/' + book_id +'/edit', function (data) {
      $('#modelHeading').html("Edit Book");
      $('#saveBtn').val("edit-book");
      $('#ajaxModel').modal('show');
      $('#book_id').val(data.id);
      $('#title').val(data.title);
      $('#author').val(data.author);
  })
});
$('#saveBtn').click(function (e) {
    e.preventDefault();
    $(this).html('Save');

    $.ajax({
      data: $('#bookForm').serialize(),
      url: "{{ route('addUser') }}",
      type: "POST",
      dataType: 'json',
      success: function (data) {
 
          $('#bookForm').trigger("reset");
          $('#ajaxModel').modal('hide');
          table.draw();
     
      },
      error: function (data) {
          console.log('Error:', data);
          $('#saveBtn').html('Save Changes');
      }
  });
});

$('body').on('click', '.deleteBook', function () {
 
    var book_id = $(this).data("id");
    confirm("Are You sure want to delete !");
  
    $.ajax({
        type: "DELETE",
        url: "{{ route('addUser') }}"+'/'+book_id,
        success: function (data) {
            table.draw();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});