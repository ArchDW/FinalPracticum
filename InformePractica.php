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
        $pregunta11 = 0;
        $pregunta12 = 0;
        $pregunta13 = 0;
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
        //-------------------------Pregunta 11-------------------------
        foreach ($_POST['11'] as $valor) : $pregunta11 = $pregunta11 + $valor; endforeach;
        //-------------------------Pregunta 12-------------------------
        foreach ($_POST['12'] as $valor) : $pregunta12 = $pregunta12 + $valor; endforeach;
        //-------------------------Pregunta 13-------------------------
        foreach ($_POST['13'] as $valor) : $pregunta13 = $pregunta13 + $valor; endforeach;
        
        $evaluacion = (($pregunta1+$pregunta2+$pregunta3+$pregunta4+$pregunta5+$pregunta6+$pregunta7+$pregunta8+$pregunta9+$pregunta10+$pregunta11+$pregunta12+$pregunta13)*100)/75;
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
        redirect('InformePractica.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
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
                <span>Informe de Prácticas Profesionales</span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form method="post" action="InformePractica.php?user=<?php echo $_GET['user']; ?>&id=<?php echo $_GET['id']; ?>">
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
                                    <td><div>Describe el lugar en el que se llevó a cabo la práctica profesional; justifica la relevancia del tema, los participantes, los objetivos y motivaciones; identifica las competencias que se desarrollaron durante la práctica; contiene una descripción concisa del informe.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="9"></div></td>
                                </tr>
                                <tr>
                                    <td><div >6</div></td>
                                    <td><div>Describe el lugar en el que se llevó a cabo la práctica profesional; justifica la mayoría
                                        de los siguientes aspectos: la relevancia del tema, los participantes, los objetivos y
                                        motivaciones; identifica las competencias que se desarrollaron durante la práctica;
                                        contiene una descripción concisa del informe.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="6"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Menciona el lugar en el que se llevó a cabo la práctica profesional; menciona pero no
                                        justifica la relevancia del tema, los participantes, los objetivos y motivaciones;
                                        identifica las competencias que se desarrollaron durante la práctica; menciona los
                                        apartados del informe.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>Menciona el lugar en el que se llevó a cabo la práctica profesional; describe el
                                        contenido del informe sin argumentar la relevancia del tema, los participantes, los
                                        objetivos y motivaciones.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">4. El plan de acción</label>
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
                                    <td><div>Contiene la descripción y focalización del problema, propósitos, revisión teórica,
                                        acciones o estrategias de solución.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="9"></div></td>
                                </tr>
                                <tr>
                                    <td><div >6</div></td>
                                    <td><div>Contiene la mayoría de los siguientes elementos: descripción y focalización del
                                        problema, propósitos, revisión teórica y las acciones o estrategias de solución.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="6"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Contiene la mención de una problemática sin focalizar ni profundizar en ella. Falta la
                                        mayoría de los siguientes elementos: propósitos, revisión teórica y acciones de
                                        solución.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>Contiene la mención de un problema y propone algunas acciones o estrategias para
                                        atender el problema.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">5. En el plan de acción, la ubicación temporal y espacial del trabajo</label>
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
                                    <td><div>Contiene análisis del contexto en el que se realiza la mejora, describe prácticas de
                                        interacción en el aula y las situaciones relacionadas con el aprendizaje que sean
                                        necesarias destacar por la naturaleza del problema.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="9"></div></td>
                                </tr>
                                <tr>
                                    <td><div >6</div></td>
                                    <td><div>Contiene una descripción general del contexto y describe algunas de las prácticas de
                                        interacción en el aula relacionadas con el aprendizaje que sean necesarias por la
                                        naturaleza del problema.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="6"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Contiene una descripción del contexto en el que se lleva a cabo la mejora.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>No contiene una ubicación temporal y espacial.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">6. En la descripción y análisis del desarrollo de la propuesta de mejora</label>
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
                                    <td><div>Se identifican los enfoques curriculares, las competencias, las secuencias de
                                        actividades, los recursos, los procedimientos de seguimiento y evaluación de la
                                        propuesta de mejoramiento.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="9"></div></td>
                                </tr>
                                <tr>
                                    <td><div >6</div></td>
                                    <td><div>Se identifican la mayoría de los siguientes aspectos: los enfoques curriculares, las
                                        competencias, las secuencias de actividades, los recursos y los procedimientos de
                                        seguimiento y evaluación de la propuesta de mejora.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="6"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Se basa principalmente en la descripción de secuencias de actividades y recursos
                                        empleaos en la propuesta de mejora.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>Se basa en una serie de juicios y valoraciones sobre la experiencia de implementación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">7. La evaluación de la propuesta</label>
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
                                    <td><div>Contiene una revisión detenida de los resultados obtenidos en cada una de las
                                        actividades realizadas. Brinda elementos para replantear las propuestas de mejora.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="9"></div></td>
                                </tr>
                                <tr>
                                    <td><div >6</div></td>
                                    <td><div>Contiene una revisión generalizada de los resultados obtenidos en cada una de las
                                        actividades realizadas. Permite que se infieran elementos para replantar las
                                        propuestas de mejora.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="6"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Contiene un juicio de los resultados obtenidos del desarrollo de la propuesta.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>No contiene evaluación de la propuesta.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">8. Las conclusiones y recomendaciones</label>
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
                                    <td><div>Identifican los aspectos que se mejoraron como los que aún requieren mayores
                                        niveles de explicación tomando como referencia los ejercicios de análisis y reflexión,
                                        las competencias desarrolladas y los temas que se abordaron en el trabajo.
                                        Puntualizan el alcance de la propuesta el alcance de la propuesta en función de los
                                        sujetos, el contexto, los enfoques, entre otros.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="9"></div></td>
                                </tr>
                                <tr>
                                    <td><div >6</div></td>
                                    <td><div>Identifican los aspectos que se mejoraron como los que aún requieren mayores
                                        niveles de explicación tomando como referencia algunos de los aspectos como: los
                                        ejercicios de análisis y reflexión, las competencias desarrolladas o los temas que se
                                        abordaron en el trabajo. Puntualizan el alcance de la propuesta. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="6"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Identifican únicamente los aspectos que se mejoraron tomando como referencia
                                        algunos aspectos como los ejercicios de análisis y reflexión y las competencias
                                        desarrolladas. El alcance de la propuesta queda implícito.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>Consiste en reflexiones generales sobre lo realizado y los logros obtenidos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">9. Los anexos</label>
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
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>Incluye la mayoría de los productos o materiales expuestos en el desarrollo, para que
                                        puedan ser utilizados para eventuales consultas.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>Incluye algunos productos o materiales expuestos en el desarrollo, para que puedan
                                        ser utilizados para eventuales consultas</div></td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>No contiene anexos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">10. Acerca de las citas y referencias</label>
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
                                    <td><div class="btn-group"><input type="radio" name="10[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>La mayoría de las referencias están citadas en el texto o bien aunque tenga todas,
                                        algunas no están citadas o referenciadas en un único estilo.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="10[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>Faltan más de 5 referencias de lo citado en el texto o viceversa o bien el estilo de
                                        redacción de las referencias no corresponde con el indicado por el asesor.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="10[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>No contiene listado de referencias o bien no se siguió un estilo único para su
                                        elaboración.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="10[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">11. Diseño</label>
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
                                    <td><div class="btn-group"><input type="radio" name="11[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>Al texto le faltan uno o dos elementos de lo solicitado en el formato: tipo de letra,
                                        tamaño de letra, interlineado, alineación, entre otros.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="11[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>Al texto le faltan entre 3 y 5 elementos solicitados en el formato: tipo de letra, tamaño
                                        de letra, interlineado, alineación, entre otros. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="11[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>Al texto le faltan más de 5 elementos solicitados en el formato: tipo de letra, tamaño de
                                        letra, interlineado, alineación, entre otros. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="11[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">12. Ortografía</label>
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
                                    <td><div class="btn-group"><input type="radio" name="12[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>El texto presenta de 3 a 5 errores ortográficos por página.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="12[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>El texto presenta de 6 a 8 errores ortográficos por página. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="12[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>El texto presenta más de 9 errores ortográficos por página. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="12[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">13. Citas y referencias en formato APA</label>
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
                                    <td><div class="btn-group"><input type="radio" name="13[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>Una o dos citas o referencias no están acorde al estilo APA</div></td>
                                    <td><div class="btn-group"><input type="radio" name="13[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>De tres a cinco citas o referencias no están acorde al estilo APA</div></td>
                                    <td><div class="btn-group"><input type="radio" name="13[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>Más de cinco citas o referencias no están acorde al estilo APA.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="13[]" value="0"></div></td>
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