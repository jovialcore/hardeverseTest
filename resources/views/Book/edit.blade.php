@extends('Admin.layout.main')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Add Vetted Testimonies </h1>


    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">

                    <h3>Add </h3>
                    <form action="{{ route('book.update') }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="form-group col-6">
                                <label for="">Name</label>
                                <input type="text" required name="name" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label for="">isbn</label>
                                <input type="text" required name="isbn" class="form-control">
                            </div>


                            <div class="form-group col-6">
                                <label for="">Country</label>
                                <input type="text" required name="country" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Number of pages</label>
                                <input type="text" name="city" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Publisher</label>
                                <input type="text" name="publisher" class="form-control">
                            </div>

                            {{-- <div class="form-group col-6">
                                <label for="">Authors</label>
                                <select class="custom-select" name="country">
                                    @foreach ($Authr as $country)
                                        <option value="{{ $country->id }}">{{ $country->libelle }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Media </label>
                                <input type="file" name="banner_path" class="form-control">
                            </div> --}}

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
