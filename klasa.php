<?php
class Urzadzenia
{
 public $id;
 public $cid;
 public $name;
 public $opis;
 public $ilosc;

     public function __construct($dane)
    {
    if (isset($dane['id']))
      $this->id = $dane['id'];
    if (isset($dane['cid']))
      $this->cid = $dane['cid'];
    $this->name = $dane['name'];
    if (isset($dane['opis']))
      $this->opis = $dane['opis'];
    if (isset($dane['ilosc']))
      $this->ilosc = $dane['ilosc'];
  }  

  public static function pobierz_wszystkie()
    {
    $wyniki = array();
    
    $conn = new PDO(DB); //otwarcie polaczenia z baza danych
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM kategoria';
    $st = $conn->prepare($sql);
    $st->execute();
    while($row=$st->fetch(PDO::FETCH_ASSOC))
  {
      $urzadzenia = new Urzadzenia($row);
      array_push($wyniki, $urzadzenia);
    //var_dump($wyniki);
  }
  $conn = null;
  return $wyniki;
  }
  
  public static function pobierz_wszystkie1()
    {
    $cid=$_GET['id'];
    //echo $cid;
    $wyniki = array();
    $conn = new PDO(DB); //otwarcie polaczenia z baza danych
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM element WHERE cid='.$cid.'';
    $st = $conn->prepare($sql);
    $st->execute();
    while($row=$st->fetch(PDO::FETCH_ASSOC))
  {
      $urzadzenia = new Urzadzenia($row);
      array_push($wyniki, $urzadzenia);
    //var_dump($wyniki);
  }
  $conn = null;
  return $wyniki;
  }  
  
  public static function pobierz_wszystkie2()
    {
    $cid=$_GET['id'];
    //echo $cid;
    
    $wyniki = array();
    $conn = new PDO(DB); //otwarcie polaczenia z baza danych
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM element WHERE id='.$cid.'';
    $st = $conn->prepare($sql);
    $st->execute();
    while($row=$st->fetch(PDO::FETCH_ASSOC))
    {
      $urzadzenia = new Urzadzenia($row);
      array_push($wyniki, $urzadzenia);
      //var_dump($wyniki);
    }
    $conn = null;
    return $wyniki;
  }
  
public static function pobierz_wszystkie_elementy()
    {
    //$name=$_POST["pole1"];
    //echo $cid;
    $wyniki = array();
    define('DB','sqlite:baza.db');
    $conn = new PDO(DB); //otwarcie polaczenia z baza danych
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM element';// WHERE name='.$name.'';
    $st = $conn->prepare($sql);
    $st->execute();
    while($row=$st->fetch(PDO::FETCH_ASSOC))
  {
      $urzadzenia = new Urzadzenia($row);
      array_push($wyniki, $urzadzenia);
    //var_dump($wyniki);
  }
  $conn = null;
  return $wyniki;
  }  
public function usun_kategorie($id)
{

    //$id=$_GET["id"];
    //echo $id;
    $conn=new PDO(DB); //otwarcie polaczenia z baza danych
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql='DELETE FROM kategoria WHERE id='.$id.'';
    $st=$conn->prepare($sql);
    $st->execute();
    $conn=null;        
    
}
public function dodaj_element()
{  
  //  define('DB','sqlite:ludzie.db');
    $tymczasowa=$_SESSION['name_to_cid'];
    $conn=new PDO(DB); //otwarcie polaczenia z baza danych
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql='INSERT INTO element (id, cid, name, opis, ilosc) VALUES (:id, :cid, :name, :opis, :ilosc)';
    $st=$conn->prepare($sql);
    $st->bindValue(":id", $this->id, PDO::PARAM_INT);
    $st->bindValue(":cid", $tymczasowa, PDO::PARAM_INT);
    $st->bindValue(":name", $this->name, PDO::PARAM_STR);
    $st->bindValue(":opis", $this->opis, PDO::PARAM_STR);
    $st->bindValue(":ilosc", $this->ilosc, PDO::PARAM_INT);
    $st->execute();
    $conn=null;
}
public function dodaj_kategorie()
{  
  //  define('DB','sqlite:ludzie.db');
    $conn=new PDO(DB); //otwarcie polaczenia z baza danych
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql='INSERT INTO kategoria (id, name) VALUES (:id, :name)';
    $st=$conn->prepare($sql);
    $st->bindValue(":id", $this->id, PDO::PARAM_INT);
    $st->bindValue(":name", $this->name, PDO::PARAM_STR);
    $st->execute();
    $conn=null;
}  
}
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88469240-1', 'auto');
  ga('send', 'pageview');

</script>