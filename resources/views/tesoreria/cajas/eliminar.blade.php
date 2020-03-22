@extends('layouts.app')

@section('script_cabecera')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestionar Cajas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Eliminar Caja</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Eliminar Caja</h3>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <a href="{{url($variable)}}" class="btn btn-sm btn-danger"><span class="fas fa-chevron-left"></span> Atras</a>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        @include('errors.errores')
                    </div>
                  </div>
                  <div class="">
                       <center><h5><span class="fa fa-warning" style="color: #d43f3a"></span> ATENCIÓN. Está a punto de Activar / Desactivar la Caja: <b>{{$caja->caj_descripcion}}</b></h5></center><hr>

                            <center><h5>¿Realmente desea Activar / Desactivar esta caja?</h5></center>
                            
                            {!!Form::open(['route'=> [$variable.'.destroy', $caja], 'method'=>'DELETE'])!!}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <center>
                                <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <a href="{{ url($variable) }}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-ban-circle"></span> Cancelar</a>
                                @if($caja->caj_estado==1)
                                  <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-trash"></span>&nbsp; Desactivar &nbsp;</button>
                                @else
                                  <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-trash"></span>&nbsp; Activar &nbsp;</button>
                                @endif
                                </div>
                                </div></center>
                            {!!Form::close()!!}
                    

                  </div>
               
              </div>

            </div>

          </div>

        </div>
        
      </div>
    </section>
  </div>


@endsection

@section('script_pie')

@endsection