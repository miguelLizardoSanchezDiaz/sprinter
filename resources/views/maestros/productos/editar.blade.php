@extends('layouts.app')

@section('script_cabecera')

@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestionar Productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Inicio</a></li>
              <li class="breadcrumb-item active">Editar Producto</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Editar Producto</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    
                    <div class="col-sm-6 col-xs-12">
                        @include('mensajes.successful')
                    </div>
                </div>
                

                <div class="row">
                
                  <div class="col-sm-12 col-xs-12">
                    <a href="{{url($variable)}}" class="btn btn-sm btn-danger"><span class="fas fa-chevron-left"></span> Atrás</a>
                  </div>
                  <div class="col-sm-6 col-xs-12">
                    @include('errors.errores')
                  </div>

                <form id="frm_nuevo" name="frm_nuevo" class="col-sm-12 col-xs-12" method="PUT" accept-charset="UTF-8" enctype="multipart/form-data">
                  <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="txt_id_registro" id="txt_id_registro" value="{{$producto->id}}">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Código</label>
                        <input type="text" class="form-control" id="txt_codigo" name="txt_codigo" placeholder="Código" autocomplete="off" value="{{$producto->pro_codigo}}" readonly="">
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label>Descripción</label>
                        <input type="text" class="form-control" placeholder="Descripción" id="txt_descripcion" name="txt_descripcion" autocomplete="off" value="{{$producto->pro_descripcion}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Categoría</label>
                        <div class="input-group input-group-sm">
                          <span class="input-group-btn">
                            <button class="btn btn-personalizado" type="button"><i class="fa fa-filter"></i></button>
                          </span>
                          <input id="txt_categoria" type="text" class="form-control input-personalizado" name="txt_categoria" placeholder="Buscar por código o descripción" value="{{$producto->categoria['cat_codigo']}} | {{$producto->categoria['cat_descripcion']}}">
                          
                        </div>
                        <input type="hidden" id="txt_id_categoria" name="txt_id_categoria" value="{{$producto->cat_id}}">

                        </div>
                      </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Tipo de producto</label>
                        <select class="custom-select" id="cbo_tipo_producto" name="cbo_tipo_producto">
                          <option value="M" @if($producto->pro_tipo_producto=='M') selected @endif>Mercadería</option>
                          <option value="S" @if($producto->pro_tipo_producto=='S') selected @endif>Servicio</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Precio Venta</label>
                        <input type="number" class="form-control" placeholder="Precio" id="txt_precio_venta" name="txt_precio_venta" value="{{$producto->pro_precio}}">
                      </div>
                    </div>
                    
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Peso</label>
                        <input type="number" class="form-control" placeholder="Peso" id="txt_peso" name="txt_peso" value="{{$producto->pro_peso}}">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Volumen</label>
                        <input type="number" class="form-control" placeholder="Volumen" id="txt_volumen" name="txt_volumen" value="{{$producto->pro_volumen}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Unidad de Medida</label>
                        <div class="input-group input-group-sm">
                          <span class="input-group-btn">
                            <button class="btn btn-personalizado" type="button"><i class="fa fa-filter"></i></button>
                          </span>
                          <input type="text" class="form-control input-personalizado" name="txt_umedida" placeholder="Buscar por código o descripción" id="txt_umedida" value="{{$producto->unidadmedida['unm_codigo']}}@if($producto->unm_id) | @endif {{$producto->unidadmedida['unm_descripcion']}}">
                          
                        </div>
                        <input type="hidden" id="txt_id_umedida" name="txt_id_umedida" value="{{$producto->unm_id}}">
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Marca</label>
                        <div class="input-group input-group-sm">
                          <span class="input-group-btn">
                            <button class="btn btn-personalizado" type="button"><i class="fa fa-filter"></i></button>
                          </span>
                          <input type="text" class="form-control input-personalizado" name="txt_marca" placeholder="Buscar por código o descripción" id="txt_marca" value="{{$producto->marca['mar_codigo']}}@if($producto->mar_id) | @endif{{$producto->marca['mar_descripcion']}}">
                          
                        </div> 
                        <input type="hidden" id="txt_id_marca" name="txt_id_marca" value="{{$producto->mar_id}}">
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Modelo</label>
                        <div class="input-group input-group-sm">
                          <span class="input-group-btn">
                            <button class="btn btn-personalizado" type="button"><i class="fa fa-filter"></i></button>
                          </span>
                          <input type="text" class="form-control input-personalizado" name="txt_modelo" placeholder="Buscar por código o descripción" id="txt_modelo" value="{{$producto->modelo['mod_codigo']}}@if($producto->mod_id) | @endif{{$producto->modelo['mod_descripcion']}}">
                          
                        </div> 
                        <input type="hidden" id="txt_id_modelo" name="txt_id_modelo" value="{{$producto->mod_id}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Otras características</label>
                        <textarea class="form-control" rows="3" placeholder="Ingresar" id="txt_caracteristicas" name="txt_caracteristicas">{{$producto->pro_caracteristicas}}</textarea>
                      </div>
                    </div>
                  </div>

                  <button type="button" class="btn btn-sm btn-primary m-r-5" id="btn_editar"><span class="glyphicon glyphicon-save"></span> Editar</button>

                  <a href="{{url($variable)}}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>

                </form>


                </div>

                                

              </div>

            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>

        </div>
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection

@section('script_pie')

{!! Html::script('/js/maestros/productos.js') !!}

@endsection