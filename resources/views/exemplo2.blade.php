<?php
use App\Libs\Canvas;
/*include('m2brimagem.class.php');
$arquivo	= $_GET['arquivo'];
$largura	= $_GET['largura'];
$altura		= $_GET['altura'];*/
//$path = '/' . $pasta . '/' . $arquivo;
if($pasta == "X")
$path = getcwd() . '\\storage\\' . $arquivo;
else
$path = getcwd() . '\\storage\\' . $pasta . '\\' . $arquivo;
//$path = public_path('/storage/'. $pasta . '/' . $arquivo);
//$path = '/teste.jpg';
//$path = '/storage/' . $pasta . '/' . $arquivo;
$img = new Canvas($path);
$img->redimensiona( $largura, $altura, 'crop' )
  ->grava();
exit;
?>