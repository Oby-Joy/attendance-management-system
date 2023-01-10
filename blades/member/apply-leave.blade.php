@extends('layouts.child')

@section('title', 'Leave Application')

@section('content')
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Apply for Leave</h6>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }} 
                    </div>      
                @endif

                <form method="POST" action="{{ route('storeLeave') }}">
                @csrf
                    <div class="form-group">            
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <input name="member_id" type="hidden" value="{{ Auth::user()->id }}">
                                <select name="reason" id="" class="form-control">
                                    <option value="">Reason for Leave</option>
                                    <option value="Marriage">Marriage</option>
                                    <option value="Health">Health</option>
                                    <option value="Convocation">Convocation</option>
                                    <option value="Maternity">Maternity</option>
                                </select><br>
                                <textarea class="form-control" name="body" id="" cols="30" rows="10" placeholder="Body (Not less than 30 words)"></textarea>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary mt-3" id="apply" type="submit">Apply</button>
                            </div>
                        </div>
                    </div>             
                </form>
            </div>
        </div>
    <div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#apply').click(function(){
                $(this).html('Sending...');
            });
        });
    </script>
@endsection