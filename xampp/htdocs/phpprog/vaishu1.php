<?php  
session_start(); 
ob_start(); 
 	require_once('db_config.php'); 
if(isset($_POST['submit']) && !empty($_POST['amount']) && !empty($_POST['expense_category_name']))
{       // echo print_r($_POST); 
    $amount = mysqli_real_escape_string($con,$_POST['amount']); 
    $expense_category_name = mysqli_real_escape_string($con,$_POST['expense_category_name']);     
    $created_at = date('Y-m-d'); 
    $sql = "SELECT expense_category_name FROM expense_category_tbl WHERE expense_category_name = '$expense_category_name' ";  
     $query = mysqli_query($con, $sql);   
     if($one = mysqli_num_rows($query) == 1)
     { 
       echo' 
         <script type="text/javascript"> 
          alert("'.ucfirst($expense_category_name).' already exist"); 
         </script>'; 
  header('expense_category.php'); 
 	 	$data = mysqli_query($con, "INSERT INTO expense_category_tbl(expense_category_name, created_at, amount) VALUES('".$expense_category_name."', '".$created_at."','".$amount."')"); 
 	 	} 	 
    //if data inserted successfull  if(@$data === TRUE) 
    { 
      echo ' 
         <script type="text/javascript">        
          alert("Success!"); 
         </script>'; 
     }
 	 $message = "All fields are required"; 
 	  }
?> 

<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <meta charset="utf-8"/> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <title>Item Category</title> 
 	<!-- BOOTSTRAP STYLES--> 
    <link href="assets/css/bootstrap.css" rel="stylesheet" /> 
     <!-- FONTAWESOME STYLES--> 
    <link href="assets/css/font-awesome.css" rel="stylesheet" /> 
     <!-- MORRIS CHART STYLES--> 
        <!-- CUSTOM STYLES--> 
    <link href="assets/css/custom.css" rel="stylesheet" /> 
     <!-- GOOGLE FONTS--> 
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css' /> 
     <!-- TABLE STYLES--> 
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" /> 
     
      <!--ASWESOME ICON--> 
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css"> 
     
   <!--  <script language="javascript" type="text/javascript"> function removeSpaces(string) { 
    return string.split(' ').join(''); 
} 
</script> --> 
<script language="JavaScript"><!-- function trim(strText) 
{ 
    // this will get rid of leading spaces     while (strText.substring(0,1) == ' ') 
        strText = strText.substring(1, strText.length); 
 
    // this will get rid of trailing spaces 
   while (strText.substring(strText.length1,strText.length)=='')       
         strText = strText.substring(0, strText.length-1); 
   return strText; 
} 
//--></script> 
</head> 
<body> 
    <div id="wrapper"> 
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0; color:#FF0"> 
            <div class="navbar-header" > 
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebarcollapse"> 
                    <span class="sr-only">Toggle navigation</span> 
                    <span class="icon-bar"></span> 
                   <span class="iconbar"></span>                     
                   <span class="icon-bar"></span> 
                </button> 
                <a class="navbar-brand" href="index.html">Expense Tracker</a>  
            </div> 
           <!--  dddddddddd --> 
 <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">Expense Tracker &nbsp; <div class="btn-group pull-right"> 
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown"> 
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"></span> 
                <span class="caret"></span> 
                </button> 
                <ul class="dropdown-menu"> 
                    <li></li> 
                    <li> 
 	 	   <a href="#"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
            <li class="divider"></li> 
         <li> <a href="#"><i class="glyphicon glyphicon-edit"> Change  Password</i></a></li> 
                </ul> 
            </div> 
          </div> 
        </nav>          
           <!-- /. NAV TOP  --> 
                <nav class="navbar-default navbar-side" role="navigation"> 
            <div class="sidebar-collapse"> 
                <ul class="nav" id="main-menu"> 
 	 	 	 	<li class="text-center"> 
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/> 
 	 </li>	 	 	  	 	 	 
                    <li> 
                        <a href=" "><i class="fa fa-dashboard fa-2x"></i> Dashboard</a> 
                    </li> 
                      <li  > 
         <?php 
        echo" <li><a  href='index.php'><i class='fa fa-keyboard-o fa2x'></i>Expense</a></li>"; 
            ?> 
                        
            </li> 
                    <li>     
  <?php 
echo' <li><a class="active-menu" href="expense_category.php"><i class="fa fa-cog fa-2x" aria-hidden="true"></i>Create Expense</a></li>'; 
 
 ?>
 body 
 	{ 
 	 	margin:0px;  	 	
        padding:0px; 
 	 	font-family:Verdana, Arial, Helvetica, sans-serif;	 
 	} 
 	#main 
 	{ 
 	 	width:1200px;  	 	
        height:auto;  	 	
        margin:auto; 
 	 	border:#0000CC 2px solid; 
 	} 
 	#header 
 	{ 
 	 	width:100%;  
	 	height:150px;  	 	
        background-color:#498AF3;  	 	
        color:#FFFFFF; 
 	} 
 	#header h1 
 	{ 
 	 	padding:10px 0px 0px 30px; 
 	 	margin:0px; 	 
 	} 
 	#header a 
 	{ 
 	 	color:#FFFFFF;   	 	
        text-decoration:none;  	 	
        font-size:18px; 
 	} 
 	#header a:hover 
 	{ 
 	 	color:#FF0000; 
 	} 
 	.right 
 	{ 
 	 	float:right; 
 	} 
 	#content 
 	{ 
 	 	width:100%;  	 	
        height:auto; 
 	} 
 	#content .tbl 
 	{ 
 	 	width:100%; 
 	} 
 	#footer 
 	{ 
 	 	width:100%;  	 	
        height:70px; 
 	 	background-color:#498AF3;  	 	
        text-align:center; 
 	} 
 	#footer p 
 	{ 	 
 	 	padding-top:30px; 
 	} 
 	#footer a:hover 
 	{ 
 	 	color:#FFFFFF; 
 	}

