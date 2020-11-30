<?php

declare(strict_types=1);

function obtenerPdoConexionBD(): PDO
{
    $servidor = "localhost";
    $bd = "MiniFb";
    $identificador = "root";
    $contrasenna = "";
    $opciones = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$bd;charset=utf8", $identificador, $contrasenna, $opciones);
    } catch (Exception $e) {
        error_log("Error al conectar: " . $e->getMessage()); // El error se vuelca a php_error.log
        exit('Error al conectar'); //something a user can understand
    }

    return $conexion;
}

function obtenerUsuario(string $identificador, string $contrasenna): ?array
{
    // TODO Pendiente hacer.

    // "SELECT * FROM Usuario WHERE identificador=? AND contrasenna=?"

    // Conectar con BD, lanzar consulta, ver si viene 1 fila o ninguna...

    // Devolver una cosa u otra para que sepan (true/false).
    //return $rs[0];
    return ["id" => 17, "identificador" => "jlopez", ...];
}

function marcarSesionComoIniciada(array $arrayUsuario)
{
    // TODO Anotar en el post-it todos estos datos:
    // $_SESSION["id"] = ...
    // $_SESSION["identificador"] = ...
    // ...
}

function haySesionIniciada(): boolean
{
    // TODO Pendiente hacer la comprobación.

    // Está iniciada si isset($_SESSION["id"])

    return false;
}

function cerrarSesion()
{
    // TODO session_destroy() y unset de $_SESSION (por si acaso).
}

// (Esta función no se utiliza en este proyecto pero se deja por si se optimizase el flujo de navegación.)
// Esta función redirige a otra página y deja de ejecutar el PHP que la llamó:
function redireccionar(string $url)
{
    header("Location: $url");
    exit;
}

function syso(string $contenido)
{
    file_put_contents('php://stderr', $contenido . "\n");
}