<?php
/**
 * This file contains an example of how IPStatistics can be used.  It contains all three recommended API calls: record, graph, and data.
 **/
include("IPStatistics/IPStatistics.php");
use IPStatistics\IPStatistics as IPStatistics;

$stats = new IPStatistics();
$stats->record();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Stats UI</title>
</head>
<body>
<?php $stats->graph(); ?>
  <br />
<?php $stats->data(); ?>
</body>
</html>