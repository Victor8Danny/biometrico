@extends('docenteMaster')

@section('activeInformacion')
<li class="" )>
  @endsection

  @section('activeMenuAsistencias')
<li class="treeview">
  @endsection

  @section('activeTomaLista')
<li class="" )>
  @endsection

  @section('activeAsistenciaPorFecha')
<li class="" )>
  @endsection

  @section('activeAsistenciaRangoFechas')
<li class="" )>
  @endsection

  @section('activePorcentajeAsistencia')
<li class="" )>
  @endsection

  @section('activeMenuJustificaciones')
<li class="treeview">
  @endsection

  @section('activeListaJustificaciones')
<li class="" )>
  @endsection

  @section('activeMenuReportes')
<li class="active treeview">
    @endsection

    @section('activeListadoEstudiantes')
<li class="" )>
    @endsection

    @section('activeHorarioClases')
<li class=" active" )>
    @endsection

    @section('activeReporteFinalAsistencia')
<li class="" )>
    @endsection

    
    
    @section('content')


    <h2>Horarios de Clases</h2>
    <form id="">
    <div class="box box-primary">
        <div class="box-body">
            <table id="tabledata" class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <th>Seccion</th>
                    <th>Paralelo</th>
                    <th>Fase</th>
                    <th>Materia</th>
                    <th>Ver</th>
                </tr>
            </thead>
                @foreach ($listaFases as $lista)
                <tr>
                <td>{{$lista->nomseccion}}</td>
                <td>{{$lista->codparalelo}}</td>
                <td>{{$lista->nomfase}}</td>
                <td>{{$lista->nommateria}}</td>
                <td style="text-align: center;"><button type="button" id="abrir" name="abrir" class="btn btn-default btn-bg glyphicon glyphicon-eye-open" data-toggle="modal" data-target="#modalVerCalificaciones" onclick="agregaform( {{$lista->codfase}} )"></button></td>    
            </tr>
                @endforeach
            </table>

        </div>
    </div>

    </form>

    <!-- Modal -->
    <div class="modal fade" id="modalVerCalificaciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Revisar Horario</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body table-responsive no-padding" name="calificaciones" id="calificaciones">

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <div id="cerrar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    





    <script type="text/javascript">
      function agregaform(codfase) {
            $('#calificaciones').empty();
            $('#cerrar').empty();
            cal = "";
            $.get('/horarioclases2/' + codfase, function(data) {
                if (data.length > 1) {
                    $.each(data, function(index, datos) {
                        $('#calificaciones').empty();
                        if (datos.seccion === "FIN DE SEMANA") {
                            if ((datos.sabado == null)) {
                                datos.sabado = "-----";
                            }
                            if ((datos.domingo == null)) {
                                datos.domingo = "-----";
                            }
                            cal += '<tr><th class="text-center">' + datos.hora + '</th><td class="text-center">' + datos.sabado + '</td><td class="text-center">' + datos.domingo + '</td></tr>';
                        } else {
                            if (datos.lunes == null) {
                                datos.lunes = "-----";
                            }
                            if ((datos.martes == null)) {
                                datos.martes = "-----";
                            }
                            if ((datos.miercoles == null)) {
                                datos.miercoles = "-----";
                            }
                            if ((datos.jueves == null)) {
                                datos.jueves = "-----";
                            }
                            if ((datos.viernes == null)) {
                                datos.viernes = "-----"; 
                            }
                            cal += '<tr><th class="text-center">' + datos.hora + '</th><td class="text-center">' + datos.lunes + '</td><td class="text-center">' + datos.martes + '</td><td class="text-center">' + datos.miercoles + '</td><td class="text-center">' + datos.jueves + '</td><td class="text-center">' + datos.viernes + '</td></tr>';
                        }


                    })
                    $.each(data, function(index, datos) {
                        if (datos.seccion === "FIN DE SEMANA") {
                            $('#calificaciones').append('<strong>Fase: </strong>' + datos.fase + '&nbsp;&nbsp;&nbsp;<strong>Inicio de fase: </strong>' + datos.inicio + '&nbsp;&nbsp;&nbsp;<strong>Fin de fase: </strong>' + datos.fin + '<br><br><table class="table table-hover table-bordered" ><tr><th class="text-center">HORA</th><th class="text-center">SÁBADO</th><th class="text-center">DOMINGO</th></tr>' + cal + '</table>');
                        } else {
                            $('#calificaciones').append('<strong>Fase: </strong>' + datos.fase + '&nbsp;&nbsp;&nbsp;<strong>Inicio de fase: </strong>' + datos.inicio + '&nbsp;&nbsp;&nbsp;<strong>Fin de fase: </strong>' + datos.fin + '<br><br><table class="table table-hover table-bordered" ><tr><th class="text-center">HORA</th><th class="text-center">LUNES</th><th class="text-center">MARTES</th><th class="text-center">MIERCOLES</th><th class="text-center">JUEVES</th><th class="text-center">VIERNES</th></tr>' + cal + '</table>');
                        }
                        return false;
                    })
                    $('#cerrar').append('<br><button type="submit" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cerrar</button>');

                } else {
                    $('#calificaciones').append('<div class="box" ><div class="box-body table-responsive no-padding"><br><br><table class="table table-hover"><tr><center><h4><strong>Aún no hay un horario establecido</strong></h4></center></tr></table></div><br><br>');
                    $('#cerrar').append('<br><button type="submit" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cerrar</button>');
                }
            });
        }
       

        
        

       

        function ver() {
            $('#contenedor_carga_ajax').show();
            setTimeout(function() {
                $('#contenedor_carga_ajax').hide(450);
            }, 12000);
        }
        function justNumbers(e) {
            var keynum = window.event ? window.event.keyCode : e.which;
            if ((keynum == 8) || (keynum == 46))
                return true;

            return /\d/.test(String.fromCharCode(keynum));
        }

        
    </script>


@endsection