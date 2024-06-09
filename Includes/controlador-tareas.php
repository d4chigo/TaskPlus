<?php
    session_start(); 
    require "../Includes/obtener.php";

    // Verificar si IdCliente está configurado en la sesión
    if(!isset($_SESSION['IdCliente'])){
        echo '<div class="alert alert-danger" role="alert">Error: IdCliente no está configurado en la sesión</div>';
        exit; 
    }

    if(isset($_POST["btninsertar"])){
        $des_tarea = $_POST['des-tarea'];
        $titulo = $_POST['titulo'];
        $estado = $_POST['mi_menu']; 

        if(!empty($des_tarea) && !empty($titulo)){
            try {
                require "../Conexion/conexion.php";

                $sql = "INSERT INTO Tarea (Titulo, Estado, Descripcion, IdCliente) VALUES (:titulo, :estado, :descripcion, :idCliente)";
                $stmt = $base->prepare($sql);

                
                $stmt->bindParam(':titulo', $titulo);
                $stmt->bindParam(':estado', $estado);
                $stmt->bindParam(':descripcion', $des_tarea);
                $stmt->bindParam(':idCliente', $idCliente);

                // Ejecutar la consulta
                $stmt->execute();

                echo '<script>
                alert("Tarea Registrada");
                window.location.href = "../Paginas/inicio.php";
                </script>';
            } catch (PDOException $e) {
                echo '<div class="alert alert-danger" role="alert">Error en la inserción: ' . $e->getMessage() . '</div>';
            }
        } else {
            echo '
                <script>
                    alert("Campos vacíos")
                    window.location.href = "../Paginas/insertar.php";
                </script>
            ';
        }
    }
?>