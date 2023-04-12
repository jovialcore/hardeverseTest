@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table bordered">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">book name</th>
                        <th scope="col">isbn</th>
                        <th scope="col">author</th>
                        <th scope="col">publisher</th>
                        <th scope="col">country</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $id++ }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>{{ $book->authors }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->country }}</td>
                          
                            <td>
                                <a href="{{ route('book.edit', $book->id) }}"
                                    class="btn btn-sm btn-white text-primary mr-2"><i class="far fa-eye mr-1"></i>
                                    edit</a>
                                <a href="{{ route('book.delete', $book->id) }}"
                                    class="btn btn-sm btn-white text-danger mr-2"
                                    onclick="return confirm('Warning! This is a dangerous action. Are you sure about this ? ');"><i
                                        class="far fa-trash-alt mr-1"></i>Delete</a>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
