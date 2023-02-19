<?php require_once('Connections/prueba.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_prueba, $prueba);
$query_personal = "SELECT * FROM persona";
$personal = mysql_query($query_personal, $prueba) or die(mysql_error());
$row_personal = mysql_fetch_assoc($personal);
$totalRows_personal = mysql_num_rows($personal);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Personal</title>
</head>

<body>
<table border="1">
  <tr>
    <td>cedula</td>
    <td>fecha</td>
    <td>asunto</td>
    <td>primer_nombre</td>
    <td>segundo_nombre</td>
    <td>primer_apellido</td>
    <td>segundo_apellido</td>
    <td>fijo</td>
    <td>celular</td>
    <td>direccion</td>
    <td>barrio</td>
    <td>descripcion</td>
    <td>Eliminar</td>
	<td>Modificar</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_personal['cedula']; ?></td>
      <td><?php echo $row_personal['fecha']; ?></td>
      <td><?php echo $row_personal['asunto']; ?></td>
      <td><?php echo $row_personal['primer_nombre']; ?></td>
      <td><?php echo $row_personal['segundo_nombre']; ?></td>
      <td><?php echo $row_personal['primer_apellido']; ?></td>
      <td><?php echo $row_personal['segundo_apellido']; ?></td>
      <td><?php echo $row_personal['fijo']; ?></td>
      <td><?php echo $row_personal['celular']; ?></td>
      <td><?php echo $row_personal['direccion']; ?></td>
      <td><?php echo $row_personal['barrio']; ?></td>
      <td><?php echo $row_personal['descripcion']; ?></td>
      <td>Eliminar</td>
	  <td>Modificar</td>

    </tr>
    <?php } while ($row_personal = mysql_fetch_assoc($personal)); ?>
</table>
<h2><a href="registro.php">Insertar Registro</a></h2>
</body>
</html>
<?php
mysql_free_result($personal);
?>
