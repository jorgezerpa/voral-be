@extends('layouts.app')
    @section('content')
        <div class='container p-4'>
            <h2 class='text-center my-5'>edita el producto</h2>
            <form id="editBlade" action="{{route('update-categories', $categorie)}}" method='POST' enctype='multipart/form-data'>
                @csrf
                <div class="mb-3">
                    <h1>{{$categorie->name}}</h1>
                    <label for="name" class='form-label fs-4'>Nombre</label>
                    <span class='text-danger fs-6'>@error('name'){{$message}}@enderror</span>
                    <input name='name' type="text" id="name" placeholder='nombre' class='form-control' value="{{$categorie->name}}">
                </div>
                <div class="mb-3">
                    <label for="image" class='form-label fs-4'>imagen</label>
                    <input name='image' type="file" id="image" placeholder='imagen' class='form-control'>
                </div>

                <input type="submit" class='btn btn-primary btn-lg' value='actualizar'>
            </form>
        </div>
    @endsection
