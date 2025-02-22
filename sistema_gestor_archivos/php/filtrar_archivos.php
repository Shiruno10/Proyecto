<?php
include 'conexion_be.php';

$filter = $_GET['filter'];

if ($filter === 'all') {
    $query = "SELECT * FROM archivos ORDER BY fecha_subida DESC";
} else {
    $filterArray = explode(',', $filter);
    $placeholders = implode(',', array_fill(0, count($filterArray), '?'));
    $query = "SELECT * FROM archivos WHERE tipo_archivo IN ($placeholders) ORDER BY fecha_subida DESC";
}

$stmt = $conexion->prepare($query);

if ($filter !== 'all') {
    $stmt->bind_param(str_repeat('s', count($filterArray)), ...$filterArray);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nombre_archivo']) . "</td>";
        echo "<td>" . htmlspecialchars($row['tipo_archivo']) . "</td>";
        echo "<td><a href='" . htmlspecialchars($row['ruta_archivo']) . "' target='_blank'>Ver Archivo</a></td>";
        echo "<td>" . htmlspecialchars($row['fecha_subida']) . "</td>";
        echo "<td>";
        echo "<button onclick='eliminarArchivo(" . $row['id'] . ")'>Eliminar</button>";
        echo " <button onclick='editarArchivo(" . $row['id'] . ")'>Editar</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "Error al realizar la consulta: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
