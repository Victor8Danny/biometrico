@extends('supervisorMaster')

@section('activeInformacion')
<li class="" )>
  @endsection

  @section('activeMenuAsistencias')
<li class="treeview">
  @endsection

  @section('activeAsistenciaPorFecha')
<li class="" )>
  @endsection

  @section('activeAsistenciaRangoFechas')
<li class="" )>
  @endsection

 



    


  @section('content')
  <h2>Bienvenido Supervisor </h2>
  <br><br><br>
  <center>
    <img src="../assets/img/now-logo.png" style="width: 15%; height: 15%;">
    <br><br>

    @if(empty($notificaraviso))
    @else
    <div class="col-xs-12" style="color:red;">
      <div class="center-block">
        <a href="{{route('CorreoAvisoCalificaciones')}}"><button type="button" class="btn btn-default btn-sm" onclick="ver()"><span class="fa fa-envelope"></span>&nbsp;&nbsp;&nbsp;<p class="text-danger">Notificaciones</p></button></a>
      </div>
    </div>
    @endif
  </center>

  <script>
    function ver() {
      $('#contenedor_carga_ajax').show();
      setTimeout(function() {
        $('#contenedor_carga_ajax').hide(450);
      }, 20000);
    }
  </script>

  @endsection