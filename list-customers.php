<?php
	// Retrieve data from RESTful service
	$json_response = file_get_contents('http://localhost/GitHubExamples/restful-services/customers/getcustomers');
	// Transformation from JSON to array (stdClass Object) 
	$customers = json_decode($json_response);
?>

<html>
<head>
<title> Testing RESTful service </title>
</head>
<body>

<h1>Creating a RESTful service with PHP in 5 minutes</h1>

<table>
<tr>
<th>Code</th>
<th>Name</th>
<th>Birthdate</th>
</tr>

<?php 
	// Loop results to print in a table
	foreach ($customers as $customer) {
			// Transformation from stdClass Object to a regular array
			$customer = get_object_vars($customer);
?>
<tr>
<td><?php echo $customer['code']?></td>
<td><?php echo $customer['name']?></td>
<td><?php echo $customer['birthdate']?></td>
</tr>
<?php } //foreach ?>

</table>

</body>
</html>

