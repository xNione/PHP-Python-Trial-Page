<?php session_start(); ?>


    <html>
    <head>
        <title>Access Denied</title>
        <style type="text/css">

    html{
        font-family: "Impact";
        size: 14px;

        background-color: #FAACA8;
        background-image: linear-gradient(to right, #FAACA8 0%, #DDD6F3 100%);


    }

    div{
        text-align: center;
        border: 2px;
        padding: 10px;
        margin-top:5px; 


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
    <h1>You are not allowed on this page</h1>

    <?php

    echo "<meta http-equiv=\"refresh\" content=\"2;url=login.php\"/>";


?>
