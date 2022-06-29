@extends('layouts.app')
    @section('content')
        <div class='container p-4'>
            <a href="{{route('index')}}" class="btn btn-dark mx-1">Volver</a>

            <div class='container'>
                    <div class='my-5'>
                        <h2 class='text-bold fs-1 fw-bold '>{{ $product->name }}</h2>
                        <p class='text-sm fs-5 fw-light'>{{$product->description}}</p>
                        <p class='text-xs fs-3 fw-normal mb-0'>precio: {{$product->price}}$</p>
                        <p class='text-xs fs-3 fw-normal mb-0'>talla: {{$product->size}}$</p>
                        <p class='text-xs fs-3 fw-normal mb-0'>categoria: {{$product->categorie->name}}$</p>
                        <div class='w-50'>
                            <img src="{{$product->image}}" alt="" class="img-fluid">
                        </div>

                        <div class=' mt-5'>
                            <a href="{{route('edit', $product)}}" class="btn btn-success mx-1 btn-sm">Editar</a>
                            <a href="{{route('delete', $product)}}" class="btn btn-primary btn-sm">Eliminar</a>
                        </div>
                    </div>
            </div>
        </div>
    @endsection
