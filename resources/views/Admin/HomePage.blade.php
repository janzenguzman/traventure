@extends('layouts.admin.headlayout')
@extends('layouts.admin-navbar')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> 
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-xs-6 col-md-4 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"><i class="fa fa-building" style="font-size: 60px;"></i>
                                            <h5 class="text-muted vb">
                                                <br><br>
                                                    @if($totalAccredited <= 1)
                                                        <p> ACCREDITED<br>COMPANY </p>
                                                    @else
                                                        <p> ACCREDITED<br>COMPANIES </p>
                                                    @endif
                                            </h5> 
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-info">{{ $totalAccredited }}</h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-info" role="progressbar" style="width:100%"></div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 row-in-br  b-r-none">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"><i class="fa fa-thumbs-up" style="font-size: 60px;"></i>
                                            <br><br>
                                            <h5 class="text-muted vb">
                                                @if($totalActive <= 1)
                                                        <p> ACTIVE<br>COMPANY </p>
                                                @else
                                                        <p> ACTIVE<br>COMPANIES </p>
                                                @endif
                                            </h5> 
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-success">{{ $totalActive }}</h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" style="width: 100%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 b-0">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"><i class="fa fa-thumbs-down" style="font-size: 60px;"></i>
                                            <br><br>
                                            <h5 class="text-muted vb">
                                                @if($totalInactive <= 1)
                                                    <p> INACTIVE<br>COMPANY </p>
                                                @else
                                                    <p> INACTIVE<br>COMPANIES </p>
                                                @endif
                                            </h5> 
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-danger">{{ $totalInactive }}</h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 100%"> </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-lg-12 b-0">
                                <h3 class="box-title"></h3>
                                    {!! Charts::styles() !!}
                                    {!! $chart->html() !!}
                                    {!! Charts::scripts() !!}
                                    {!! $chart->script() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <footer class="footer text-center"> 2017 &copy; Traventure </footer>
        </div>
        <!-- End Of Main Application -->
        
    </body>     
@endsection
@extends('layouts.admin.javascriptlayout')
