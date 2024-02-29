@extends('base')
@section('title' , 'new category')
@section('content')
<h1>Create New Category</h1>
<div class="d-flex justify-content-center">

<form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data" class="form">
    @csrf
    <div class="form-group">
       <label for="name">Name</label>
       @error('name')
       {{ $message }}
   @enderror
       <input name="name" id="name" type="text" class="form-control" value="{{ old('name') }}">
    </div>

   

    <div class="form-group my-3">
        <input type="submit" class="btn btn-success w-100 " value="Add">
    </div>
</form>
</div>
@endsection