<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('CSS/bootstrap.css') }}">
</head>
<body>

    <div class="container d-flex justify-content-center mt-5">
        <div class="card border-dark mb-3" style="max-width: 40rem;">

            <div class="card-header bg-transparent border-dark d-flex justify-content-between align-items-center">

                <div>
                    <p class="fw-bold">Add Product</p>
                </div>

                <div>
                    <button type="submit" class="border-0 p-2 bg-success rounded-1 text-white">
                      <a class="text-decoration-none text-white" href="{{ route('products') }}">Back</a>
                    </button>
                </div>
            </div>
        
            <div class="card-body text-dark">
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
    
                    <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 p-1">
                                        <label class="form-label">Product Id</label>
                                        <input type="text" class="form-control" name="product_id">
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="product_name">
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Description</label>
                                        <textarea type="text" class="form-control" name="product_description"> </textarea>
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Price</label>
                                        <input type="text" class="form-control" name="product_price">
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Stock</label>
                                        <input type="text" class="form-control" name="product_stock">
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" name="product_image">
                                    </div>
                                   
    
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Bottstrap JS --}}
    <link rel="stylesheet" href="{{ asset('JS/bootstrap.bundle.js') }}">
</body>
</html>