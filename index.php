<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Projekt ZTI</title>
</head>
<?php session_start(); ?>
<body>
<?php

if (empty($_SESSION['user']) AND empty($_SESSION['password']))
echo '<a href="index.php?action=logowanie"><img src="obrazki/zaloguj.png" width="90" height="35" border="1"></a>';
else
{
echo '<a href="index.php?action=wylogowanie"><img src="obrazki/wyloguj.png" width="90" height="35" border="1"></a>';
echo '<a href="index.php?action=zmianahasla"><img src="obrazki/zmiana_hasla.png" width="110" height="35" border="1"></a>';
echo '<a href="dodawanie.php"><img src="obrazki/dodaj.png" width="110" height="35" border="1"></a>';
echo '<p class="siteright"> Zalogowany uztkownik:<a id="uzytkownik">'.$_SESSION['user'].'</a></p>';
}
date_default_timezone_set('Europe/Warsaw');

if(isset($_GET['action'])) //sprawdzenie czy s� jakie� dane przesy�ane przez action w linku
{
switch($_GET["action"])
{
  case "logowanie":
  {
    ?>
    <br><a href="index.php"><img src="obrazki/powrot.png" width="90" height="35" border="1"></a><br>
    <center><form method="POST" action="logowanie.php">
    <table cellpadding="0" cellspacing="0" width="180">
    <tr><td><br></td></tr>
    <tr><td width="50">Login:</td><td><input type="text" name="login" maxlength="32"></td></tr>
    <tr><td width="50">Haslo:</td><td><input type="password" name="haslo" maxlength="32"></td></tr>
    <tr><td align="center" colspan="2"><br><input type="image" name="zaloguj" src="obrazki/zaloguj.png" value="zaloguj" width="90" height="40"><br></td></tr></center></table>
    <?php
    break;
  }
  case "wylogowanie":
  {
    if (isset($_SESSION['user']) AND isset($_SESSION['password']))
    {
    session_unset();
    session_destroy();
    header('Location: index.php?action=wylogowanie');
    }
    else
    {
    }  
    echo '<br><a href="index.php"><img src="obrazki/powrot.png" width="90" height="35" border="1"></a><br><center>wylogowales sie <br> aby sie zalogowac wybierz ZALOGUJ</center>';
    
    break;
  }
  case "123qwe":
  {
    if (empty($_SESSION['user']) AND empty($_SESSION['password']))
    {
      echo "Zostales wylogowany lub sie niezalogowales";  
    }
    else 
    {
      echo '<br><div class="siteleft"><a href="index.php"><img src="obrazki/powrot.png" width="90" height="40"></a></div>';

      echo '<div><center>czesc ADMIN <b>'.$_SESSION['user'].'</center></b></div>';
    }
    break;
  }
  case "zmianahasla":
  {  
      require('zmianahasla.php');
      break;
  }
  default:
  {
    echo "witaj na stronie";
    break;
  }
}
}
else
{  
  echo '<table id="TABELA"><br>';
  echo '<td class="header"><center> Witam prosze wybrac jedna z opcji wyzej!</center> </td>';
  echo '</table>';
  ?>
  <a href="elementy.php"><img src="obrazki/karta_przedmiotu.png" width="150" height="40"></a><br><br>
    <form method="POST" action="wyszukiwanie.php">    
    <table cellpadding="0" cellspacing="0" width="180">
    <tr><td align="center">Wyszukaj element:<input type="text" name="pole1" maxlength="32"></td></tr>
    <tr><td align="center" colspan="2"><input type="image" src="obrazki/wyszukaj.png" width="50%" height="50%" value="Wyszukaj"><br></td></tr></table>
  <?php
  
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