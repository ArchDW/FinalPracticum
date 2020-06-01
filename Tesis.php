<?php
$page_title = 'Agregar Evaluación';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
//$groups = find_all('user_groups');
?>
<?php
if (isset($_POST['add_evaluacion'])) {
    if (empty($errors)) {

        $evaluacion = 0.0;
        $pregunta1 = 0;
        $pregunta2 = 0;
        $pregunta3 = 0;
        $pregunta4 = 0;
        $pregunta5 = 0;
        $pregunta6 = 0;
        $pregunta7 = 0;
        $pregunta8 = 0;
        $pregunta9 = 0;
        $pregunta10 = 0;
        //-------------------------Pregunta 1-------------------------
        foreach ($_POST['1'] as $valor) : $pregunta1 = $pregunta1 + $valor; endforeach;
        //-------------------------Pregunta 2-------------------------
        foreach ($_POST['2'] as $valor) : $pregunta2 = $pregunta2 + $valor; endforeach;
        //-------------------------Pregunta 3-------------------------
        foreach ($_POST['3'] as $valor) : $pregunta3 = $pregunta3 + $valor; endforeach;
        //-------------------------Pregunta 4-------------------------
        foreach ($_POST['4'] as $valor) : $pregunta4 = $pregunta4 + $valor; endforeach;
        //-------------------------Pregunta 5-------------------------
        foreach ($_POST['5'] as $valor) : $pregunta5 = $pregunta5 + $valor; endforeach;
        //-------------------------Pregunta 6-------------------------
        foreach ($_POST['6'] as $valor) : $pregunta6 = $pregunta6 + $valor; endforeach;
        //-------------------------Pregunta 7-------------------------
        foreach ($_POST['7'] as $valor) : $pregunta7 = $pregunta7 + $valor; endforeach;
        //-------------------------Pregunta 8-------------------------
        foreach ($_POST['8'] as $valor) : $pregunta8 = $pregunta8 + $valor; endforeach;
        //-------------------------Pregunta 9-------------------------
        foreach ($_POST['9'] as $valor) : $pregunta9 = $pregunta9 + $valor; endforeach;
        //-------------------------Pregunta 10-------------------------
        foreach ($_POST['10'] as $valor) : $pregunta10 = $pregunta10 + $valor; endforeach;
        
        $evaluacion = (($pregunta1+$pregunta2+$pregunta3+$pregunta4+$pregunta5+$pregunta6+$pregunta7+$pregunta8+$pregunta9+$pregunta10)*100)/75;
        $query = "Update inducion SET ";
        $query .= "evaluacion='{$evaluacion}' ";
        $query .= "Where id='{$_GET['id']}'";
        if ($db->query($query)) {
            //sucess
            $session->msg('s', " Se Agrego correctamente la Evaluación ");
            redirect('InformePractica.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
        } else {
            //failed
            $session->msg('d', ' No Se Agrego correctamente la Evaluación ');
            redirect('InformePractica.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('Tesis.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>
<?php echo display_msg($msg); ?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>
                <span class="glyphicon glyphicon-th"></span>
                <span> Tesis de Investigación</span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form method="post" action="Tesis.php?user=<?php echo $_GET['user']; ?>&id=<?php echo $_GET['id']; ?>">
                    <div class="form-group">
                        <label for="evaluacion">1. La Carátula.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                                <tr>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center"></th>
                                </tr>   
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Muestra los datos que identifican a la institución, el título del documento, autor, asesor, fecha, modalidad de titulación.  </div></td>
                                    <td><div class="btn-group"><input type="radio" name="1[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>Muestra la mayoría de los datos que identifican a la institución, el título del documento, autor, asesor, fecha, etcétera.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="1[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>Muestra algunos datos que identifican a la institución, el título del documento, autor, asesor, fecha, etcétera</div></td>
                                    <td><div class="btn-group"><input type="radio" name="1[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>No contiene una caratula.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="1[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">2. El índice.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                                <tr>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center"></th>
                                </tr>   
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Indica todas las secciones del informe así como las páginas en que se encuentran.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="2[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>Indica la mayoría de las secciones del informe que son indispensables señalar o bien no está correctamente paginado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="2[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>Indica solo algunas secciones del informe o bien no está actualizada la paginación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="2[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>No contiene índice.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="2[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">3. La introducción</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                                <tr>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center"></th>
                                </tr>   
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div>9</div></td>
                                    <td><div>Describe de manera puntual el tema de estudio, las principales preguntas, objetivos, el
                                        método, así como el contenido sintético de cada uno de los capítulos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="9"></div></td>
                                </tr>
                                <tr>
                                    <td><div >6</div></td>
                                    <td><div>Describe de manera general el tema de estudio, menciona las preguntas, los objetivos,
el método así como el contenido sintético de cada uno de los capítulos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="6"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Menciona algunos aspectos del tema de estudio y lo relaciona con las preguntas
principales, los objetivos, el método y añade una descripción del contenido de cada
uno de los capítulos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>Menciona algunos aspectos del tema de estudio y lo relaciona con las preguntas
principales, los objetivos, el método y añade una descripción del contenido de cada
uno de los capítulos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">4. El cuerpo de la tesis o capítulos</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                                <tr>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center"></th>
                                </tr>   
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div>36</div></td>
                                    <td><div>Incluye una descripción argumentada de los fundamentos, de los principios
metodológicos considerados para el desarrollo, de la presentación de resultados y de
los hallazgos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="36"></div></td>
                                </tr>
                                <tr>
                                    <td><div >27</div></td>
                                    <td><div>Incluye una descripción argumentada de la mayoría de los siguientes elementos:
fundamentos teóricos, principios metodológicos, la presentación de resultados y la
exposición de los hallazgos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="27"></div></td>
                                </tr>
                                <tr>
                                    <td><div>18</div></td>
                                    <td><div>Está centrado en dos de los siguientes elementos: fundamentos teóricos, principios
metodológicos, presentación de resultados o la exposición de hallazgos. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="18"></div></td>
                                </tr>
                                <tr>
                                    <td><div>4</div></td>
                                    <td><div>Está centrado en uno de los siguientes elementos: fundamentos teóricos, principios
metodológicos, presentación de resultados o la exposición de hallazgos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="4"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">5. Las conclusiones</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                                <tr>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center"></th>
                                </tr>   
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div>9</div></td>
                                    <td><div>Exponen los principales hallazgos en función de las preguntas, objetivos, hipótesis o
supuestos, enfatiza en el aporte que hace al campo o tema de estudio y plantea
nuevas vetas de investigación en función de los resultados.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="9"></div></td>
                                </tr>
                                <tr>
                                    <td><div >6</div></td>
                                    <td><div>Exponen los principales hallazgos en función de algunos aspectos como: preguntas de
investigación, objetivos, hipótesis o supuestos. Menciona el aporte que hace al campo
o tema de estudio y plantea nuevas vetas de investigación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="6"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Expone los principales hallazgos en función de los resultados presentados; omite la
mención del aporte del trabajo y de nuevas vetas de investigación. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>Consisten en una síntesis del procedimiento realizado, no se identifican los hallazgos,
el aporte o nuevas oportunidades de investigación. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">6. Los anexos</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                                <tr>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center"></th>
                                </tr>   
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Incluye los productos o materiales expuestos en el desarrollo, para que puedan ser
                                        utilizados para eventuales consultas.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>Incluye la mayoría de los productos o materiales expuestos en el desarrollo, para que
                                        puedan ser utilizados para eventuales consultas.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>Incluye algunos productos o materiales expuestos en el desarrollo, para que puedan
                                        ser utilizados para eventuales consultas</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>No contiene anexos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">7. Acerca de las citas y referencias</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                                <tr>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center"></th>
                                </tr>   
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Todas las referencias están citadas en el texto. Se emplea un único estilo.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>La mayoría de las referencias están citadas en el texto o bien aunque tenga todas,
                                        algunas no están citadas o referenciadas en un único estilo.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>Faltan más de 5 referencias de lo citado en el texto o viceversa o bien el estilo de
                                        redacción de las referencias no corresponde con el indicado por el asesor.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>No contiene listado de referencias o bien no se siguió un estilo único para su
                                        elaboración.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">8. Diseño</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                                <tr>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center"></th>
                                </tr>   
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>El texto contiene el formato solicitado: tipo de letra, tamaño de letra, interlineado,
                                        alineación, entre otros</div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>Al texto le faltan uno o dos elementos de lo solicitado en el formato: tipo de letra,
                                        tamaño de letra, interlineado, alineación, entre otros.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>Al texto le faltan entre 3 y 5 elementos solicitados en el formato: tipo de letra, tamaño
                                        de letra, interlineado, alineación, entre otros. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>Al texto le faltan más de 5 elementos solicitados en el formato: tipo de letra, tamaño de
                                        letra, interlineado, alineación, entre otros. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">9. Ortografía</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                                <tr>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center"></th>
                                </tr>   
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>El texto no presenta errores ortográficos o son esporádicos: máximo dos por página. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>El texto presenta de 3 a 5 errores ortográficos por página.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>El texto presenta de 6 a 8 errores ortográficos por página. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>El texto presenta más de 9 errores ortográficos por página. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">10. Citas y referencias en formato APA</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                                <tr>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center"></th>
                                </tr>   
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Todas las citas y referencias tienen el estilo APA.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="10[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>Una o dos citas o referencias no están acorde al estilo APA</div></td>
                                    <td><div class="btn-group"><input type="radio" name="10[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>De tres a cinco citas o referencias no están acorde al estilo APA</div></td>
                                    <td><div class="btn-group"><input type="radio" name="10[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>Más de cinco citas o referencias no están acorde al estilo APA.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="10[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="add_evaluacion" class="btn btn-primary">Guardar</button>
                        <a href="EvaluacionFInal.php?user=<?php echo $_GET['user']; ?>" class="btn btn-default btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>