<!DOCTYPE html>
@extends('layouts.admin.headlayout')
@extends('layouts.admin-navbar')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Company Status</h4> 
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                @include('Admin.alerts')
                <!-- /.row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-wrapper collapse in">
                                <ul class="nav customtab nav-tabs" role="tablist">
                                    <li role="presentation" class="nav-item"><a href="#accredited-tab" class="active nav-link" aria-controls="accredited" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-building"></i></span><span class="hidden-xs">Accredited</span></a></li>
                                    <li role="presentation" class="nav-item"><a href="#active-tab" class="nav-link" aria-controls="active" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-thumbs-up"></i></span> <span class="hidden-xs">Active</span></a></li>
                                    <li role="presentation" class="nav-item"><a href="#inactive-tab" class="nav-link" aria-controls="inactive" role="tab" data-toggle="tab"><span class="visible-xs"><i class="fa fa-thumbs-down"></i></span> <span class="hidden-xs">Inactive</span></a></li>
                                </ul>
                                <div class="panel-body">
                                    <div class="tab-content m-t-0">
                                        <div role="tabpanel" class="table-responsive tab-pane fade active in" id="accredited-tab">
                                            <table id="accredited-table" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Company Name</th>
                                                        <th>Name</th>
                                                        <th>Email Address</th>
                                                        <th>Contact Number</th>
                                                        <th><center>Status</center></th>
                                                    </tr>         
                                                </thead>
                                            </table>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div role="tabpanel" class="table-responsive tab-pane fade" id="active-tab">
                                            <table id="active-table" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Company Name</th>
                                                        <th>Name</th>
                                                        <th>Email Address</th>
                                                        <th>Contact Number</th>
                                                        <th><center>Status</center></th>
                                                    </tr>         
                                                </thead>
                                            </table>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div role="tabpanel" class="table-responsive tab-pane fade" id="inactive-tab">
                                            <table id="inactive-table" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Company Name</th>
                                                        <th>Name</th>
                                                        <th>Email Address</th>
                                                        <th>Contact Number</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center"> 2017 &copy; Traventure </footer>
        </div>
</body>
@endsection
@extends('layouts.admin.javascriptlayout')

<script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>  

<script type="text/javascript">
    $(function() {
        $('#accredited-table').DataTable({
            responsive:true,
            processing: true,
            serverSide: true,
            ajax: '{{ route ('Admin.StatusPage.accreditedDatatable') }}',
            columns: [
                {data: 'company_name', name: 'company_name'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'contact_no', name: 'contact_no', orderable: false},
                {data: 'status', name: 'status', orderable: false}
            ]
        });
    });

    $(function() {
        $('#active-table').DataTable({
            responsive:true,
            processing: true,
            serverSide: true,
            ajax: '{{ route ('Admin.StatusPage.activeDatatable') }}',
            columns: [
                {data: 'company_name', name: 'company_name'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'contact_no', name: 'contact_no', orderable: false},
                {data: 'status', name: 'status', orderable: false}
            ]
        });
    });

    $(function() {
        $('#inactive-table').DataTable({
            responsive:true,
            processing: true,
            serverSide: true,
            ajax: '{{ route ('Admin.StatusPage.inactiveDatatable') }}',
            columns: [
                {data: 'action', name: 'action', orderable: false},
                {data: 'company_name', name: 'company_name'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'contact_no', name: 'contact_no', orderable: false},
                {data: 'status', name: 'status', orderable: false},
            ]
        });
    });
</script>