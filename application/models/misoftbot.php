<?php
$method = $_SERVER['REQUEST_METHOD'];

$usuario = "id12870618_wp_3a2f14b29b04b1e262d8c672f84cf682";
$password = "@)h-FgaaeRnFG0Ow";
$servidor = "localhost";
$basededatos = "id12870618_wp_3a2f14b29b04b1e262d8c672f84cf682";
$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db( $conexion, $basededatos ) or die ( "No se ha podido conectar a la base de datos" );

if($method == 'POST'){
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $intent = $json->queryResult->intent->displayName;
	$cadenaSesion = $json->queryResult->outputContexts[0]->name;
	$valores = explode("/", $cadenaSesion);
	$idSesion = $valores[4];
	$siExisteSesion="";
	$puntuacion=0;
	$conclusion="";
	$nivelAfectacion="";
    switch ($intent) {
        case '1_Sintomas_Dolor':
            $consulta = "SELECT * FROM registro_covid WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	        while ($columna = mysqli_fetch_array( $resultado ))
        	{
        		$siExisteSesion =$columna['id_dialogflow'];
        	}
        	
            if ($siExisteSesion == "")
            {
                $consulta = "INSERT INTO registro_covid (id_registro, id_dialogflow, sintomas_dolor_cuerpo, sintomas_escalofrios, sintomas_tos, sintomas_diarrea, sintomas_dolor_cabeza, sintomas_dolor_garganta, sintomas_fiebre, sintomas_olfato, sintomas_respirar, sintomas_fatiga, sintomas_viajado, sintomas_area_afectada, sintomas_contacto_directo, fecha_hora)
VALUES (NULL, '$idSesion', '', '', '', '', '', '', '', '', '', '', '', '', '', CURRENT_TIMESTAMP)";
            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha salido mal en la consulta a la base de datos");
            }

            $respuestaSiguiente = 
			array
			    (
					array(
					    "platform" => "FACEBOOK",
						"quickReplies" => array
						(
						    "title" => "*¿Estás teniendo dolor de cuerpo y malestar general?* 🥴",
						    "quickReplies" => array
						    (
						    "Si",
						    "No"
						    )
						)
					)
				);
            break;

        case '2_Sintomas_Escalofrios':
            $respuestaSiguiente = 
			array
			    (
					array(
					    "platform" => "FACEBOOK",
						"quickReplies" => array
						(
						    "title" => "*¿Estás teniendo escalofríos?* 😖",
						    "quickReplies" => array
						    (
						    "Si",
						    "No"
						    )
						)
					)
				);
			
			$siDolorCuerpo = $json->queryResult->parameters->siDolorCuerpo;
			$noDolorCuerpo = $json->queryResult->parameters->noDolorCuerpo;
			
			$consulta = "UPDATE registro_covid SET sintomas_dolor_cuerpo = '$siDolorCuerpo$noDolorCuerpo' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
			
            break;

        case '3_Sintomas_Tos':
            $respuestaSiguiente = 
			array
			    (
					array(
					    "platform" => "FACEBOOK",
						"quickReplies" => array
						(
						    "title" => "*¿Estás teniendo tos o escurrimiento nasal?* 🤧",
						    "quickReplies" => array
						    (
						    "Si",
						    "No"
						    )
						)
					)
				);
			
			$siEscalofrios = $json->queryResult->parameters->siEscalofrios;
			$noEscalofrios = $json->queryResult->parameters->noEscalofrios;
			
			$consulta = "UPDATE registro_covid SET sintomas_escalofrios = '$siEscalofrios$noEscalofrios' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
			
            break;
            
        case '4_Sintomas_Diarrea':
            $respuestaSiguiente = 
			array
			    (
					array(
					    "platform" => "FACEBOOK",
						"quickReplies" => array
						(
						    "title" => "*¿Estás teniendo diarrea?* 💩",
						    "quickReplies" => array
						    (
						    "Si",
						    "No"
						    )
						)
					)
				);
			
			$siTos = $json->queryResult->parameters->siTos;
			$noTos = $json->queryResult->parameters->noTos;
			
			$consulta = "UPDATE registro_covid SET sintomas_tos = '$siTos$noTos' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
			
            break;
            
        case '5_Sintomas_Dolor_Cabeza':
            $respuestaSiguiente = 
			array
			    (
					array(
					    "platform" => "FACEBOOK",
						"quickReplies" => array
						(
						    "title" => "*¿Estás teniendo dolores de cabeza?* 🤯",
						    "quickReplies" => array
						    (
						    "Si",
						    "No"
						    )
						)
					)
				);
			
			$siDiarrea = $json->queryResult->parameters->siDiarrea;
			$noDiarrea = $json->queryResult->parameters->noDiarrea;
			
			$consulta = "UPDATE registro_covid SET sintomas_diarrea = '$siDiarrea$noDiarrea' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
			
            break;
            
        case '6_Sintomas_Dolor_Garganta':
            $respuestaSiguiente = 
			array
			    (
					array(
					    "platform" => "FACEBOOK",
						"quickReplies" => array
						(
						    "title" => "*¿Estás teniendo dolor de garganta?*",
						    "quickReplies" => array
						    (
						    "Si",
						    "No"
						    )
						)
					)
				);
			
			$siDolorCabeza = $json->queryResult->parameters->siDolorCabeza;
			$noDolorCabeza = $json->queryResult->parameters->noDolorCabeza;
			
			$consulta = "UPDATE registro_covid SET sintomas_dolor_cabeza = '$siDolorCabeza$noDolorCabeza' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
			
            break;
            
        case '7_Sintomas_Fiebre':
            $respuestaSiguiente = 
			array
			    (
					array(
					    "platform" => "FACEBOOK",
						"quickReplies" => array
						(
						    "title" => "*¿Estás teniendo fiebre (más de 37.8 °C)?* 🤒",
						    "quickReplies" => array
						    (
						    "Si",
						    "No"
						    )
						)
					)
				);
			
			$siDolorGarganta = $json->queryResult->parameters->siDolorGarganta;
			$noDolorGarganta = $json->queryResult->parameters->noDolorGarganta;
			
			$consulta = "UPDATE registro_covid SET sintomas_dolor_garganta = '$siDolorGarganta$noDolorGarganta' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
			
            break;
            
        case '8_Sintomas_Olfato':
            $respuestaSiguiente = 
			array
			    (
					array(
					    "platform" => "FACEBOOK",
						"quickReplies" => array
						(
						    "title" => "*¿Haz perdido el olfato?* 👃🏻",
						    "quickReplies" => array
						    (
						    "Si",
						    "No"
						    )
						)
					)
				);
			
			$siFiebre = $json->queryResult->parameters->siFiebre;
			$noFiebre = $json->queryResult->parameters->noFiebre;
			
			$consulta = "UPDATE registro_covid SET sintomas_fiebre = '$siFiebre$noFiebre' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
			
            break;
            
        case '9_Sintomas_Respirar':
            $respuestaSiguiente = 
			array
			    (
					array(
					    "platform" => "FACEBOOK",
						"quickReplies" => array
						(
						    "title" => "*¿Estás teniendo dificultad para respirar?* 😧",
						    "quickReplies" => array
						    (
						    "Si",
						    "No"
						    )
						)
					)
				);
			
			$siOlfato = $json->queryResult->parameters->siOlfato;
			$noOlfato = $json->queryResult->parameters->noOlfato;
			
			$consulta = "UPDATE registro_covid SET sintomas_olfato = '$siOlfato$noOlfato' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
			
            break;
            
        case '10_Sintomas_Fatiga':
            $respuestaSiguiente = 
			array
			    (
					array(
					    "platform" => "FACEBOOK",
						"quickReplies" => array
						(
						    "title" => "*¿Estás experimentando fatiga o te sientes sin ganas de nada?* 😓",
						    "quickReplies" => array
						    (
						    "Si",
						    "No"
						    )
						)
					)
				);
			
			$siRespirar = $json->queryResult->parameters->siRespirar;
			$noRespirar = $json->queryResult->parameters->noRespirar;
			
			$consulta = "UPDATE registro_covid SET sintomas_respirar = '$siRespirar$noRespirar' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
			
            break;
            
        case '11_Sintomas_Viajado':
            $respuestaSiguiente = 
			array
			    (
					array(
					    "platform" => "FACEBOOK",
						"quickReplies" => array
						(
						    "title" => "*¿Has viajado en los últimos 14 días?* ✈️🧳",
						    "quickReplies" => array
						    (
						    "Si",
						    "No"
						    )
						)
					)
				);
			
			$siFatiga = $json->queryResult->parameters->siFatiga;
			$noFatiga = $json->queryResult->parameters->noFatiga;
			
			$consulta = "UPDATE registro_covid SET sintomas_fatiga = '$siFatiga$noFatiga' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
			
            break;
            
        case '12_Sintomas_Area_Afectada':
            $respuestaSiguiente = 
			array
			    (
					array(
					    "platform" => "FACEBOOK",
						"quickReplies" => array
						(
						    "title" => "*¿Crees o sabes si haz estado en un área afectada por Covid-19?* 😷🦠",
						    "quickReplies" => array
						    (
						    "Si",
						    "No"
						    )
						)
					)
				);
			
			$siviajado = $json->queryResult->parameters->siviajado;
			$noviajado = $json->queryResult->parameters->noviajado;
			
			$consulta = "UPDATE registro_covid SET sintomas_viajado = '$siviajado$noviajado' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
			
            break;
            
        case '13_Sintomas_Contacto_Directo':
            $respuestaSiguiente = 
			array
			    (
					array(
					    "platform" => "FACEBOOK",
						"quickReplies" => array
						(
						    "title" => "*¿Haz estado en contacto directo o cuidando a algún paciente positivo de Covid-19?* 😷🦠",
						    "quickReplies" => array
						    (
						    "Si",
						    "No"
						    )
						)
					)
				);
			
			$siAreaAfectada = $json->queryResult->parameters->siAreaAfectada;
			$noAreaAfectada = $json->queryResult->parameters->noAreaAfectada;
			
			$consulta = "UPDATE registro_covid SET sintomas_area_afectada = '$siAreaAfectada$noAreaAfectada' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
			
            break;
            
        case '14_Sintomas_Finalizado':
			
			$siContactoDirecto = $json->queryResult->parameters->siContactoDirecto;
			$noContactoDirecto = $json->queryResult->parameters->noContactoDirecto;
			
			$consulta = "UPDATE registro_covid SET sintomas_contacto_directo = '$siContactoDirecto$noContactoDirecto' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	        
	        $consultaTodo = "SELECT * FROM registro_covid WHERE id_dialogflow='".$idSesion."'";
	        $resultadoTodo = mysqli_query( $conexion, $consultaTodo ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	        
	        while ($row = mysqli_fetch_array( $resultadoTodo ))
        	{
        		$dolorCuerpo = $row['sintomas_dolor_cuerpo'];
        		$escalofrios = $row['sintomas_escalofrios'];
        		$tos = $row['sintomas_tos'];
        		$diarrea = $row['sintomas_diarrea'];
        		$dolorCabeza = $row['sintomas_dolor_cabeza'];
        		$dolorGarganta = $row['sintomas_dolor_garganta'];
        		$fiebre = $row['sintomas_fiebre'];
        		$olfato = $row['sintomas_olfato'];
        		$respirar = $row['sintomas_respirar'];
        		$fatiga = $row['sintomas_fatiga'];
        		$viajado = $row['sintomas_viajado'];
        		$areaAfectada = $row['sintomas_area_afectada'];
        		$contactoDirecto = $row['sintomas_contacto_directo'];
        		$fechaHora = $row['fecha_hora'];
        		
        		if($dolorCuerpo == "Si")
        		{
        		    $puntuacion++;
        		}
        		
        		if($escalofrios == "Si")
        		{
        		    $puntuacion++;
        		}
        		
        		if($tos == "Si")
        		{
        		    $puntuacion++;
        		}
        		
        		if($diarrea == "Si")
        		{
        		    $puntuacion++;
        		}
        		
        		if($dolorCabeza == "Si")
        		{
        		    $puntuacion++;
        		}
        		
        		if($dolorGarganta == "Si")
        		{
        		    $puntuacion++;
        		}
        		
        		if($fiebre == "Si")
        		{
        		    $puntuacion=$puntuacion+2;
        		}
        		
        		
        		if($olfato == "Si")
        		{
        		    $puntuacion++;
        		}
        		
        		if($respirar == "Si")
        		{
        		    $puntuacion++;
        		}
        		
        		if($fatiga == "Si")
        		{
        		    $puntuacion++;
        		}
        		
        		if($viajado == "Si")
        		{
        		    $puntuacion=$puntuacion+2;
        		}
        		
        		if($areaAfectada == "Si")
        		{
        		    $puntuacion=$puntuacion+2;
        		}
        		
        		if($contactoDirecto == "Si")
        		{
        		    $puntuacion=$puntuacion+2;
        		}
        		
        		if($puntuacion <= 6)
        		{
        		    $nivelAfectacion="*Poco probable*";
        		    $conclusion = "Tienes un *riesgo muy bajo de estar contagiado*, pero recuerda que los síntomas aparecen a los 14 días después del contagio, por lo que cualquier persona aparentemente sana podría contagiarte. *Evita salir de casa y mantén tu mente ocupada*.

*Es importante no acudir al hospital ❌🏥 si no tienes los síntomas de coronavirus, ya que al acudir, corres el riesgo de contagiarte* 😷🦠";
        		}
        		if($puntuacion > 6 && $puntuacion <= 10)
        		{
        		    $nivelAfectacion="*Riesgoso.*";
        		    $conclusion = "Tienes un *riesgo considerable de estar contagiado*, pero quizá no sea Covid-19. Si los malestares persisten, te recomendamos acudir a tu médico más cercano para realizar una revisión exhaustiva.

Hidrátate, conserva medidas de higiene, *dale seguimiento a tus síntomas*, sólo acude al médico y *reevalúa en 2 días.* Evita el contacto con cualquier otro miembro de la familia y *procura el uso de tapabocas al interior y exterior de tu hogar.*";
        		}
        		if($puntuacion > 12)
        		{
        		    $nivelAfectacion="*Muy probable*";
        		    $conclusion = "Tienes un *ALTO RIESGO de estar contagiado*. Llama *inmediatamente* a los servicios médicos para realizar detección para SARS-COV2 (COVID19) desde tu celular o teléfono fijo sin costo al *800-00-44-800* (Unidad de Inteligencia Epidemiológica y Sanitaria de México).
Si estás en otro país, investiga el número de atención de emergencias, no dejes pasar más tiempo.";
        		}
        		    

$complementoFinal="

*Ayúdanos a compartir este cuestionario y salvar muchas vidas, juntos podemos con la pandemia #QuedateEnCasa.*

Comparte con tus amigos y familiares este link de nuestro messenger *m.me/testcovid19misoft* para que también se realicen el test.
Escríbenos a *misoftcln@gmail.com* o al WhatsApp *6643624665*
Si estás interesado en más información acerca de nosotros o de nuestros servicios de desarrollo de software, chatbots, tiendas en línea, marketing digital, posicionamiento web o cualquier servicio digital escribe: *'Me interesa'*
Muchas gracias por tu valioso tiempo, que tengas un excelente día, cuídate mucho y no olvides compartirme!";
        	}
			
            $respuestaSiguiente = 
			array
			    (
					array(
						"text" => array
						(
							"text" => array
    						(
    							"Haz terminado el test, éstas fueron tus respuestas: 
*Dolor de cuerpo o malestar general:* $dolorCuerpo 🥴
*Escalofríos:* $escalofrios 😖
*Tos:* $tos 🤧
*Diarrea:* $diarrea 💩
*Dolor de cabeza:* $dolorCabeza 🤯
*Dolor de garganta:* $dolorGarganta
*Fiebre:* $fiebre 🤒
*Falta de olfato:* $olfato 👃🏻
*Dificultad para respirar:* $respirar 😧
*Fatiga:* $fatiga 😓
*Haz viajado:* $viajado ✈️🧳
*Haz estado en área afectada:* $areaAfectada 😷🦠
*Haz tenido contacto directo con alguien que tiene Covid-19:* $contactoDirecto 😷🦠

Tu resultado fue: $nivelAfectacion $conclusion $complementoFinal"
    						)
						)
					)
				);
            break;
            
            case 'interes_servicio':
                
            $servicio = $json->queryResult->parameters->any;
            
            $consulta = "SELECT * FROM interesados_covid WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	        while ($columna = mysqli_fetch_array( $resultado ))
        	{
        		$siExisteSesion =$columna['id_dialogflow'];
        	}
        	
            if ($siExisteSesion == "")
            {
                $consulta = "INSERT INTO interesados_covid (id_registro, id_dialogflow, interes, nombre, telefono, correo, fecha_hora)
VALUES (NULL, '$idSesion', '$servicio', '', '', '', CURRENT_TIMESTAMP)";
            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha salido mal en la consulta a la base de datos");
            }

            $respuestaSiguiente = 
			array
			    (
					array(
						"text" => array
						(
							"text" => array
    						(
    							"*¿Cuál es su nombre?*"
    						)
						)
					)
				);
            break;
            
            case 'interes_nombre':
                
            $nombre = $json->queryResult->parameters->any;
			
			$consulta = "UPDATE interesados_covid SET nombre = '$nombre' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

            $respuestaSiguiente = 
			array
			    (
					array(
						"text" => array
						(
							"text" => array
    						(
    							"*¿Cuál es su número telefónico?*"
    						)
						)
					)
				);
            break;
            
            case 'interes_telefono':
                
            $telefono = $json->queryResult->parameters->any;
			
			$consulta = "UPDATE interesados_covid SET telefono = '$telefono' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

            $respuestaSiguiente = 
			array
			    (
					array(
						"text" => array
						(
							"text" => array
    						(
    							"*¿Cuál es su correo electrónico?*"
    						)
						)
					)
				);
            break;
            
            case 'interes_final':
                
            $correo = $json->queryResult->parameters->any;
			
			$consulta = "UPDATE interesados_covid SET correo = '$correo' WHERE id_dialogflow='".$idSesion."'";
	        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

            $respuestaSiguiente = 
			array
			    (
					array(
						"text" => array
						(
							"text" => array
    						(
    							"Muchas gracias por proporcionarnos su información, nos pondremos en contacto con usted a la brevedad. Que tenga un excelente día."
    						)
						)
					)
				);
            break;
    }
    
    mysqli_close( $conexion );
    $response = new \stdClass();
    //$response->fulfillmentText = $idSesion;
    $response->fulfillmentMessages = $respuestaSiguiente;
    $response->source = "webhook";
    echo json_encode($response);
}
else
{
    echo "Método no permitido";
}
?>