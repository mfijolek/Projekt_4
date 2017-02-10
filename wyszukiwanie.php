<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Wyszukiwanie</title>
</head>
<?php

?>
<?php session_start(); ?>
<a href="index.php"><img src="obrazki/powrot.png" width="90" height="40"></a>
<body>
<?php
require("klasa.php");
function wyszukiwanie($tablica,$action)
{    
  $id = "brak";
    foreach($tablica as $index => $element)
    {
    $a=strtolower($element->name);
    $b=strtolower($action);  
    if($a == $b)
    {
      $id = $index;
    }
    //echo $id.'<br>';
    }
    return $id;
}
$urzadzenia1 = Urzadzenia::pobierz_wszystkie_elementy();
$action1=$_POST["pole1"];
$id_wyszukiwanie = wyszukiwanie($urzadzenia1,$action1);
?>
<br><table id="TABELA"><tr>
<td colspan="6" class="header">Wyszukane urzadzenie</td></tr>
<?php
$warunek1=$id_wyszukiwanie;

if ($id_wyszukiwanie == "brak" AND $id_wyszukiwanie != '0')
{
  echo '<td> <b>Nie ma takiego elementu</b></td>';
}  
else
{
  ?> 
  <table id="TABELA">
  <tr ><td id="pierwszy">Nazwa urzadzenia</td>
  <td id="pierwszy">Ilosc w magazynie</td>
  <td id="pierwszy"></td></tr>
  <?php
  $zmienna = $urzadzenia1[$id_wyszukiwanie];
  echo '<td>'.$zmienna->name.'</td>';
  if($zmienna->ilosc==0)
    echo '<td  id="wyroznienie">'.$zmienna->ilosc.'</td>';
  else 
    echo '<td>'.$zmienna->ilosc.'</td>';
  echo '<td>'.'<a href="karta.php?id='.$zmienna->id.'">Karta przedmiotu </a></td></tr>';
  $_SESSION['cofinj']='index.php'; //aby poprawnie si� cofa�o z katra.php
  ?></table><?php
}
?>
</body>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88469240-1', 'auto');
  ga('send', 'pageview');

</script>
</html>