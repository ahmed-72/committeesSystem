@extends('pages.parent')

@section('title','Show Committees')

@section('page_name','Committees')

@section('main_path','committees')
@section('sub_path','show committees')


@section('styles')
@endsection

@section('content')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!--begin::Row-->
                    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                        <!--begin::Col-->
                        <div class="col-xxl-6">
                            <!--begin::Engage widget 10-->
                            <div style="background-color: inherit" class="card card-flush h-md-100">
                                <!--begin::Body-->
                                <div class="card card-flush mt-6 mt-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header mt-5">
                                        <!--begin::Card title-->
                                        <div class="card-title flex-column">
                                            <h3 class="fw-bold mb-1">Committees Information</h3>
                                            <div class="fs-6 text-gray-400">all Committees data from Committee table
                                            </div>
                                        </div>
                                        <!--begin::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar my-1" data-select2-id="select2-data-159-eyt2">
                                        </div>
                                        <!--begin::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <div id="kt_profile_overview_table_wrapper"
                                                 class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                <div class="table-responsive">
                                                    <div class="container">
                                                        <div class="card-body py-3">
                                                            <!--begin::Table container-->
                                                            <div class="table-responsive">
                                                                <!--begin::Table-->
                                                                <table
                                                                    class="table table-striped hover table-rounded table-row-bordered data-table">
                                                                    <thead>
                                                                    <tr class="fw-bold text-muted bg-light">
                                                                        <th style="padding: 20px" class="min-w-150px">
                                                                            Committee Name
                                                                        </th>
                                                                        <th style="padding: 20px" class="min-w-150px">
                                                                            Committee Status
                                                                        </th>
                                                                        <th style="padding: 20px" class="min-w-150px">
                                                                            Date
                                                                        </th>
                                                                        <th style="padding: 20px" class="min-w-50px">
                                                                            settings
                                                                        </th>
                                                                    </tr>
                                                                    </thead>
                                                                </table>
                                                                <!--end::Table-->
                                                            </div>
                                                            <!--end::Table container-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Engage widget 10-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--end:::Main-->

@endsection

@section('scripts')

    <script>

        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('showCommittee') }}",
                columns: [
                    {data: 'committeeName', className: 'dt-center'},
                    {
                        data: 'committeeStatus', className: 'dt-center',
                        "render": function (data) {
                            if (data == '1') {
                                return "<div style='font-size: 15px' class='badge badge-light-success'>نشطة</div>";
                            } else {
                                return "<div style='font-size: 15px' class='badge badge-light-danger'>غير نشطة</div>";
                            }
                        }
                    },
                    {data: 'committeeDate', className: 'dt-center'},
                    // {data: 'created_at', name: 'created_at'},
                    // {data: 'updated_at', name: 'updated_at'},
                    {data: 'settings', className: 'dt-center', orderable: false, searchable: false},
                ]
            });
            $('.data-table').DataTable().columns.adjust();
        })
        ;

        let user_id;

        //delete user
        $('body').on('click', '.swapCommitteeStatus', function () {
            let committee_id = $(this).data("id");
            confirmSwap('/user/committees/swapCommitteeStatus', committee_id, '.data-table');
        });

    </script>

@endsection