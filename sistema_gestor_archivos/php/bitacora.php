<?php
            // Conexión a la base de datos
            include 'conexion_be.php';

            // Consultar los registros de la bitácora
            $query = "SELECT * FROM bitacora ORDER BY fecha_hora DESC";
            $result = mysqli_query($conexion, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['usuario_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['accion']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['descripcion']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['fecha_hora']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "Error al realizar la consulta: " . mysqli_error($conexion);
            }

            mysqli_close($conexion);

            ?>

