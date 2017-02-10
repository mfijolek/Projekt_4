<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Karta przedmiotu</title>
</head>
<?php
session_start(); 
define('DB','sqlite:baza.db');
function edytuj_ilosc($zmienna, $id)                          //funkcja realizujaca pobieranie elementow z magazynu
{
  echo $zmienna;
  $conn=new PDO(DB);                                   //otwarcie polaczenia z baza danych
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql='UPDATE element SET ilosc='.$zmienna.' WHERE id='.$id.'';
  $st=$conn->prepare($sql);
  $st->execute();
  $conn=null;
  return $ilosc;
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
function form_elementy_1($zmienna, $kolumna)                        //funkcja z formulazem edycji dla elementow
{
  echo '<form method="POST" action="karta.php?id='.$_GET['id'].'">
  <input type="text" name="edycja_elementu" value="'.$zmienna->$kolumna.'" maxlength="32" size="10">
  <input type="hidden" name="id_edycja_elem" value="'.$zmienna->id.'">
  <input type="hidden" name="kolumna" value="'.$kolumna.'">
  <input type="submit" name="zatwierdz" value="Zatwierdz">';
}
function wyszukiwanie_kategorii ($id, $zmienna1)
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
function lista_rozwijalna ($zmienna, $kolumna)
{
      echo '<form method="POST" action="karta.php?id='.$_GET['id'].'">
      <select name="edycja_elementu1">';
      foreach($zmienna as $index => $zmienna)
      {
        echo '<option>'.$zmienna->name.'</option>';        
      }  
      echo '<input type="hidden" name="id" value="'.$_GET['id'].'">
      <input type="hidden" name="id_edycja_elem" value="'.$_GET['id'].'">
      <input type="hidden" name="kolumna" value="'.$kolumna.'">
      <input type="submit" name="zatwierdz" value="Zatwierdz"></select>
      </form>';
      
}
function lista_rozwijalna_plus($zmienna)
{
      foreach($zmienna as $index => $zmienna)
      {
        if(($zmienna->name)==$_POST['edycja_elementu1'])
        {
          echo $zmienna->name;
          echo $_POST['edycja_elementu1'];

          $_SESSION['edycja_elementu1']=($zmienna->id);
        }
      } 
}
function pole_tekstowe($zmienna, $kolumna)
{
  echo '<form method="POST" action="karta.php?id='.$_GET['id'].'">
  <textarea name="edycja_elementu" cols="10" rows="6">'.$zmienna->opis.'</textarea>
  <input type="hidden" name="id" value="'.$_GET['id'].'">
  <input type="hidden" name="id_edycja_elem" value="'.$_GET['id'].'">
  <input type="hidden" name="kolumna" value="'.$kolumna.'">
  <input type="submit" name="zatwierdz" value="Zatwierdz">
  </form>';
}

if (empty($_SESSION['user']) AND empty($_SESSION['password']))
echo '<a href="index.php?action=logowanie"><img src="obrazki/zaloguj.png" width="90" height="35" border="1"></a>';
else
{
echo '<a href="index.php?action=wylogowanie"><img src="obrazki/wyloguj.png" width="90" height="35" border="1"></a><p class="siteright"> Zalogowany uztkownik:<a id="uzytkownik">'.$_SESSION['user'].'</a></p>';
}
echo '<br><a href="'.$_SESSION['cofnij'].'"><img src="obrazki/powrot.png" width="90" height="35" border="1"></a>';
?><body> <?php

require("klasa.php");
$urzadzenia2 = Urzadzenia::pobierz_wszystkie2();
$kategorie_wszystkie = Urzadzenia::pobierz_wszystkie();
echo ' <table id="TABELA">
<tr ><td id="pierwszy">Nazwa kategorii</td>  
<td id="pierwszy">Nazwa urzadzenia</td>
<td id="pierwszy">Opis</td>
<td id="pierwszy">Ilosc w magazynie</td>
<td id="pierwszy">Ile wzietych</td></tr>';           

foreach($urzadzenia2 as $index => $zmienna) 
{
  //Nazwa kategorii
  $nazwa_kategorii=wyszukiwanie_kategorii(($zmienna->cid),$kategorie_wszystkie);
  echo '<tr><td>';
  if(isset($_GET['action_elem']) AND $_GET['action_elem']=='edytuj' AND $_GET['id_edit_elem']==($zmienna->id) AND isset($_GET['eb']))
  {
    //form_elementy_1($zmienna, 'cid', $nazwa_kategorii);
    lista_rozwijalna($kategorie_wszystkie, 'cid');
    //echo '<br>';
  }
  else
    echo $nazwa_kategorii.'<br>'; //zmien� to aby nie by�o na sztywno, tylko zale�ne od warto��i id.
  
  if(isset($_SESSION['user']) AND isset($_SESSION['password']) AND isset($_SESSION['loginid']))
  {
    if(isset($_GET['action_elem']) AND $_GET['action_elem']=='edytuj' AND $_GET['id_edit_elem']==($zmienna->id) AND isset($_GET['eb']))
      echo '<a href="karta.php?id='.$_GET['id'].'">anuluj edycje</a>';
    else
      echo '<a href="karta.php?id='.$_GET['id'].'&action_elem=edytuj&id_edit_elem='.$zmienna->id.'&eb=kategoria">edytuj</a>';
  }
    
  echo '</td><td>';
  //Nazwa urz�dzenia
  if(isset($_GET['action_elem']) AND $_GET['action_elem']=='edytuj' AND isset($_GET['ea']))
  {
    form_elementy_1($zmienna, 'name');
    echo '<br>';
  }
  else
    echo $zmienna->name.'<br>';
  
  if(isset($_SESSION['user']) AND isset($_SESSION['password']) AND isset($_SESSION['loginid']))
  {
    if(isset($_GET['action_elem']) AND $_GET['action_elem']=='edytuj' AND $_GET['id_edit_elem']==($zmienna->id) AND isset($_GET['ea']))
      echo '<a href="karta.php?id='.$_GET['id'].'">anuluj edycje</a>';
    else
      echo '<a href="karta.php?id='.$_GET['id'].'&action_elem=edytuj&id_edit_elem='.$zmienna->id.'&ea="nazwa">edytuj</a>';
  }  
  echo '</td><td>';
  
  //Opis urz�dzenia
  if(isset($_GET['action_elem']) AND $_GET['action_elem']=='edytuj' AND isset($_GET['ec']))
  {
    pole_tekstowe($zmienna, 'opis');
    echo '<br>';
  }
  else
  {
    echo $zmienna->opis;
    echo '<br>';
  }
    
  if(isset($_SESSION['user']) AND isset($_SESSION['password']) AND isset($_SESSION['loginid']))
  {
    if(isset($_GET['action_elem']) AND $_GET['action_elem']=='edytuj' AND $_GET['id_edit_elem']==($zmienna->id) AND isset($_GET['ec']))
      echo '<a href="karta.php?id='.$_GET['id'].'">anuluj edycje</a>';
    else
      echo '<a href="karta.php?id='.$_GET['id'].'&action_elem=edytuj&id_edit_elem='.$zmienna->id.'&ec="nazwa">edytuj</a>';
  }  
  echo '</td><td>';
  
  //Ilosc w magazynie
  if(isset($_GET['action_elem']) AND $_GET['action_elem']=='edytuj' AND $_GET['id_edit_elem']==($zmienna->id) AND isset($_GET['ed']))
  {
    //form_elementy_1($zmienna, 'cid', $nazwa_kategorii);
    form_elementy_1($zmienna, 'ilosc');
      
    //echo '<br>';
  }
  else
  {
    if($zmienna->ilosc==0)
      echo '<div id="wyroznienie">'.$zmienna->ilosc.'</div>';
    else 
      echo '<div>'.$zmienna->ilosc.'</div>';       //zmien� to aby nie by�o na sztywno, tylko zale�ne od warto��i id.
  }
  if(isset($_SESSION['user']) AND isset($_SESSION['password']) AND isset($_SESSION['loginid']))
  {
    if(isset($_GET['action_elem']) AND $_GET['action_elem']=='edytuj' AND $_GET['id_edit_elem']==($zmienna->id) AND isset($_GET['ed']))
      echo '<br><a href="karta.php?id='.$_GET['id'].'">anuluj edycje</a>';
    else
      echo '<a href="karta.php?id='.$_GET['id'].'&action_elem=edytuj&id_edit_elem='.$zmienna->id.'&ed=kategoria">edytuj</a>';
  }  
  echo '</td>';

  
  //Ile wzi�tych
  echo '<form method="POST" action="karta.php?action=usun&id='.$zmienna->id.'">
  <input type="hidden" name="ilosc_bazowa" value="'.$zmienna->ilosc.'">
  <td><input type="text" name="ilosc" maxlength="32">
  <input type="submit" name="zatwierdz" value="Zatwierdz">
  </td></tr>';
}

if(isset($_GET['action']) AND $_GET['action']=='usun')                //pobieranie elementow (czyli zmiana wartosci pola ilosc w bazie danych)
{
  if($_POST['ilosc']<=$_POST['ilosc_bazowa'] AND $_POST['ilosc']>0)
  {
    $id=$_GET['id'];
    $ilosc=$_POST['ilosc'];
    $zmienna=$_POST['ilosc_bazowa'];
    $zmienna=$zmienna-$ilosc;
    $ilosc_pobranych=edytuj_ilosc($zmienna, $id);    
    echo "<td>pobrano ".$ilosc_pobranych." elementow</td>";
    header('Location: karta.php?id='.$id.'');
  }
  else
    echo "Wpisano niepoprawna wartosc";
}

echo '</table>';

if(isset($_POST['edycja_elementu']) and $_POST['zatwierdz']=='Zatwierdz')            //edycja elementu
{
  edycja($_POST['edycja_elementu'], $_POST['id_edycja_elem'], 'element', $_POST['kolumna']);
  echo "edytkowna kategorie o id=".$_POST['edycja_elementu'];
  header('Location: karta.php?id='.$_GET['id'].'');
}
if(isset($_POST['edycja_elementu1']) and $_POST['zatwierdz']=='Zatwierdz')            //edycja elementu
{
  lista_rozwijalna_plus($kategorie_wszystkie);
  edycja($_SESSION['edycja_elementu1'], $_POST['id_edycja_elem'], 'element', $_POST['kolumna']);
  echo "edytkowna kategorie o id=".$_SESSION['edycja_elementu1'];
  header('Location: karta.php?id='.$_GET['id'].'');
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