@extends("layout")

@section("title")
    O nama
@endsection

@section("content")
    <p> {{$product->name}} </p>

    <form action="{{route("cart.add")}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">
        <input type="text" name="amount" placeholder="Enter amount">
        <button>Add to cart</button>
    </form>
@endsection
