@extends('layouts.master')

@section('title', 'Admin | Present Members')

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ $group->group_name }} CDS Active Members</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">State Code</th>
                            <th scope="col">PPA</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Stream</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1; @endphp
                        @if(count($group->members) == 0)
                            <tr>
                                <td colspan="7" class="text-center">No available member</td>
                            </tr>
                        @else
                            @foreach($group->members as $member)
                                @if($member->status == 'Present')
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $member->first_name }} {{ $member->last_name }}</td>
                                        <td>{{ $member->state_code }}</td>
                                        <td>{{ $member->ppa }}</td>
                                        <td>{{ $member->batch }}</td>
                                        <td>{{ $member->stream }}</td>
                                        <td><a href="/admin/{{ $member->id }}/view-penalties">View Penalties</a></td>
                                        <td><a href="">Edit</a></td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection