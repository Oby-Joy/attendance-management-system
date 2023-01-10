@extends('layouts.child')

@section('title', 'Member | Home')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h2>Welcome, {{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}. </h2>

                <p>If this is your first time logging into this application, it is advised that you change your current password immediately. Click <a href="/member/change-password">here</a> to change your password.</p>
                <p>Welcome Aboard!</p>
            </div>

        </div>
    </div>

@endsection

           