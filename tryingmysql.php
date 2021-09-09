<?php
$link=mysqli_connect("localhost","root","","testdb");


if($link==false){
	die("error : ".mysqli_connect_error());
	}	
else
print("Working");

$qr="select*from student";


$res=mysqli_query($link,$qr) or die("problem reading table".mysqli_error());

echo'<table style="border:2px solid black;">';
while($row=mysqli_fetch_array($res)){
	echo"<tr>";
		echo"<td>".$row['name']."<td>";
		echo"<td>".$row['address']."<td>";
		echo"<td>".$row['dob']."<td>";
		echo"</tr>";
	}
	echo"</table>";
$newqr="update student set name='AthilaeshKing' where roll_no=1";
$res=mysqli_query($link,$newqr) or die("problem updating".mysqli_error());
echo"<table>";
$res=mysqli_query($link,'update student set name="Snew" where name="Suhash"') or die("problem updating".mysqli_error());
$res=mysqli_query($link,'select name from student') or die("problem reading table".mysqli_error());

$res=mysqli_query($link,'delete from student where address="erode"') or die("problem reading table".mysqli_error());
$res=mysqli_query($link,'insert into student values(4,"newperson","erode","2001-02-02")') or die("problem reading table".mysqli_error());
while($row=mysqli_fetch_array($res)){
	echo"<tr>";
		echo"<td>".$row['name']."<td>";
		echo"<td>".$row['address']."<td>";
		echo"<td>".$row['dob']."<td>";
		echo"</tr>";
	}
	echo"</table>";



?>