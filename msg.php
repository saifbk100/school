<?php
error_reporting(0);
session_start();

include("dbconfig.php");

    if(isset($_POST['btnSub']))
    {		
        if(empty($_POST['firstname']))
        {
            $err[] = "Enter your name.";
        }
		if(empty($_POST['email']))
        {
            $err[] = "Enter your email.";
        }	
        if(empty($_POST['number']))
        {
            $err[] = "Enter your number.";
        } 
        if(empty($_POST['message']))
        {
            $err[] = "Enter your message.";
        }
        
		if(count($err)==0)
        {
			
            	$full_name         =  $_POST['firstname'];
            	$email             =  $_POST['email'];
            	$number            =  $_POST['number'];
				$message  	 	   =  $_POST['message'];
		
			$sql = "INSERT INTO visitor_comment (full_name, e_mail, phone_number, message) VALUES ('$full_name', '$email', '$number', '$message' )";
					if(mysql_query($sql)){
						
						$_SESSION['reg_message'] = "Thanks for message in our  system";
						header("location:msg.php");
						exit();
					} 
		}else{
				//echo "<span style='color:red'><b>Try Again.</b></span>";
			}
			
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Message</title>
    <link rel="stylesheet" type="text/css" style href="style.css">
    
</head>

<body>
   <div class="container">
            <div class="header clear">
                <div class="logo">
                    <img src="imeges/logo.jpg"style="width:150px;height:100px;">
                </div>
                <div class="m">
                    <h1>Narsingdi pilot High School</h1>
                </div>	
                
            </div>

            <div class="nav clear">
                    <ul>
                       <li><a href="index.html">Home</a></li>
                       <li><a href="link.html">History</a></li>
                       <li><a href="teacher.html">Teacher</a></li>

                       <li><a href="student.html">Student</a></li>
                       <li><a href="Gallery.html">Gallery</a></li>
                       <li><a href="faculty.html">Faculty</a></li>
                       <li><a href="Curriculum.html">Curriculum</a></li>
                    </ul>
            </div>
    </div>
   
   
   
	<div class="msgbox">
					<div style="text-align: center;color: #1233e0;font-size: 29px;margin-top: 33px;display: inline-block;margin-left: 531px;">		
						<?php

							$len = count($err);
							if($len > 0)
							{   
								for($i=0;$i<$len;$i++)
								{
									echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$err[$i]."</div>";
								}
							} 

							if($_SESSION['reg_message'] != "")
							{
							?>
							<div class="alert alert-success alert-dismissable">
							
								<!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>-->
															</div>
								<?=$_SESSION['reg_message']?>
							
							

							<?php 
								unset($_SESSION['reg_message']) ;
								unset($_SESSION['class']);          
							}
							if($_SESSION['alert'] != "")
							{	
							?>
							
							<div class="alert alert-danger<?=$_SESSION['class']?> alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<?=$_SESSION['alert']?>
							</div>
							<?php
								unset($_SESSION['alert']) ;
							}
							?>
					</div>
           <form method="POST" style="margin-top: 110px;">                 
                 <fieldset style="padding-right: 124px;padding-left: 94px;margin-left:273px;margin-right: 204px;padding-top: 50px;padding-bottom: 19px;">
                      
                       <legend>Write Your Message</legend>
                            <label for="fname">Full Name</label>
                                <input type="text" id="fname" name="firstname" placeholder="Your name.."required>

                                <label for="Email">E-mail</label><br><br>
                                    <input type="email" id="email" name="email" placeholder="Your E-mail.." required="" style=" width: 644px;height: 37px;"><br><br>

                                      <label for="number">Phone Number</label><br><br>
                                    <input type="number" id="number" name="number" placeholder="Your Phone Number.." style="width: 648px;height: 33px;"required><br><br><br>

                           <textarea name="message" rows="4" cols="50" style="height: 147px;width:                     654px;"placeholder="Your Message..">
                            </textarea>
                            
                            <button type="submit" name="btnSub" style="width: 125px;height: 45px;color: black; background: tan;">Submit</button>
                        <!--<input type="submit" name="btnSub" value="Submit">-->
                </fieldset>
          </form>
    </div>

	
<div class="footer2 clear">
	
		<div class="con clear">
			Contact Us<br>
			Narsingdi pilot High School,<br>
			Narsingdi – 6000.<br>
			Telephone:  0721-776347<br>
			Cellphone:02889765<br>
			E-mail:  info@rcs.edu.bd<br>
	
		</div>
	    <div class="abo clear"> 
			About Us<br>
			Narsingdi pilot High Schoolis the first<br>
			and oldest school in the country and has a <br>
			long tradition and reputation of spreading<br>
			the light of education. Throughout the country<br>
			the school has produced thousands of qualified?<br>
			citizens to serve the nation.<br>
		
		</div>
		
	</div>
</body>
</html>