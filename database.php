<!-- Querying a database and displaying the results. -->
<?php
	// Turn off all error reporting
	//error_reporting(0);
	
	// Report all errors except E_NOTICE and E_WARNING
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
?>
<html>
  <head>
    <title>Search Results</title>
	<style type = "text/css">
		body { font-family: sans-serif;
				background-color: lightyellow; }
		table { background-color: lightblue;
				border-collapse: collapse;
				border: 1px solid gray; }
		td	{ padding: 5px; }
		tr:nth-child(odd) {
			background-color: white; }
	</style>
  </head>
  <body>
    <?php 
		
	  $select = $_POST["select"];
	  
	  $query = "SELECT " . $select . " FROM books";
	  
	  // Connect to MySQL
	  if ( !$conn = mysqli_connect("localhost", "root", "") ){
			die("Failed to connect to MySQL!<br/>" . mysqli_connect_error());
		}
	
	  // open Products database
	  if ( !mysqli_select_db($conn, "products") )
			die("Could not open products database!<br/>" . mysqli_error($conn));
	
	  // query Products database
	  if ( !($result = mysqli_query($conn, $query) ) )
	  {
			print( "<p>Could not execute query!</p>" );
			die("<h3>" . mysqli_error($conn) . "</h3>");
	  }
	  
	  mysqli_close( $conn );
	?>
	
	<table>
		<caption>Results of <strong><?php print $query ?></strong></caption>
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