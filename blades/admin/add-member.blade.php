@extends('layouts.master')

@section('title', 'Admin | Add Member')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add CDS Member</h6>
            </div>
            <div class="card-body">
                @if($message = Illuminate\Support\Facades\Session::get('success'))
                    <div class="alert alert-success"> 
                        {{ $message }}
                    </div>
                @endif
                <form action="{{ route('storeMember') }}" method="POST" class="my-2">
                    @csrf
                    <div class="form-group col-md-6 mb-3">
                        <label for="first_name">First Name<span style="color:red;">*</span></label>
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" autocomplete="first_name" autofocus>

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="last_name">Last Name<span style="color:red;">*</span></label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" autocomplete="last_name" autofocus>

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="email">Email Address<span style="color:red;">*</span></label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="state_code">State Code<span style="color:red;">*</span></label>
                        <input id="state_code" type="text" class="form-control @error('state_code') is-invalid @enderror" name="state_code" value="EK/{{ old('state_code') }}" placeholder="State Code" autocomplete="state_code" autofocus>

                        @error('state_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="cds_group">CDS Group<span style="color:red;">*</span></label>
                        <select name="cds_group" id="cds_group" class="form-control @error('cds_group') is-invalid @enderror" >
                            <option selected>Select CDS Group</option>
                            @foreach($groups as $group)
                             <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                            @endforeach
                        </select>

                        @error('cds_group')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="ppa">PPA<span style="color:red;">*</span></label>
                        <input id="ppa" type="text" class="form-control @error('ppa') is-invalid @enderror" name="ppa" value="{{ old('ppa') }}" placeholder="PPA" autocomplete="ppa" autofocus>

                        @error('ppa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="batch">Batch<span style="color:red;">*</span></label>
                        <select name="batch" id="batch" class="form-control @error('batch') is-invalid @enderror" >
                            <option selected>Select Batch</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>

                        @error('batch')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="stream">Stream<span style="color:red;">*</span></label>
                        <select name="stream" id="stream" class="form-control @error('stream') is-invalid @enderror" >
                            <option selected>Select Stream</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>

                        @error('stream')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="entry_date">Entry Date<span style="color:red;">*</span></label>
                        <input id="entry_date" type="date" class="form-control @error('entry_date') is-invalid @enderror" name="entry_date" value="{{ old('entry_date') }}" autocomplete="entry_date" autofocus>

                        @error('entry_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="exit_date">Pass-out Date<span style="color:red;">*</span></label>
                        <input id="exit_date" type="date" class="form-control @error('exit_date') is-invalid @enderror" name="exit_date" value="{{ old('exit_date') }}" autocomplete="exit_date" autofocus>

                        @error('exit_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="stream">Password<span style="color:red;">*</span></label>
                        <input id="ppa" type="password" class="form-control" name="password" placeholder="Password" autocomplete="ppa" disabled>
                    </div>

                    <button class="btn btn-primary" type="submit" style="margin:auto;" id="add">Add Member</button>

                    
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