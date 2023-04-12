@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">book name</th>
                        <th scope="col">isbn</th>
                        <th scope="col">author</th>
                        <th scope="col">publisher</th>
                        <th scope="col">country</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>

                            <td>{{ $book->name }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>{{ $book->authors }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->country }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
