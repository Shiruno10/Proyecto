<?php
include 'conexion_be.php';

$query = "SELECT * FROM usuarios ORDER BY fecha_creacion DESC"; 
$result = mysqli_query($conexion, $query); 
if ($result) { 
    while ($row = mysqli_fetch_assoc($result)) { 
        echo "<tr>"; 
        echo "<td>" . htmlspecialchars($row['id']) . "</td>"; 
        echo "<td>" . htmlspecialchars($row['nombre']) . "</td>"; 
        echo "<td>" . htmlspecialchars($row['apellido']) . "</td>"; 
        echo "<td>" . htmlspecialchars($row['correo']) . "</td>"; 
        echo "<td>" . htmlspecialchars($row['telefono']) . "</td>";
        echo "<td>" . htmlspecialchars($row['estado']) . "</td>"; 
        echo "<td>" . htmlspecialchars($row['id_roles']) . "</td>"; 
        echo "<td>"; 
        echo "<button onclick='eliminarUsuario(" . $row['id'] . ")'>Eliminar</button>"; 
        echo "<button onclick='mostrarFormularioEdicion(" . $row['id'] . ", \"" . htmlspecialchars($row['nombre']) . "\", \"" . htmlspecialchars($row['apellido']) . "\", \"" . htmlspecialchars($row['correo']) . "\", \"" . htmlspecialchars($row['telefono']) . "\", \"" . htmlspecialchars($row['id_roles']) . "\")'>Editar</button>"; 
        echo "</td>";
        echo "</tr>"; 
    } 
} else { 
    echo "Error al realizar la consulta: " . mysqli_error($conexion); 
} 

// Cerrar la conexión 
mysqli_close($conexion);
?>
