<form class="p-5 bg-light" method="post">
                                          <td><input name="idReporte" value="<?php echo $value["idReporte"];?>"/></td>
                                          <td>
                                                 <input type="text" name="i1" id="i1">
                                          </td>
                                          <td>
                                                 <input type="text" name="i2" id="i2">
                                          </td>
                                          <td>
                                                 <input type="text" name="i3" id="i3">
                                          </td>
                                          <td>
                                                 <input type="text" name="i4" id="i4">
                                          </td>
                                          <td>
                                                 <input type="text" name="i5" id="i5">
                                          </td>
                                          <td>
                                                 <div class="btn-group">
                                                        
                                                               <input type="submit" name="insertar" value="Guardar" name="guardarRegistro" class="btn btn-success"/>
                                                               </div>

                                                               
                                                               <?php
                                                                       $registro = controladorFormularios::ctrGuardarRegistro();
        //echo $registro;

        if ($registro == "ok") {

            echo '<script>

                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }

            </script>';

            echo '<div class="alert alert-success">La partes han sido registradas</div>';
        }
                                                               ?>
                                                               </form>