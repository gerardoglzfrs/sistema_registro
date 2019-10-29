<div class="container">
        <div class="col">
            <table>
                <tr>
                    <th><h3>Fecha:<?php  $now = new \DateTime(); echo $now->format("F j Y,"); ?></h3></th>
                    <th><h3 id="hora"></h3></th>
                </tr>
            </table>
            
            <table class="table table-responsive table-hover" style="font-size: 14px;">
                <thead>
                    <tr class="table-primary text-center">
                        <th colspan="7">INFORMACION DEL ALUMNO</th>
                        <th colspan="5">REGISTRO</th>
                    </tr>
                    <tr class="table-info">
                        <th>#</th>
                        <th>Perfil</th>
                        <th>Numero de control</th>
                        <th>Nombre</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Carrera</th>
                        <th>Fecha</th>
                        <th>Entrada</th>
                        <th>Salida</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <th><img src="{{ asset("img/avatar.png") }}" style="width: 70px; height:70px;"></th>
                        <td>15690382</td>
                        <td>Gerardo</td>
                        <td>González</td>
                        <td>Flores</td>
                        <td>ISC</td>
                        <td> <?php $hoy=date("d/m/y"); echo($hoy);?></td>
                        <td> <?php $hoy=date("G:i"); echo($hoy);?></td> 
                        <td><?php $hoy=date("G:i"); echo($hoy);?></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <th><img src="{{ asset("img/avatar.png") }}" style="width: 70px; height:70px;"></th>
                        <td>15690381</td>
                        <td>Carlos</td>
                        <td>Escalante</td>
                        <td>Hernández</td>
                        <td>ISC</td>
                        <td> <?php $hoy=date("d/m/y"); echo($hoy);?></td>
                        <td> <?php $hoy=date("G:i"); echo($hoy);?></td> 
                        <td><?php $hoy=date("G:i"); echo($hoy);?></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <th><img src="{{ asset("img/avatar.png") }}" style="width: 70px; height:70px;"></th>
                        <td>15690383</td>
                        <td>Emmanuel</td>
                        <td>Gomez</td>
                        <td>Miron</td>
                        <td>IGE</td>
                        <td> <?php $hoy=date("d/m/y"); echo($hoy);?></td>
                        <td> <?php $hoy=date("G:i"); echo($hoy);?></td> 
                        <td>En espera</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <th><img src="{{ asset("img/avatar.png") }}" style="width: 70px; height:70px;"></th>
                        <td>15690382</td>
                        <td>Raul</td>
                        <td>Paz</td>
                        <td>Martinez</td>
                        <td>ISC</td>
                        <td> <?php $hoy=date("d/m/y"); echo($hoy);?></td>
                        <td> <?php $hoy=date("G:i"); echo($hoy);?></td> 
                        <td>En espera</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <th><img src="{{ asset("img/avatar.png") }}" style="width: 70px; height:70px;"></th>
                        <td>15692156</td>
                        <td>Citlaly</td>
                        <td>Vargas</td>
                        <td>Del Angel</td>
                        <td>ISC</td>
                        <td> <?php $hoy=date("d/m/y"); echo($hoy);?></td>
                        <td> <?php $hoy=date("G:i"); echo($hoy);?></td> 
                        <td>En espera</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <th><img src="{{ asset("img/avatar.png") }}" style="width: 70px; height:70px;"></th>
                        <td>15690384</td>
                        <td>Victor Eduardo</td>
                        <td>Delgado</td>
                        <td>Vazquez</td>
                        <td>IGE</td>
                        <td> <?php $hoy=date("d/m/y"); echo($hoy);?></td>
                        <td> <?php $hoy=date("G:i"); echo($hoy);?></td> 
                        <td>En espera</td>
                    </tr>
                </tbody>    
            </table>
        </div>
</div>

