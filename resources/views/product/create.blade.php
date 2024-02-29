@extends('base')
@section('title' , 'Create')
@section('content')
<h1>Create New Product</h1>
<div class="d-flex justify-content-center">

<form action="{{ route('store') }}" method="post" enctype="multipart/form-data" class="form">
    @csrf
    <div class="form-group">
       <label for="name">Name</label>
       <input name="name" id="name" type="text" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="form-group">
       <label for="description">description</label>
       <input name="description" id="description" type="text" class="form-control" value="{{ old('description') }}"> 
    </div>

    <div class="form-group">
       <label for="quntity">Quantity</label>
       <input name="quntity" id="quntity" type="text" class="form-control" value="{{ old('quntity') }}">
    </div>   
    
    <div class="form-group">
       <label for="image">Image</label>
       <input name="image" id="image" type="file" class="form-control" >
    </div>
    <div class="form-group">
       <label for="price">Price</label>
       <input name="price" id="price" type="number" step="0.5" class="form-control" value="{{ old('price') }}">
    </div>
    <div class="form-group">
       <label for="category_id">category_id</label>
    <select name="category_id" id="category_id" class="form-select">
        <option value="">choose your category</option>
        @foreach ($categories as $category)
            <option @if(old('category_id') == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group my-3">
        <input type="submit" class="btn btn-primary w-100 " value="Add">
    </div>
</form>
</div>
@endsection