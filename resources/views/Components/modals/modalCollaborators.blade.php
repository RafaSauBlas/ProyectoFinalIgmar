<div id="myModal1-{{ $row->id }}" class="modal">
    <form class="modal-content" method="POST" action="{{url('collaborators/updateCollaborator',[$row])}}">
        @method('PUT')
        @csrf
        <span class="close">&times;</span>
        <p>Modificar colaborador</p>
        <div class="Nombre">
            <p class="Text">Nombre</p>
            <input Class="Empresa" value="{{$row->name}}" type="text" name="name"
                placeholder="Colaborador..." required>
        </div>
        <div class="Apellidos">
            <p class="Text">Apellidos</p>
            <input Class="Empresa" value="{{$row->lastname}}" type="text" name="lastname"
                placeholder="Apellidos..." required>
        </div>
        <div class="Correo">
            <p class="Text">Correo</p>
            <input Class="Empresa" value="{{$row->email}}" type="email" name="email"
                placeholder="Correo..." required>
        </div>
        <div class="Sucursal">
            <p class="Text" for="Sucursal">Sucursal</p>
            <select class="Seleccionar" id="Sucursal" name="branchoffice"
                required>
                <option value="Oficinas XENT">Oficinas XENT</option>
                <option value="Monterrey">Monterrey</option>
                <option value="Guadalajara">Guadalajara</option>
                <option value="Cancún">Cancún</option>
            </select>
        </div>
        <p class="Text" for="Area">Área</p>
        <select class="Seleccionar" id="Area" name='area' required>
            @foreach ($roles as $row)
                <option value="{{ $row->id }}">{{ $row->area }}
                </option>
            @endforeach
        </select>
        <div>
            <button id="btn" class="Form2"
                type="submit">Guardar</button>
        </div>
    </form>
</div>
