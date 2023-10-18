<?php

// Configuración de base
$host = '127.0.0.1';
$usuario = 'root';
$contrasena = 'lupita02';
$base_de_datos = 'blog';

// Carpeta donde se guardará 
$archivo_exportacion = 'C:\xampp\htdocs\respaldos\respaldoblog.sql';

// Comando para exportar mysqldump
$comando = "mysqldump -h {$host} -u {$usuario} -p{$contrasena} {$base_de_datos} > {$archivo_exportacion}";

// Ejecución para exportar
exec($comando, $output, $return_var);

if ($return_var === 0) {
    echo "La exportación de la base de datos se ha completado con éxito. El archivo se encuentra en: {$archivo_exportacion}";
} else {
    echo "Ha ocurrido un error al exportar la base de datos. Error: " . implode(PHP_EOL, $output);
}

?>



