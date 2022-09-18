@extends('layouts.app')
@section('content')
<section class="d-flex flex-column  align-items-center">
    <h2 class="text-center" >Categorías</h2>
    <ul>
        <table>
            <tr>
              <th class="px-5 py-2" >nombre</th>
              <th class="px-5 py-2" >imagen</th>
              <th class="px-5 py-2" >actions</th>
            </tr>
            @foreach($categories as $categorie)
                <tr>
                    <td class="px-5 py-2">{{ $categorie->name }}</td>
                    <td class="px-5 py-2">
                        <img style="width:100px" src="{{$categorie->image}}" alt="{{ $categorie->name }}">
                    </td>
                    <td class="px-5 py-2">
                        <a href="{{route('edit-categories', $categorie)}}" class="btn btn-primary">editar</a>
                        <a href="{{route('delete-categories', $categorie)}}" class="btn btn-danger">eliminar</a>
                    </td>
                </tr>
          @endforeach
        </table>
    </ul>
</section>
@endsection
