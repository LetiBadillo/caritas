@extends('layouts.app')

@section('content')

<div class="container" id="def">
  <div class="row">
      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1">
          <div class="box">
              <div class="caption">
                <h1>Registrar eventos</h1>
                <hr> 
                    <form action="centros.php" method="post" enctype="multipart/form-data" class="form-horizontal" id="forma">
                            
                            <div class="col-lg-12">

                            <fieldset class="form-group col-lg-12"> <!--Form-group de email --> 

                                <div class="col-lg-4 col-lg-offset-4">

                                                    <label class="left" id="label">Categoría:</label> 
                                                    <select name="selectType" class="form-control" id="selectType" onChange="mostrar(this.value);">
                                                        <option value=""></option>
                                                        <option value="centro">Centros de reparto</option>
                                                        <option value="jornadas">Jornadas</option>
                                                        <option value="ins">Instituciones</option>
                                                        <option value="otros">Otros</option>
                                                    </select> 

                                </div>
                            </fieldset> <!--Fin form-group de nombre-->

                    <!--___________________________________Datos-__________________________________-->
                    <!--Para Centros de reparto e institución-->
                        <fieldset class="form-group col-lg-12" id="ins" style="display: none;">
                            <div class="col-lg-4 col-lg-offset-4">
                                <label class="left" id="label">Tipo:</label> 
                                                    <select name="selectIns" class="form-control" id="selectIns">
                                                        <option></option>
                                                        <option value="Gubernamental">Gubernamental</option>
                                                        <option value="Privada">Privada</option>
                                                    </select> 
                            </div>

                        </fieldset>
                        
                        <fieldset class="form-group col-lg-12" id="datos" style="display: none;"> 

                                <div class="col-lg-12"> <p class="la"> Datos</p>
                                    <hr style="margin-top:0; padding-top: 0;">
                                </div>
                                <div class="col-lg-2">
                                <label for="Fecha" id="label">Fecha:</label>
                                </div>
                                <div class="col-lg-3">

                                <input type="date" class="form-control" id="fecha" name="fecha"> 
                                </div>
                                <div class="col-lg-12"></div>

                                <div class="col-lg-7">
                                <input type="text" class="form-control" id="nombreC" name="nombreC" placeholder="nombre de Centro"> 
                                </div>

                                <div class="col-lg-2"> 
                                <input type="number" class="form-control" id="rutaC" name="rutaC" placeholder="Ruta"> 
                                </div>
                                
                                <div class="col-lg-3"> 
                                <input type="text" class="form-control" id="apo" name="apo" placeholder="Aportación" >
                                </div>
                        </fieldset>
                                
                                <fieldset class="form-group col-lg-12" id="datos" style="display: none;">
                                <div class="col-lg-3 text-left"> 
                                <label id="label"> Beneficiarios directos: </label>
                                </div>
                                <div class="col-lg-2"> 
                                <input type="number" class="form-control" id="directos" name="directos" placeholder="#"> </div>
                                <div class="col-lg-3 text-left noIns" > <label id="label"> Beneficiarios indirectos: </label>
                                </div>

                                <div class="col-lg-2 noIns"> 
                                <input type="number" class="form-control" id="indirectos" name="indirectos" placeholder="#">
                                </div>
                                
                                </fieldset>
                    <!---__________________________________Fin datos_________________________________-->
                    <!--___________________________________Datos Concepto ___________________________-->
                    <!--Para jornada y otros-->
                    <fieldset class="form-group col-lg-12 col-lg-offset-5" id="datosConcepto" style="display: none;"> <!--Form-group de email --> 
                                <div class="col-lg-12"> <p class="la"> Datos</p>
                                    <hr style="margin-top:0; padding-top: 0;">
                                </div>
                                <div class="col-lg-3">
                                <label for="Fecha" id="label">Fecha:</label>
                                </div>
                                <div class="col-lg-3">

                                <input type="date" class="form-control" id="fechaJ" name="fechaJ"> 
                                </div>
                                <div class="col-lg-12"></div>

                                <div class="col-lg-3"> 
                                <label id="label"> Concepto: </label></div>
                                <div class="col-lg-7"><input type="text" class="form-control" id="nombreCentro" name="nombreCentro"> </div>

                        </fieldset>
                                
                                <fieldset class="form-group col-lg-12" id="datosConcepto" style="display: none;">
                                <div class="col-lg-3 text-left"> 
                                <label id="label"> Beneficiarios directos: </label></div>
                                <div class="col-lg-2"> 
                                <input type="text" class="form-control" id="bD" name="bD" placeholder="#"> </div>
                                <div class="col-lg-3 text-left"> <label id="label"> Beneficiarios indirectos: </label> </div>
                                <div class="col-lg-2"> <input type="text" class="form-control" id="bI" name="bI" placeholder="#"> </div>
                                
                                </fieldset>

                    <!--______________________________Fin datos concepto_____________________________-->
                    <!--______________________________Domicilio ____________________________________-->
                    <!--Para  centro, institución, jornada y centro-->
                                <fieldset class="form-group col-lg-12" id="domicilio" style="display: none;">
                                <div class="col-lg-12"> <p class="la"> Domicilio</p>
                                    <hr style="margin-top:0; padding-top: 0;">
                                </div>

                                <div class="col-lg-12"> <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle">  </div>
                                <div class="col-lg-4"> <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia"> </div> 
                                <div class="col-lg-4"> <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio, estado">  </div>
                                
                        </fieldset> 
                    <!--_______________________________Fin Domicilio_________________________________-->
                    <!--____________________________Inicio de Encargadas 4___________________________-->
                    <!--Para centros de reparto-->
                        <fieldset class="form-group col-lg-12" id="encargadas4" style="display: none;">

                        <div class="col-lg-12"> <p class="la"> Encargadas</p>
                                    <hr style="margin-top:0; padding-top: 0;">
                                </div> 


                                <fieldset class="form-group col-lg-12"> <!--Form-group de email --> 
                                <div class="col-lg-3">
                                                    <label id="label" class="left">Número de encargadas:</label> 
                                                    
                                </div>
                                <div class="col-lg-2">
                                <select name="en" class="form-control" id="numeroEncargadas" onChange="num(this.value);">
                                        
                                                        <option value="u">1</option>
                                                        <option value="d">2</option>
                                                        <option value="t">3</option>
                                                        <option value="c">4</option>

                                                    </select> 
                                </div>
                            </fieldset> <!--Fin form-group de nombre-->


                                <div class="table-responsive col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <th># </th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th> Género </th>
                                    
                                </thead>
                                <tbody>
                                    <tr style="display: none;" id="unoE">
                                        <td> 1 </td>
                                        
                                        <td><input type="text" class="form-control" placeholder="Nombre" name="euno" id="euno"/></td>
                                        <td><input type="text" class="form-control" name="eunot" id="eunot"></td>
                                        <td>
                                        <select name="gen" class="form-control" id="gen">
                                                        <option value="">-</option>
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Femenino</option>
                                                    </select> 

                                        </td>
                                    
                                    </tr>
                                    <tr style="display: none;" id="dosE">
                                        <td> 2 </td>
                                        <td><input type="text" class="form-control" placeholder="Nombre" name="edos" id="edos"/></td>
                                        <td><input type="text" class="form-control" name="edost" id="edost"/></td>
                                                            <td>
                                        <select name="gen1" class="form-control" id="gen1">
                                                        <option value="">-</option>
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Femenino</option>
                                                    </select> 

                                        </td>
                                    </tr>
                                    <tr style="display: none;" id="tresE">
                                        <td> 3 </td>
                                        <td><input type="text" class="form-control" placeholder="Nombre" name="etres"/></td>
                                        <td><input type="text" class="form-control" name="etrest"/></td>
                                                            <td>
                                        <select name="gen2" class="form-control" id="gen2">
                                                        <option value="">-</option>
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Femenino</option>
                                                    </select> 

                                        </td>
                                    
                                    </tr>
                                    <tr style="display: none;" id="cuatroE">
                                        <td> 4 </td>
                                        <td><input type="text" class="form-control" placeholder="Nombre" name="ecuatro"/></td>
                                        <td><input type="text" class="form-control" name="ecuatrot"/></td>
                                                            <td>
                                        <select name="gen3" class="form-control" id="gen3">
                                                        <option value="">-</option>
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Femenino</option>
                                                    </select> 

                                        </td>

                                    </tr>
                                    
                                </tbody>
                            </table> 
                            
                            </div>

                        </fieldset>
                    <!--_______________________Contacto___________________-->
                    <!--Para instituición-->
                        <fieldset class="form-group col-lg-12" id="contacto" style="display: none;"> 
                            <div class="col-lg-12"> <p class="la"> Contacto</p>
                                    <hr style="margin-top:0; padding-top: 0;">
                                </div>
                                
                                            <div class= "col-lg-8"> 
                                
                                <input id="conta" name="conta" type="text" class="form-control" placeholder="Nombre o correo electrónico"/>
                                </div>
                                        <div class= "col-lg-4"> 
                                        <input id="contaTel" name="contaTel" type="text" class="form-control" placeholder="Teléfono"/></td>
                                    
                                    </div>

                        </fieldset> <!--Fin form-group de nombre-->


                    <!--______________________________Fin de contacto_________________________________-->   
                    <!--______________________________Descripción_____________________________________-->   
                    <!--Para lo jornada y otros-->
                        <fieldset class="form-group col-lg-12" id="descripcion" style="display: none;">
                                
                                <div class="col-lg-12"> <p class="la"> Descripción</p>
                                    <hr style="margin-top:0; padding-top: 0;">
                                </div> 

                                <textarea class="form-control" rows="5" name="desJ" id="desJ" placeholder="..."></textarea>

                            
                        </fieldset> <!--Fin form-group de nombre-->
                        
                        
                    </div>

                    <button type="submit" class="btn btn-success btn-lg" id="altaCentro" name="altaCentro" style="display: none; margin-top: 5%;"> Guardar cambios <span class="glyphicon glyphicon-floppy-open"> </span></button>
                </form> 
              </div> <!--end caption-->
            </div> <!--end box-->
        </div> <!--end cols-->
    </div><!--end row-->
</div><!--end container-->



@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
        $(".add_event").addClass('active');
    });
</script>
@endsection