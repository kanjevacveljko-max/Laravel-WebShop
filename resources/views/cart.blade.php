@extends("layout")

@section("title")
    O nama
@endsection

@section("content")

    @foreach($products as $id => $amount)
        <p>Proizvod: {{$id}}, Kolicina: {{$amount}}</p>
    @endforeach

@endsection
