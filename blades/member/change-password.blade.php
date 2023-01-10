@extends('layouts.child')

@section('title', 'Member | Change Password')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
            </div>
            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success"> 
                        {{ session('status') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger"> 
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('updatePassword') }}" method="POST" class="my-2">
                    @csrf
                    <div class="form-group col-md-6 mb-3">
                        <label for="current_password">Current Password<span style="color:red;">*</span></label>
                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="{{ old('first_name') }}" placeholder="Current Password" autocomplete="current_password" autofocus>

                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="new_password">New Password<span style="color:red;">*</span></label>
                        <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="{{ old('new_password') }}" placeholder="New Password" autocomplete="new_password" autofocus>

                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="new_password_confirmation">Confirm New Password<span style="color:red;">*</span></label>
                        <input id="new_password_confirmation" type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}" placeholder="Confirm New Password" autocomplete="new_password_confirmation" autofocus>

                        @error('new_password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit" style="margin:auto;" id="change">Change Password</button>

                    
                </form>
                
            </div>
        </div>
    <div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#change').click(function(){
                $(this).html('Processing...');
            });
        });
    </script>
@endsection