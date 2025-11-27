@extends("layout")

@section("title")
    Prodavnica
@endsection

@section("content")

    @foreach($products as $product)
        @if(in_array($product, ["Iphone X", "Iphone 16 pro"]))
            <p>{{$product}} - SUPER SNIZENJE</p>
        @else
            <p>{{$product}}</p>
        @endif
    @endforeach

@endsection
