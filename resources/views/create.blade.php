@extends('layouts.app')
@section('content')
<div class='container p-4'>
    <a href="{{route('index')}}" class='mx-1 btn btn-primary btn-lg'>volver</a>
    <h2 class='text-center my-5'>crea un nuevo producto</h2>
            <form id='createBlade' action="{{route('store')}}" method='POST' enctype='multipart/form-data'>
                @csrf
                <div class="mb-3">
                    <label for="name" class='form-label fs-4'>Nombre</label>
                    <span class='text-danger fs-6'>@error('name'){{$message}}@enderror</span>
                    <input name='name' value="{{old('name', '')}}" type="text" id="name" placeholder='nombre' class='form-control'>
                </div>
                <div class="mb-3">
                    <label for="description" class='form-label fs-4'>Descripción</label>
                    <span class='text-danger fs-6'>@error('description'){{$message}}@enderror</span>
                    <textarea name="description" id="description" rows="10" class='form-control'>{{old('description', '')}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class='form-label fs-4'>precio</label>
                    <span class='text-danger fs-6'>@error('price'){{$message}}@enderror</span>
                    <input name='price' value="{{old('price', '')}}" type="number" id="price" placeholder='precio' class='form-control'>
                </div>
                <div class="mb-3">
                    <label for="categorie_id" class='form-label fs-4'>categoria</label>
                    <span class='text-danger fs-6'>@error('categorie_id'){{$message}}@enderror</span>
                    <select id="categorie_id" name="categorie_id" form="createBlade" placeholder='categories'>
                        @foreach($categories as $categorie)
                            <option value="{{$categorie->name}}">{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class='form-label fs-4'>imagen</label>
                    <span class='text-danger fs-6'>@error('image'){{$message}}@enderror</span>
                    <input name='image' type="file" id="image" placeholder='imagen' class='form-control'>
                </div>
                <input type="submit" class='btn btn-success btn-lg' value='crear'>
            </form>
        </div>
        @endsection
