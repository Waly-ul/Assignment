<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Product</title>
       {{-- Bootstrap CSS --}}
       <link rel="stylesheet" href="{{ asset('CSS/bootstrap.css') }}">
</head>
<body>
    <div class="d-flex justify-content-center mt-3">
        @foreach($product as $item)
        <div class="product">
            <img src="{{ asset('uploads/'.$item->image) }}" alt="Product Image" style="width: 250px; height: 250px; object-fit: cover;">
            <p><strong>Product Name:</strong> {{ $item->name }}</p>
            <p><strong>Description:</strong> {{ $item->description }}</p>
            <p><strong>Price:</strong> ${{ number_format($item->price, 2) }}</p>
            <p><strong>Stock:</strong> {{ $item->stock }}</p>
            <form action="{{ route('products') }}">
                <button type="submit" class="border-0 bg-warning py-1 px-2 rounded">Back</button>
            </form>
        </div>
        @endforeach
    </div>

</body>
</html>