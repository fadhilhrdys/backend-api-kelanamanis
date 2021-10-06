@extends('layouts.default')

@section('content')
<div class="col-sm-8 px-0">
    <div class="row">
        <h2 class="font-weight-bold">Add Menu</h2>
    </div>
    <div class="row">
        <form action="{{ route('menu.store') }}" method="post" class="col form-add-menu py-3"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name Menu</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category-menu">Category Menu</label>
                <select class="form-control" id="category-menu" name="categories" required>
                    <option value="pannacotta" selected>Panna Cotta</option>
                    <option value="liter">Drinks 1 Liter</option>
                    <option value="mililiter">Drinks 250 mL</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price Menu</label>
                <div class="price d-flex align-items-center">
                    <span class="font-weight-bold mr-3">Rp</span>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" value="{{ old('price') }}">
                </div>
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class=" form-group">
                <label>Photo Menu</label>
                <div class="input-photo text-center">
                    <label class="input-photo text-center" for="photo">
                        <img src="{{ asset('asset/img/plus icon.png') }}" alt="plus">
                        <input type="file" class="@error('photo') is-invalid @enderror" id="photo" name="photo"
                            value="{{ old('photo') }}" hidden>
                        <p class=" mt-3 name-file">No File Choosen</p>
                    </label>
                    @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <p> *make sure the data your enter is correct </p>
            <button type="submit" class="btn btn-block py-2">Submit</button>
        </form>
    </div>
</div>
@endsection