@extends("layout")

@section("title")
    Add Product
@endsection

@section("content")

    <div class="container mt-5">

        <h2 class="mb-4">Edit Product</h2>

        <form method="POST" action="{{route("product.update", ['product' => $product->id])}}">

            <div>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p> {{$error}}</p>
                    @endforeach
                @endif
            </div>

            @csrf
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" value="{{$product->name}}"
                       placeholder="Enter product name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Enter description" required>
                    {{$product->description}}
                </textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" class="form-control" name="amount" value="{{$product->amount}}"
                       placeholder="Enter amount" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="price" value="{{$product->price}}"
                       placeholder="Enter price" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image (file name)</label>
                <input type="text" name="image" class="form-control" value="{{$product->image}}" placeholder="image.jpg"
                       required>
            </div>

            <button type="submit" class="btn btn-primary">Edit Product</button>

        </form>

    </div>

@endsection
