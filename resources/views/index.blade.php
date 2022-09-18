@extends('layouts.app')
    @section('content')
        <div class='container p-4'>
            <div class='d-flex justify-content-center container mt-4'>
                <h1 class='text-bold'>Buen Dia voral-jefa!</h1>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-primary">Logout</button>
              </form>
            </div>
            <div class='d-flex justify-content-end container'>
                <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="{{route('index')}}">Todas</a></li>
                    @foreach($categories as $categorie)
                        <li><a class="dropdown-item" href="{{route('index',['categorie' => $categorie] )}}">{{ $categorie->name }}</a></li>
                    @endforeach
                  </ul>
                </div>

                <a href="{{route('create')}}" class="mb-5 btn btn-success btn-lg">nuevo producto</a>
                <a href="{{route('list-categories')}}" class="mb-5 btn btn-success btn-lg">ver Categorías</a>
            </div>

            <div class='row d-flex justify-content-center'>
                @foreach($products as $product )
                    <div class='m-1 p-4 col-10 col-sm-5 col-md-3 border border-primary'>
                        <a href="{{route('product', $product)}}" class='text-bold fs-3 fw-bold'>{{ $product->name }}</a>
                        <p class='text-sm fs-6 fw-light'>{{$product->description}}</p>
                        <p class='text-xs fs-5 fw-normal mb-0'>{{$product->price}}$</p>
                        <p class='text-xs fs-5 fw-normal mb-0'>{{$product->categorie->name}}</p>
                        <div class='d-flex justify-content-end mt-5'>
                            <a href="{{route('edit', $product)}}" class="btn btn-success mx-1 btn-sm">Editar</a>
                            <a href="{{route('delete', $product)}}" class="btn btn-primary btn-sm">Eliminar</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        {{ $products->links() }}
    @endsection
