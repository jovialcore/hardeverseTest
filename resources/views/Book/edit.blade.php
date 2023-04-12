@extends('layout.app')
@section('content')
    <div class="col-md-8 mx-auto mt-5">

        @if ($errors->any())
            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
        @endif
        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text">{{ session('msg') }}</span>
              
            </div>
        @endif
        <div class="card">
            <div class="card-body">

                <h3 class="">Add </h3>
                <form action="{{ route('book.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">

                        <div class="form-group col-6">
                            <label for="">Name</label>
                            <input type="text" required name="name" value="{{ $book->name }}" class="form-control">
                        </div>
                        <div class="form-group col-6">
                            <label for="">isbn</label>
                            <input type="text" required name="isbn" value="{{ $book->isbn }}" class="form-control">
                        </div>


                        <div class="form-group col-6 mt-3">
                            <label for="">Country</label>
                            <input type="text" required name="country" value="{{ $book->country }}" class="form-control">
                        </div>
                        <div class="form-group col-6 mt-3">
                            <label for="">Number of pages</label>
                            <input type="text" name="number_of_pages" value="{{ $book->number_of_pages }}" class="form-control">
                        </div>
                        <div class="form-group col-6 mt-3">
                            <label for="">Publisher</label>
                            <input type="text" name="publisher" value="{{ $book->publisher }}" class="form-control">
                        </div>
                    </div>
                    <button type="submit " class="btn btn-primary">Update</button>

                </form>

            </div>
        </div>

    </div>
@endsection
