@extends("layout")

@section("title")
    All Contacts
@endsection

@section("content")

    <div class="container mt-5">

        <h2 class="mb-4">Your Shopping Cart</h2>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($combined as $item)
                <tr>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['price']}}</td>
                    <td>{{$item['amount']}}</td>
                    <td>{{$item['total']}}</td>
                    <td>
                        <a href="#"
                           class="btn btn-sm btn-danger">Remove</a>

                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>

@endsection
