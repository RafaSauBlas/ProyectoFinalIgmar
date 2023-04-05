<div id="myModal2-{{ $row->id }}" class="modal">
    <form class="modal-content" action="{{url('client/upclient',[$row])}}" method="post" enctype="multipart/form-data">
        <span class="close">&times;</span>
        @method('put')
        @csrf
        <div class="containerModal">
            <div class="c1">
                <div class="noCliente">
                    <p>No. Cliente</p>
                    <input value="{{$row->id}}" type="text" name="id" id="" readonly>
                </div>
                <div class="Calle">
                    <p>Calle</p>
                    <input value="{{$row->street}}" type="text" name="street" id="">
                    @error('street')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="Estado">
                    <p>Estado</p>
                    <input value="{{$row->state}}" type="text" name="state" id="">
                    @error('state')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="SituacionFiscal">
                    <p>Situacion Fiscal</p>
                    <input value="{{$row->tax_situation}}" type="file" name="tax_situation" id="" class="inputFile">
                    @error('tax_situation')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="fuente">
                    <p>Fuente</p>
                    <input value="{{$row->source}}" type="text" name="source" id="">
                    @error('source')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="c2">
                <div class="statusCliente">
                    <p>Estatus Cliente</p>
                    <select  name="status" id="">
                        <option value="1">ACTIVO</option>
                        <option value="0">INACTIVO</option>
                    </select>
                    @error('status')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="noExterior">
                    <p>No. Exterior</p>
                    <input value="{{$row->outdoor_number}}" type="text" name="outdoor_number" id="">
                    @error('outdoor_number')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="Ciudad">
                    <p>Ciudad</p>
                    <input value="{{$row->city}}" type="text" name="city" id="">
                    @error('city')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="razonSocial">
                    <p>Razón Social</p>
                    <input value="{{$row->social_reason}}" type="text" name="social_reason" id="">
                    @error('social_reason')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="comisionVenta">
                    <p>Comisión Venta</p>
                    <input value="{{$row->sale_commission}}" type="text" name="sale_commission" id="">
                    @error('sale_commission')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="c3">
                <div class="asesores">
                    <p>Asesores</p>
                    <div class="c2">
                        <div class="statusCliente">
                            @if (Auth::user()->area == 2)
                            <select name="user_id">
                                @foreach ($user as $row1)
                                    <option value="{{$row1->id}}">{{$row1->name}}</option>
                                @endforeach
                            </select>
                            @else
                            <input type="text" value="{{Auth::user()->name}}" placeholder="{{Auth::user()->name}}" readonly>
                            <input type="text" name="user_id" hidden= "true" value="{{Auth::user()->id}}" placeholder="{{Auth::user()->name}}" readonly>
                            @endif
                            @error('user_id')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="noInterior">
                    <p>No. Interior</p>
                    <input value="{{$row->interior_number}}" type="text" name="interior_number" id="">
                    @error('interior_number')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="code_Contact">
                    <div class="CP">
                        <p>Codigo Postal</p>
                        <input value="{{$row->postal_code}}" type="text" name="postal_code" id="">
                        @error('postal_code')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="contacto">
                        <p>Contacto</p>
                        <input value="{{$row->contact}}" type="text" name="contact" id="">
                        @error('contact')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="email">
                    <p>Correo</p>
                    <input value="{{$row->email}}" type="text" name="email" id="">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="comisionRenta">
                    <p>Comision Renta</p>
                    <input value="{{$row->rent_commission}}" type="text" name="rent_commission" id="">
                    @error('rent_commission')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="c4">
                <div class="nombreCliente">
                    <p>Nombre Cliente</p>
                    <input value="{{$row->name}}" type="text" name="name" id="">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="colonia">
                    <p>Colonia</p>
                    <input value="{{$row->cologne}}" type="text" name="cologne" id="">
                    @error('cologne')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="telefonoContacto">
                    <p>Telefono Contacto</p>
                    <input value="{{$row->phone_contact}}" type="text" name="phone_contact" id="" maxlength="10">
                    @error('contact')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="telefono">
                    <p>Telefono</p>
                    <input value="{{$row->phone}}" type="text" name="phone" id="" maxlength="10">
                    @error('phone')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="rentaMensual">
                    <p>Renta mensual</p>
                    <input value="{{ $row->sale_commission + $row->rent_commission }}" type="text" id="">
                </div>
            </div>
        </div>
        <div>
            <button class="btnSaveClient" type="submit">Guardar</button>
        </div>
    </form>
</div>
