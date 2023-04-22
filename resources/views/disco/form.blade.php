<!-- <div class="box box-info padding-1">
    <div class="box-body"> 
        <form method="POST" action="{{ route('edit', $disco->id) }}" enctype="multipart/form-data">
            @csrf
            @method('GET')
            <label for="nombre">
                Nombre
            </label>
            <input type="text" name="nombre" id="nombre">
            <label for="categoria">
                Categoria
            </label>
            <input type="text" name="categoria" id="categoria">
            <label for="cantante">
                Cantante
            </label>
            <input type="text" name="cantante" id="cantante">
            <label for="precio">
                Precio
            </label>
            <input type="text" name="precio" id="precio">
            <label for="archivo">
                Archivo
            </label>
            <input type="file" name="archivo" id="archivo">
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>
        </form>
    </div>
</div> -->
<!-- <div class="box box-info padding-1">
    <div class="box-body"> 
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $disco->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoria') }}
            {{ Form::text('categoria', $disco->categoria, ['class' => 'form-control' . ($errors->has('categoria') ? ' is-invalid' : ''), 'placeholder' => 'Categoria']) }}
            {!! $errors->first('categoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantante') }}
            {{ Form::text('cantante', $disco->cantante, ['class' => 'form-control' . ($errors->has('cantante') ? ' is-invalid' : ''), 'placeholder' => 'Cantante']) }}
            {!! $errors->first('cantante', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $disco->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Archivo') }}
            {{ Form::file('archivo', $disco->archivo, ['class' => 'form-control' . ($errors->has('archivo') ? ' is-invalid' : ''), 'placeholder' => 'Archivo']) }}
            {!! $errors->first('archivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div> -->