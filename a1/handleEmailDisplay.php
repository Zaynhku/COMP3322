<?php 

// connect to the db
$conn=mysqli_connect('localhost', 'comp3322', 'agoyal') or die('Error!1'.mysqli_error($conn));

// select db
mysqli_select_db($conn, 'comp3322') or die('Error!2'.mysqli_error($conn));

// defining variables
$mailbox = $_GET['mailbox'];
$lastCount = $_GET['lastCount'];
$recLimit = 5;

// sql query for getting all the mails
$query1 = "SELECT * FROM emails WHERE mailbox='$mailbox'";

// executing the sql query 
$result = mysqli_query($conn, $query1) or die('Error!3'.mysqli_error($conn));

// getting the number of mails
if ($result) {
    $rowCount = mysqli_num_rows($result);    
}

// getting the number of pages
$pageCount = ceil($rowCount/$recLimit);

// display data from the db
while($row = mysqli_fetch_array($result)) {
	print '<tr class="email" id='.$row['emailID'].'>';
	print '<td><input type="checkbox" name="email"></td><td>'.$row['sender'].'</td><td>'.$row['title'].'</td><td>'.$row['date'].'</td>';
    print '</tr>';
}

?>