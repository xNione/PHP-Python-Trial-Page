<?php session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbName = "xyztravelagency";


$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <style type="text/css">
    html{
        font-family: "Impact";
        size: 14px;

        background-color: #21D4FD;
        background-image: linear-gradient(to left, #21D4FD 0%, #B721FF 100%);

    }

    div{
        text-align: center;
        padding: 10px;
        margin-top:5px;
        margin-left: 30%;
        margin-right: 30%;
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

<body>


<form method="post">
    <div>
    <section>
        <label for="name">Name:</label>
        <br>
        <input type="text" id="name" name="name"/>
        <br>
        <label for="address">Address:</label>
        <br>
        <input type="text" id="address" name="address"/>
        <br>
        <label for="address">Email:</label>
        <br>
        <input type="text" id="Email" name="Email"/>
        <br>
        <select id="vacationplan" name ="plan">
</section>
    <section>
        <br>
            <?php
            $selectQuery = "SELECT InterestedVacationPlan FROM interestedvacationplan;";

            $selectResult = mysqli_query($con, $selectQuery) or die("query is failed" . mysqli_error($con));

            while (($row = mysqli_fetch_row($selectResult)) == true) {
                echo "<option value='$row[0]'>$row[0]</option>";
            };

            ?>
        </select>
        <br>
        </section>
    <section>
        <label for="Date">Date:</label>

        <input type="Date" id="Date" name="Date"/>
        <br>
        <input type="submit" value="Signup" name="Signup"/>
        </section>
        </div>

</form>

</body>

</html>
<?php

if (isset($_POST['name']) && !empty($_POST['name'])) {

    $Name = $_POST['name'];
    $Address = $_POST['address'];
    $Package = $_POST['plan'];
    $Date = $_POST['Date'];
    $Email= $_POST ['Email'];
    $ID = md5($Name.$Date.$Address.$Package);
    $Admin = '';


    $query = "INSERT INTO user VALUES('$Name','$Address','$Email','$Package','$Date','$ID','$Admin',NULL )";
    $result = mysqli_query($con, $query);
    if($result){
        $_SESSION ['ID'] = "$ID";
        header("Location:SuccessfulSignUp.php");

    }
else{
    echo "Failed";
}



}

?>

