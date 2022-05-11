*SYSTEM CONFIGURATION USING SHELL SCRIPT 
C:\Users\student>cd.. 
C:\Users>cd.. 
C:\> 
C:\>whoami 
C:\>dir 
C:\>path 
C:\>cd C:\Users\Administrator 
C:\ Users\Administrator>hostname 
C:\ Users\Administrator>systeminfo 

*IMPLEMENT THE FILTER COMMAND 
C:\Users\student>cd.. 
C:\Users>cd.. 
C:\> 
C:\>D: 
D:\>cd D:\lV 
D:\IV>dir bonafide.docx /s/p 

*READ, ADD, REMOVE & MODIFY A RECORD IN TABLE 
create table employee1(eid varchar(20) primary key,name1 char(30),age number(3)); 
desc employee1; 
insert into employee1 values('1','RR',28); 
insert into employee1 values('&eid','&name1',&age); 
select * from employee1; 
select eid from employee1; 
select * from employee1 where eid='&eid'; 
select name1 from employee1 where eid='&eid'; 
delete from employee1 where eid='&eid'; 
delete from employee1; 

*INTERFACE TO CREATE A DATABASE & INSERT TABLE INIT 
DATABASE CREATION 
<?php 
$link = mysqli_connect("localhost", "root", ""); 
if($link === false){ 
die("ERROR: Could not connect. " . mysqli_connect_error()); 
} 
$sql = "CREATE DATABASE DBNAME"; 
if(mysqli_query($link, $sql)){ 
echo "Database created successfully"; 
} else{ 
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); 
} 
mysqli_close($link); 
?> 


*TABLE CREATION USING PHP MYSQL 
<?php 
$link = mysqli_connect("localhost", "root", "", "DBNAME"); 
// Check connection 
if($link === false){ 
die("ERROR: Could not connect. " . mysqli_connect_error()); 
} 
// Attempt create table query execution 
$sql = "CREATE TABLE persons( 
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
first_name VARCHAR(30) NOT NULL, 
last_name VARCHAR(30) NOT NULL, 
email VARCHAR(70) NOT NULL UNIQUE 
)"; 
if(mysqli_query($link, $sql)){ 
echo "Table created successfully."; 
} else{ 
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); 
} 
// Close connection 
mysqli_close($link); 
?> 

*USING CLASSES CREATE A TABLE 
<?php 
$link = mysqli_connect("localhost", "root", "", "demo"); 
// Check connection 
if($link === false){ 
die("ERROR: Could not connect. " . mysqli_connect_error()); 
} 
// Attempt create table query execution 
$sql = "CREATE TABLE persons( 
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
first_name VARCHAR(30) NOT NULL, 
last_name VARCHAR(30) NOT NULL, 
email VARCHAR(70) NOT NULL UNIQUE 
)"; 
if(mysqli_query($link, $sql)){ 
echo "Table created successfully."; 
} else{ 
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); 
} 
// Close connection 
mysqli_close($link); 
?> 


*UPLOAD A FILE TO A SERVER 
<html> 
<head> 
<title>Simple File Upload Script in PHP</title> 
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"> 
</head> 
<body> 
<div class="container"> 
<?php 
if (is_uploaded_file($_FILES['attachment']['tmp_name'])) { 
$newname = dirname(__FILE__) . '/' .basename($_FILES['attachment']['name']); 
if($_FILES['attachment']['size'] > 2097152) { 
$errors[]='File size must be excately 2 MB'; 
} 
$file_ext=strtolower(end(explode('.',$_FILES['attachment']['name']))); 
$extensions= array("pdf","doc","docx"); 
if(in_array($file_ext,$extensions)=== false){ 
$errors[]="File extension not allowed, please choose a PDF, DOC, DOCX file."; 
} 
if(empty($errors)==true){ 
if (!(move_uploaded_file($_FILES['attachment']['tmp_name'], $newname))) { 
echo "<p>ERROR: A problem occurred during file upload!</p>\n"; 
} else { 
echo "<p>The file has been saved as: {$newname}</p>\n"; 
} 
} 
else{ 
print_r($errors); 
} 
} 
?> 
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" Page 32 

enctype="multipart/form-data"> 
<div class="form-group"> 
<label class="col-md-3 control-label">Upload a file (PDF, DOC, DOCX)</label> 
<div class="col-md-6"> 
<input type="file" name="attachment" class="form-control-file" /> 
</div> 
</div> 
<div class="form-group"> 
<div class="col-md-9 col-md-offset-3"> 
<button type="submit" class="btn btn-primary">Submit</button> 
</div> 
</div> 
</form> 
</div> 
</body> 
</html> 


*ACCESS A DATA STORED IN MYSQL TABLE 
Config.php 
<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "mydb"; 
$conn = new mysqli($servername, $username, $password, $dbname); 
if ($conn->connect_error) { 
die("Connection failed: " . $conn->connect_error); 
} 
?> 
Create.php 
<?php 
include "config.php"; 
if (isset($_POST['submit'])) { 
$first_name = $_POST['firstname']; 
$last_name = $_POST['lastname']; 
$email = $_POST['email']; 
$password = $_POST['password']; 
$gender = $_POST['gender']; 
$sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `gender`) VALUES ('$first_name','$last_name','$email','$password','$gender')"; 
$result = $conn->query($sql); 
if ($result == TRUE) { 
echo "New record created successfully."; 
}else{ 
echo "Error:". $sql . "<br>". $conn->error; 
} 
$conn->close(); 
} 
?> 
<!DOCTYPE html> 
<html> 
<body> 
<h2>Signup Form</h2> Page 40 

<form action="" method="POST"> 
<fieldset> 
<legend>Personal information:</legend> 
First name:<br> 
<input type="text" name="firstname"> 
<br> 
Last name:<br> 
<input type="text" name="lastname"> 
<br> 
Email:<br> 
<input type="email" name="email"> 
<br> 
Password:<br> 
<input type="password" name="password"> 
<br> 
Gender:<br> 
<input type="radio" name="gender" value="Male">Male 
<input type="radio" name="gender" value="Female">Female 
<br><br> 
<input type="submit" name="submit" value="submit"> 
</fieldset> 
</form> 
</body> 
</html> 
read.php 
<?php 
include "config.php"; 
$sql = "SELECT * FROM users"; 
$result = $conn->query($sql); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
<title>View Page</title> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
</head> Page 41 

<body> 
<div class="container"> 
<h2>users</h2> 
<table class="table"> 
<thead> 
<tr> 
<th>ID</th> 
<th>First Name</th> 
<th>Last Name</th> 
<th>Email</th> 
<th>Gender</th> 
<th>Action</th> 
</tr> 
</thead> 
<tbody> 
<?php 
if ($result->num_rows > 0) { 
while ($row = $result->fetch_assoc()) { 
?> 
<tr> 
<td><?php echo $row['id']; ?></td> 
<td><?php echo $row['firstname']; ?></td> 
<td><?php echo $row['lastname']; ?></td> 
<td><?php echo $row['email']; ?></td> 
<td><?php echo $row['gender']; ?></td> 
<td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td> 
</tr> 
<?php } 
} 
?> 
</tbody> 
</table> 
</div> 
</body> 
</html> 



*CREATE AND READ CONTENTS FROM THE DIRECTORY 

<?php 
//Thedirectorypath 
$dir= "testdirectory"; 
//Checktheexistenceofdirectory 
if(!file_exists($dir)){ 
// Attempt to create directory 
if(mkdir($dir)) 
{ 
echo "Directorycreatedsuccessfully."; 
} 
else 
{ 
echo "ERROR:Directorycouldnotbecreated."; 
} 
} 
else{ 
echo"ERROR:Directoryalreadyexists."; 
} 
?> 
II) 
<?php 
$dir="testdirectory"; 
//Openadirectory,andreaditscontents 
if(is_dir($dir)) 
{ 
if($dh=opendir($dir)) 
{ 
while(($file=readdir($dh))!==false) 
{ 
echo"filename:".$file."<br>"; 
} 
closedir($dh); 
} 
} 
?> 



*RESULTS OF A STUDENT FROM A HTML FROM
<!DOCTYPEhtml>
<htmllang="en">
<head>
<metacharset="UTF-8">
<metahttp-equiv="X-UA-Compatible" content="IE=edge">
<metaname="viewport"content="width=device-width,initial-scale=1.0">
<title>Document</title>
<linkhref="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"rel="
stylesheet" integrity="sha384-
1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"cros
sorigin="anonymous">
</head>
<body>
<formaction=""method="post">
<labelfor="fname">Firstname:</label>
<inputtype="text"id="name"name="name"><br><br>
<labelfor="mark">Mark:</label>
<inputtype="text"id="mark"name="mark"><br><br>
<labelfor="grade">Grade:</label>
<inputtype="text"id="grade"name="grade"><br><br>
<inputtype="submit"name="submit"value="submit">
</form>
</body>
</html>
<?php
//Create Connection
$conn=mysqli_connect("localhost","root","",“test");
//checkconnection
if(!$conn){
Page 57
die("Connectionfailed:".mysqli_connect_error());
}
if(isset($_POST['submit'])){
$name=$_POST['name'];
$mark=$_POST['mark'];
$grade=$_POST['grade'];
$sql="INSERTINTOdetails(name,marks,grade)
values('$name','$mark','$grade')";echo$sql;
$result=mysqli_query($conn,$sql);
if($result){
echo'inserted seccessfully';
}else{
echo'error';
}
}
/--FETCHINGDATAFROMTABLE--/
$sql="SELECT*FROMdetails";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
//outputdataofeachrow
while($row=$result->fetch_array()){
echo'<table class="table">
<thead>
<tr>
<thscope="col">Id</th>
<thscope="col">Name</th>
<thscope="col">Marks</th>
<thscope="col">Grade</th>
</tr>
</thead>
<tbody>
<tr>
Page 58
<td>'.$row["id"].'</td>
<td>'.$row["name"].'</td>
<td>'.$row["marks"].'</td>
<td>'.$row["grade"].'</td>
</tr>
</tbody>
</table>';
}
}else{
echo"0results";
}
$conn->close();
?>



*PRODUCTS FROM A WEBPAGE TO A SHOPPING CART
//add new key=>value to the HTML5 storage
function SaveItem() {
var name = document.forms.ShoppingList.name.value;
var data = document.forms.ShoppingList.data.value;
localStorage.setItem(name, data);
doShowAll();
}
//------------------------------------------------------------------------------
//change an existing key=>value in the HTML5 storage
function ModifyItem() {
var name1 = document.forms.ShoppingList.name.value;
var data1 = document.forms.ShoppingList.data.value;
//check if name1 is already exists
//check if key exists
if (localStorage.getItem(name1) !=null)
{
//update
localStorage.setItem(name1,data1);
document.forms.ShoppingList.data.value = localStorage.getItem(name1);
}
doShowAll();
}
//-------------------------------------------------------------------------
//delete an existing key=>value from the HTML5 storage
function RemoveItem() {
var name = document.forms.ShoppingList.name.value;
document.forms.ShoppingList.data.value = localStorage.removeItem(name);
doShowAll();
}
//-------------------------------------------------------------------------------------
//restart the local storage
function ClearAll() {
Page 62
localStorage.clear();
doShowAll();
}
//--------------------------------------------------------------------------------------
// dynamically populate the table with shopping list items
//below step can be done via PHP and AJAX too.
function doShowAll() {
if (CheckBrowser()) {
var key = "";
var list = "<tr><th>Item</th><th>Value</th></tr>\n";
var i = 0;
//for more advance feature, you can set cap on max items in the cart
for (i = 0; i <= localStorage.length-1; i++) {
key = localStorage.key(i);
list += "<tr><td>" + key + "</td>\n<td>"
+ localStorage.getItem(key) + "</td></tr>\n";
}
//if no item exists in the cart
if (list == "<tr><th>Item</th><th>Value</th></tr>\n") {
list += "<tr><td><i>empty</i></td>\n<td><i>empty</i></td></tr>\n";
}
//bind the data to html table
//you can use jQuery too....
document.getElementById('list').innerHTML = list;
} else {
alert('Cannot save shopping list as your browser does not support HTML 5');
}
}
/*
=====> Checking the browser support
//this step may not be required as most of modern browsers do support HTML5
*/
//below function may be redundant
function CheckBrowser() {
if ('localStorage' in window && window['localStorage'] !== null) {
// we can use localStorage object to store data
return true;
} else {
Page 63
return false;
}
}
//-------------------------------------------------
/*
You can extend this script by inserting data to database or adding payment processing
API to shopping cart..
*/
td,th {
font-family: monospace;
padding: 4px;
background-color: #ccc;
}
label {
vertical-align: top;
}
#main {
border: 1px dotted blue;
padding: 6px;
background-color: #ccc;
margin-right: 50%;
}
#items_table {
border: 1px dotted blue;
padding: 6px;
margin-top: 12px;
margin-right: 50%;
}
#items_table h3 {
Page 64
font-size: 18px;
margin-top: 0px;
font-family: sans-serif;
}
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<title>HTML5 Local Storage Project</title>
<META charset="UTF-8">
<META name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=
no">
<META NAME='rating' CONTENT='General' />
<META NAME='expires' CONTENT='never' />
<META NAME='language' CONTENT='English, EN' />
<META name="description" content="shopping cart project with HTML5 and
JavaScript">
<META name="keywords" content="HTML5,CSS,JavaScript, html5 session storage,
html5 local storage">
<META name="author" content="dcwebmakers.com">
<script src="Storage.js"></script>
<link rel="stylesheet" href="StorageStyle.css">
</head>
<body onload="doShowAll()">
<h2>Shopping Cart with HTML5 Storage Project</h2>
<p>Insert items and quantity for your shopping cart. </p>
<form name=ShoppingList>
<div id="main">
<table>
<tr>
<td><b>Item:</b><input type=text name=name></td>
<td><b>Quantity:</b><input type=text name=data></td>
Page 65
</tr>
<tr>
<td>
<input type=button value="Save" onclick="SaveItem()">
<input type=button value="Update" onclick="ModifyItem()">
<input type=button value="Delete" onclick="RemoveItem()">
</td>
</tr>
</table>
</div>
<div id="items_table">
<h3>Shopping List</h3>
<table id=list></table>
<p>
<label><input type=button value="Clear" onclick="ClearAll()">
<i>* Delete all items</i></label>
</p>
</div>
</form>
</body>
</html>
