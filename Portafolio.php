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
        $pregunta14 = 0;
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
        //-------------------------Pregunta 13-------------------------
        foreach ($_POST['14'] as $valor) : $pregunta14 = $pregunta14 + $valor; endforeach;
        
        $evaluacion = (($pregunta1+$pregunta2+$pregunta3+$pregunta4+$pregunta5+$pregunta6+$pregunta7+$pregunta8+$pregunta9+$pregunta10+$pregunta11+$pregunta12+$pregunta13+$pregunta14)*100)/66;
        $query = "Update inducion SET ";
        $query .= "evaluacion='{$evaluacion}' ";
        $query .= "Where id='{$_GET['id']}'";
        if ($db->query($query)) {
            //sucess
            $session->msg('s', " Se Agrego correctamente la Evaluación ");
            redirect('Portafolio.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
        } else {
            //failed
            $session->msg('d', ' No Se Agrego correctamente la Evaluación ');
            redirect('Portafolio.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('Portafolio.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
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
                <span>Portafolio de Evidencias</span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form method="post" action="Portafolio.php?user=<?php echo $_GET['user']; ?>&id=<?php echo $_GET['id']; ?>">
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
                        <label for="evaluacion">3. La exposición de motivos</label>
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
                                    <td><div>Contiene las razones, argumentos y motivos por los que se selecciona la modalidad en
                                        cuestión y la(s) competencia(s) a demostrar.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>Contiene suficientes razones, argumentos y motivos por los que se selecciona la
                                        opción y la(s) competencia(s) a demostrar.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>Describe parcialmente las razones, argumentos y motivos por los que se selecciona la
                                        modalidad y la(s) competencia(s) a demostrar.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>No contiene exposición.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">4. La justificación</label>
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
                                    <td><div>Justifica sintéticamente la relevancia y pertinencia de la competencia en función del
                                        aprendizaje</div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>Justifica forma regular la relevancia y pertinencia de la competencia en función del
                                        aprendizaje.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>Justifica superficialmente la relevancia o la pertinencia de la competencia en función
                                        del aprendizaje.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>No contiene justificación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">5. Los propósitos</label>
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
                                    <td><div>Plantea los propósitos del portafolio de forma adecuada. Se entiende el qué y el para qué</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>Plantea los propósitos del portafolio de forma que el qué o el para qué no están del todo claros.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>Plantea superficialmente los propósitos del portafolio.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>No plantea propósitos</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">6. En el desarrollo, el portafolio</label>
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
                                    <td><div>Contiene las evidencias de aprendizaje que demuestran el nivel de logro y desempeño
                                        del estudiante en función de la(s) competencia(s) profesional(es) seleccionadas y la
                                        representatividad que tuvieron en el proceso de aprendizaje.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="9"></div></td>
                                </tr>
                                <tr>
                                    <td><div >6</div></td>
                                    <td><div>La mayoría de las evidencias de aprendizaje que contiene demuestran el nivel de logro
                                        y desempeño del estudiante en función de la(s) competencia(s) profesional(es)
                                        seleccionadas y la representatividad que tuvieron en el proceso de aprendizaje.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="6"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Son pocas las evidencias de aprendizaje que contiene que demuestran el nivel de
                                        logro y desempeño del estudiante en función de la(s) competencia(s) profesional(es)
                                        seleccionadas. y representatividad que tuvieron en el proceso de aprendizaje.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>Las evidencias de aprendizaje que contiene no demuestran el nivel de logro y
                                        desempeño del estudiante en función de la(s) competencia(s) profesional(es)
                                        seleccionadas ni la representatividad que tuvieron en el proceso de aprendizaje.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">7. La reflexión</label>
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
                                    <td><div>La reflexión gira en torno al aprendizaje logrado en cada evidencia y al desarrollo de la
                                        competencia seleccionada estableciendo una relación clara y directa con la descripción
                                        de la actividad y las emociones. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="9"></div></td>
                                </tr>
                                <tr>
                                    <td><div >6</div></td>
                                    <td><div>Se hace una reflexión regular sobre la actividad aprendizaje logrado en cada evidencia
                                        y al desarrollo de la competencia seleccionada estableciendo una relación implícita con
                                        la descripción de la actividad y las emociones.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="6"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Se hace una reflexión muy somera sobre la actividad aprendizaje logrado en cada
                                        evidencia y al desarrollo de la competencia lográndose percibir apenas la relación con
                                        la descripción de la actividad y las emociones.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>No contiene reflexión.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">8. La organización de las evidencias</label>
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
                                    <td><div>Se caracteriza porque se agrupan y organizan en distintos rubros y momentos considerando la relevancia y pertinencia.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="9"></div></td>
                                </tr>
                                <tr>
                                    <td><div >6</div></td>
                                    <td><div>Se caracteriza porque se agrupan y organizan en distintos rubros y momentos considerando la relevancia y pertinencia.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="6"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Se caracteriza por la falta de orden o categorización de los rubros y momentos al no considerar la relevancia y pertinencia de éstas.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>Carece de agrupación y orden respecto a los distintos rubros y momentos considerando la relevancia y pertinencia.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">9. Las conclusiones</label>
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
                                    <td><div>Expone los principales logros y fortalezas asociadas a la competencia, así como las
                                        áreas de mejora. Enfatiza acerca de los aportes de su trabajo y de los aspectos a
                                        considerar a lo largo de su trayectoria profesional.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="9"></div></td>
                                </tr>
                                <tr>
                                    <td><div >6</div></td>
                                    <td><div>Expone de forma indirecta los principales logros y fortalezas asociadas a la
                                        competencia, así como las áreas de mejora. Requiere fortalecer el énfasis acerca de
                                        los aportes de su trabajo y de los aspectos a considerar a lo largo de su trayectoria
                                        profesional.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="6"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3</div></td>
                                    <td><div>Expone parcialmente los principales logros y fortalezas del estudiante asociadas a la
                                        competencia, así como las áreas de mejora. No enfatiza acerca de los aportes de su
                                        trabajo y de los aspectos a considerar a lo largo de su trayectoria profesional.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>No contiene conclusiones o el texto que pretende serlo no corresponde en nada con la finalidad de dicho apartado. </div></td>
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
                        <label for="evaluacion">11. Los anexos</label>
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
                                    <td><div class="btn-group"><input type="radio" name="11[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>Incluye la mayoría de los productos o materiales expuestos en el desarrollo, para que
                                        puedan ser utilizados para eventuales consultas.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="11[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>Incluye algunos productos o materiales expuestos en el desarrollo, para que puedan
                                        ser utilizados para eventuales consultas</div></td>
                                    <td><div class="btn-group"><input type="radio" name="11[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>No contiene anexos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="11[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">12. Diseño</label>
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
                                    <td><div class="btn-group"><input type="radio" name="12[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>Al texto le faltan uno o dos elementos de lo solicitado en el formato: tipo de letra,
                                        tamaño de letra, interlineado, alineación, entre otros.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="12[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>Al texto le faltan entre 3 y 5 elementos solicitados en el formato: tipo de letra, tamaño
                                        de letra, interlineado, alineación, entre otros. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="12[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>Al texto le faltan más de 5 elementos solicitados en el formato: tipo de letra, tamaño de
                                        letra, interlineado, alineación, entre otros. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="12[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">13. Ortografía</label>
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
                                    <td><div class="btn-group"><input type="radio" name="13[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>El texto presenta de 3 a 5 errores ortográficos por página.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="13[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>El texto presenta de 6 a 8 errores ortográficos por página. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="13[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>El texto presenta más de 9 errores ortográficos por página. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="13[]" value="0"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">14. Citas y referencias en formato APA</label>
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
                                    <td><div class="btn-group"><input type="radio" name="14[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div >2</div></td>
                                    <td><div>Una o dos citas o referencias no están acorde al estilo APA</div></td>
                                    <td><div class="btn-group"><input type="radio" name="14[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1</div></td>
                                    <td><div>De tres a cinco citas o referencias no están acorde al estilo APA</div></td>
                                    <td><div class="btn-group"><input type="radio" name="14[]" value="1"></div></td>
                                </tr>
                                <tr>
                                    <td><div>0</div></td>
                                    <td><div>Más de cinco citas o referencias no están acorde al estilo APA.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="14[]" value="0"></div></td>
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