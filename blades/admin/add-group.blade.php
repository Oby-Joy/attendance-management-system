@extends('layouts.master')

@section('title', 'Admin | Add CDS Group')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add CDS Group</h6>
            </div>
            <div class="card-body">
                @if($message = Illuminate\Support\Facades\Session::get('success'))
                    <div class="alert alert-success"> 
                        {{ $message }}
                    </div>
                @endif
                <form action="{{ route('storeGroup') }}" method="POST" class="my-2">
                    @csrf
                    <div class="form-group col-md-6 mb-3">
                        <label for="group_name">CDS Group Name<span style="color:red;">*</span></label>
                        <input id="group_name" type="text" class="form-control @error('group_name') is-invalid @enderror" name="group_name" value="{{ old('group_name') }}" placeholder="CDS Group Name" autocomplete="group_name" autofocus>

                        @error('group_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="date_created">Date Created<span style="color:red;">*</span></label>
                        <input id="date_created" type="date" class="form-control @error('date_created') is-invalid @enderror" name="date_created" value="{{ old('date_created') }}" placeholder="Date Created" autocomplete="date_created" autofocus>

                        @error('date_created')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit" style="margin:auto;" id="add">Add Group</button>

                    
                </form>
                
            </div>
        </div>
    <div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#add').click(function(){
                $(this).html('Processing...');
            });
        });
    </script>
@endsection