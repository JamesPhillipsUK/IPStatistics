<?php
/**
 * This file contains an example of how IPStatistics can be used.  It contains all three recommended API calls: record, graph, and data.
 **/
include("IPStatistics/IPStatistics.php");// Include the IPStatistics API.
use IPStatistics\IPStatistics as IPStatistics;// Access the API.

$stats = new IPStatistics();// Create an instance of the Statistics.
$stats->record();// Record the visit.
?>
<!-- This file contains an example of how IPStatistics can be used.  It should not be implemented on your website as-is.  Use this for inspiration for how to implement IPStatistics. -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Website Stats</title>
</head>
<body>
  <h1>My Website Stats</h1>
  <p>This page shouldn't be implemented on your website as-is.  Use this for inspiration for how to implement IPStatistics.  You may want to implement the <code>$stats->record();</code> API call on multiple pages, but you'll probably only want to implement <code>$stats->graph();</code> and <code>$stats->data();</code> in a secure backend page.</p>
<?php $stats->graph();// Display a graph of the visit data. ?>
  <br />
<?php $stats->data();// Display the raw data, including IP addresses. ?>
</body>
</html>