@extends('layouts.child')

@section('title', 'Leave Application')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Reason for Leave</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1; @endphp
                        @foreach($leaves as $leave)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $leave->reason }}</td>
                                @if($leave->status == false)
                                    <td><button class="btn btn-danger">Pending</button></td>
                                @else
                                    <td><button class="btn btn-success">Approved</button></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection