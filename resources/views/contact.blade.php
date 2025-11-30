@extends("layout")

@section("title")
    Kontakt strana
@endsection

@section("content")

    <form method="POST" action="/send-contact">

        @if($errors->any())
            <p>ERROR: {{$errors->first()}}</p>
        @endif

        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Subject</label>
            <input name="subject" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Message</label>
            <input name="message" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11327.884205737771!2d20.496530395215267!3d44.781395508323556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aa3d7b53fbd%3A0x1db8645cf2177ee4!2z0JHQtdC-0LPRgNCw0LQ!5e0!3m2!1ssr!2srs!4v1764088872703!5m2!1ssr!2srs"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>

@endsection
