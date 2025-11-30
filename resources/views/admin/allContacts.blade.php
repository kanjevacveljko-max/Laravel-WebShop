@extends("layout")

@section("title")
    All Contacts
@endsection

@section("content")

    <div class="container mt-5">

        <h2 class="mb-4">Products</h2>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->subject}}</td>
                    <td>{{$contact->message}}</td>
                    <td>
                        <a href="{{route("contact.delete", ["contact" => $contact->id])}}"
                           class="btn btn-sm btn-danger">Delete</a>
                        <a href="{{route("contact.edit", ["contact" => $contact->id])}}" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>

@endsection
