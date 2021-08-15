<!DOCTYPE html public "-//W3C#//DTD HTML 4.01 Transitional//EN">
<html lang="en">
<head>
  <meta http-equiv="Content-type" content="text/html; charaset=UTF=8">
  <title>PHP練習</title>
</head>
<body>
  
  <?php
      $code=$_POST['code'];

      $dsn='mysql:dbname=phpkiso;host=localhost';
      $user='root';
      $password='';
      $dbh=new PDO($dsn,$user,$password);
      $dbh->query('SET NAMES utf8');

      $sql='SELECT * FROM anketo WHERE code=?';
      $stmt=$dbh->prepare($sql);
      $data[]=$code;
      $stmt->execute($data);

      while(1)
      {
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false)
        {
          break;
        }
        print $rec['code'];
        print '&nbsp';
        print $rec['nickname'];
        print '&nbsp';
        print $rec['email'];
        print '&nbsp';
        print $rec['goiken'];
        print '<br>';
      }

      $dbh=null;
  ?>
  <br>
  <a href="menu.html">メニューに戻る</a>
</body>
</html>
