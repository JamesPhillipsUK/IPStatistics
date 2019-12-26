<?php
include("IPStatistics/IPStatistics.php");
use IPStatistics\IPStatistics as IPStatistics;

$stats = new IPStatistics();
$stats.record();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Stats UI</title>
</head>
<body>
<?php $stats.graph(); ?>
  <br />
<?php $stats.data(); ?>
</body>
</html>