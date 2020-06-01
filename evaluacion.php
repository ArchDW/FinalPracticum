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
        $pregunta15 = 0;
        //-------------------------Pregunta 1-------------------------
        foreach ($_POST['valor1'] as $valor) : $pregunta1 = $pregunta1 + $valor; endforeach;
        foreach ($_POST['valor2'] as $valor) : $pregunta1 = $pregunta1 + $valor; endforeach;
        foreach ($_POST['valor3'] as $valor) : $pregunta1 = $pregunta1 + $valor; endforeach;
        foreach ($_POST['valor4'] as $valor) : $pregunta1 = $pregunta1 + $valor; endforeach;
        foreach ($_POST['valor5'] as $valor) : $pregunta1 = $pregunta1 + $valor; endforeach;
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
        //-------------------------Pregunta 14-------------------------
        foreach ($_POST['14'] as $valor) : $pregunta14 = $pregunta14 + $valor; endforeach;
        //-------------------------Pregunta 15-------------------------
        foreach ($_POST['15'] as $valor) : $pregunta15 = $pregunta15 + $valor; endforeach;
        
        $evaluacion = (($pregunta1+$pregunta2+$pregunta3+$pregunta4+$pregunta5+$pregunta6+$pregunta7+$pregunta8+$pregunta9+$pregunta10+$pregunta11+$pregunta12+$pregunta13+$pregunta14+$pregunta15)*100)/75;
        $query = "Update habilidad SET ";
        $query .= "evaluacion='{$evaluacion}' ";
        $query .= "Where id='{$_GET['id']}'";
        if ($db->query($query)) {
            //sucess
            $session->msg('s', " Se Agrego correctamente la Evaluación ");
            redirect('evaluacion.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
        } else {
            //failed
            $session->msg('d', ' No Se Agrego correctamente la Evaluación ');
            redirect('evaluacion.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('evaluacion.php?user=' . $_GET['user'] . '&id=' . $_GET['id'], false);
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
                <span>Agregar Evaluación</span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form method="post" action="evaluacion.php?user=<?php echo $_GET['user']; ?>&id=<?php echo $_GET['id']; ?>">
                    <div class="form-group">
                        <label for="evaluacion">1. Indica el porcentaje del tiempo de clase dedicado a cada uno de los siguientes aspectos.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                                <tr>
                                    <th class="text-center"></th><th class="text-center">0</th><th class="text-center">10</th>
                                    <th class="text-center">20</th><th class="text-center">30</th><th class="text-center">40</th>
                                    <th class="text-center">50</th><th class="text-center">60</th><th class="text-center">70</th>
                                    <th class="text-center">80</th><th class="text-center">90</th><th class="text-center">100</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    <td class="text-center">Actividades aprendizaje</td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor1[]" value="0.0"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor1[]" value="0.1"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor1[]" value="0.2"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor1[]" value="0.3"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor1[]" value="0.4"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor1[]" value="0.5"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor1[]" value="0.6"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor1[]" value="0.7"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor1[]" value="0.8"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor1[]" value="0.9"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor1[]" value="1.0"></div></td>
                                </tr>
                                <tr>
                                    <td class="text-center">Actividades de organización/preparación</td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor2[]" value="0.0"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor2[]" value="0.1"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor2[]" value="0.2"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor2[]" value="0.3"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor2[]" value="0.4"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor2[]" value="0.5"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor2[]" value="0.6"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor2[]" value="0.7"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor2[]" value="0.8"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor2[]" value="0.9"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor2[]" value="1.0"></div></td>
                                </tr>
                                <tr>
                                    <td class="text-center">Explicaciones del (la) docente en formación</td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor3[]" value="0.0"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor3[]" value="0.1"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor3[]" value="0.2"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor3[]" value="0.3"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor3[]" value="0.4"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor3[]" value="0.5"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor3[]" value="0.6"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor3[]" value="0.7"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor3[]" value="0.8"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor3[]" value="0.9"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor3[]" value="1.0"></div></td>
                                </tr>
                                <tr>
                                    <td class="text-center">Revisión/retroalimentación/evaluación</td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor4[]" value="0.0"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor4[]" value="0.1"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor4[]" value="0.2"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor4[]" value="0.3"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor4[]" value="0.4"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor4[]" value="0.5"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor4[]" value="0.6"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor4[]" value="0.7"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor4[]" value="0.8"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor4[]" value="0.9"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor4[]" value="1.0"></div></td>
                                </tr>
                                <tr>
                                    <td class="text-center">Tiempos muertos</td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor5[]" value="1.0"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor5[]" value="0.9"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor5[]" value="0.8"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor5[]" value="0.7"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor5[]" value="0.6"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor5[]" value="0.5"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor5[]" value="0.4"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor5[]" value="0.3"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor5[]" value="0.2"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor5[]" value="0.1"></div></td>
                                    <td class="text-center"><div class="btn-group"><input type="radio" name="valor5[]" value="0.0"></div></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">2.	Los alumnos se encuentran atentos y concentrados realizando las actividades propuestas por el/la docente en formación.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <tbody>
                                <tr>
                                    <td><div>5  </div></td>
                                    <td><div>Bastante de acuerdo, más del 90% de los alumnos estuvieron atentos y concentrados en la realización de las actividades durante toda la clase.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="2[]" value="5"></div></td>
                                </tr>
                                <tr>
                                    <td><div >4  </div></td>
                                    <td><div>De acuerdo, solo alrededor del 80% de los alumnos estuvieron atentos y concentrados en la realización de las actividades durante toda la clase.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="2[]" value="4"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3  </div></td>
                                    <td><div>Parcialmente de acuerdo, solo alrededor del 60% de los alumnos estuvieron atentos y concentrados en la realización de las actividades durante toda la clase.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="2[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>2  </div></td>
                                    <td><div>En desacuerdo, solo alrededor del 40% de los alumnos estuvieron atentos y concentrados en la realización de las actividades durante toda la clase</div></td>
                                    <td><div class="btn-group"><input type="radio" name="2[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1  </div></td>
                                    <td><div>Bastante en desacuerdo, alrededor o menos del 20% de los alumnos estuvieron atentos y concentrados en la realización de las actividades durante toda la clase.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="2[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">3.	El/la docente en formación llama la atención de los alumnos que se distraen de la actividad que deberían estar realizando.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <tbody>
                                <tr>
                                    <td><div>5  </div></td>
                                    <td><div>Totalmente de acuerdo, lo hace en todos los casos que se presentaron durante la clase de manera consistente y sistemática.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="5"></div></td>
                                </tr>
                                <tr>
                                    <td><div >4  </div></td>
                                    <td><div>De acuerdo, lo hace en casi todos los casos que se presentaron durante la clase de manera consistente y sistemática</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="4"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3  </div></td>
                                    <td><div>Parcialmente de acuerdo, ya que lo hizo en varios casos pero no observó otros tantos que también requerían su intervención. Algo consistente.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>2  </div></td>
                                    <td><div>Ligeramente en desacuerdo, ya que fueron más los casos que omitió pero en un par de ellos intervino. Falta de consistencia y observación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1  </div></td>
                                    <td><div>En desacuerdo, ya que el docente en formación no llama la atención a quienes se distraen de las actividades de manera consistente.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="3[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">4.	Los alumnos a quienes se les llama la atención dejan de reincidir en el comportamiento señalado por el/la docente en formación.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <tbody>
                                <tr>
                                    <td><div>5  </div></td>
                                    <td><div>Bastante de acuerdo, después de la primera llamada de atención los alumnos se concentran en la actividad y ninguno reincide.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="5"></div></td>
                                </tr>
                                <tr>
                                    <td><div >4  </div></td>
                                    <td><div>De acuerdo, después de la primera llamada de atención casi todos los alumnos se concentran en la actividad y solo uno o dos reinciden.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="4"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3  </div></td>
                                    <td><div>Parcialmente de acuerdo, son necesarias más llamadas de atención para que algunos de los alumnos se concentraran en la actividad. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>2  </div></td>
                                    <td><div>En desacuerdo, el docente en formación llama la atención varias veces y son las mismas que reinciden los alumnos. </div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1  </div></td>
                                    <td><div>Bastante en desacuerdo, el docente en formación no reitera las llamadas de atención o no logra que casi la totalidad del grupo se concentre en la actividad.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="4[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">5.	Los alumnos culminan la(s) actividad(es) en el tiempo estipulado por el/la docente en formación.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <tbody>
                                <tr>
                                    <td><div>5  </div></td>
                                    <td><div>Bastante de acuerdo, todos los alumnos culminaron las actividades de aprendizaje en el tiempo estipulado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="5"></div></td>
                                </tr>
                                <tr>
                                    <td><div >4  </div></td>
                                    <td><div>De acuerdo, más del 90% de los alumnos culminaron las actividades de aprendizaje en el tiempo estipulado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="4"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3  </div></td>
                                    <td><div>Parcialmente de acuerdo, solo alrededor del 75% de los alumnos culminaron las actividades de aprendizaje en el tiempo estipulado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>2  </div></td>
                                    <td><div>En desacuerdo, solo alrededor del 50% de los alumnos culminaron las actividades de aprendizaje en el tiempo estipulado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1  </div></td>
                                    <td><div>Bastante en desacuerdo, solo alrededor del 25% de los alumnos culminaron las actividades de aprendizaje en el tiempo estipulado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="5[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">6.	La(s) actividad(es) de aprendizaje eran de la rigurosidad adecuada.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <tbody>
                                <tr>
                                    <td><div>5  </div></td>
                                    <td><div>Bastante de acuerdo, las actividades tenían el nivel de complejidad adecuado al desarrollo de los alumnos y al aprendizaje esperado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="5"></div></td>
                                </tr>
                                <tr>
                                    <td><div >4  </div></td>
                                    <td><div>De acuerdo, las actividades planteadas resultaron ser adecuadas al menos para el 90% de los alumnos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="4"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3  </div></td>
                                    <td><div>Parcialmente de acuerdo, las actividades resultaron ser demasiado fáciles/difíciles para al menos el 25% de los alumnos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>2  </div></td>
                                    <td><div>En desacuerdo, las actividades resultaron ser demasiado fáciles/difíciles para el 50% de los alumnos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1  </div></td>
                                    <td><div>Bastante en desacuerdo, las actividades resultaron ser demasiado fáciles/difíciles para el 75% o más de los alumnos.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="6[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">7.	Los estudiantes desarrollaron la(s) actividad(es) de acuerdo a la consigna/instrucciones del docente en formación.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <tbody>
                                <tr>
                                    <td><div>5  </div></td>
                                    <td><div>Bastante de acuerdo, el proceso y producto de los alumnos es como lo solicitó el docente en formación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="5"></div></td>
                                </tr>
                                <tr>
                                    <td><div >4  </div></td>
                                    <td><div>De acuerdo, el proceso y producto de al menos 90% de los alumnos es como lo solicitó el docente en formación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="4"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3  </div></td>
                                    <td><div>Parcialmente de acuerdo, el proceso y producto de solo el 75% de los alumnos es como lo solicitó el docente en formación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>2  </div></td>
                                    <td><div>En desacuerdo, el proceso y producto de solo el 50% de los alumnos es como lo solicitó el docente en formación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1  </div></td>
                                    <td><div>Bastante en desacuerdo, el proceso y producto de solo el 25% de los alumnos es como lo solicitó el docente en formación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="7[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">8.	La(s) actividad(es) realizadas por los alumnos los orientan a dominar el aprendizaje esperado.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <tbody>
                                <tr>
                                    <td><div>5  </div></td>
                                    <td><div>Bastante de acuerdo, la(s) actividad(es) eran congruentes para facilitar a los alumnos el dominio del aprendizaje esperado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="5"></div></td>
                                </tr>
                                <tr>
                                    <td><div >4  </div></td>
                                    <td><div>De acuerdo, casi la totalidad de la(s) actividad(es) eran congruentes para facilitar el dominio del aprendizaje esperado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="4"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3  </div></td>
                                    <td><div>Parcialmente de acuerdo, solo el 75% de las actividades o de su diseño eran congruentes para facilitar el dominio del aprendizaje esperado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>2  </div></td>
                                    <td><div>En desacuerdo, solo el 50% de las actividades o de su diseño eran congruentes para facilitar el dominio del aprendizaje esperado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1  </div></td>
                                    <td><div>Bastante en desacuerdo, solo alguna(s) actividad(es) eran congruentes para facilitar el dominio del aprendizaje esperado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="8[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">9.	Los alumnos emplearon materiales/recursos adecuados para facilitar el dominio del aprendizaje esperado.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <tbody>
                                <tr>
                                    <td><div>5  </div></td>
                                    <td><div>Bastante de acuerdo, emplearon materiales/recursos específicos que facilitaron en gran medida el dominio del aprendizaje esperado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="5"></div></td>
                                </tr>
                                <tr>
                                    <td><div >4  </div></td>
                                    <td><div></div>De acuerdo, emplearon materiales/recursos adaptables que facilitaron en gran medida el dominio del aprendizaje esperado.</td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="4"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3  </div></td>
                                    <td><div>Parcialmente de acuerdo, emplearon materiales/recursos con una ligera relación con el aprendizaje esperado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>2  </div></td>
                                    <td><div>En desacuerdo, emplearon materiales/recursos pero sin que facilitaran el dominio del aprendizaje esperado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1  </div></td>
                                    <td><div>Bastante en desacuerdo, no emplearon otros materiales/recursos además de libro de texto y cuaderno de notas.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="9[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">10.	Los alumnos emplearon materiales/recursos suficientes para dominar el aprendizaje esperado.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <tbody>
                                <tr>
                                    <td><div>5  </div></td>
                                    <td><div>Bastante de acuerdo, los materiales/recursos empleados fueron suficientes para que los alumnos dominaran el aprendizaje esperado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="10[]" value="5"></div></td>
                                </tr>
                                <tr>
                                    <td><div >4  </div></td>
                                    <td><div>De acuerdo, los materiales/recursos empleados fueron suficientes para que los alumnos dominaran el aprendizaje esperado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="10[]" value="4"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3  </div></td>
                                    <td><div>Parcialmente de acuerdo, algunos materiales/recursos empleados permitieron el dominio del aprendizaje esperado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="10[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>2  </div></td>
                                    <td><div>En desacuerdo, ninguno de los materiales/recursos empleados influyeron en el dominio del aprendizaje esperado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="10[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1  </div></td>
                                    <td><div>Bastante en desacuerdo, no se emplearon materiales/recursos para facilitar el dominio del aprendizaje esperado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="10[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">11.	Los alumnos aplicaron/utilizaron/pusieron a prueba el nuevo aprendizaje.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <tbody>
                                <tr>
                                    <td><div>5  </div></td>
                                    <td><div>Bastante de acuerdo, los alumnos participaron en actividades para aplicar, utilizar o poner a prueba el nuevo aprendizaje en situaciones diferentes al planteamiento inicial.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="11[]" value="5"></div></td>
                                </tr>
                                <tr>
                                    <td><div >4  </div></td>
                                    <td><div>De acuerdo, los alumnos  participaron en actividades en las que aplicaron, utilizaron o pusieron a prueba el nuevo aprendizaje en situaciones o contextos similares al inicial.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="11[]" value="4"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3  </div></td>
                                    <td><div>Parcialmente de acuerdo, los alumnos participaron en actividades en las que practicaron o ejercitaron el nuevo aprendizaje.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="11[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>2  </div></td>
                                    <td><div>En desacuerdo, los alumnos realizaron actividades en las que solo se llegaron a niveles de conocimiento y análisis del nuevo aprendizaje.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="11[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1  </div></td>
                                    <td><div>Bastante en desacuerdo, los alumnos no realizaron actividades para aplicar o utilizar el nuevo aprendizaje.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="11[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">12.	Los alumnos cuentan con referentes, ejemplos o modelos del desempeño que se espera de ellos en la actividad o producto.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <tbody>
                                <tr>
                                    <td><div>5  </div></td>
                                    <td><div>Bastante de acuerdo, los alumnos cuentan con referentes visuales (gráficos, modelos), descriptivos (texto con cualidades) y permanentes que destacan las características del producto o actividad por realizar.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="12[]" value="5"></div></td>
                                </tr>
                                <tr>
                                    <td><div >4  </div></td>
                                    <td><div>De acuerdo, los alumnos cuentan con referentes visuales o descriptivos de manera permanente que destacan las características del producto o actividad por realizar.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="12[]" value="4"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3  </div></td>
                                    <td><div>Parcialmente de acuerdo, los alumnos saben que existe un ejemplo del trabajo o producto a realizar o de sus características y preguntan al docente para conocerlo o recordarlo.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="12[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>2  </div></td>
                                    <td><div>En desacuerdo, los alumnos no cuentan con ejemplos o modelos específicos solo con la descripción oral de las características del producto o actividad.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="12[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1  </div></td>
                                    <td><div>Bastante en desacuerdo, los alumnos no cuentan con ejemplos, modelos o descriptores de ningún tipo.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="12[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">13.	La retroalimentación que reciben los alumnos les permite conocer su desempeño y lo que necesitan hacer o reforzar para adquirir el aprendizaje esperado y que su desempeño sea destacado.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <tbody>
                                <tr>
                                    <td><div>5  </div></td>
                                    <td><div>Bastante de acuerdo, la retroalimentación recibida es específica en la descripción del desempeño y sugiere claramente lo que necesitan reforzar o realizar para adquirir el aprendizaje esperado y que su desempeño sea destacado.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="13[]" value="5"></div></td>
                                </tr>
                                <tr>
                                    <td><div >4  </div></td>
                                    <td><div>De acuerdo, la retroalimentación recibida es específica en la descripción del desempeño y sugiere claramente cómo se puede mejorar el desempeño.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="13[]" value="4"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3  </div></td>
                                    <td><div>Parcialmente de acuerdo, la retroalimentación recibida es una descripción del desempeño sin que esté enfocado en la mejora.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="13[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>2  </div></td>
                                    <td><div>En desacuerdo, la retroalimentación recibida consiste en dar a conocer un puntaje o calificación sin que el alumno conozca las características de su desempeño.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="13[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1  </div></td>
                                    <td><div>Bastante en desacuerdo, los alumnos no reciben retroalimentación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="13[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">14.	Todos los alumnos recibieron retroalimentación como grupo/equipo.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <tbody>
                                <tr>
                                    <td><div>5  </div></td>
                                    <td><div>Bastante de acuerdo, más del 90% de los alumnos recibieron retroalimentación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="14[]" value="5"></div></td>
                                </tr>
                                <tr>
                                    <td><div >4  </div></td>
                                    <td><div>De acuerdo, solo alrededor del 80% de los alumnos recibieron retroalimentación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="14[]" value="4"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3  </div></td>
                                    <td><div>Parcialmente de acuerdo, solo alrededor del 60% de los alumnos recibieron retroalimentación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="14[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>2  </div></td>
                                    <td><div>En desacuerdo, solo alrededor del 40% de los alumnos recibieron retroalimentación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="14" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1  </div></td>
                                    <td><div>Bastante en desacuerdo, alrededor o menos del 20% de los alumnos recibieron retroalimentación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="14[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group">
                        <label for="evaluacion">15.	Todos los alumnos recibieron retroalimentación individual.</label>
                        <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                            <tbody>
                                <tr>
                                    <td><div>5  </div></td>
                                    <td><div>Bastante de acuerdo, más del 90% de los alumnos recibieron retroalimentación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="15[]" value="5"></div></td>
                                </tr>
                                <tr>
                                    <td><div >4  </div></td>
                                    <td><div>De acuerdo, solo alrededor del 80% de los alumnos recibieron retroalimentación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="15[]" value="4"></div></td>
                                </tr>
                                <tr>
                                    <td><div>3  </div></td>
                                    <td><div>Parcialmente de acuerdo, solo alrededor del 60% de los alumnos recibieron retroalimentación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="15[]" value="3"></div></td>
                                </tr>
                                <tr>
                                    <td><div>2  </div></td>
                                    <td><div>En desacuerdo, solo alrededor del 40% de los alumnos recibieron retroalimentación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="15[]" value="2"></div></td>
                                </tr>
                                <tr>
                                    <td><div>1  </div></td>
                                    <td><div>Bastante en desacuerdo, alrededor o menos del 20% de los alumnos recibieron retroalimentación.</div></td>
                                    <td><div class="btn-group"><input type="radio" name="15[]" value="1"></div></td>
                                </tr>
                            </tbody>   
                        </table>    
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="add_evaluacion" class="btn btn-primary">Guardar</button>
                        <a href="EvaluacionClase.php?user=<?php echo $_GET['user']; ?>" class="btn btn-default btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>