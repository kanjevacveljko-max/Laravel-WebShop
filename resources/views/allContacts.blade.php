@extends("layout")

@section("title")
    All Contacts
@endsection

@section("content")
    @foreach($contacts as $contact)
        <p>Email: {{$contact->email}}; Subject:{{$contact->subject}}</p>
    @endforeach
@endsection
