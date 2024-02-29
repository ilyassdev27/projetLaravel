@extends('base')
@section('title' , 'Products')
@section('content')
<h1 class="d-flex justify-content-center">Category {{ $category->name }}</h1>
<div class="col-2 container"><a class="btn btn-primary" href="{{ route('categories.index')}}"> Go back</a></div>
 <table class="table w-50  container " >
    <thead  class=" justify-content-between">
        <tr>
                  
            <th>#ID</th>
            <th>Image</th> 
            <th>Name</th> 
            <th>Actions</th>
        </tr>
    </thead>
    <tbody  class="justify-content-between">
        @foreach( $products as $product )
        <tr>
        
        <td class="col-3">{{$product->id  }}</td>
        <td class="col-3">  <img    class="h-50 w-50"  src="{{ asset('images/' . $product->image) }}" alt=""></td>
        <td class="col-3">{{$product->name }}</td>
       
        <td class="col-3">
            <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Update</a>
            
        </td>   
     </tr>
     @endforeach
        
    
       
 
        
    </tbody>
 </table>
 <div class="d-flex justify-content-center">
    {{-- {{ $products->links('vendor.pagination.custom') }} --}}
</div>



@endsection