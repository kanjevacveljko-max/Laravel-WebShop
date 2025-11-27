@extends("layout")

@section("title")
    Prodavnica
@endsection

@section("content")

    <div class="container mt-5">

        <h2 class="mb-4">Products</h2>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->amount}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>

@endsection
