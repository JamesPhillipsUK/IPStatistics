<?php
namespace IPStatistics
{
	defined('AccessToken') or die(header('HTTP/1.0 403 Forbidden'));// Security check.
  abstract class connector
  {
		/**
		 * Connects to the database using the namespace-level constants defined in databaseLogin.
		 * @return connection a MySLQi database connection object.
		 **/
    private static function connect()
    {
      $connection = mysqli_connect(DATABASESERVER, DATABASEUSER, DATABASEPASSWORD, DATABASENAME);
      if (!$connection)
        die('Could not connect to database');
      return $connection;
    }

		/**
		 * Closes a database connection using the namespace-level constants defined in databaseLogin.
		 * @param connection a MySLQi database connection object.
		 **/
    private static function close($conection)
    {
      if (!empty($connection))
        mysqli_close($connection);
    }

		/**
		 * Records a visit to the website and adds it to the database.
		 **/
    public static function recordData()
    {
      $connection = connector::connect();
      $iP = mysqli_real_escape_string($connection,mb_convert_encoding($_SERVER["REMOTE_ADDR"], "UTF-8"));
      $date = mysqli_real_escape_string($connection,mb_convert_encoding(date("Y-m-d"), "UTF-8"));
      $time = mysqli_real_escape_string($connection,mb_convert_encoding(date("h:i:sa"), "UTF-8"));
      $month = mysqli_real_escape_string($connection,mb_convert_encoding(date("n"), "UTF-8"));
      $query = "INSERT INTO `IPTable` (`IP`, `Date`, `Time`,`Month`) VALUES ('$iP', '$date', '$time', '$month');";
      mysqli_query($connection,$query);
      connector::close($connection);
    }

		/**
		 * Gets all of the visit data for a year and returns it as an array.
		 * @return array the array of database data.
		 **/
    public static function getData()
    {
      $totalVisitors = 0;
      $totalDaysVisitors = 0;
      $totalMonthsVisitors = 0;
      $monthlyUsers = array_fill(0,12,0);
      $lastMonthVisitors = array();
      $lastDayVisitors = array();
      $monthlyUsersAsPercentage = array();
      $connection = connector::connect();
      $query = "SELECT * FROM IPTable WHERE ID > 0 AND Date > CURDATE() - INTERVAL 1 YEAR;";
      $result = mysqli_query($connection,$query) or die('Failed to get values from database.');
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        $iD = $row['ID'];
        $iP = $row['IP'];
        $date = $row['Date'];
        $time = $row['Time'];
        $month = $row['Month'];
        $today = date("Y-m-d");
        if ($date == $today)
        {
          $lastDayVisitors[$totalDaysVisitors] = $iP;
          $totalDaysVisitors = $totalDaysVisitors + 1;
        }
        if (strtotime($date) > strtotime('-30 days'))
        {
          $lastMonthVisitors[$totalMonthsVisitors] = $iP;
          $totalMonthsVisitors = $totalMonthsVisitors + 1;
        }
        for($count = 1; $count < 13; $count++)
        {
          if ($count == $month)
            $monthlyUsers[$count - 1]++;
        }
        $totalVisitors++;
      }
      connector::close($connection);
      $count = 0;
      foreach($monthlyUsers as $amount)
      {
        $monthlyUsersAsPercentage[$count] = ($amount/$totalVisitors)*100;
        $count++;
      }
      unset($count);

      return array($totalVisitors, $totalDaysVisitors, $totalMonthsVisitors, $monthlyUsers, $lastMonthVisitors, $lastDayVisitors, $monthlyUsersAsPercentage);
    }
  }
}
?>