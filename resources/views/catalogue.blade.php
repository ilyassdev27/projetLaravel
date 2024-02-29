

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prodcts solde PDF</title>
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"> --}}
</head>
<body>
    <h1>catalogue de promotions</h1>
  {{-- <!-- resources/views/computers-pdf.blade.php -->
    <div>

        {{-- Display computers with discounted prices --}}
        <h4 style="">20% off</h4>
                <table border="1" class="table">
                    <thead>
                        <th>Product Image </th>
                        <th>Product Name</th>
                        <th>Original Price</th>
                        <th>Discounted Price </th>
                    </thead>
                 <tbody> 
                    @if (count($products) > 0)
                      @foreach($products as $product)
                      <tr> 
                      
                                       
                                        <td style=" text-align:center;">
                                           <img    style="width: 70px; height:50px;"  src="{{ public_Path('images/' . $product->image) }}" alt="">
                                        </td>
                        
                        {{-- $image->move(public_path('images'), $imageName);                         --}}

                    <td> {{ $product['name'] }}</td>
               
                    <td>   {{ $product['price'] }}$</td>
                    <td>
                      
                          {{ $product['discounted_price'] }} $
                  </td></tbody>
                </tr>
                @endforeach
                </tbody>
                    {{-- Add more fields as needed --}}
                </table>
        
        @else
            <p>No products data to display.</p>
        @endif
    </div>
</body>
</html>
