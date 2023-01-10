@extends('layouts.child')

@section('title', 'Member Profile')

@section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Member Profile</h6>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3 col-sm-12 my-5">
                            <i class="fa fa-user" style="font-size:180px;"></i>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-6">
                           <ul  style="list-style:none">
                               <li>Name: {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</li>
                               <li class="my-4">Email: {{ Auth::user()->email }}</li>
                               <li class="my-4">State Code: {{ Auth::user()->state_code }}</li>
                               <li class="my-4">PPA: {{ Auth::user()->ppa }}</li>
                               <li class="my-4">Batch: {{ Auth::user()->batch }}</li>
                               <li class="my-4">Stream: {{ Auth::user()->stream }}</li>
                           </ul>
                           <a href="/member/{{Auth::user()->id}}/edit-profile"><button class = "btn btn-primary">Edit Profile</button></a>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                   
                    

                </div>

        </div>
    </div>
@endsection