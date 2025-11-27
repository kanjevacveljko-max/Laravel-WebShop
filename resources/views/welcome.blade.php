@extends("layout")

@section("title")
    Glavna strana
@endsection

@section("content")

    @if($sat >= 0 && $sat <= 12)
        <p>Dobro jutro!</p>
    @else
        <p>Dobar dan!</p>
    @endif

    <p>Trenutno vreme je: {{ $trenutnoVreme }}</p>


    @foreach($lastSixProducts as $product)
        <p>{{$product->name}}</p>
    @endforeach

@endsection


