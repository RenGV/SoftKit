<?php

require("../db/index.php");


if(isset($_POST['login'])){
    try{
        $clave = $_POST['claveTrabajador'];
        $correo = $_POST['correoTrabajador'];
        $connection = Database::connect();
        $sqlLogin = "SELECT * FROM usuario WHERE correo = :correo AND clave = :clave";
        $login = $connection->prepare($sqlLogin);
        $login->bindParam(":correo",$correo,PDO::PARAM_STR);
        $login->bindParam(":clave",$clave,PDO::PARAM_STR);
        $login->execute();
        $login=$login->fetchAll(PDO::FETCH_ASSOC);
        if(empty($login)){
            header("Location: /softkit/pages");
        }else{
            $login = $login[0];
            session_start();
            $_SESSION['rol'] = $login['rol'];
            $_SESSION['nombre'] = $login['nombre'];
            $_SESSION['login'] = true;
            header("Location: /softkit/pages");
        }
    }catch(PDOException $e){
        console.log($e);
    }
}


if(isset($_GET['logout'])){
    session_start();
    session_destroy();
    header("Location: /softkit/pages/");
}


if(isset($_POST['register-worker'])){
    try{
        $clave = $_POST['claveTrabajador'];
        $nombre = $_POST['nombreTrabajador'];
        $rol = $_POST['rolTrabajador'];
        $correo = $_POST['correoTrabajador'];
        $connection = Database::connect();
        $sqlNuevoTrabajador = "INSERT INTO `usuarios` (`correo`,`clave`,`rol`,`nombre`) VALUES (:correo,:clave,:rol,:nombre)";
        $nuevoTrabajador = $connection->prepare($sqlNuevoTrabajador);
        $nuevoTrabajador->bindParam(":correo",$correo,PDO::PARAM_STR);
        $nuevoTrabajador->bindParam(":clave",$clave,PDO::PARAM_STR);
        $nuevoTrabajador->bindParam(":rol",$rol,PDO::PARAM_STR);
        $nuevoTrabajador->bindParam(":nombre",$nombre,PDO::PARAM_STR);
        $nuevoTrabajador->execute();
        header("Location: /softkit/pages/nuevo-trabajador.php");
    }catch(PDOException $e){

    }
}


if(isset($_POST['register-product'])){
    try{
        $nombre = $_POST['nombreProducto'];
        $precio = $_POST['precioProducto'];
        $descripcion = $_POST['descripcionProducto'];
        $stock = $_POST['stockProductos'];
        $codigo = $_POST['codigoCompra'];
        $proveedor = $_POST['proveedorKit'];
        $fecha_ingreso = $_POST['fechaIngreso'];
        $fecha_vencimiento = $_POST['fechaVencimiento'];
        $connection = Database::connect();
        $sqlNuevo = "INSERT INTO productos (precio,descripcion,fecha_ingreso,fecha_vencimiento,codigo_compra,proveedor,nombre,stock) VALUES (:precio,:descrip,:fec_ing,:fec_ven,:codigo,:proveedor,:nombre,:stock)";
        $nuevoProduct = $connection->prepare($sqlNuevo);
        $nuevoProduct->bindParam(":precio",$precio,PDO::PARAM_STR);
        $nuevoProduct->bindParam(":descrip",$descripcion,PDO::PARAM_STR);
        $nuevoProduct->bindParam(":fec_ing",$fecha_ingreso,PDO::PARAM_STR);
        $nuevoProduct->bindParam(":fec_ven",$fecha_vencimiento,PDO::PARAM_STR);
        $nuevoProduct->bindParam(":codigo",$codigo,PDO::PARAM_STR);
        $nuevoProduct->bindParam(":proveedor",$proveedor,PDO::PARAM_STR);
        $nuevoProduct->bindParam(":nombre",$nombre,PDO::PARAM_STR);
        $nuevoProduct->bindParam(":stock",$stock,PDO::PARAM_STR);
        $nuevoProduct->execute();
        header("Location: /softkit/pages/almacen.php");
    }catch(PDOException $e){

    }
}


function createBackup(){
    try{
        return true;
    }catch(PDOException $e){
        return false;
    }
}


function propuestaDistribucion(){
    try{
        return true;
    }catch(PDOException $e){
        return false;
    }
}


function listAllKits(){
    try{
        $connection=Database::connect();
        $sql="SELECT k.id, CONCAT(u.nombre,' ',u.apellido) as usuario, (SELECT COUNT(*) FROM kit_x_producto kp 
        WHERE kp.idKit = k.id) as productos, k.total, k.fechaCreacion FROM kit k JOIN usuario u WHERE u.id = k.usuario AND k.estado = 1";
        $listKits=$connection->prepare($sql);
        $listKits->execute();
        $listKits=$listKits->fetchAll(PDO::FETCH_ASSOC);
        return $listKits;
    }catch(PDOException $e){
        debug_to_console($e);
    }
}

function getKitDetails($id){
    try{
        $connection=Database::connect();
        $sql="SELECT k.id, CONCAT(u.nombre,' ',u.apellido) as usuario, (SELECT COUNT(*) FROM kit_x_producto kp 
        WHERE kp.idKit = k.id) as productos, p.descripcion, p.precioUnitario, kp.cantidad, kp.subtotal, k.total, k.fechaCreacion FROM kit k 
        JOIN usuario u JOIN producto p JOIN kit_x_producto kp WHERE u.id = k.usuario AND k.id = kp.idKit AND kp.idProducto = p.id AND k.estado = 1 AND k.id = 2";
        $kitDetails=$connection->prepare($sql);
        $kitDetails->execute();
        $kitDetails=$kitDetails->fetchAll(PDO::FETCH_ASSOC);
        return $kitDetails;
    }catch(PDOException $e){
        debug_to_console($e);
    }
}


function listAllProcessedKits(){
    try{
        $connection=Database::connect();
        $sql="SELECT k.id, CONCAT(u.nombre,' ',u.apellido) as usuario, (SELECT COUNT(*) FROM kit_x_producto kp 
        WHERE kp.idKit = k.id) as productos, k.total, k.fechaCreacion FROM kit k JOIN usuario u WHERE u.id = k.usuario AND k.estado = 2";
        $listKits=$connection->prepare($sql);
        $listKits->execute();
        $listKits=$listKits->fetchAll(PDO::FETCH_ASSOC);
        return $listKits;
    }catch(PDOException $e){
        debug_to_console($e);
    }
}


function listAllProducts(){
    try{
        $connection=Database::connect();
        $sql="SELECT * FROM producto ORDER BY id DESC";
        $listKits=$connection->prepare($sql);
        $listKits->execute();
        $listKits=$listKits->fetchAll(PDO::FETCH_ASSOC);
        return $listKits;
    }catch(PDOException $e){
        debug_to_console($e);
    }
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

?>