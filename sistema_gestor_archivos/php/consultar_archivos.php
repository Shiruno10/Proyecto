<?php
include 'conexion_be.php';

$query = "SELECT * FROM archivos ORDER BY fecha_subida DESC"; 
$result = mysqli_query($conexion, $query); 
if ($result) { 
    while (
        $row = mysqli_fetch_assoc($result)) { 
            echo "<tr>"; 
            echo "<td>" . htmlspecialchars($row['id']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['nombre_archivo']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['tipo_archivo']) . "</td>"; 
            echo "<td><a href='" . htmlspecialchars($row['ruta_archivo']) . "' target='_blank'>Ver Archivo</a></td>"; 
            echo "<td>" . htmlspecialchars($row['fecha_subida']) . "</td>"; 
            echo "<td>";
            echo "<button onclick='descargarArchivo('" . $row['ruta_archivo'] . "')'>Descargar</button>";
            echo "<button onclick='eliminarArchivo(" . $row['id'] . ")'>Eliminar</button>"; 
            echo "<button onclick='editarArchivo(" . $row['id'] . ")'>Editar</button>"; 
            echo "</td>";
            echo "</tr>"; 
        } 
        } 
            else { 
                echo "Error al realizar la consulta: " . mysqli_error($conexion); } 
                // Cerrar la conexión 
mysqli_close($conexion);
?>