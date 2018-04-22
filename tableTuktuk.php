 <?php
 
$servername = "localhost";
$username = "roird_guest";
$password = "12345";
$dbname = "roird_EasyGuest";

$conn=new mysqli($servername,$username,$password,$dbname);

session_start();

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    } 
 $_SESSION['checkbox'] 

?>


<!DOCTYPE html>
<html>
  <head>
    <!-- Material Design Lite -->
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.5/material.min.js"></script>
<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.5/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="../css/tableTuktuk.css">
<link rel="stylesheet" href="../css/adminPanel.css">
<script src="../js/tableTuktuk.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="http://www.unicodenepali.com/v3/contextmenu.css" />
<script type="text/javascript" src="http://www.unicodenepali.com/v3/j.js"></script>        
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  </head>
  <body>
    <header>
        <nav>
<!-- Ensure window size is always 100vh -->
<div class="container-fluid dashboard-wrapper">
  <!-- side bar wrapper  -->
  <div id="sidebar-wrapper">
    <a id="toggle-menu" href="javascript:void(0)">
      Admin panel<span class="fa fa-bars toggle-icon"></span>
    </a>

    <!--   side-menu   -->
    <ul id="side-menu">
         <li><a href="">Home 
            <span class="sub-icon"><i class="fa fa-home"></i></span>
        </a>
        </li>
        
      <li><a href="">Guests 
            <span class="sub-icon"><i class="fa fa-group"></i></span>
        </a>
        </li>
        <li><a href="">Tuktuk 
              <span class="sub-icon"><i class="fa fa-cab"></i></span>
          </a>
         </li>
         <li><a href="">Room service
               <span class="sub-icon"><i class="fa fa-glass"></i></span>
             </a>
        </li>
        <li><a href="">Maintenance
              <span class="sub-icon"><i class="fa fa-wrench	"></i></span>
            </a>
        </li>
          <li><a href="">HK
              <span class="sub-icon"><i class="fa fa-female"></i></span>
            </a>
        </li>
              <li><a href="">Breakfast
              <span class="sub-icon"><i class="fa fa-cutlery"></i></span>
            </a>
        </li>
<li><a href="">products
              <span class="sub-icon"><i class="fa fa-bed"></i></span>
            </a>
        </li>
        <li><a href="">Logout
              <span class="sub-icon"><i class="fa fa-power-off"></i></span>
            </a>
        </li>
    </ul>
    <!-- /. side-menu  -->

  </div>
  <!--/. side-bar-wrapper    -->
        </nav>
    </header>
    <main>
    <table class="mdl-data-table mdl-shadow--2dp">
  <thead>
    <tr>
      <th>
     Is arrived
      </th>
      <th class="mdl-data-table__cell--non-numeric">Order number</th>
          <th>User number</th>
          <th>Date time</th>
          <th>Location</th>
          <th>Destination</th>
          <th>Number of passengers</th>
          <th>Tuktuk id</th>
          <th>Need a taxi</th>
    </tr>
  </thead>
  <tbody>
 
<?php

 $sql = "SELECT * FROM tuktukOrders";
$result = $conn->query($sql);
$date = date('Y-m-d h:i:s');
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
if($row["DateTime"]<$date)
{
echo "<tr style='background-color: #E63054;'>";
}
else
{
echo "<tr>";
}

echo "<td><label class='mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select'>
            <input type='checkbox' class='mdl-checkbox__input'/></label>
      </td><td style='width:5px;'>". $row["orderNum"]. "</td><td>". $row["user"]. "</td><td>". $row["DateTime"] . "</td><td>".$row["location"]."</td><td>".$row["destination"]."</td><td style='width:10px;'>".$row["numOfPass"]."</td><td>".$row["tuktuk"]."</td
        ><td>".$row["needTaxi"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
  </tbody>
</table>
</main>
  </body>
<script src="../js/adminPanel.js"></script>

</html>