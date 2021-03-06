@extends('layouts.app')
    @section('content')
        <div class='container p-4'>
            <h2 class='text-center my-5'>edita el producto</h2>
            <form id="editBlade" action="{{route('update', $product)}}"  method='POST' enctype='multipart/form-data'>
                @csrf
                <div class="mb-3">
                    <label for="name" class='form-label fs-4'>Nombre</label>
                    <span class='text-danger fs-6'>@error('name'){{$message}}@enderror</span>
                    <input name='name' type="text" id="name" placeholder='nombre' class='form-control' value="{{old('name', $product->name)}}">
                </div>
                <div class="mb-3">
                    <label for="size" class='form-label fs-4'>Talla</label>
                    <span class='text-danger fs-6'>@error('size'){{$message}}@enderror</span>
                    <input name='size' value="{{old('size', $product->size)}}" type="text" id="size" placeholder='talla' class='form-control'>
                </div>
                <div class="mb-3">
                    <label for="description" class='form-label fs-4'>Descripción</label>
                    <span class='text-danger fs-6'>@error('description'){{$message}}@enderror</span>
                    <textarea name="description" id="description" rows="10" class='form-control'>{{old('description', $product->description)}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class='form-label fs-4'>precio</label>
                    <span class='text-danger fs-6'>@error('price'){{$message}}@enderror</span>
                    <input name='price' type="number" id="price" placeholder='precio' class='form-control' value="{{old('price', $product->price)}}">
                </div>
                <div class="mb-3">
                    <label for="categorie_id" class='form-label fs-4'>categoria</label>
                    <span class='text-danger fs-6'>@error('categorie_id'){{$message}}@enderror</span>
                    <select id="categorie_id" name="categorie_id" form="editBlade" placeholder='categories'>
                        @foreach($categories as $categorie)
                            <option @if($product->categorie->name === $categorie->name) selected='true' @endif  value="{{$categorie->name}}">{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                </div>



                <div class="mb-3">
                    <label for="image" class='form-label fs-4'>imagen</label>
                    <input name='image' type="file" id="image" placeholder='imagen' class='form-control'>
                </div>
                <input type="submit" class='btn btn-primary btn-lg' value='actualizar'>
            </form>
        </div>
    @endsection
