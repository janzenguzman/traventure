<html>
    <style>
    .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
    </style>
</html>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Packages</div>
                    <div class="links">
                        <a href="Packages">Packages</a>
                        <a href="Bookings">Bookings</a>
                        <a href="Messages">Messages</a>
                    </div>
                </div>
                <form action="/Agent/Packages/CreatePackage">
                        <input type="submit" value="Create a package"/>
                </form>
                <div>
                    <div class="panel-heading">
                        <table>
                            <tr>
                                <td>ID</td>
                                <td>Package Name</td>
                                <td>Type</td>
                                <td>Reminders</td>
                                <td>Action</td>
                            </tr>
                                @if(count($packages) > 0)
                                    @foreach($packages as $package)
                            <tr>
                                <td>{{$package->package_id}}</td>
                                <td>{{$package->package_name}}</td>
                                <td>{{$package->type}}</td>
                                <td>{{$package->reminders}}</td>
                                <td><a href="/Agent/Packages/DeletePackage/{{ $package->package_id }}"><button>Delete</button></a>
                                    {{--  <a href="{{ route('Agent.EditSlots', $packages->package_id) }}"><button>Slots</button></a>  --}}
                                    <a href="/Agent/Packages/AddSlots/{{ $package->package_id }}"><button>Add Slots</button></a>
                                    <a href="/Agent/Packages/PackageDetails/{{ $package->package_id }}"><button>View More</button></a></td>
                            </tr>
                                    @endforeach
                                 @else
                                    <p>No packages found</p>
                                @endif
                        </table>
                    </div>
            </div>
        </div>
    </div>
    
</div>
@endsection