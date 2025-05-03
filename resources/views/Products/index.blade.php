<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="bg-dark text-white text-center py-3">
    <h2 class="mb-0">Laravel 12 CRUD Application</h2>
  </div>

  <div class="container my-4">

    <!-- Success Message -->
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ Session::get('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

    <!-- Error Message -->
    @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ Session::get('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

    <!-- Create Button -->
    <div class="d-flex justify-content-end mb-3">
      <a href="{{ route('products.create') }}" class="btn btn-success">+ Add Product</a>
    </div>

    <!-- Product Table -->
    <div class="card shadow">
      <div class="card-header bg-primary text-white text-center">
        <h5 class="mb-0">Product List</h5>
      </div>
      <div class="card-body p-0">
        <table class="table table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Name</th>
              <th>SKU</th>
              <th>Price</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @if ($products->isNotEmpty())
            @foreach ($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>
            <img src="{{ asset('uploads/product/' . $product->image) }}" class="rounded" width="40" height="40"
            alt="Product Image">
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->sku }}</td>
            <td>${{ $product->price }}</td>
            <td>
            <span class="badge {{ strtolower(trim($product->status)) == 'active' ? 'bg-success' : 'bg-danger' }}">
            {{ $product->status }}
            </span>
            </td>
            <td class="text-center">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary me-1">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
            class="d-inline-block text-danger" onsubmit="return confirm('Are you sure you want to delete?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
            </td>
          </tr>
          @endforeach
      @else
        <tr>
          <td colspan="7" class="text-center py-3">No products found.</td>
        </tr>
      @endif
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>