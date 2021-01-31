<h1>FACTURACIÓN Y ENVÍO</h1>
<div class="letra-roboco row">
    <div class="container-fluid">
        <div class="col m9 s12">
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header datosPersonales letra-mediana"><i class="material-icons">account_circle</i>Datos Personales</div>
                    <div class="collapsible-body">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input  id="nombre" type="text" class="validate">
                                <label for="nombre">Nombre</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="apellidos" type="text" class="validate">
                                <label for="apellidos">Apellidos</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="dni" type="text" class="validate">
                                <label for="dni">DNI</label>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header letra-mediana"><i class="material-icons">place</i>Dirección de entrega</div>
                    <div class="collapsible-body">
                        <div class="row">
                            <div class="input-field col s12 m8">
                                <input placeholder="Calle y número, apartado de correos" id="direccion" type="text" class="validate">
                                <label for="direccion">Dirección</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <input placeholder="Apartamente,unidad,edificio,piso,numero, etc" id="numero" type="text" class="validate">
                                <label for="numero">Número</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input  id="ciudad" type="text" class="validate">
                                <label for="ciudad">Ciudad</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="provincia" type="text" class="validate">
                                <label for="provincia">Provincia/Región</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input  id="cp" type="number" class="validate">
                                <label for="cp">Codigo postal</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="telefono" type="number" class="validate">
                                <label for="telefono">Teléfono</label>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header letra-mediana"><i class="material-icons">place</i>Tipos de entrega</div>
                    <div class="collapsible-body">
                        <div class="row">
                            <div class="col m8">
                                <h3>Correos</h3>
                                Correos te lleva donde quieras cuando quieras
                            </div>
                            <div class="col m4">
                                <select class="browser-default">
                                    <option value="1" selected>Correos - Gratis</option>
                                    <option value="2">Olva (1-2 días): S/9.00</option>
                                    <option value="3">Express (24 horas): S/15.00</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header letra-mediana"><i class="material-icons">credit_card</i>Método de pago</div>
                    <div class="collapsible-body">
                        <a class="btn teal darken-1" onclick="tranferencia()">Depósito o Transferencia bancaria</a>
                        <a class="btn teal darken-1" onclick="pagoTarjeta()">Tarjetas de débito y crédito</a><br>
                        <div class="tranferencia" style="display: none">
                            <p>Muy bien! Los pasos a seguir con una tranferencian serían:</p>
                                <ul>
                                    <li>Paga a nuestra cuenta en el Banco de Crédito – BCP</li>
                                    <li>Puedes utilizar un agente, ventanilla, internet o la app.</li>
                                    
                                </ul>
                        </div>
                        <div class="pagoTarjeta" style="display: none">
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input  id="numeroTarjeta" type="text" class="validate">
                                    <label for="numeroTarjeta">Número de Tarjeta</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input placeholder="Mes" id="mes" type="number" class="validate">
                                    <label for="mes">Mes</label>
                                    <input placeholder="Año" id="anoTarjeta" type="number" class="validate">
                                    <label for="anoTarjeta">Año</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input  id="nombreTarjeta" type="text" class="validate">
                                    <label for="nombreTarjeta">Nombre del Titular</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input  id="ccTarjeta" type="number" class="validate">
                                    <label for="ccTarjeta">Código de seguridad</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col m3 s12">
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header datosPersonales letra-mediana"><i class="material-icons">account_circle</i>Resumen de la Compra</div>
                    <div class="collapsible-body">
                        <div class="resumenPago"></div>
                    </div>
                </li>
            </ul>
            <a class="btn teal darken-1" onclick="terminarPago()">Terminar</a>
        </div>
    </div>
</div>