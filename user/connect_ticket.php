<?php
include ("connect_database.php");
// Search
	$query = $_GET['query']; 
	// gets value sent over search form
	
	$min_length = 3;
	// you can set minimum length of the query if you want
	
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		
		$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to >
		
		$query = mysqli_real_escape_string($connection, $query);
		// makes sure nobody uses SQL injection
		
		$raw_results = mysqli_query($connection, "SELECT * FROM complaint
			WHERE (`ticket` LIKE '%".$query."%') OR (`ticket` LIKE '%".$query."%')") or die(mysqli_error());
			
		// * means that it selects all fields, you can also write: `id`, `title`, `text`
		// articles is the name of our table
		
		// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
		
		if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			
			while($results = mysqli_fetch_array($raw_results)){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
			
				echo "<p><h3>".$results['ticket']."</h3>".$results['status_ticket']."</p>";
				// posts results gotten from database(title and text) you can also show id ($results['id'])
				$x = $results ['status_ticket'];
			}
			
		}
		else{ // if there is no matching rows do following
			echo "No results";
			$x = 'No Results';
		}
		
	}
	else{ // if query length is less than minimum
		echo "Minimum length is ".$min_length;
		$x = 'No Results';
	}
    header("location:search_ticket.php?Ticket=$x");
?>