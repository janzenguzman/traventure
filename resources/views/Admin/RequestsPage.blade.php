<!DOCTYPE html>
@extends('layouts.admin.headlayout')
@extends('layouts.admin-navbar')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Sign Up Requests</h4> 
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                @include('Admin.alerts')
                <!-- /.row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table class="table table-hover" id="requests-table">
                                    <thead>
                                        <tr>
                                            <th>Company</th> 
                                            <th>Applicant</th> 
                                            <th>Job Position</th> 
                                            <th>Contact Number</th>
                                            <th>Email Address</th>  
                                            <th>&nbsp</th>
                                        </tr>
                                    </thead>
                                </table>
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
        $('#requests-table').DataTable({
            responsive:true,
            processing: true,
            serverSide: true,
            ajax: '{{ route ('Admin.RequestsPage.requestsDatatable') }}',
            columns: [
                {data: 'company_name', name: 'company_name'},
                {data: 'applicant', name: 'applicant'},
                {data: 'job_position', name: 'job_position'},
                {data: 'contact_no', name: 'contact_no', orderable: false},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false}
            ]
        });
    });
    
</script>

