@extends('layouts.child')

@section('title', 'Member | View Attendance')

@section('content')
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Today's Attendance</h6>
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
                <form action="{{ route('storeAttendance') }}" method="POST" class="my-2">
                    @csrf
                    <div class="form-group col-md-6 mb-3">
                        <label for="date">Today's Date<span style="color:red;">*</span></label>
                        <input id="date" type="text" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ date('Y-m-d') }}" placeholder="Today's Date" disabled>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="time">Current Time<span style="color:red;">*</span></label>
                        <input id="time" type="text" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ now()->format('H:i:s') }}" placeholder="Current Time" disabled>
                    </div>

                    <input type="hidden" value="{{ Auth::user()->id }}" name="member_id">

                    <div class="form-group col-md-6 mb-3">
                        <label for="action">Action<span style="color:red;">*</span></label>
                        <select name="action" id="" class="form-control @error('action') is-invalid @enderror">
                            <option value="">Select Action</option>
                            <option value="Present">Present</option>
                        </select>

                        @error('action')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit" style="margin:auto;" id="change">Submit</button>

                    
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