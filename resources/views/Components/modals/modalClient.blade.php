<div id="myModal1-{{$row->id}}"class="modal">
    <form class="modal-content" method="POST" action="">
        <span class="close">&times;</span>
        <div class="containerModal">
            <div class="c1">
                <div class="noCliente">
                    <p>No. Cliente</p>
                    <input value="{{$row->id}}" type="text" name="nombreCliente" id="" readonly>
                </div>
                    <div class="Calle">
                        <p>Calle</p>
                        <input value="{{$row->street}}"  type="text" name="Calle" id="" readonly>
                    </div>
                    <div class="Estado">
                        <p>Estado</p>
                        <input value="{{$row->state}}" type="text" name="Estado" id="" readonly>
                    </div>
                <div class="SituacionFiscal">
                    <p>Situacion Fiscal</p>
                    <a href="pdfs-customer/{{$row->tax_situation}}"target="_blank"><input type="text" placeholder="Documento" name="SituacionFiscal" id="" readonly></a>
                </div>
                <div class="fuente">
                    <p>Fuente</p>
                    <input value="{{$row->source}}" type="text" name="fuente" id="" readonly>
                </div>
            </div>
            <div class="c2">
                <div class="statusCliente">
                    <p>Estatus Cliente</p>
                    @if ($row->status == true)
                        <input value="ACTIVO" type="text" name="statusCliente" id="" readonly>
                    @else
                        <input value="INACTIVO" type="text" name="statusCliente" id="" readonly>
                    @endif
                </div>
                        <div class="noExterior">
                            <p>No. Exterior</p>
                            <input value="{{$row->outdoor_number}}" type="text" name="noExterior" id="" readonly>
                        </div>
                        <div class="Ciudad">
                            <p>Ciudad</p>
                            <input value="{{$row->city}}" type="text" name="Ciudad" id="" readonly>
                        </div>
                <div class="razonSocial">
                    <p>Razón Social</p>
                    <input value="{{$row->social_reason}}" type="text" name="razonSocial" id="" readonly>
                </div>
                <div class="comisionVenta">
                    <p>Comisión Venta</p>
                    <input value="{{$row->sale_commission}}" type="text" name="comisionVenta" id="" readonly>
                </div>
            </div>

            <div class="c3">
                <div class="asesores">
                    <p>Asesores</p>
                    <input value="{{$row->UserName}}" type="text" name="asesores" id="" readonly>
                </div>
                    <div class="noInterior">
                        <p>No. Interior</p>
                        <input value="{{$row->interior_number}}" type="text" name="noInterior" id="" readonly>
                    </div>

                    <div class="code_Contact">
                        <div class="CP">
                            <p>Codigo Postal</p>
                            <input value="{{$row->postal_code}}" type="text" name="CP" id="" readonly>
                        </div>
                        <div class="contacto">
                            <p>Contacto</p>
                            <input value="{{$row->contact}}" type="text" name="contacto" id="" readonly>
                        </div>
                    </div>
                <div class="email">
                    <p>Correo</p>
                    <input value="{{$row->email}}" type="text" name="email" id="" readonly>
                </div>
                <div class="comisionRenta">
                    <p>Comision Renta</p>
                    <input value="{{$row->rent_commission}}" type="text" name="comisionRenta" id="" readonly>
                </div>
            </div>
            <div class="c4">
                <div class="nombreCliente">
                    <p>Nombre Cliente</p>
                    <input type="text" value="{{$row->name}}"  name="nombreCliente" id="" readonly>
                </div>
                    <div class="colonia">
                        <p>Colonia</p>
                        <input value="{{$row->cologne}}" type="text" name="colonia" id="" readonly>
                    </div>
                    <div class="telefonoContacto">
                        <p>Telefono Contacto</p>
                        <input value="{{$row->phone_contact}}" type="text" name="telefonoContacto" id="" readonly>
                    </div>
                <div class="telefono">
                    <p>Telefono</p>
                    <input value="{{$row->phone}}" type="text" name="telefono" id="" readonly>
                </div>
                <div class="rentaMensual">
                    <p>Renta mensual</p>
                    <input value="{{$row->sale_commission + $row->rent_commission}}" type="text" name="rentaMensual" id="" readonly>
                </div>
            </div>
        </div>
    </form>
</div>
