<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="row">
   

<?php
// session_start();
// if ($_SESSION['correo']==true) {


include 'conexion.php';


   
$sql = "SELECT b.name, b.publication, s.name AS  'sectionname'  FROM books b INNER JOIN sections s ON b.section = s.id";

$listadodept = mysqli_query($connection, $sql);


?>

<form action="admin.bookshop.php" method="GET">
<div class="column-2">
<?php
session_start();
    echo "<p>hola  {$_SESSION['nom_us']} </p>";
    ?>
</div>
<div class="column-2">
    <a href="logout.php"> <button class="boton_personalizado" type="button">Log Out</button></a>
    <!-- <a href="./logout.php"> <input type="button" value="logout"  class="boton_personalizado"></a> -->
</div>
<div class="column-1-flex" >
   
        <input type="text" name="nombre" placeholder="Nombre">
        <!-- <a href="./crudprofes.php" class="boton_personalizado" name="filtros" type="button">Filtrar</a> -->
       <a href="admin.bookshop.php"> <input type="submit" value="Filtrar" name="enviar" class="boton_personalizado"></a>

       <td class="boton"><a href="./admin.bookshop.php" class="btn btn-primary" name="volver" >quitar filtros</a></td>

    </form>
    <br>
</div>
<div class="mostrar_productos">
<?php
if (isset($_GET['nombre'])) {
$search=$_GET['nombre'];
$listadodept = mysqli_query($connection, $sql);
  $sql20 = "SELECT b.name, b.publication, s.name AS 'sectionname' FROM books b INNER JOIN sections s ON b.section = s.id WHERE b.name Like '%$search%'" ;
$listadodept1 = mysqli_query($connection, $sql20);

if (mysqli_num_rows( $listadodept1)==0) {
  ?>
<script>
alert ("No hay registros que coincidan con tus filtros")
            aviso('admin.bookshop.php');
            </script>


<?php
}else{


echo '<table  id="main-container"  >';
echo '<tr>';
echo '<th class="column-3">Titulo</th>';
echo '<th class="column-3">Publicación</th>';
echo '<th class="column-3">Sección</th>';

echo '</tr>';
foreach ($listadodept1 as $book) {
    echo '<tr>';
    echo "<td class='column-3'>{$book['name']}</td>";
    echo "<td class='column-3'>{$book['publication']}</td>";
    echo "<td class='column-3'>{$book['sectionname']}</td>";

    
   
    

 
}

echo '</table>';
}
}else {




    echo '<table id="main-container">';
    echo '<tr>';
    echo '<th class="column-3">Titulo</th>';
    echo '<th class="column-3">Publicación</th>';
    echo '<th class="column-3">Sección</th>';
    
    echo '</tr>';
    foreach ($listadodept as $books) {
        echo '<tr>';
        echo "<td class='column-3'>{$books['name']}</td>";
        echo "<td class='column-3'>{$books['publication']}</td>";
        echo "<td class='column-3'>{$books['sectionname']}</td>";
    
        
       
        
    
     
    }
    echo '</table>';
    




}
// }else{
//     //encabezado de redirección
//     header("location:index.html");
//  }
?>

</body>
</html>