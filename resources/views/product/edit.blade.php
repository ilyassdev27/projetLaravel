@extends('base')
@section('title' , 'Create')
@section('content')
<h1>Update Product</h1>
<div class="d-flex justify-content-center">

<form action="/products/{{$product->id }}" method="post" enctype="multipart/form-data" class="form">
    @csrf
    @method("PUT")
    <div class="form-group">
       <label for="name">Name</label>
       <input name="name" id="name" type="text" class="form-control" value="{{ $product->name }}">
    </div>

    <div class="form-group">
       <label for="description">description</label>
       <input name="description" id="description" type="text" class="form-control" value="{{ $product->description }}"> 
    </div>

    <div class="form-group">
       <label for="quntity">Quantity</label>
       <input name="quntity" id="quntity" type="text" class="form-control" value="{{ $product->quntity }}">
    </div>   
    
    <div class="form-group">
       <label for="image">Image</label>
       <input name="image" id="image" type="file" class="form-control" >
    @if($product)
    <img src="{{ asset('images/' . $product->image) }}" alt="" style="width: 75px; height:60px;">
    @endif
        
    
    </div>
    <div class="form-group">
       <label for="price">Price</label>
       <input name="price" id="price" type="number" step="0.5" class="form-control" value="{{ $product->price }}">
    </div>
    <div class="form-group">
      <label for="category_id">category_id</label>
      <select name="category_id" id="category_id" class="form-select">
         <option value="">choose your category</option>
         @foreach ($categories as $category)
             <option @if($product->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
         @endforeach
     </select>
     
   </div>

    <div class="form-group my-3">
        <input type="submit" class="btn btn-primary w-100 " value="Update">
    </div>
</form>
</div>
@endsection