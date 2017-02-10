<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Zmiana hasla</title>
</head>
<br><a href="index.php">Powrot</a>
<?php
session_start();
function zmiana($password,$user)
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
function pobranie($user)
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
    <center><form method="POST" action="test.php">
    <table cellpadding="0" cellspacing="0" width="180">
    <tr><td><br></td></tr>
    <tr><td width="50">Haslo stare:</td><td><input type="password" name="starehaslo" maxlength="32"></td></tr>
    <tr><td width="50">Haslo nowe:</td><td><input type="password" name="nowehaslo" maxlength="32"></td></tr>
    <tr><td width="50">Powtorz nowe haslo:</td><td><input type="password" name="powtorzhaslo" maxlength="32"></td></tr>
    <tr><td align="center" colspan="2"><input type="submit" name="zmien haslo" value="Zmien Haslo"><br></td></tr></center></table>
  
<?php  
    if(isset($_POST['powtorzhaslo']) AND isset($_POST['nowehaslo']) AND isset($_POST['starehaslo']))
    {
      
      if($_POST['nowehaslo']==$_POST['powtorzhaslo'])
      {
        $haslo1=pobierz_urzytkownika($_SESSION['user']);
        if($_POST['starehaslo']==$haslo1)
        {
        $user_id=$_SESSION['loginid'];
        $qwe=zmianahasla($_POST['nowehaslo'], $user_id);
        echo $qwe;
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