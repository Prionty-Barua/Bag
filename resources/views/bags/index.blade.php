@extends('bags.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Bags</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('bags.create')}}">Create New Bag</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Image</th>
        <th>Name</th>
        <th>Brand</th>
        <th>Founded</th>
        <th width="250px">Action</th>
    </tr>
    @foreach($bags as $bag)
    <tr>
        <td>{{++$i}}</td>
        <td><img src="/image/{{ $bag->image}}" width="100px"></td>
        <td>{{$bag->name}}</td>
        <td>{{$bag->brand}}</td>
        <td>{{$bag->founded}}</td>
        <td>
            <form action="{{ route('bags.destroy',$bag->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('bags.show',$bag->id)}}">Show</a>
                <a class="btn btn-primary" href="{{ route('bags.edit',$bag->id)}}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection