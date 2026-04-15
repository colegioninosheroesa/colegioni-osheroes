<?php
$destinatario = "informes@nh.edu.mx"; 
$asunto = "Nueva Solicitud de Admisión - Colegio Niños Héroes";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Datos del Alumno
    $alumno_nombre = $_POST["alumno_nombre"];
    $alumno_apellido1 = $_POST["alumno_apellido1"];
    $alumno_apellido2 = $_POST["alumno_apellido2"];
    $grado = $_POST["grado_aspira"];
    $ciclo = $_POST["ciclo_escolar"];

    // Datos del Tutor
    $tutor_nombre = $_POST["tutor_nombre"];
    $tutor_apellidos = $_POST["tutor_apellidos"];
    $tutor_email = $_POST["tutor_email"];
    $tutor_whatsapp = $_POST["tutor_whatsapp"];

    $contenido = "SOLICITUD DE INFORMES WEB\n";
    $contenido .= "----------------------------------\n";
    $contenido .= "DATOS DEL ALUMNO:\n";
    $contenido .= "Nombre: $alumno_nombre $alumno_apellido1 $alumno_apellido2\n";
    $contenido .= "Grado al que aspira: $grado\n";
    $contenido .= "Ciclo escolar: $ciclo\n\n";
    
    $contenido .= "DATOS DEL PADRE O TUTOR:\n";
    $contenido .= "Nombre: $tutor_nombre $tutor_apellidos\n";
    $contenido .= "Email: $tutor_email\n";
    $contenido .= "WhatsApp: $tutor_whatsapp\n";
    $contenido .= "----------------------------------\n";

    $headers = "From: Web Colegio <no-reply@nh.edu.mx>\r\n";
    $headers .= "Reply-To: $tutor_email\r\n";

    if (mail($destinatario, $asunto, $contenido, $headers)) {
        echo "<script>alert('Solicitud enviada con éxito. Pronto nos comunicaremos con usted.'); window.location.href='index.html';</script>";
    } else {
        echo "Error al enviar la solicitud.";
    }
}
?>