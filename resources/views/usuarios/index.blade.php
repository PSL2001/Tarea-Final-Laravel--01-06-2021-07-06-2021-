<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Gestion de Usuarios</x-slot>
    <x-mensajes />
    <a href="{{route('usuarios.create')}}" class="btn btn-info"> Crear usuario</a>
    <table class="table table-dark table-hover table-striped mt-2">
        <thead>
          <tr>
            <th scope="col">Detalle</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Localidad</th>
            <th scope="col" colspan=2 class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $item)
          <tr>
            <th scope="row">
                <a href="{{route('usuarios.show', $item)}}" class="btn btn-info"><i class="fas fa-info"></i> Detalles</a>
            </th>
            <td>{{$item->nomusu}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->localidad}}</td>
            <td class="text-center">
                <a href="{{route('usuarios.edit', $item)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
            </td>
            <td class="text-center">
                <form name="as" method="POST" action="{{route('usuarios.destroy', $item)}}">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Borrar</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="mt-2">
          {{$usuarios->links()}}
      </div>
</x-plantilla>
