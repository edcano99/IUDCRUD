@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        <h1>Lista de Categorías</h1>
        <a href="{{ route('Category.create')}}" class="btn btn-primary"> Crear Categorías</a>


        @if (Session::has('mensaje'))


            <div class="alert alert-info my-5">
                {{Session::get('mensaje')}}
            </div>


        @endif
        <table class="table table-striped">
            <thead>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            <tbody>
                @forelse ($Category as $detail )
                <tr>
                    <td>{{$detail->name}}</td>
                    <td>{{$detail->description}}</td>
                    <td>
                        <a href="{{ route('Category.edit' ,$detail)}}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('Category.destroy', $detail)}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Esta Seguro de Querer Eliminar la Categoría?')">Eliminar</button>


                        </form>
                    </td>
                </tr>

                @empty
                    <tr>
                        <td colspan="3">No hay Registros</td>
                    </tr>

                @endforelse

            </tbody>

        </table>
        @if ($Category->count())
            {{$Category->links()}}
        @endif




    </div>
@endsection



