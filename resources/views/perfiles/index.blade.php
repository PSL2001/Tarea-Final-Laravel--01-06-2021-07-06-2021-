<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Gestion de Perfiles</x-slot>
    <x-mensajes />
    <a href="{{route('perfils.create')}}" class="btn btn-info"> Crear perfil</a>
    <table class="table table-dark table-hover table-striped mt-2">
        <thead>
          <tr>
            <th scope="col">Detalle</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col" colspan=2 class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($perfiles as $item)
          <tr>
            <th scope="row">
                <a href="{{route('perfils.show', $item)}}" class="btn btn-info"><i class="fas fa-info"></i> Detalles</a>
            </th>
            <td>{{$item->nombre}}</td>
            <td>{{$item->descripcion}}</td>
            <td class="text-center">
                <a href="{{route('perfils.edit', $item)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
            </td>
            <td class="text-center">
                <form name="as" method="POST" action="{{route('perfils.destroy', $item)}}">
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
          {{$perfiles->links()}}
      </div>
</x-plantilla>
