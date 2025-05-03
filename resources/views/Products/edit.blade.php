<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel_12 crud</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

  <div class="bg-dark text-center text-white py-1">
    <h1>laravel_12 crud</h1>
  </div>
  <div class="container mb-3">
    <div class="row">
      <div class="d-flex justify-content-end py-0 mt-3">
        <a href="{{ route('products.index') }}" class="btn btn-danger">back</a>
      </div>
      <div class="py-0 mt-3">
        <div class="card-header bg-dark text-white">
          <h4 class="h4 text-center">Edit Product</h4>
        </div>
        <div class="card-body shadow-lg px-2">
          <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
              <label for="name" class="form-lable">Name</label>
              <input type="text" value="{{ old('name', $product->name) }}" class="form-control" id="name" name="name"
                placeholder="Name">
              @error('name')
          <p class="text-danger">{{ $message }}</p>

        @enderror
            </div>
            <div class="mb-3">
              <label for="image" class="form-lable">Image</label>
              <input type="file" class="form-control " id="image" name="image">

              @error('image')
          <p class="text-danger">{{ $message }}</p>
        @enderror

              <img class="rounded mt-2" src="{{ asset('uploads/product/' . $product->image) }}" width="100" height="100"
                alt="">
            </div>
            <div class="mb-3">
              <label for="sku" class="form-lable">Sku</label>
              <input type="text" value="{{ old('sku', $product->sku) }}" class="form-control" id="sku" name="sku"
                placeholder="Sku">
              @error('sku')
          <p class="text-danger">{{ $message }}</p>
        @enderror

            </div>

            <div class="mb-3">
              <label for="price" class="form-lable">Price</label>
              <input type="text" value="{{ old('price', $product->price) }}" class="form-control" id="price"
                name="price" placeholder="Price">
              @error('price')
          <p class="text-danger">{{ $message }}</p>
        @enderror
            </div>

            <div class="mb-3">
              <label for="status" class="form-lable">Status</label>
              <select name="status" id="status" class="form-select">
                <option {{ ($product->status == 'Active') ? 'select' : '
                ' }} value="active">Active</option>
                <option {{ ($product->status == 'Inactive') ? 'select' : '
                ' }} value="inactive">inactive</option>
              </select>
            </div>
            <button class="btn btn-primary">update</button>
          </form>

        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>