@extends('layouts.child')

@section('title', 'Member | Your Penalties')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date of Penalty</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1; @endphp
                        @foreach($penalties as $penalty)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $penalty->date }}</td>
                                @if($penalty->status == false)
                                    <td><button class="btn btn-danger">Pending</button></td>
                                @else
                                    <td><button class="btn btn-success">Resolved</button></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection