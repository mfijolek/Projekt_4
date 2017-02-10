<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Kategorie</title>
</head>
<?php 
session_start();
define('DB','sqlite:baza.db');
function usun_kategorie($id, $nazwa_bazy)                        //funkcja usuwania kategorii oraz elementow
{                                            
  $conn=new PDO(DB);                                   //otwarcie polaczenia z baza danych
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql='DELETE FROM '.$nazwa_bazy.' WHERE id='.$id.'';
  $st=$conn->prepare($sql);
  $st->execute();
  $conn=null;  
}
function edycja($zmienna, $id, $nazwa_bazy, $kolumna)                  //funkcja edycji kategorii oraz elementow
{      
  $conn=new PDO(DB);                                   //otwarcie polaczenia z baza danych
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql='UPDATE '.$nazwa_bazy.' SET '.$kolumna.'="'.$zmienna.'" WHERE id='.$id.'';
  $st=$conn->prepare($sql);
  $st->execute();
  $conn=null;
}
function form_kategorie($zmienna)                            // funkcja z formularzem edycji dla kategorii
{
  echo '<form method="POST" action="elementy.php">
  <tr><td><input type="text" name="edycja_kategorii" value="'.$zmienna->name.'" maxlength="32" size="10">
  <input type="hidden" name="id_edycja" value="'.$zmienna->id.'">
  <input type="submit" name="zatwierdz" value="Zatwierdz"></td>';
}
function form_elementy($zmienna, $kolumna)                        //funkcja z formulazem edycji dla elementow
{
  echo '<form method="POST" action="elementy.php?id='.$_GET['id'].'">
  <td><input type="text" name="edycja_elementu" value="'.$zmienna->$kolumna.'" maxlength="32" size="10">
  <input type="hidden" name="id_edycja_elem" value="'.$zmienna->id.'">
  <input type="hidden" name="kolumna" value="'.$kolumna.'">
  <input type="submit" name="zatwierdz" value="Zatwierdz"></td>';
}
function wyszukaj_kategorie($id, $zmienna1)
{
  foreach($zmienna1 as $index => $zmienna) 
{
  if($id==($zmienna->id))
  {
    $wynik=($zmienna->name);
  }
}
return $wynik;
}

if (empty($_SESSION['user']) AND empty($_SESSION['password']))
echo '<a href="index.php?action=logowanie"><img src="obrazki/zaloguj.png" width="90" height="35" border="1"></a>';
else
{
echo '<a href="index.php?action=wylogowanie"><img src="obrazki/wyloguj.png" width="90" height="35" border="1"></a>';
echo '<a href="index.php?action=zmianahasla"><img src="obrazki/zmiana_hasla.png" width="110" height="35" border="1"></a>';
echo '<a href="dodawanie.php"><img src="obrazki/dodaj.png" width="110" height="35" border="1"></a>';
echo '<p class="siteright"> Zalogowany uztkownik:<a id="uzytkownik">'.$_SESSION['user'].'</a></p>';
}
?>
<br><a href="index.php"><img src="obrazki/powrot.png" width="90" height="35" border="1"></a>


<body>
<?php
require("klasa.php");
$urzadzenia = Urzadzenia::pobierz_wszystkie();
$urzadzenia_kopia=$urzadzenia;
?>
<table id="TABELA">
<tr>
<td colspan="6" class="header">Dostepne kategorie:</td>
</tr>
<tr ><td id="pierwszy">Nazwa kategorii</td>
<td id="pierwszy"></td>
<?php 
if(isset($_SESSION['user']) AND isset($_SESSION['password']) AND isset($_SESSION['loginid'])) 
{
  echo '<td id="pierwszy">Czynnosc</td>';
}

  echo '</tr><br>';
  
foreach($urzadzenia as $index => $zmienna) 
{
  if(isset($_GET['action_edit']) AND $_GET['action_edit']=='edytuj' AND $_GET['id_edit']==($zmienna->id))
  {
    form_kategorie($zmienna);
  }
  else
    echo '<tr><td>'.$zmienna->name.'</td>';
  
  echo '<td>'.'<a href="elementy.php?id='.$zmienna->id.'">Rozwin kategorie </a></td>';
  
  if(isset($_SESSION['user']) AND isset($_SESSION['password']) AND isset($_SESSION['loginid']))
  {
    if(isset($_GET['action_edit']) AND $_GET['action_edit']=='edytuj' AND $_GET['id_edit']==($zmienna->id))
      echo '<td>'.'<a href="elementy.php?action=usun&id_usun='.$zmienna->id.'">usun</a> / <a href="elementy.php">anuluj edycje</a></td>';      
      
    else
      echo '<td>'.'<a href="elementy.php?action=usun&id_usun='.$zmienna->id.'">usun</a> / <a href="elementy.php?action_edit=edytuj&id_edit='.$zmienna->id.'">edytuj</a></td>';
  }
  echo '</tr>';
}

if(isset($_GET['action']) and $_GET['action']=='usun')
{
  usun_kategorie($_GET['id_usun'], 'kategoria');
  echo "usunieto kategorie o id=".$_GET['id_usun'];
  header('Location: elementy.php');
}

if(isset($_POST['edycja_kategorii']) and $_POST['zatwierdz']=='Zatwierdz')
{
  edycja($_POST['edycja_kategorii'], $_POST['id_edycja'], 'kategoria', 'name');
  echo "edytkowna kategorie o id=".$zmienna->id;
  header('Location: elementy.php');
}
?>
</table>
<?php
if(isset($_GET['id']))
{  
  $nazwa_kategorii=wyszukaj_kategorie($_GET['id'], $urzadzenia_kopia);
  $_SESSION['kategoria_nazwa']=$nazwa_kategorii;
  $urzadzenia1 = Urzadzenia::pobierz_wszystkie1();
  ?> 
  <table id="TABELA">
  <?php echo '<tr><td id="pierwszy">Urzadzenia w kategorii <font size="5"><b>'.$nazwa_kategorii.'</b></font></td>'; ?>
  <tr><td id="pierwszy">Nazwa urzadzenia</td>
  <td id="pierwszy">Ilosc w magazynie</td>
  <td id="pierwszy"></td>
  <?php       
  if(isset($_SESSION['user']) AND isset($_SESSION['password']) AND isset($_SESSION['loginid'])) 
    echo '<td id="pierwszy">Czynnosc</td>';
  echo '</tr>';      
  foreach($urzadzenia1 as $id => $zmienna) 
  {
    
    if(isset($_GET['action_elem']) AND $_GET['action_elem']=='edytuj' AND $_GET['id_edit_elem']==($zmienna->id))
    {
      form_elementy($zmienna, 'name');
    }
    else
      echo '<td>'.$zmienna->name.'</td>';
    
    if(isset($_GET['action_elem']) AND $_GET['action_elem']=='edytuj' AND $_GET['id_edit_elem']==($zmienna->id))
    {
      form_elementy($zmienna, 'ilosc');
    }    
    else
    {
      if($zmienna->ilosc==0)
        echo '<td  id="wyroznienie">'.$zmienna->ilosc.'</td>';
      else 
        echo '<td>'.$zmienna->ilosc.'</td>';
    }
    
    echo '<td>'.'<a href="karta.php?id='.$zmienna->id.'">Karta przedmiotu </a></td>';
    
    if(isset($_SESSION['user']) AND isset($_SESSION['password']) AND isset($_SESSION['loginid']))
    {
      if(isset($_GET['action_elem']) AND $_GET['action_elem']=='edytuj' AND $_GET['id_edit_elem']==($zmienna->id))
        echo '<td>'.'<a href="elementy.php?action_elem=usun1&id_usun_elem='.$zmienna->id.'">usun</a> / <a href="'.$_SESSION['cofnij'].'">anuluj edycje</a></td>';
      else
        echo '<td>'.'<a href="elementy.php?action_elem=usun1&id_usun_elem='.$zmienna->id.'">usun</a> / <a href="elementy.php?id='.$_GET['id'].'&action_elem=edytuj&id_edit_elem='.$zmienna->id.'">edytuj</a></td>';
    }
    echo '</tr>';
    $_SESSION['cofnij']='elementy.php?id='.$_GET['id'];                   //aby poprawnie si� cofa�o z katra.php
    //echo $_SESSION['cofnij'];
  }
  ?>
  </table>
  <?php
  echo '<td>'.'<a href="elementy.php"><img src="obrazki/zwin_kategorie.png" width="110" height="30" border="1"></a></td></tr>';
}
if(isset($_GET['action_elem']) and $_GET['action_elem']=='usun1')                 //usowanie elementu
{
  usun_kategorie($_GET['id_usun_elem'], 'element');
  echo "usunieto element o id=".$_GET['id_usun_elem'];
  header('Location: '.$_SESSION['cofnij'].'');
}  
if(isset($_POST['edycja_elementu']) and $_POST['zatwierdz']=='Zatwierdz')            //edycja elementu
{
  edycja($_POST['edycja_elementu'], $_POST['id_edycja_elem'], 'element', $_POST['kolumna']);
  echo "edytkowna kategorie o id=".$zmienna->id;
  header('Location: '.$_SESSION['cofnij'].'');
}
else
{
  //echo "nic";
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