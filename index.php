<?php
include 'conexion.php';

$sql = "SELECT * FROM programas";
$resultado = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $comentario = $_POST['comentario'];

    $insertar = "INSERT INTO opiniones(nombre, comentario)
                 VALUES('$nombre', '$comentario')";

    $conn->query($insertar);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Portal de Apoyo Estudiantil</title>

<link rel="icon" type="image/jpg" href="DGTY.jpg">
<link rel="stylesheet" href="estilos.css">
</head>

<body>

<header>
    <img src="logo.jpg" alt="Logo CBTIS" class="logo">

    <h1>Portal de Apoyo Estudiantil</h1>
    <h2>Centro de Bachillerato Tecnológico Industrial y de Servicios No.165</h2>
    <h3>Leona Vicario</h3>
</header>

<nav>
    <ul>
        <li><a href="#academico">Académico</a></li>
        <li><a href="#salud">Salud</a></li>
        <li><a href="#cultura">Cultura</a></li>
        <li><a href="#emprendimiento">Emprendimiento</a></li>
    </ul>
</nav>

<section>
    <center><h2> PROPOSITO DE LA PAGINA </h2></center>

<p>Este portal tiene como propósito brindar información clara y accesible sobre los programas,
 actividades y servicios de apoyo disponibles para los estudiantes del CBTIS 165, con el fin de 
 facilitar su desarrollo académico, cultural y estudiantil.</p>
</section>

<main>

    <section id="academico" class="card apoyo">
        <h2>Apoyo Académico</h2>
        <p><strong>SINATA:</strong> Programa de la DGETI que brinda acompañamiento académico...</p>
        <p><strong>PRONAFOLE:</strong> Estrategia educativa que promueve la lectura...</p>
    </section>

    <section id="salud" class="card salud">
        <h2>Bienestar y Salud</h2>
        <p><strong>FOMALASA:</strong> Programa de salud integral...</p>
    </section>

    <section id="cultura" class="card cultura">
        <h2>Desarrollo Cultural</h2>
        <p><strong>ECALE:</strong> Actividades culturales...</p>
        <p><strong>AMA DGETI:</strong> Cuidado del medio ambiente...</p>
    </section>

    <section id="emprendimiento" class="card emprendimiento">
        <h2>Emprendimiento y Talento</h2>
        <p><strong>MEEMS:</strong> Emprendimiento estudiantil...</p>
        <p><strong>CLUBES:</strong> Actividades extracurriculares...</p>
    </section>

    <section class="card apoyo">
        <h2>Apoyo Psicológico</h2>
        <p>Servicio de orientación emocional...</p>
    </section>

    <section class="card salud">
        <h2>Seguro Estudiantil</h2>
        <p>Atención médica básica en caso de accidentes...</p>
    </section>

    <section class="card cultura">
        <h2>Eventos Escolares</h2>
        <p>Concursos, ferias y actividades escolares...</p>
    </section>

    <section>
        <h2>Tabla de Programas</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Programa</th>
                <th>Descripción</th>
                <th>Área</th>
                <th>Requisitos</th>
            </tr>

            <?php while($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['nombre_programa']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>
                <td><?php echo $fila['area_impacto']; ?></td>
                <td><?php echo $fila['requisitos']; ?></td>
            </tr>
            <?php } ?>

        </table>
    </section>

    <!-- 🔴 FORMULARIO MODIFICADO -->
    <section>
        <h2>Deja tu opinión</h2>

        <form method="POST" onsubmit="mostrarMensaje();">

            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Turno:</label>
            <select>
                <option>Matutino</option>
                <option>Vespertino</option>
            </select>

            <label>Semestre:</label>
            <select>
                <option>1°</option>
                <option>2°</option>
                <option>3°</option>
                <option>4°</option>
                <option>5°</option>
                <option>6°</option>
            </select>

            <label>Especialidad CBTis 165:</label>
            <select>
                <option>Programación</option>
                <option>Ofimática</option>
                <option>Contabilidad</option>
                <option>Logística</option>
                <option>Electricidad</option>
                <option>Laboratorista Clínico</option>
            </select>

            <label>Opinión:</label>
            <textarea name="comentario" rows="4" required></textarea>

            <button type="submit">Enviar</button>

            <p id="mensaje" style="display:none; color:green; font-weight:bold; margin-top:10px;">
                ✔ Enviado y recibido correctamente :D
            </p>

        </form>
    </section>

</main>

<footer>
    <p>Desarrollado por: Romero Luna Jesús Yael - 2026</p>
    <p>CBTIS 165 "Leona Vicario"</p>
</footer>

<script>
function mostrarMensaje(){
    document.getElementById("mensaje").style.display = "block";
}
</script>

</body>
</html>