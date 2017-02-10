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
function lista_rozwijalna ($zmienna)
{
  echo '<select name="cid">';
  foreach($zmienna as $index => $zmienna)
  {
    echo '<option>'.$zmienna->name.'</option>';        
  }  
  echo '</select>';
      
}
function lista_rozwijalna_plus($tablica)
{
  foreach($tablica as $index => $zmienna)
  {
  if($_POST['cid']==($zmienna->name))
  {
    $_SESSION['name_to_cid']=($zmienna->id);
    //echo 'wynik='.$_SESSION['name_to_cid'];
  }
  }
}
function wyszukiwanie_kategorii($tablica)
{  
  
  foreach($tablica as $index => $zmienna)
  {
    if($_POST['name']==($zmienna->name))
    {
      $wynik=($zmienna->name);
      return $wynik;
    }
  }
  
}
?>
<body>
<?php
if (empty($_SESSION['user']) AND empty($_SESSION['password']))
echo '<a href="index.php?action=logowanie"><img src="obrazki/zaloguj.png" width="90" height="35" border="1"></a><br>';
else
{
echo '<a href="index.php?action=wylogowanie"><img src="obrazki/wyloguj.png" width="90" height="35" border="1"></a><p class="siteright"> Zalogowany uztkownik:<a id="uzytkownik">'.$_SESSION['user'].'</a></p>';
//echo '<br><div class="siteleft"><a href="index.php?action=zmianahasla">Zmiena hasla</a></div><br>';
}
?><a href="index.php"><img src="obrazki/powrot.png" width="90" height="35" border="1"></a><?php
if(isset($_SESSION['user']) AND isset($_SESSION['password']) AND isset($_SESSION['loginid']))
{

  require("klasa.php");
  $kategorie_wszystkie = Urzadzenia::pobierz_wszystkie();
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {  
  echo '<center>';
    if (isset($_POST['ilosc']))
    {
      if(empty($_POST['cid']) or empty($_POST['name']) or empty($_POST['opis']) or empty($_POST['ilosc']))
      {
        echo 'wszystkie pola musz byc uzupelnione';
      }
      else
      {
      lista_rozwijalna_plus($kategorie_wszystkie);
      $nowy_element = new Urzadzenia($_POST);
      $nowy_element->dodaj_element();
      echo "Dodano element<br>";
      }
    }
    else
    {    
      $sprawdzenie=wyszukiwanie_kategorii($kategorie_wszystkie);
      if($_POST['name']==$sprawdzenie)
      {
        echo "taka kategoria juz istnieje prosze wybrac inna";
      }
      else
      {
      $nowy_element = new Urzadzenia($_POST);    
      $nowy_element->dodaj_kategorie();
      echo "Dodano kategorie<br>";
      }
    }
    echo '</center>';
  }
  else
  {
  ?> 
  <table align="center"><tr><td align="right" >
  <h1>Dodawanie kategorii</h1>
  <form method="post" action="dodawanie.php">
  nazwa: <input type="text" name="name"/><br>
  <input type="submit" value="Dodaj">&nbsp;
  </form>
  </td>
  <td width="150">
  </td>
  <td align="right" >
    <h1>Dodawanie elementu</h1>
    <form method="post" action="dodawanie.php">
    kategoria:<?php lista_rozwijalna($kategorie_wszystkie); ?><br>
    nazwa:<input type="text" name="name"/><br>
    opis:<textarea name="opis" cols="22" rows="6"></textarea><br>
    ilosc:<input type="number" name="ilosc" min="0"/><br>    
    <input type="submit" value="Dodaj">&nbsp;
    </form>
  </td></tr>
  </table>
  <?php
  }
}
else
{
  echo "nie masz uprawnien, dostep tylko dla zalogowanych";
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