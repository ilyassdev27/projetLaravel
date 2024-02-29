@extends('base')
@section('title' , 'Products')
@section('content')
<h1 class="d-flex justify-content-center">Products List</h1>
 <table class="table container  justify-content-center" >
    <thead>
        <tr>
                  
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>category</th>
            
            
            
           
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    
     
        @foreach( $products as $product )
        <tr>
        
        <td>{{$product->name  }}</td>
        <td>{{$product->price }}DH</td>
        <td><img src="{{ asset('images/' . $product->image) }}" alt="" style="width: 125px; height:100px;"></td>
        <td>{{$product->quntity }}</td>
        <td>{{$product->description }}</td>
        <td>{{$product->category?->name }}</td>
        {{-- <td>
            <p class="btn-holder">
                <a href="{{ url('cart/addc', ['id' => $product['id']]) }}" class="btn btn-block text-center text-dark" role="button">Add cart</a> </p>
        </td> --}}
        <td class="d-flex justify-content-between">
            <a class=" my-0  btn btn-primary" href="{{ route('edit', $product->id) }}">Update</a>
                <form action="{{ route('destroy', $product->id) }}" method="post" class="">
                    @csrf
                    @method('DELETE')
                    {{-- <input class="btn btn-danger" type="submit" value="Delete" > --}}
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{ $product->id }}">
                        Delete
                    </button>
        
                    <!-- Modal de confirmation -->
                    <div class="modal fade" id="exampleModal-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Deletion confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this item?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
                
                    {{-- @if($message=Session::get('successdelete'))

<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong> {{$message}}</strong>
</div>


@endif --}}
                </form>
        </td>   
     </tr>
     @endforeach
        
    
       
 
        
    </tbody>
 </table>
 <div class="d-flex justify-content-center">
    {{ $products->links('vendor.pagination.custom') }}
</div>



@endsection