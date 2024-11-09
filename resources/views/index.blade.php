<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Management System</title>

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('CSS/bootstrap.css') }}">
</head>
<body>
    
    <div class="container p-2">
        <nav class="p-2 rounded-1 bg-secondary-subtle d-flex justify-content-between align-items-center">
            <div>
              <p class="fw-bold fs-4">Products Management System</p>
            </div>

            <div>
              <button type="submit" class="border-0 p-2 bg-success rounded-1 text-white">
                <a class="text-decoration-none text-white" href="{{ route('products.create') }}">Add New Product</a>
              </button>
            </div>
        </nav>


        <div class="container p-4">

          <div class="d-flex justify-content-between align-items-center">
            <div class="w-50">
              <form action="{{ route('products') }}" method="GET" class="d-flex">
                @csrf
                <input type="text" name="search" class="form-control" placeholder="Search by ID or Description" value="{{ request()->get('search') }}">
                <button type="submit" class="btn btn-primary ms-2">Search</button>
              </form>
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <form action="{{ route('products') }}" method="GET">
                @csrf
                <select class="fw-bold" name="sort" id="">
                     <option class="fw-bold" value="">Select</option>
                    <option class="fw-bold" value="Sort By Name ASC">Sort By Name ASC</option>
                    <option class="fw-bold" value="Sort By Name DESC">Sort By Name DESC</option>
                    <option class="fw-bold" value="Sort By Price ASC">Sort By Price ASC</option>
                    <option class="fw-bold" value="Sort By Price DESC">Sort By Price DESC</option>
                </select>
                <button class="border-0 bg-primary px-3 rounded text-white fw-bold" type="submit">Sort</button>
              </form>
            
            </div>
          </div>

          <br>

          <table class="table table-bordered table-hover">
              <thead class="table-dark">
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Descriptiom</th>
                      <th>Price</th>
                      <th>Stock</th>
                      <th>Image</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($products as $product)
                      <tr>
                          <td>{{ $product->product_id }}</td>
                          <td>{{ $product->name }}</td>
                          <td>{{ $product->description }}</td>
                          <td>{{ $product->price }}</td>
                          <td>{{ $product->stock }}</td>
                          <td><img src="{{ asset('uploads/'.$product->image) }}" alt="Product Image" style="width: 50px; height: 50px; object-fit: cover;">
                          </td>
                          <td>

                              <a href="{{ route('products.show', $product->product_id) }}" class="btn btn-warning btn-sm">View</a>
                            
                              <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-primary btn-sm">Edit</a>

                              <form action="{{ route('products.delete', $product->product_id) }}" method="POST" style="display:inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>

         
        <div class="d-flex justify-content-center mt-4">
          <nav aria-label="Product Pagination">
              <ul class="pagination pagination-lg">
                 
                  <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                      </a>
                  </li>
                  
                  
                  @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                      <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                          <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                      </li>
                  @endforeach
      
                  
                  <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                      <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                      </a>
                  </li>
              </ul>
          </nav>
      </div>

      </div>
      
        
    </div>


    {{-- Bootstrap JS --}}
    <link rel="stylesheet" href="{{ asset('JS/bootstrap.bundle.js') }}">
</body>
</html>