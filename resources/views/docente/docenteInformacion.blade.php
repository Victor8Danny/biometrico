@extends('docenteMaster')


@section('activeInformacion')
<li class="active" )>
  @endsection

  @section('activeMenuAsistencias')
<li class=" treeview">
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
<li class="treeview">
    @endsection

    @section('activeListadoEstudiantes')
<li class="" )>
    @endsection

    @section('activeHorarioClases')
<li class="" )>
    @endsection
    @section('activeReporteFinalAsistencia')
<li class="" )>
    @endsection



  @section('content')

  <h2>Actualiza tu Información Personal</h2>

  @foreach ($informacionPersonal as $inf)


  <br>


  <section class="content">
    <div class="row">
      <form role="form" method="post" action="{{route('UpdateDocente', $inf->codpersona)}}" enctype="multipart/form-data">
        <div class="col-md-6">
          <div class="box box-primary">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label>Cédula</label>
                <input type="text" class="form-control" value="{{ $inf -> cedpersona}}" name="cedpersona" disabled>
              </div>

              <div class="form-group">
                <label>Nombres</label>
                <input type="text" class="form-control" value="{!! $inf -> apepersona.' '.$inf->nompersona!!}" name="nomPersona" disabled>
              </div>

              <div class="form-group">
                <label>Tipo</label>
                <input type="text" class="form-control" value="{{$inf -> tippersona}}" name="tipPersona" disabled>
              </div>

              <div class="form-group {{ $errors->has('convencional') ? ' has-error' : '' }}">
                <label>Número Convencional</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Telef. Convencional" data-inputmask='"mask": "(99) 9999-999"' value="{{$inf -> telconvencionalpersona}}" name="convencional" onkeypress="return justNumbers(event);" data-mask required>
                </div>
                @if ($errors->has('convencional'))
                <span class="help-block">
                  <strong>{{ $errors->first('convencional') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group {{ $errors->has('celular') ? ' has-error' : '' }}">
                <label>Número Celular</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-mobile"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Telef. Celular" data-inputmask='"mask": "(99) 99999999"' value="{{$inf -> telcelularpersona}}" name="celular" onkeypress="return justNumbers(event);" data-mask required>
                </div>
                @if ($errors->has('celular'))
                <span class="help-block">
                  <strong>{{ $errors->first('celular') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">Correo Electrónico</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control" placeholder="Email" value="{{$inf -> corpersona}}" name="email">
                </div>
                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>

            </div>
          </div>
        </div>

        <!--El segundo -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-body">

              <div class="form-group {{ $errors->has('estado_civil') ? ' has-error' : '' }}">
                <label>Estado Civil</label>
                <select class="form-control select2" style="width: 100%;" name="estado_civil">
                  <option selected="selected">{{$inf -> estcivildocente}}</option>
                  <option>SOLTERO</option>
                  <option>CASADO</option>
                  <option>VIUDO</option>
                  <option>DIVORCIADO</option>
                  <option>UNION LIBRE</option>
                </select>
                @if ($errors->has('estado_civil'))
                <span class="help-block">
                  <strong>{{ $errors->first('estado_civil') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group">
                <label>Sexo</label>
                <input type="text" class="form-control" value="{{ $inf -> sexo}}" name="sexo" disabled>
              </div>

              <div class="form-group">
                <label>Título</label>
                <input type="text" class="form-control" value="{{ $inf -> titdocente}}" name="tiddocente" disabled>
              </div>



              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>

            </div>
          </div>
        </div>

      </form>
    </div>
  </section>

  @endforeach

  <script>
    function justNumbers(e) {
      var keynum = window.event ? window.event.keyCode : e.which;
      if ((keynum == 8) || (keynum == 46))
        return true;

      return /\d/.test(String.fromCharCode(keynum));
    }
  </script>

  @endsection
