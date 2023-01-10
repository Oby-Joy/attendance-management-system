@extends('layouts.master')

@section('title', 'Admin | Penalties')

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ $member->first_name }}'s Penalties</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1; @endphp
                        @if(count($member->penalties) == 0)
                            <tr>
                                <td colspan = "3" class="text-center">No pending penalties for this member</td>
                            </tr>
                        @else
                            @foreach($member->penalties as $penalty)                               
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $penalty->date }}</td>
                                    @if($penalty->status == false)
                                        <td><button type="submit" class="btn btn-danger">Pending</button></td>
                                    @else
                                        <td><button class="btn btn-success">Cleared</button></td>
                                    @endif
                                </tr>
                                
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="/admin/{{$member->id}}/view-penalties" method="POST">
                    @method('PATCH')
                    @csrf
                    <button class="btn btn-success ml-5" type="submit">Clear Pending Penalties</button>
                </form>
                
            </div>
        </div>
    </div>
@endsection