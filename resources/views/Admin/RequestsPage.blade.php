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
                @include('layouts.admin.alerts')
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

         <!-- decline modal content -->
         <div id="declineModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action = "{{ route('Admin.Decline')}}">
                            {{ csrf_field() }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Decline Sign Up Request</h4> </div>
                        <div class="modal-body">
                            <h5>Are you sure you want to decline this sign up request?</h5>
                            <input type="hidden" class="form-control" id="id" name="id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger waves-effect">Decline</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
</body>

<!--AJAX-->
<script>
    $(document).on("click",'#declineButton',(function(){
        $('#id').val($(this).data('id'));
    })); 
</script>
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

