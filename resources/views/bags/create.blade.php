@extends('bags.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Bag</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('bags.index')}}">Back</a>
        </div>
    <div>
</div>
@if (count($errors)>0)
<div class="alert alert-danger">
    <strong>OPPS!</strong>There were some problems in your input<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}<div>
@endif
<form action="{{route('bags.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<div clas="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" class="form-control" name="name" placeholder="name">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Brand:</strong>
            <input type="text" class="form-control" name="brand" placeholder="brand">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Founded:</strong>
            <input type="text" class="form-control" name="founded" placeholder="founded">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Image:</strong>
            <input type="file" class="form-control" name="image" placeholder="image">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
@endsection