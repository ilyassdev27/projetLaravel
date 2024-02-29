@extends('base')
@section('title', 'Products')
@section('content')

<h1 class="d-flex justify-content-center">Category {{ $category->name }}</h1>
<div class="col-2 container">
    <a class="btn btn-primary" href="{{ route('categories.index')}}"> Go back</a>
</div>

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">Update</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="d-flex justify-content-center">
    {{-- Pagination links if needed --}}
</div>

@endsection
