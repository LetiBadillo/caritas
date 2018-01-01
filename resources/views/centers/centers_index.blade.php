@extends('layouts.app')
@section('content')
<div class="container" id="def">
    <div class="row">
        <div class="col-lg-12">
            <div class="caption">
                <h1> Catálogo de eventos </h1>
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                <hr></div>

                <div class="col-lg-3"> 
                    <div class="box-sm" style="padding: 5%;"> 
                        <h4><a class="gets" href="#" id="getCentros"> Centros(59) &raquo;</a></h4>
                            <p> Directos: 20 <strong>|</strong> Indirectos: 50</p>
                            <p> Total encargados: 45 </p>
                            <p> Mujeres: 50 <strong>|</strong> Hombres: 20</p>
                   </div>
                </div>

                <div class="col-lg-3"> 
                    <div class="box-sm" style="padding: 5%;"> 
                        <h4><a type="button" class="gets" href="#" id="getIns"> Instituciones(58) &raquo;</a></h4>
                        <p> Total Beneficiarios: 12</p>
                        <p> Privadas: 50 <strong>|</strong> Gubernamentales: 45</p>
                    </div>
                </div>

                <div class="col-lg-3"> 
                    <div class="box-sm" style="padding: 5%;"> 
                        <h4><a type="button" class="gets" href="#" id="getOtros"> Otros(180) &raquo;</a></h4>
                        <p> Total beneficiarios: 20</p>
                        <p> Directos: 50 <strong>|</strong> Indirectos: 41</p>'
                    </div>
            </div>

            <div class="col-lg-3"> 
                <div class="box-sm" style="padding: 5%;"> 
                    <h4> <a class="gets" href="#" id="getJor"> Jornadas(41) &raquo;</a></h4></h4>
                    <p> Total beneficiarios: 45</p>
                    <p> Directos: 41 <strong>|</strong> Indirectos: 54</p>
                </div>
            </div>


            <div class="space"> </div>
            <div class="col-lg-12">
                <div class="space-sm"> </div>
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 ">
                    <form action="#" method="get">    
                        <input class="form-control search" id="system-search" name="q" placeholder="Buscar..." required>
                    </form>
                </div>
            </div>
  
            <div class="space"> </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div id="centrosTipo"> 
                </div>
            </div>
        </div>
    </div><!-- End row -->
 </div><!-- End box -->
</div>      <!-- End container -->
 
@endsection();