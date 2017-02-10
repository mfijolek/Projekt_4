<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Zmiana hasla</title>
</head>
<a href="index.php"><img src="obrazki/powrot.png" width="90" height="35" border="1"></a>
<?php
//session_start();
function zmianahasla($password,$user)
{

  //define('DB','sqlite:baza.db');  
  $conn=new PDO(DB);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql='UPDATE uzytkownik SET password=:password WHERE id=:user';   
  $st=$conn->prepare($sql);
  $st->execute(array(':password'=> $password, ':user'=> $user));
  $conn=null;
  return $password;
}
function pobierz_urzytkownika($user)
{
    define('DB','sqlite:baza.db');  
       $conn=new PDO(DB);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql='SELECT * FROM uzytkownik WHERE user=:login';   
       $st=$conn->prepare($sql);
       $st->bindValue(":login", $user, PDO::PARAM_STR);
       $st->execute();
       $row=$st->fetch(PDO::FETCH_ASSOC);
       $conn=null;
       return $row['password'];
}
?>
    <body>
    <center><form method="POST" action="index.php?action=zmianahasla">
    <table cellpadding="0" cellspacing="0" width="180">
    <tr><td><br></td></tr>
    <tr><td width="50">Haslo stare:</td><td><input type="password" name="starehaslo" maxlength="32"></td></tr>
    <tr><td width="50">Haslo nowe:</td><td><input type="password" name="nowehaslo" maxlength="32"></td></tr>
    <tr><td width="50">Powtorz nowe haslo:</td><td><input type="password" name="powtorzhaslo" maxlength="32"></td></tr>
    <tr><td align="center" colspan="2"><input type="submit" name="zmien haslo" value="Zmien Haslo"><br></td></tr></center></table>
  
<?php  
    if(isset($_POST['powtorzhaslo']) AND isset($_POST['nowehaslo']) AND isset($_POST['starehaslo']))
    {
      if(empty($_POST['nowehaslo']) OR empty($_POST['powtorzhaslo']) OR empty($_POST['starehaslo']) )
      {
        echo 'proszę uzupełnić wszystkie pola';
      }
      else
      {
      if($_POST['nowehaslo']==$_POST['powtorzhaslo'])
      {
        $haslo1=pobierz_urzytkownika($_SESSION['user']);
        if($_POST['starehaslo']==$haslo1)
        {
        $user_id=$_SESSION['loginid'];
        $qwe=zmianahasla($_POST['nowehaslo'], $user_id);
        
        echo 'haslo zostalo zmienione';
        }
        else
        {
          echo "nieprawidlowe stare haslo";
        }
      }
      else 
      {
        echo "haslo nowe nie takie samo";
      }
      }
    }
    else
    {
      
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