<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Welcome to Online Exam</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link href="quiz.css" rel="stylesheet" type="text/css">
	</head>

	<body>
			<?php
				include("header.php");
				include("database.php");
				extract($_POST);

				if(isset($submit))
				{
						$query="insert into mst_user(user_id,login,city,phone,email) values('$uid','$lid','$city','$phone','$email')";
						$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
						$_SESSION[login]=$lid;
				}

				if (isset($_SESSION[login]))
				{
					echo "<h1 class='text-center bg-danger'>Welcome to Online Exam</h1>";
					echo '<table width="28%"  border="0" align="center">
					  <tr>
					    <td width="7%" height="65" valign="bottom"><img src="image/HLPBUTT2.JPG" width="50" height="50" align="middle"></td>
					    <td width="93%" valign="bottom" bordercolor="#0000FF"> <a href="sublist.php" class="style4">Subject for Quiz </a></td>
					  </tr>
					  <tr>
					    <td height="58" valign="bottom"><img src="image/DEGREE.JPG" width="43" height="43" align="absmiddle"></td>
					    <td valign="bottom"> <a href="result.php" class="style4">Result </a></td>
					  </tr>
				
					</table>';
					exit;
				}
			?>

			<script language="javascript">
				function check()
				{

				 if(document.form1.lid.value=="")
				  {
				    alert("Plese Enter Login Id");
					document.form1.lid.focus();
					return false;
				  }
				 
				 if(document.form1.pass.value=="")
				  {
				    alert("Plese Enter Your Password");
					document.form1.pass.focus();
					return false;
				  } 
				  if(document.form1.cpass.value=="")
				  {
				    alert("Plese Enter Confirm Password");
					document.form1.cpass.focus();
					return false;
				  }
				  if(document.form1.pass.value!=document.form1.cpass.value)
				  {
				    alert("Confirm Password does not matched");
					document.form1.cpass.focus();
					return false;
				  }
				  if(document.form1.name.value=="")
				  {
				    alert("Plese Enter Your Name");
					document.form1.name.focus();
					return false;
				  }
				  if(document.form1.address.value=="")
				  {
				    alert("Plese Enter Address");
					document.form1.address.focus();
					return false;
				  }
				  if(document.form1.city.value=="")
				  {
				    alert("Plese Enter City Name");
					document.form1.city.focus();
					return false;
				  }
				  if(document.form1.phone.value=="")
				  {
				    alert("Plese Enter Contact No");
					document.form1.phone.focus();
					return false;
				  }
				  if(document.form1.email.value=="")
				  {
				    alert("Plese Enter your Email Address");
					document.form1.email.focus();
					return false;
				  }
				  e=document.form1.email.value;
						f1=e.indexOf('@');
						f2=e.indexOf('@',f1+1);
						e1=e.indexOf('.');
						e2=e.indexOf('.',e1+1);
						n=e.length;

						if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
						{
							alert("Please Enter valid Email");
							document.form1.email.focus();
							return false;
						}
				  return true;
				}  
			</script>


			<table width="100%" border="0">
				  	<tr>
				     <td><form name="form1" method="post" onsubmit="return check();">
						<table class=" table table-striped">
						
				         <tr>
				           <td class="style7">Name</div></td>
				           <td><input class="form-control"type="text" name="lid"></td>
				         </tr>
				         <tr>
				           <td valign="top" class="style7">City</td>
				           <td><input class="form-control" name="city" type="text" id="city"></td>
				         </tr>
				         <tr>
				           <td valign="top" class="style7">Phone</td>
				           <td><input class="form-control" name="phone" type="text" id="phone"></td>
				         </tr>
				         <tr>
				           <td valign="top" class="style7">E-mail</td>
				           <td><input class="form-control" name="email" type="text" id="email"></td>
				         </tr>
				         <tr>
				           <td>&nbsp;</td>
				           <td><input class="btn btn-danger" type="submit" name="submit" value="Start Test">
				           </td>
				        </tr>
			       </table>
			     </form></td>
			 	</tr>
			</table>
	</body>
</html>