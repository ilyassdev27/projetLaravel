@extends('base')
@section('title' , 'Create')
@section('content')
<h1>Update Category</h1>
<div class="d-flex justify-content-center">

<form action="/categories/{{$category->id }}" method="post" enctype="multipart/form-data" class="form">
    @csrf
    @method("PUT")
    <div class="form-group">
       <label for="name">Name</label>
       @error('name')
       {{ $message }}
   @enderror
       <input name="name" id="name" type="text" class="form-control" value="{{ $category->name }}">
    </div>

    <div class="form-group my-3">
        <input type="submit" class="btn btn-primary w-100 " value="Update">
    </div>
</form>
</div>
@endsection