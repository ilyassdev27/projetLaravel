@extends('base')
@section('title' , 'products')

@section('content') 




<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">

        <img src="{{ asset('images/slideee.jpg') }}" class="d-block w-100 h-50" alt="photo">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/slidee.jpg')}}" class="d-block w-100 h-75" alt="photo">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/cute-animals-group-white-background.jpg')}}" class="d-block w-100 h-75" alt="photo">
      </div>
      <
    
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>












  <div class="d-flex justify-content-center">
    @if($category)
        <h1> {{ $category }}</h1>
    @else
        <h1>All Products</h1>
    @endif
</div>
<div class=" mr-25 row row-cols-1 row-cols-md-3 g-4" id="cards">
    @foreach ($products as $product )
     <div class="col container">
        <div class="card h-100">
             <img    class="card-img-top h-100"      src="{{ asset('images/' . $product->image) }}" alt="">
             <div class="card-body">
                <h5 class="card-title">{{$product->name  }}</h5>
                <p class="card-text">{{$product->description }}</p>
                <hr>
                <div class="d-flex justify-content-between">
                    <span>Quantity: <span class="badge bg-success">{{$product->quntity }}</span>

                    Price:<span class="badge bg-primary">{{$product->price }}DH</span>
                    Category_id:<span class="badge bg-secondary">{{$product->category_id }}</span>
                </span>
                </div>
                <hr>
           @if(Auth::user())

                @if(Auth::user()->role==='ADMIN')
                {{-- <div class="cart-footer" class="btn btn-primary">
                    <a href="{{ route('products.index')}}">Details</a>
                </div> --}}
                     
             @endif
             @if(Auth::user()->role==='USER')
             
             @endif
             @endif <div class="d-flex justify-content-around"> <p><a href="#" class="btn btn-secondary">Show More</a></p> 
              <p class="btn-holder">
                <a href="{{ url('cart/addc', ['id' => $product['id']]) }}" class="btn btn-warning text-center text-light " role="button">Add To Cart</a> </p></div>
           
                  
             </div>
        </div>
     </div>
        
    @endforeach
</div>
<div class="d-flex justify-content-center">
  {{ $products->links('vendor.pagination.custom') }}
</div>

<div class="container about-section" id="about-section">
  <h2>About This Website</h2>
  <div class="line-above"></div>
  <p>
      Welcome to our online store! We offer a wide range of high-quality products to meet your needs. Explore our collection of products, and feel free to add your favorite items to the cart.
  </p>

  <h3>Contact Information</h3>
  <div class="line-above"></div>
  <p>
      For any inquiries or assistance, please contact us at <a href="mailto:info@example.com">info@example.com</a>.
  </p>
</div>
@yield('scripts')

@endsection