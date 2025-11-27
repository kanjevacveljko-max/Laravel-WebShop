@extends("layout")

@section("title")
    Add Product
@endsection

@section("content")

    <div class="container mt-5">

        <h2 class="mb-4">Add New Product</h2>

        <form method="POST" action="/admin/save-product">

            @if($errors->any())
                <p>Error: {{$errors->first()}}</p>
            @endif

            @csrf
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Enter description" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" placeholder="Enter amount" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Enter price" required>
            </div>


            <div class="mb-3">
                <label class="form-label">Image (file name)</label>
                <input type="text" name="image" class="form-control" placeholder="image.jpg" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Product</button>

        </form>

    </div>


@endsection
