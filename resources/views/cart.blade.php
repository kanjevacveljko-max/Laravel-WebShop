@extends("layout")

@section("title")
    O nama
@endsection

@section("content")
    @foreach($products as $product)
        <p>{{$product->name}}</p>
    @endforeach

@endsection
