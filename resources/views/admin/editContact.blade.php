@extends("layout")

@section("title")
    Edit Contact
@endsection

@section("content")

    <form method="POST" action="{{route("contact.update", ["contact" => $contact->id])}}">

        @if($errors->any())
            <p>ERROR: {{$errors->first()}}</p>
        @endif

        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" value="{{$contact->email}}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Subject</label>
            <input name="subject" value="{{$contact->subject}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Message</label>
            <input name="message" value="{{$contact->message}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Edit Contact</button>
    </form>

@endsection
