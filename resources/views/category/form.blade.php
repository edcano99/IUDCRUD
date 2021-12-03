@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">

        @if (isset($Category))
            <h1>Editar Categoría</h1>
        @else
        <h1>Crear categoría</h1>
        @endif

        @if (isset($Category))
        <form action="{{ route('Category.update',$Category) }}" method="POST">

            @method('PUT')
            @include('Category.index')
        @else
        <form action=" {{ route('Category.store') }} " method="POST">


        @endif


            @csrf

            <div class="mb-3">
                <label for="name" class="form-label" >Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Nombre de la categoría" value="{{old('name') ?? @$Category->name}}">
                <p class='form-text'>Escriba el nombre de la Categoría</p>
                @error('name')
                <p class='form-text text-danger'>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea  name="description" cols="122" rows="3"placeholder="Descripción de la Categoría" class="form-control" value="{{old('description') ?? @$Category->description}}"></textarea>
                <p class='form-text'>Escriba Una Breve Descripción de la Categoría</p>
                @error('description')
                <p class='form-text text-danger'>{{ $message }}</p>
                @enderror

            </div>

        </form>


        @if (isset($Category))
        <button type="submit" class='btn btn-primary'>Editar Categoría</button>
        @else
        <button type="submit" class='btn btn-primary'>Guardar Categoría</button>
        @endif




    </div>
@endsection
