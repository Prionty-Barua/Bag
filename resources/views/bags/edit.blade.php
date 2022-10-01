@extends('bags.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Bag</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('bags.index')}}">Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>OOPS!</strong>There were some problems in your input<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('bags.update',$bag->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div clas="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" class="form-control" value="{{$bag->name}}" name="name" placeholder="name">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Brand:</strong>
            <textarea class="form-control" style="height:150px" name="brand" placeholder="brand">{{ $bag->brand }}</textarea>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Founded:</strong>
            <textarea class="form-control" style="height:150px" name="founded" placeholder="founded">{{ $bag->founded }}</textarea>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Image:</strong>
            <input type="file" name="image" class="form-control" placeholder="image">
            <img src="/image/{{ $bag->image}}" width="300px">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
@endsection