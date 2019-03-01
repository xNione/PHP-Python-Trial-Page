<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <style type="text/css">
    html{
        font-family: "Impact";
        size: 14px;

        background-color: #52ACFF;
        background-image: linear-gradient(to left, #52ACFF 25%, #FFE32C 100%);


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
    <div>
Logged in as: <?php echo $_SESSION['Username']; ?>

<form method="post">

    <p>
        <input type="button" onclick="location.href='Users.php';" value="View All Users"/>
        <input type="button" onclick="location.href='Groups.php';" value="Group Users"/>
        <input type="button" onclick="location.href='Logout.php';" value="Logout"/>

    </p>

</form>
</div>
</body>
</html>

<?php
if (!isset($_SESSION['Admin'])) {
    header('Location:Failed.php');
}


?>

