<!DOCTYPE html>
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
<div class="maxim">
<?php
$con = mysqli_connect("localhost", "root", "", "credit_system")or die($mysqli_error($con));
session_start();

$Name = $_REQUEST['Name'];
$_SESSION['username'] = $Name;
$query = "select current_credits from users where Name='{$_SESSION['username']}'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
if (mysqli_num_rows($result) >= 1) {
    while ($row = mysqli_fetch_array($result)) {
            $credits = $row['current_credits'];
            $_SESSION['old_credits'] = $credits;
    }
}
?>
    <div class="container-fluid" id="content1">
        <div class="jumbotron">
            <h3 align="center">Welcome user <?php echo $Name ?> .</h3><hr>
             <p align="center">Your current credits are <?php echo $credits ?></p>
        </div>
    </div>
</div>
    
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
   
    <div class="left-panel">
    <div class="panel panel-info floating">
      <div class="panel-heading">Enter the no.of credits to be transfered: </div>
      <div class="panel-body">
          <div class="form-group">
              <input type="number" class="form-control" placeholder="Credits" name="crediting" required="true" value="<?php if(isset($_POST['crediting'])) echo $_POST['crediting'];?>"/>           
          </div>
      </div>
    </div>
    </div>
    
    <div class="right-panel">
    <div class="panel panel-info">
      <div class="panel-heading">Select the user to transfer the credits: </div>
      <div class="panel-body">
          <select name="crediteduser">
            <option disabled="disabled" selected="selected" value="empty">Select User</option>
            <option value="Arjun Reddy">Arjun Reddy</option>
            <option value="Bhanu Shree">Bhanu Shree</option>
            <option value="Fatima">Fatima</option>
            <option value="Jennie">Jennie</option>
            <option value="Rakesh">Rakesh</option>
            <option value="Rakshith">Rakshith</option>
            <option value="Ronnie">Ronnie</option>
            <option value="Sameera">Sameera</option>
            <option value="Shanvi">Shanvi</option>
            <option value="Trishala">Trishala</option>
         </select>
      </div>
      
    </div>
    </div>
    <button id="position" type="submit" name="add" class="btn btn-danger">Transfer</button>
    
</form>


 <?php   
            if(isset($_POST['add']))
            {
                if(!isset($_POST['crediting'])||!isset($_POST['crediteduser']))
                {
                    echo '<script type="text/javascript"> alert("All fields are required.")</script>';
                }
                if(isset($_POST['crediting'])&&isset($_POST['crediteduser']))
                {
                    $new_c = $_POST['crediting'];
                    $new_u = $_POST['crediteduser'];
                    if($_SESSION['old_credits']<$new_c)
                    {
                        echo '<script type="text/javascript"> alert("Invalid credits")</script>';
                    }
                    else if($new_u==$_SESSION['username']) 
                    {
                        echo '<script type="text/javascript"> alert("Select valid user.")</script>';
                    }
                    else 
                    {
                        $_SESSION['credited'] = $new_c;
                        $_SESSION['userto'] = $new_u;
                        header('location: credit-transfer.php');
                    }
                }
            }
?>

<footer class="top">
	<div class="container">
            <P></P>
	</div>
</footer>
        
</body>
</html>