<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Detalles Perfil ({{$perfil->id}})</x-slot>
    <div class="card bg-dark text-white border-info mb-3 m-auto" style="width: 34rem;">
        <div class="card-body">
          <h4 class="card-title text-info">{{$perfil->nombre}}</h4>
          <p class="card-text"><b>Descripcion: </b> {{$perfil->descripcion}}</p>
          <ul>
          </ul>
            <div class="card-footer bg-transparent border-info mt-2">
          <button class="ml-3 btn btn-primary" onclick="window.history.back();" ><i class="fas fa-backward"></i> Volver</button>
          </div>

        </div>
      </div>

</x-plantilla>
