@extends ('/layouts.cpanel_template')
@section ('worksheets')
<!-- menu Grid Section -->
   <section>
       <br/>
       <br/>
       <br/>

           <div id="updatecategoria" class="modal fade">
             <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        X
                    </button>
                    <h3>Informacion de la categoria</h3>
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
                   <!--<a href="#" data-dismiss="modal" class="btn">Cerrar</a>-->
                 </div>
   	          </div>
           </div>
        </div>

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

        <div id="addcategoria" class="modal fade">
              <div class="modal-dialog">
                 <div class="modal-content">
                    <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                         X
                     </button>
                     <h3>Informacion de la categoria</h3>
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
                    <!--<a href="#" data-dismiss="modal" class="btn">Cerrar</a>-->
                  </div>
    	        </div>
             </div>
         </div>

        <div id="addproducto" class="modal fade">
             <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        X
                    </button>
                    <h3>Informacion del producto</h3>
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
                   <!--<a href="#" data-dismiss="modal" class="btn">Cerrar</a>-->
                 </div>
   	          </div>
           </div>
        </div>

        <!-- ventana modal nueva promocion -->
        <div id="addpromocion" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h3>Información de la promoción</h3>
                        <div class="modal-body">
                            <div class="login-form">
                                <div class="form-group">
                                    {!!Form::label('namepromo','Nombre de la promoción', array('class'=> 'label')) !!}
                                    {!!Form::text('txtnamepromo', null, array('placeholder' => 'EJ: Día del trabajador', 'class' => 'form-control', 'id'=>'txtnamepromo')) !!}
                                </div>
                                <div class="form-group">
                                    {!!Form::label('descpromo', 'Descripción de la promoción', array('class' => 'label')) !!}
                                    {!!Form::text('txtdescpromo', null, array('placeholder' => 'EJ: Esta promoción trata de...', 'class' => 'form-control', 'id' =>'txtdescpromo')) !!}
                                </div>
                                <div class="form-group">
                                    {!!Form::label('finpromo', 'Válida hasta:', array('class' => 'label')) !!}
                                    <div class="form-group">
                                        <div class='input-group date'>
                                            <input type='text' class="form-control" id="dptfechahasta"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <!--<div class="form-group">
                                        <input  type="text" class="date-picker form-control"  id="dptfechahasta" />
                                    </div>-->
                                </div>
                                <div class="form-group">
                                    {!!Form::label('lblimg', 'Volante de la promoción', array('class' => 'label')) !!}
                                    <!--{!!Form::file('imgpromo', null) !!}-->
                                    <span>
                                        <input  type="file"
                                                style="visibility:hidden; width: 1px;"
                                                id='multipartFilePath' name='multipartFilePath'
                                                onchange="$(this).parent().find('span').html($(this).val().replace('C:\\fakepath\\', ''))"  /><!-- Chrome security returns 'C:\fakepath\'  -->
                                        <input class="btn btn-primary" type="button" value="Seleccionar archivo" onclick="$(this).parent().find('input[type=file]').click();"/> <!-- on button click fire the file click event -->
                                        &nbsp;
                                        <span id="ruta_img_promo" class="badge badge-important" ></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <a id='btnsavepromocion' href="#" class="btn btn-success">Guardar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- fin modal nueva promocion -->

        <!-- modal preview del volante de la promoción -->
        <div id="previewpromo" class="modal fade">
            <div class="modal-dialog" data-dismiss="modal">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            X
                        </button>
                        <img src="" class="imagepreview" id="img_promo_preview"/>
                    </div>
                </div>
            </div>
        </div><!-- fin modal de preview del volante de la promocion -->

        <!--modal del editar promocion -->
        <div id="updatepromo" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                           X
                       </button>
                   </div>
                   <h3>Información de la promoción</h3>
                   <div class="modal-body">
                       <div class="login-form">
                           <div class="form-group">
                               <input type="hidden" id="id_promocion"/>
                               {!!Form::label('namepromo','Nombre de la promoción', array('class'=> 'label')) !!}
                               {!!Form::text('txtnamepromo_updated', null, array('placeholder' => 'EJ: Día del trabajador', 'class' => 'form-control', 'id'=>'txtnamepromo_updated')) !!}
                           </div>
                           <div class="form-group">
                               {!!Form::label('descpromo', 'Descripción de la promoción', array('class' => 'label')) !!}
                               {!!Form::text('txtdescpromo_updated', null, array('placeholder' => 'EJ: Esta promoción trata de...', 'class' => 'form-control', 'id' =>'txtdescpromo_updated')) !!}
                           </div>
                           <div class="form-group">
                               {!!Form::label('finpromo', 'Válida hasta:', array('class' => 'label')) !!}
                               <div class="form-group">
                                   <div class='input-group date'>
                                       <input type='text' class="form-control" id="dptfechahasta_updated"/>
                                       <span class="input-group-addon">
                                           <span class="glyphicon glyphicon-calendar"></span>
                                       </span>
                                   </div>
                               </div>
                           </div>
                           <div class="form-group">
                               {!!Form::label('volanteactual', 'Volante de la promoción', array('class' => 'label')) !!}
                               {!!Form::image('', 'Volante actual', array('class' => 'img-responsive', 'id' =>'volpromo_updated')) !!}
                               <span>
                                   <input type="file" style="visibility:hidden; width: 1px;"
                                   id='multipartFilePath_update' name='multipartFilePath_update'
                                   onchange="$(this).parent().find('span').html($(this).val().replace('C:\\fakepath\\', ''))">
                                   <input class="btn btn-primary" type="button" value="Actualizar volante de la promoción"
                                   onclick="$(this).parent().find('input[type=file]').click();">
                                   &nbsp;
                                   <span id="ruta_img_promo_updated" class="badge badge-important" ></span>
                               </span>
                           </div>
                       </div>
                   </div>
                   <div class="modal-footer">
                       <a id="savepromoupdated" href="#" class="btn btn-success">Guardar cambios</a>
                   </div>
               </div>
            </div>
        </div> <!--fin del modal actualizar promocion -->

         <div class="row">
             <div class="col-lg-12 text-center">
                 <!--<div id="notificaciones" class="row">

                 </div>-->
                 <div id="notificaciones" class="alert alert-info alert-dismissable" style="display:none">
                         <button type="button" class="close" data-dismiss="alert" >&times;</button>
                 </div>
                 <h2>Menu</h2>
                 <hr class="star-primary"/>
             </div>
          </div>
          <div class="row">
            <div class="col-lg-12 text-left">
                   <a data-toggle="modal" href="#addcategoria" class="btn btn-success">Agregar categoría nueva</a>
                   &nbsp
                   <a data-toggle="modal" href="#addproducto" class="btn btn-success">Agregar nuevo producto</a>
                   &nbsp
                   <a data-toggle="modal" href="#addpromocion" class="btn btn-success">Agregar nueva promoción</a>
                  <hr class="star-primary">
             </div>
         </div>

         <div class="row">
             <div id="lista_categorias" class="row list-group">
             </div>
          </div>

          <div class="row">
              <div class="col-lg-12 text-left">
                    <h3>Promociones</h3>
                    <hr class="star-primary">
              </div>
          </div>

           <div class="row">

                <div id="lista_promocion" class="row list-group">

                </div>
          </div>

    </section>
@stop
