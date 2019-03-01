<?php session_start(); ?>
<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "xyztravelagency";


$con = mysqli_connect($host, $user, $password, $dbName)
or die("Connection is failed");

if (!isset($_SESSION['Admin'])) {
    header('Location:Failed.php');
}


?>
<head>
<style type="text/css">
    html{
        font-family: "Impact";
        text-align: center;
        size: 14px;
        
        background-image: linear-gradient(to right, #6e33e7, #962fe6, #b72be4, #d428e1, #ee29dd);

    }
    table{
        text-align: center;
        margin-left: 20%;
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
<div>
<form method="post">
<label for="name">Enter a Group Size:</label>
<br>
<select id="Size" name ="Size">
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>

</select>

<br>

</select>


    <input type="submit" value="Confirm"  name="Confirm"/>

<input type="submit" value="Return to Admin Page" onclick="location.href='AdminPage.php';"  name="AdminPage"/>
</form>


<?php
$query = "SELECT * FROM GroupPlan";
$result = mysqli_query($con, $query);

echo "<table border='1' >";
echo "<tr><th>GroupID</th><th>MaxUser</th><th>CurrentUser</th><th>Plan</th><th>Date</th></tr>";

while (($row = mysqli_fetch_row($result)) == true) {
    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
}

echo "</table>";


if (isset($_POST['AdminPage'])){
    header("Location:AdminPage.php");
}
#Creates A associative Array and makes each User have a key and Value based on their plan and date
if (isset($_POST['Confirm'])) {
    $Array = array();
    $Size = $_POST['Size'];
    $Query = "Select Date,InterestedVacationPlan,RegistrationID from user WHERE GroupID IS NULL AND Date NOT NULL";
    $result = mysqli_query($con, $Query) OR DIE("DB ERROR".mysqli_error($con));
    while ($row = mysqli_fetch_row($result)) {
        $Group = $row[0] . "/" . $row[1];
        $Index = 0;
        $Complete = false;
        while (!$Complete) {
            if (array_key_exists($Group . "/" . $Index, $Array)) {
                if (count($Array[$Group . "/" . $Index]) < $Size) {
                    $Array[$Group . "/" . $Index][] = $row[2];
                    $Complete = true;
                }
                else {
                    $Index++;
                }
            } else {

                $Array[$Group . "/" . $Index] = array($row[2]);
                $Complete = true;

            }
        }
    }
    #Inserts Groups into The Group DB based on the key and value
        foreach ($Array as $key => $value) {
            $oof = explode("/", $key);
            $NumUsers = count($value);
            $Date = $oof[0];
            $Plan = $oof[1];
            $Query = "INSERT INTO GroupPlan(MaxUser,CurrentUser,Plan,Date) VALUES($Size,$NumUsers,'$Plan','$Date')";
            $result = mysqli_query($con, $Query)  OR DIE("DB ERROR".mysqli_error($con));
            $GroupID = mysqli_insert_id($con);

            echo"Group Created with ".$NumUsers. " / ".$Size. " ". "Users <br>";

            foreach ($value as $User) {
                $Query = "UPDATE user SET GroupID = $GroupID where RegistrationID = '$User'";
                $result = mysqli_query($con, $Query)  OR DIE("DB ERROR".mysqli_error($con));;
            }


        }


}








?>
</div>



