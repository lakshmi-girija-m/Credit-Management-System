
<!DOCTYPE>
<html>
 <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="styling.css" >

    <title>Transfer Credits</title>
    

  </head>
  
<body class="bg">
<nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="next.php">Transfer Credits</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="all_users.php"><span class="glyphicon glyphicon-user"></span>   All users</a></li>
                    </ul>
                </div>
            </div>
    </nav>
  
 

<?php
$con = mysqli_connect("localhost", "root", "", "credit_system")or die($mysqli_error($con));

$query = "select * from users;";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
if (mysqli_num_rows($result) >= 1) 
{
?>
  
  <div class="container-fluid" id="content">
  <div class="row decor_bg">
      <table class="table table-striped row-odd">
<thead>
<tr>
    <th>User Name</th>
    <th>E-mail ID</th>
    <th>Phone Number</th>
    <th>Current Credits</th>
</tr>
</thead>
<tbody>
<?php
    while ($row = mysqli_fetch_array($result)) {
                                  
        echo "<tr><td><a href='transfer.php?Name={$row["Name"]}'>" . $row["Name"] . "</a></td><td>" . $row["Email"] . "</td><td>" . $row["Phone_No"] . "</td><td>" . $row["current_credits"] . "</td></tr>";
    }
?>
</tbody>
<?php
    } else {
        echo "No users!";
    }
?>
      </table>
  </div>
  </div>

<footer class="top">
	<div class="container">
            <P></P>
	</div>
</footer>
 
</body>
</html>
