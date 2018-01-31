<html>
  <head>
    <title>Search Results</title>
	<style type = "text/css">
		table {
			background-color: lightblue;
			border-collapse: collapse;
			border: 1px solid gray;
		}
		
		td { 
			padding: 5px;
		}
		
		tr:nth-child(odd) {
			background-color: white;
		}
	</style>
  </head>
  <body>
    <?php
		
		// Report all errors except E_NOTICE and E_WARNING
		error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
		
	  $select = $_POST["select"];
	  
	  $query = "SELECT " . $select . " FROM books";
	  
	  // Connect to MySQL
	  $conn = mysqli_connect("localhost", "root", "", "products") or die("Failed to connect to MySQL!");
	
	  // open Products database
	  //$z = mysqli_select_db($conn, "products") or die("Could not open products database!");
	
	  // query Products database
	  $result = mysqli_query($conn, $query) or die("<p>Could not execute query!");
	  
	  mysqli_close( $conn );
	?>
	
	<table>
		<?php
			// fetch each record in result set
			while( $row = mysqli_fetch_row($result) )
			{
				// build table to display results
				print "<tr>";
				
				foreach($row as $value)
					print "<td>$value</td>";
				
				print "</tr>";
			}
		?>
	</table>
	
	<p>Your query returned
	   <?php print mysqli_num_rows($result); ?> rows.</p>
  </body
</html>