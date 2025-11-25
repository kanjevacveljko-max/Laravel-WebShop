@extends("layout")

@section("title")
    Glavna strana
@endsection

@section("content")
    <p>Trenutno vreme je: {{ date("h:i:s") }}</p>
@endsection


