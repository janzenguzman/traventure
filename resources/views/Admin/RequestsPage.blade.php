@extends('layouts.admin.headlayout')
@extends('layouts.admin-navbar')
@section('content')
        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <!--Page Title-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div class="pageheader">
                  <h3><i class="fa fa-home"></i> Sign Up Requests </h3>
                    <div class="breadcrumb-wrapper">
                      <span class="label">You are here:</span>
                         <ol class="breadcrumb">
                            <li> <a href="#"> Home </a> </li>
                            <li class="active"> Sign Up Requests </li>
                         </ol>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    <?php
                        foreach ($requests as $newRequests){
                            echo $newRequests->name;
                            echo '<br>';
                            echo $newRequests->email;
                            echo '<br>';
                            echo '<br>';
                        }
                    ?>
                    <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Filtering</h3>
                            </div>
                            <div class="panel-body">
                                    <div class="pad-btm form-inline">
                                        <div class="row">
                                            <div class="col-sm-6 text-xs-center">
                                                <div class="form-group">
                                                    <label class="control-label">Status</label>
                                                    <select id="demo-foo-filter-status" class="form-control">
                                                        <option value="">Show all</option>
                                                        <option value="active">Active</option>
                                                        <option value="disabled">Disabled</option>
                                                        <option value="suspended">Suspended</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-xs-center text-right">
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Foo Table - Filtering -->
                                <!--===================================================-->
                                <table id="demo-foo-filtering" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                                    <thead>
                                        <tr>
                                            <th data-toggle="true">First Name</th>
                                            <th>Last Name</th>
                                            <th data-hide="phone, tablet">Job Title</th>
                                            <th data-hide="phone, tablet">DOB</th>
                                            <th data-hide="phone, tablet">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Albert</td>
                                            <td>Desouza</td>
                                            <td>System Architect</td>
                                            <td>22 Jun 1972</td>
                                            <td><span class="label label-table label-success">Active</span></td>
                                        </tr>
                                        <tr>
                                            <td>Teresa </td>
                                            <td>L. Doe</td>
                                            <td>Pre-Sales Support</td>
                                            <td>3 Oct 1981</td>
                                            <td><span class="label label-table label-dark">Disabled</span></td>
                                        </tr>
                                        <tr>
                                            <td>Veronica </td>
                                            <td>Gusikowski</td>
                                            <td>Civil Engineer</td> 
                                            <td>19 Apr 1969</td>
                                            <td><span class="label label-table label-danger">Suspended</span></td>
                                        </tr>
                                        <tr>
                                            <td>Bruce </td>
                                            <td>Rogahn</td>
                                            <td>CEO</td>
                                            <td>13 Dec 1977</td>
                                            <td><span class="label label-table label-success">Active</span></td>
                                        </tr>
                                        <tr>
                                            <td>Semantha</td>
                                            <td>Halladay</td>
                                            <td>Junior Technical Assistant</td>
                                            <td>30 Dec 1991</td>
                                            <td><span class="label label-table label-danger">Suspended</span></td>
                                        </tr>
                                        <tr>
                                            <td>Stevan </td>
                                            <td>Hickle</td>
                                            <td>Business Services Sales Representative</td>
                                            <td>17 Oct 1987</td>
                                            <td><span class="label label-table label-dark">Disabled</span></td>
                                        </tr>
                                        <tr>
                                            <td>Carolina </td>
                                            <td>Hickle</td>
                                            <td>Business Services Sales Representative</td>
                                            <td>17 Oct 1987</td>
                                            <td><span class="label label-table label-dark">Disabled</span></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" class="footable-visible">
                                                <div class="text-right">
                                                    <ul class="pagination"></ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!--===================================================-->
                                <!-- End Foo Table - Filtering -->
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">
            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pull-right">
                <ul class="footer-list list-inline">
                    <li>
                        <p class="text-sm">SEO Proggres</p>
                        <div class="progress progress-sm progress-light-base">
                            <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                        </div>
                    </li>
                    <li>
                        <p class="text-sm">Online Tutorial</p>
                        <div class="progress progress-sm progress-light-base">
                            <div style="width: 80%" class="progress-bar progress-bar-primary"></div>
                        </div>
                    </li>
                    <li>
                        <button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
                    </li>
                </ul>
            </div>
            <!-- Visible when footer positions are static -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="hide-fixed pull-right pad-rgt">Currently v2.2</div>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <p class="pad-lft">&#0169; 2015 Your Company</p>
        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->
        <!-- SCROLL TOP BUTTON -->
        <!--===================================================-->
        <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
        <!--===================================================-->
    </div>
</body>
@endsection
@extends('layouts.admin.javascriptlayout')
