<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Product Information</title>

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('CSS/bootstrap.css') }}">
</head>
<body>
    <div class="container d-flex justify-content-center mt-5">
        <div class="card border-dark mb-3" style="max-width: 40rem;">

            <div class="card-header bg-transparent border-dark d-flex justify-content-between align-items-center">

                <div>
                    <p class="fw-bold">Edit Product</p>
                </div>

                <div>
                    <button type="submit" class="border-0 p-2 bg-success rounded-1 text-white">
                      <a class="text-decoration-none text-white" href="{{ route('products') }}">Back</a>
                    </button>
                </div>
            </div>
        
            <div class="card-body text-dark">
                <form action="{{ route('products.update',  $product[0]->product_id) }}" method = "POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

    
                    <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 p-1">
                                        <label class="form-label">Product Id</label>
                                        <input type="text" class="form-control" name="product_id" value="{{ $product[0]->product_id }}">
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="product_name" value="{{ $product[0]->name }}">
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" name="product_description" value="{{ $product[0]->description }}"> 
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Price</label>
                                        <input type="text" class="form-control" name="product_price" value= "{{ $product[0]->price }}">
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Stock</label>
                                        <input type="text" class="form-control" name="product_stock" value="{{ $product[0]->stock }}">
                                    </div>
                                    <div class="col-12 p-1">
                                        @if (!empty($product[0]->image))
                                            <img class="mb-1" src="{{ asset('uploads/'.$product[0]->image) }}" alt="" style="width: 50px; height: 50px; object-fit: cover;">

                                            <input type="hidden" name="previous_image" value="{{ $product[0]->image }}">
                                        @endif
                                        <input type="file" class="form-control" name="product_image">
                                    </div>
                                   
    
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <link rel="stylesheet" href="{{ asset('JS/bootstrap.bundle.js') }}">
</body>
</html>