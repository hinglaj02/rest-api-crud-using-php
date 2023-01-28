<?php

//fetch.php

$api_url = "http://localhost/rest-api-crud-using-php/api/test_api.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client); // will receive data in json format

$result = json_decode($response); //converting into php

$output = '';

if(count($result) > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<table>
		<tr>
			<td>'.$row->first_name.'</td>
			<td>'.$row->last_name.'</td>
			<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button></td>
			<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button></td>
		</tr>
		</table>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">No Data Found</td>
	</tr>
	';
}

echo $output; // this will sent data to the ajax request

?>