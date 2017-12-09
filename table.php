<?php
require_once "database/connect.php";

header("Content-Type: application/json; charset=UTF-8");

if(isset($_GET['search']))
{
  search($_GET['search']);
}
else
{
  displayTable();
}


function displayTable()
{
  $db = new Connect;

  try
  {
    $sql = "SELECT * FROM incidents";

    $run = $db->query($sql);

    $result = $db->fetch();

    echo "<table>";
    echo "<tr><th>Incident ID</th><th>Reporter</th><th>Type</th><th>Time</th><th>Location</th><th>Details</th><th>Picture</th><th>Video</th></tr>";

    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>".$result['id']."</td>";
        echo "<td>".$result['reporter']."</td>";
        echo "<td>".$result['type']."</td>";
        echo "<td>".$result['time']."</td>";
        echo "<td>".$result['location']."</td>";
        echo "<td>".$result['details']."</td>";
        echo "<td>".$result['picture']."</td>";
        echo "<td>".$result['video']."</td>";
        echo "</tr>";
    }
    echo "</table>";
  }
  catch(PDOException $e)
   {
    #echo $e->getMessage();
    return NULL;
  }
}

 if(isset($_GET['searchbutton']) && !empty($_GET['search']))
 {
   search($_GET['search']);
}
  function search($keyword)
  {
    $db = new Connect;

    try {
      $sql = "SELECT * FROM incidents WHERE details LIKE '%". $keyword."%'";

      $run = $db->query($sql);

      $result = $db->fetch();

      echo "<table>";
      echo "<tr><th>Incident ID</th><th>Reporter</th><th>Time</th><th>Location</th><th>Details</th><th>Picture</th><th>Video</th></tr>";

      foreach( $result as $row) {
        echo "<tr>";
        echo "<td>".$result['id']."</td>";
        echo "<td>".$result['reporter']."</td>";
        echo "<td>".$result['type']."</td>";
        echo "<td>".$result['time']."</td>";
        echo "<td>".$result['location']."</td>";
        echo "<td>".$result['details']."</td>";
        echo "<td>".$result['picture']."</td>";
        echo "<td>".$result['video']."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    catch(PDOException $e)
     {
      #echo $e->getMessage();
      return NULL;
    }
}
