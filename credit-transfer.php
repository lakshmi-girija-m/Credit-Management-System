<?php

$con = mysqli_connect("localhost", "root", "", "credit_system")or die($mysqli_error($con));
session_start();

$username = $_SESSION['username'];
$credits = $_SESSION['credited'];
$userto = $_SESSION['userto'];
$old_credits = $_SESSION['old_credits'];

$query1 = "insert into transfers values ('" . $username . "', '" . $userto . "', " . $credits . ")";
$res1 = mysqli_query($con, $query1) or die($mysqli_error($con)); 

$query = "select current_credits from users where Name='$userto'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
if (mysqli_num_rows($result) >= 1) {
    while ($row = mysqli_fetch_array($result)) {
            $add_credits = $row['current_credits'];
    }
}
$new_credits = $old_credits-$credits;
$new_credits1 = $add_credits+$credits;
$query2 = "update users set current_credits='" . $new_credits . "' where Name='" . $username ."'";
$res2 = mysqli_query($con, $query2) or die($mysqli_error($con));
$query3 = "update users set current_credits='" . $new_credits1 . "' where Name='" . $userto ."'";
$res3 = mysqli_query($con, $query3) or die($mysqli_error($con));

if($res1&&$res2&&$res3)
{
    header('location: success.php');
}

?>