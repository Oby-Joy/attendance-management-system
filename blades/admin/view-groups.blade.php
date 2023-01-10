@extends('layouts.master')

@section('title', 'Admin | CDS Groups')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">CDS Name</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">No. of Members</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1; @endphp
                        @foreach($groups as $group)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $group->group_name }}</td>
                                <td>{{ $group->date_created }}</td>
                                <td>{{ count($group->members) }}</td>
                                <td><a href="/admin/{{ $group->id }}/past-members">View Past Members</a></td>
                                <td><a href="/admin/{{ $group->id }}/present-members">View Present Members</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection