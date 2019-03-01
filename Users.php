<?php session_start(); ?>
<?php

if (!isset($_SESSION['Admin'])) {
    header('Location:Failed.php');
}


$host = "localhost";
$user = "root";
$password = "";
$dbName = "xyztravelagency";


$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");
$ID = '';
$Name = '';
$Email = '';
$Address = '';
$Vacation = '';
$Date= '';
$Admin = '';
$GroupID = '';

if (isset($_POST['FINDID'])) {
    $ID = $_POST['ID'];
    $ID = mysqli_real_escape_string($con, $ID);
    $Name = $_POST['Name'];
    $Name = mysqli_real_escape_string($con, $Name);
    $Email = $_POST['Email'];
    $Email = mysqli_real_escape_string($con, $Email);
    $Address = $_POST['Address'];
    $Address = mysqli_real_escape_string($con, $Address);
    $Vacation = $_POST['Vacation'];
    $Vacation = mysqli_real_escape_string($con, $Vacation);
    $Date = $_POST['Date'];
    $Date = mysqli_real_escape_string($con, $Date);
    $Admin = $_POST['Admin'];
    $Admin = mysqli_real_escape_string($con, $Admin);
    $GroupID = $_POST['GroupID'];
    $GroupID = mysqli_real_escape_string($con, $GroupID);

    $query = "Select * from user where RegistrationID = '$ID'";
    $result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
    if (($row = mysqli_fetch_row($result)) == true) {
        $Name = $row[0];
        $Address = $row[1];
        $Email = $row[2];
        $Vacation = $row[3];
        $Date = $row[4];
        $ID = $row [5];
        $Admin = $row[6];
        $GroupID =$row[7];



    } else echo "record not found";

}
if (isset($_POST['FINDNAME'])) {
    $ID = $_POST['ID'];
    $ID = mysqli_real_escape_string($con, $ID);
    $Name = $_POST['Name'];
    $Name = mysqli_real_escape_string($con, $Name);
    $Email = $_POST['Email'];
    $Email = mysqli_real_escape_string($con, $Email);
    $Address = $_POST['Address'];
    $Address = mysqli_real_escape_string($con, $Address);
    $Vacation = $_POST['Vacation'];
    $Vacation = mysqli_real_escape_string($con, $Vacation);
    $Date = $_POST['Date'];
    $Date = mysqli_real_escape_string($con, $Date);
    $Admin = $_POST['Admin'];
    $Admin = mysqli_real_escape_string($con, $Admin);
    $GroupID = $_POST['GroupID'];
    $GroupID = mysqli_real_escape_string($con, $GroupID);

    $query = "Select * from user where Name = '$Name'";
    $result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
    if (($row = mysqli_fetch_row($result)) == true) {
        $Name = $row[0];
        $Address = $row[1];
        $Email = $row[2];
        $Vacation = $row[3];
        $Date = $row[4];
        $ID = $row [5];
        $Admin = $row[6];
        $GroupID =$row[7];



    } else echo "record not found";

}

if (isset($_POST['FINDEMAIL'])) {
    $ID = $_POST['ID'];
    $ID = mysqli_real_escape_string($con, $ID);
    $Name = $_POST['Name'];
    $Name = mysqli_real_escape_string($con, $Name);
    $Email = $_POST['Email'];
    $Email = mysqli_real_escape_string($con, $Email);
    $Address = $_POST['Address'];
    $Address = mysqli_real_escape_string($con, $Address);
    $Vacation = $_POST['Vacation'];
    $Vacation = mysqli_real_escape_string($con, $Vacation);
    $Date = $_POST['Date'];
    $Date = mysqli_real_escape_string($con, $Date);
    $Admin = $_POST['Admin'];
    $Admin = mysqli_real_escape_string($con, $Admin);
    $GroupID = $_POST['GroupID'];
    $GroupID = mysqli_real_escape_string($con, $GroupID);

    $query = "Select * from user where Email = '$Email'";
    $result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
    if (($row = mysqli_fetch_row($result)) == true) {
        $Name = $row[0];
        $Address = $row[1];
        $Email = $row[2];
        $Vacation = $row[3];
        $Date = $row[4];
        $ID = $row [5];
        $Admin = $row[6];
        $GroupID =$row[7];



    } else echo "record not found";

}
if (isset($_POST['DELETE'])) {
    $ID = $_POST['ID'];
    $ID = mysqli_real_escape_string($con, $ID);
    $Name = $_POST['Name'];
    $Name = mysqli_real_escape_string($con, $Name);
    $Email = $_POST['Email'];
    $Email = mysqli_real_escape_string($con, $Email);

    if (!empty($ID) || !empty($Name)) {
        $query = "Delete from user where RegistrationID = '$ID' OR name = '$Name'";
        $result = mysqli_query($con, $query) or die("query is failed" . mysqli_error($con));
        if (mysqli_affected_rows($con) > 0) {
            echo "Record Deleted";
        }
        $ID = '';
        $Name = '';
        $Email = '';
    }
}
if (isset($_POST['SAVE'])) {
    $ID = $_POST['ID'];
    $ID = mysqli_real_escape_string($con, $ID);
    $Name = $_POST['Name'];
    $Name = mysqli_real_escape_string($con, $Name);
    $Email = $_POST['Email'];
    $Email = mysqli_real_escape_string($con, $Email);
    $Address = $_POST['Address'];
    $Address = mysqli_real_escape_string($con, $Address);
    $Vacation = $_POST['Vacation'];
    $Vacation = mysqli_real_escape_string($con, $Vacation);
    $Date = $_POST['Date'];
    $Date = mysqli_real_escape_string($con, $Date);
    $Admin = $_POST['Admin'];
    $Admin = mysqli_real_escape_string($con, $Admin);
    $ID = md5($Name.$Date.$Address.$Vacation.$Email);
    $GroupID = $_POST['GroupID'];
    $GroupID = mysqli_real_escape_string($con, $GroupID);


    $query = "Insert Into user Values('$Name','$Address','$Email','$Vacation','$Date','$ID','$Admin',NULL)";
        $result = mysqli_query($con, $query) or die("query is failed" . mysqli_error($con));
        if (mysqli_affected_rows($con) > 0) {
            echo "Data entered into table";
        } else {
            echo "Data not entered";
        }

    $ID = '';
    $Name = '';
    $Email = '';
    $Address = '';
    $Vacation = '';
    $Date= '';
    $Admin = '';
    $GroupID = '';
    }


if (isset($_POST['UPDATE'])){
    $ID = $_POST['ID'];
    $ID = mysqli_real_escape_string($con, $ID);
    $Name = $_POST['Name'];
    $Name = mysqli_real_escape_string($con, $Name);
    $Email = $_POST['Email'];
    $Email = mysqli_real_escape_string($con, $Email);
    $Address = $_POST['Address'];
    $Address = mysqli_real_escape_string($con, $Address);
    $Vacation = $_POST['Vacation'];
    $Vacation = mysqli_real_escape_string($con, $Vacation);
    $Date = $_POST['Date'];
    $Date = mysqli_real_escape_string($con, $Date);
    $Admin = $_POST['Admin'];
    $Admin = mysqli_real_escape_string($con, $Admin);
    $ID = $_POST['ID'];
    $ID = mysqli_real_escape_string($con, $ID);
    $GroupID = $_POST['GroupID'];
    $GroupID = mysqli_real_escape_string($con, $GroupID);
    $query = "SELECT * from user where Email = '$Email' || RegistrationID = '$ID'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_row($result);


    $query = "Update user Set name = '$Name' ,  Address = '$Address' ,
            InterestedVacationPlan = '$Vacation' , Date = '$Date' , Admin = $Admin,GroupID = $GroupID where RegistrationID = '$ID'";
    $result = mysqli_query($con, $query) or die("query is failed" . mysqli_error($con));
    if (mysqli_affected_rows($con) > 0) {
        echo "Update Added";
    } else {
        echo "Data not entered";
    }

    $ID = '';
    $Name = '';
    $Email = '';
    $Address = '';
    $Vacation = '';
    $Date= '';
    $Admin = '';
    $GroupID = '';



}

if (isset($_POST['AdminPage'])){
    header("Location:AdminPage.php");
}




?>
<head>
<style type="text/css">
    html{
        font-family: "Impact";
        text-align: center;
        size: 14px;
        
        background-image: linear-gradient(to right, #f11313, #ff6200, #ff9600, #ffc500, #fcf208);

    }
    table{
        text-align: center;
        margin-left: 5%;
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
        margin-top: 5%;
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

<form method="post">
    <div>
    <p> Name: <input type="text" name="Name" value="<?php echo $Name ?>"/></p>

    <p> Email:<input type="text" name="Email" value="<?php echo $Email ?>"/>

    <p> Address:<input type="text" name="Address" value="<?php echo $Address ?>"/></p>

    <label for="vacationplan">Vacation:</label>

    <select id="vacationplan" name ="Vacation" value="<?php echo $Vacation ?>"/></p>

        <?php
        $selectQuery = "SELECT InterestedVacationPlan FROM interestedvacationplan;";

        $selectResult = mysqli_query($con, $selectQuery) or die("query is failed" . mysqli_error($con));

        while (($row = mysqli_fetch_row($selectResult)) == true) {
            echo "<option value='$row[0]'>$row[0]</option>";
        };

        ?>
    </select>
    <p> Date:<input type="Date" name="Date" value="<?php echo $Date ?>"/></p>

    <p> ID:<input type="text" name="ID" value="<?php echo $ID ?>"/></p>

    <p> Admin:<input type="text" name="Admin" value="<?php echo $Admin ?>"/></p>

        <p> GroupID:<input type="text" name="GroupID" value="<?php echo $GroupID ?>"/></p>


        <input type="submit" value="Find By Name" name="FINDNAME"/>
        <input type="submit" value="Find By ID" name="FINDID"/>

    <input type="submit" value="Find By Email" name="FINDEMAIL"/>

    <input type="submit" value="Update" name="UPDATE"/>

    <input type="submit" value="Delete" name="DELETE"/>

    <input type="submit" value="Save" name="SAVE"/>

    <input type="submit" value="Return to Admin Page" name="AdminPage"/>

    <?php
    $query = "SELECT * FROM user ORDER BY Name ASC ";
    $result = mysqli_query($con, $query);
    
    echo "<table border='1' >";
    echo "<tr><th>Name</th><th>Address</th><th>Email</th><th>InterestedVacationPlan</th><th>Date</th><th>RegistrationID <th>Admin </th><th>Group</th></tr>";
    
    while (($row = mysqli_fetch_row($result)) == true) {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";
    }
    
    echo "</table>";
    ?>
    </div>


</form>


</body>


</html>
