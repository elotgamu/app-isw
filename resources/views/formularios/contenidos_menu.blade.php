@extends ('/layouts.cpanel_template')
@section ('worksheets')
    <br>
    <br>
    <br>

    <!-- ventanas modales -->

    <!-- modal actualizar categoria -->
    <div id="updatecategoria" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                 X
             </button>
             <h3>Información de la categoria</h3>
           </div>
          <div class="modal-body">
             <div class="login-form">
                <div class="form-group">
                  <input type="hidden" id="id_categoria"/>
                  {!! Form::label('categoria','Nombre de la categoria:', array('class'=> 'label')) !!}
                  {!! Form::text('txtcategoria_update', null,array('placeholder' => 'EJ: Bebidas naturales', 'class' => 'form-control', 'id'=>'txtcategoria_update')) !!}
                </div>
                 <div class="form-group">
                  {!! Form::label('Descripcion','Descripcion:', array('class'=> 'label')) !!}
                  {!! Form::text('txtdescripcion_update', null,array('placeholder' => '', 'class' => 'form-control','id'=>'txtdescripcion_update')) !!}
                 </div>
             </div>
          </div>
          <div class="modal-footer">
            <button id='btnupdate_cate' href="#" class="btn btn-success">Guardar</button>
          </div>
         </div>
      </div>
    </div>
    <!-- fin modal actualizar categoría -->

<!-- modal listar productos de la categoría -->
 <div id="lsprodcat" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                 X
                 </button>
                 <h3>Productos de la categoría</h3>
             </div>
             <div class="modal-body">
                 <div class="row">
                        <div id="lista_producto" class="row list-group s-scroll">
                        </div>
                </div>
             </div>
         </div>
     </div>
 </div>
 <!-- fin modal listar productos de la categoría -->

<!-- modal agregar nueva categoria -->
 <div id="addcategoria" class="modal fade">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  X
              </button>
              <h3>Información de la categoría</h3>
          </div>
           <div class="modal-body">
              <div class="login-form">
                 <div class="form-group">
                   {!! Form::label('categoria','Nombre de la categoria:', array('class'=> 'label')) !!}
                   {!! Form::text('txtcategoria', null,array('placeholder' => 'EJ: Bebidas naturales', 'class' => 'form-control', 'id'=>'txtcategoria')) !!}
                  </div>
                  <div class="form-group">
                   {!! Form::label('Descripcion','Descripcion:', array('class'=> 'label')) !!}
                   {!! Form::text('txtdescripcion', null,array('placeholder' => '', 'class' => 'form-control','id'=>'txtdescripcion')) !!}
                  </div>
              </div>
           </div>
           <div class="modal-footer">
             <a id='btnadd' href="#" class="btn btn-success">Guardar</a>
           </div>
         </div>
      </div>
  </div>
  <!-- fin modal agregar nueva categoria-->

<!-- modal agregar nuevo producto-->
 <div id="addproducto" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                 X
             </button>
             <h3>Información del producto</h3>
           </div>
          <div class="modal-body">
             <div class="login-form">
                <div class="form-group">
                 <input type="hidden" id="id_producto"/>
                  {!! Form::label('producto','Nombre del producto', array('class'=> 'label')) !!}
                  {!! Form::text('txtproducto', null,array('placeholder' => 'EJ: Bebidas naturales', 'class' => 'form-control', 'id'=>'txtproducto')) !!}
                 </div>
                 <div class="form-group">
                  {!! Form::label('precio','Precio', array('class'=> 'label')) !!}
                  {!! Form::input('number', 'txtprecio', null,array('placeholder' => '200.00', 'class' => 'form-control','id'=>'txtprecio')) !!}
                 </div>
                 <div class="form-group">
                  {!! Form::label('cbcategoria','Categoria', array('class'=> 'label')) !!}
                 <select id="cbcategorias" class="form-control">
                   <option value="" selected>Seleccione una categoria</option>
                 </select>
                 </div>
             </div>
          </div>
          <div class="modal-footer">
            <a id='btnproducto' href="#" class="btn btn-success">Guardar</a>
          </div>
       </div>
    </div>
 </div>
 <!-- fin modal agregar nuevo producto-->
 <!-- fin ventanas modales -->

<div class="row">
     <div class="col-lg-12 text-center">
         <div id="notificaciones" class="alert alert-info alert-dismissable" style="display:none">
                 <button type="button" class="close" data-dismiss="alert" >&times;</button>
         </div>
         <h2>Menú</h2>
         <hr class="star-primary"/>
     </div>
</div>

<div class="row">
   <div class="col-lg-12 text-left">
       <a data-toggle="modal" href="#addcategoria" class="btn btn-primary">
           <span class="glyphicon glyphicon-plus"></span> Nueva categoría</a>
       &nbsp
       <a data-toggle="modal" href="#addproducto" class="btn btn-primary">
           <span class="glyphicon glyphicon-plus"></span> Nuevo producto</a>
       &nbsp
       <hr class="star-primary">
   </div>
</div>

<div class="row">
    <div id="lista_categorias" class="row list-group">
        
    </div>
 </div>
@stop
