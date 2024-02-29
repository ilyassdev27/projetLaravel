<!-- products.blade.php -->

@extends('base')
@section('title', 'Products')
@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Category List</h1>
    <div class="col-1"><a class="btn btn-primary mb-3" href="{{ route('categories.create') }}">Add</a></div>
    <table class="table">
        
        <thead class="thead-dark">
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td class="col-4">{{ $category->id }}</td>
                <td class="col-4">{{ $category->name }}</td>
               
                <td class="d-flex justify-content-between col-4">
                  
                    
                    <span> <a class="btn  btn-info text-light me-1" href="{{ route('categories.show', $category->id) }}">Show</a></span> 
                    <span><a class="btn btn-secondary me-1" href="{{ route('categories.edit', $category->id) }}">Update</a></span>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{ $category->id }}">
                            Delete
                        </button>
            
                        <!-- Modal de confirmation -->
                        <div class="modal fade" id="exampleModal-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </form>
            
                </td>
                 
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
