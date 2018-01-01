@extends('layouts.app')

@section('content')
<div class="container" id="def">
	<div class="row">
        <div class="col-lg-4">
            <div class="box">
                <div class="caption">
                    <h2> Conteo </h2>
                    <hr>
                    <form action="/" method='POST'>
                        <div class='table-responsive'>
                            <table class ='table  table-hover table2'>
                            <tr>
                                <th class='col-lg-8' colspan='2'>  Reparto  </th>      
                            </tr>
                            <tr>
                                <td class='col-lg-5 text-left'> <ul> <li>Pan con cuota: 450</li></ul></td>
                            </tr>
                            <tr>
                                <td class='col-lg-5 text-left'> <ul> <li>Pan sin cuota: 50</li></ul></td>
                            </tr>
                            <tr>
                                <td class='col-lg-5 text-left'> <ul> <li> Leche: 50</li></ul></td>
                            </tr>
                            <tr>
                                <td class='col-lg-5 text-center'> Desayunos: 200</td>
                            </tr>
                            </table>
                        </div>
                    </form>
                </div> <!--end of caption -->
            </div> <!--end box -->
        </div>  <!--end col-lg-4-->
        <div class="col-lg-4">
            <div class="box">
                <div class="caption">
                    <h2> Movimientos </h2>
                    <hr>
                    <form action="/" method='POST'>
                        <div class='table-responsive'>
                            <table class ='table  table-hover table2'>
                            <tr>
                                <th class='col-lg-8' colspan='2'>  Últimas actualizaciones  </th>      
                            </tr>
                            <tr>
                                <td class='col-lg-5'>340 desayunos en  Panamá</td>
                            </tr>
                            </table>
                        </div>
                    </form>
                </div><!--end caption-->
            </div> <!--end box -->
        </div><!--end of col-lg-4-->

		<div class="col-lg-4">
            <div class="box">
				<div class="caption">
					<h2> Notas</h2>
					<hr>
					<form class="form-inline" method="post" action="ajustes.php">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="..." name="nota" required=true>
                        </div>
                        <button type="submit" class="btn btn-success" name="note">+</button>
                    </form>
                    <br>
                    <div class='table-responsive'>
                        <table class ='table  table-hover table2'>
                        <tr>
                            <th class='col-lg-8' colspan='2'>  Notas  </th>
                        </tr>
                        
                        <form action=".$_SERVER['PHP_SELF']." method='POST'>
                            <tr>
                                <td class='col-lg-5'>Holi</td>
                                <td class='col-lg-1'> <input type='hidden' name='notilla' value='1'>
                                    <button type='submit' name='borrar' class='btn btn-danger btn-sm pull-right'><i class="glyphicon glyphicon-trash"></i></a>

                                </td>
                            </tr>
                        </form>
                        </table>
                   </div><!--end of table responsive-->
                </div><!--end of caption-->
		    </div><!--end of box-->     
	    </div><!--end col-lg-4--> 
	</div><!--end row-->
</div><!--end  of container-->



@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
        $(".welcome").addClass('active');
    });
</script>
@endsection