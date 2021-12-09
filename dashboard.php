<!DOCTYPE html>
<HTML>
  <HEAD>
    <TITLE> CS360:attale01 </TITLE>
    <?php 
    	include_once('db_connect.php'); 
    	include_once('bootstrap.php'); 
    	include_once('hw5util.php');
    ?>  
    
    <style>
      .menuBtn {
        border: 5px solid white;
        padding: 5px;
        background-color: #d3d3d4;
        text-align: center;
      }
      
      .menuBtn:hover {
        background-color: lavender;
      }
      
      #divWelcome {
      	padding-top: 50px;
      	padding-bottom: 10px;
      }
      
      #divMenu {
      	padding-top: 50px;
      	padding-bottom: 10px;
      }
      
      #divContent {
      	padding-top: 50px;
      	padding-bottom: 10px;
      }
      
      .welcomeCol {
      	padding: 0px;
     	}
    </style>
  </HEAD>

  <BODY>
  <div class="container">
    <?php

			$user   = $_GET['uid'];
			if($user == null) {
				$user = 10;
			}
			$op     = $_GET['op'];
			$mid    = $_GET['mid'];

			$str    = "SELECT name FROM titan1 WHERE id=$user;";
			$res    = $db->query($str);
			$row    = $res->fetch();
			$name   = $row['name'];

    ?> 
    <div class="row" id="divWelcome">
        <div class="col-md-12 column welcomeCol">
          <?php  print"<h1>Welcome, $name</h1>"; ?>
        </div>
    <div>
    <div class="row" id="divMenu">
        <div class="col-md-12 column">
          <div class="row">
				    <div class="col-md-4 column menuBtn">
				      <a href="div.php">Inbox </a>
				    </div>
				    
				    <div class="col-md-4 column menuBtn">
				      <a href="div.php">View Sent</a>
				    </div>
				    
				    <div class="col-md-4 column menuBtn">
				      <a href="div.php">New Message</a>
				    </div>
				    
				  </div>
        </div>
    <div>
    <div class="row" id="divContent">
    	<?php
    		if ($op = 'inbox') {
    			viewInbox($db, $user);
    		}
    		else if ($op = 'viewSent') {
          viewSent($db, $user, $name);
    		}
    		else if ($op = 'viewMsg') {
          viewMsg($db, $msgID, $user);
    		}
    		else if ($op = 'cancel') {
          cancelMsg($db, $user, $messages); //!!! WHAT WOULD MESSAGES BE
    		}
    		else if ($op = 'sendMsg') {
          sendMsg($db, $user, $msgData);
    		}
    		else if ($op = 'newMsg') {
          showMsgForm($db, $user);
    		}
    	
    	?>
    <div>
  </div>
  </BODY>
</HTML>
