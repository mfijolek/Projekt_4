<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Logowanie</title>
</head>

<?php session_start(); ?>

<body>
<?php
//var_dump($_POST);
if(isset($_POST['zaloguj_x']) && isset($_POST['zaloguj_y']) && !empty($_POST['login']) )
{
  $login=$_POST['login'];
  try  //pobieranie danych urzytkownika z bazy danych, oraz sprawdzanie b��d�w funkcj� try-catch
  {
     define('DB','sqlite:baza.db');
     $conn=new PDO(DB);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql='SELECT * FROM uzytkownik WHERE user=:login';   
     $st=$conn->prepare($sql);
     $st->bindValue(":login", $login, PDO::PARAM_STR);
     $st->execute();
     $row=$st->fetch(PDO::FETCH_ASSOC);
     $conn=null;  
     
  //   throw new Exception(�Komunikat b��du w postaci tekstowej�); //mo�e by� niepotrzebne (wzi�te z cw8)
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
  //var_dump($row);
  if($row==false)
  {
  
    echo '<a id="nowy" href="index.php?action=logowanie"><img src="obrazki/zaloguj.png" width="90" height="35" border ="1"></a><br>
    <a href="index.php"><img src="obrazki/powrot.png" width="90" height="35" border="1"></a><br>
    <center>bledny login</center>';
  }
  else
  {
    if($_POST['login']==$row['user'] && $_POST['haslo']==$row['password'])
    {  
      $znacznik='1';
      $conn=new PDO(DB); //otwarcie polaczenia z baza danych
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql='UPDATE uzytkownik SET znacznik='.$znacznik.' WHERE id='.$row['id'].'';
      $st=$conn->prepare($sql);
      $st->execute();
      $conn=null;
      $_SESSION['user'] = $row['user'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['loginid'] = $row['id'];
      header('Location: index.php?action=123qwe');
    }
    else
    {
        ?><a id="nowy" href="index.php?action=logowanie"><img src="obrazki/zaloguj.png" width="90" height="35" border ="1"></a><br>
        <a href="index.php"><img src="obrazki/powrot.png" width="90" height="35" border="1"></a><br><?php
      echo "<center>bledne haslo</center>";
    }
  }
}
else 
{
  
  ?><a id="nowy" href="index.php?action=logowanie"><img src="obrazki/zaloguj.png" width="90" height="35" border ="1"></a><br>
  <a href="index.php"><img src="obrazki/powrot.png" width="90" height="35" border="1"></a><br><?php
  echo "<center>bledne dane</center>";
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