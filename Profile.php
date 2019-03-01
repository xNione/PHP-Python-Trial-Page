<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <style type="text/css">
    html{
        font-family: "Impact";
        text-align: center;
        size: 14px;
        
        background-image: linear-gradient(to left, #63c7bc, #00b6d0, #00a0e8, #0082f1, #6c55da);

    }
    table{
        text-align: center;
        margin-left: 15%;
    }

    div{
        text-align: center;
        padding: 10px;
        margin-top:5px;
        margin-left: 20%;
        margin-right: 20%;
        background-image: linear-gradient(to right, #ffffff, #f1f1f1, #e4e2e2, #d6d4d3, #c7c7c5);
        
        border-radius: 30px 30px 30px 30px !important;
        -moz-border-radius: 30px 30px 30px 30px;
        -webkit-border-radius: 30px 30px 30px 30px;
        border: 2px solid #000000 !important;
    }
    body {
        margin-top: 20%;
    }
    .form{
    border: groove;
    border: 5px;
    border-color: black;
    background-color: white;
}

    input{
    color: #444444;
    background: #F3F3F3;
    border: 1px #DADADA solid;
    padding: 5px 10px;
    border-radius: 2px;
    font-weight: bold;
    font-size: 9pt;
    outline: none;
    .floating-placeholder input:focus+label{
  color:$highlight-color;
}
.floating-placeholder input[value]+label{
  color:red;
}
.floating-placeholder{
  position:relative;
}

.floating-placeholder input{
  font-size:20pt;
  border:none;
  outline:none;
  position:absolute;
  top:0;
  left:0;
  display:block;
  background:transparent;
  z-index:2;
  border-bottom:1px solid #ccc;
  text-indent:$padding-horizontal;
}

.floating-placeholder:last-child input{
  border-bottom:none;
}
.floating-placeholder label{
  position:absolute;
  top:0;
  left:$padding-horizontal;
  font-size:20pt;
  z-index:1;
  @include transform-origin(0,0.0em);
  @include transition(transform 160ms, color 200ms);
  @include transform(scale(1,1) rotateY(0));
  color:#999;
}
.floating-placeholder-float label{
  @include transform(scale(0.55,0.55) rotateY(0));
}
.floating-placeholder-float input{
  line-height:3.4em;
}

    </style>
</head>
<div>
<body>
Logged in as: <?php echo $_SESSION['Username']; ?>
<input type="button" onclick="location.href='Logout.php';" value="Logout"/>

<?php



$host = "localhost";
$user = "root";
$password = "";
$dbName = "xyztravelagency";


$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");

$Name = $_SESSION['ID'];

$ID = "SELECT GroupID FROM user where RegistrationID = '$Name'";
$Check = mysqli_query($con, $ID);
$row = mysqli_fetch_row($Check);

$AAAA= $row[0];

$query = "SELECT * FROM user WHERE GroupID = $AAAA  ";
$result = mysqli_query($con, $query);

echo "<table border='1' >";
echo "<tr><th>Name</th><th>Address</th><th>Email</th><th>InterestedVacationPlan</th><th>Date</th><th>Group</th></tr>";

while (($row = mysqli_fetch_row($result)) == true) {
    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[7]</td></tr>";
}

echo "</table>";
?>
</body>
</div>
</html>