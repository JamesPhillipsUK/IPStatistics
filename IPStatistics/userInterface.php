<?php
namespace IPStatistics
{
  abstract class userInterface
  {
    public function buildDataInterface($data)
    {
      $totalDaysVisitors = $data[1];
      $lastDayVisitors = $data[5];
      $totalMonthsVisitors = $data[2];
      $lastMonthVisitors = $data[4];
      echo 
'<div id="today">
  <h2>Today&#39;s Stats</h1>
  <p>Number of visitors today:';  
      echo $totalDaysVisitors . '</p>
  <p>IP Addresses of visitors today:<br />
    <pre style="font-size:0.9rem;">'; 
      print_r(array_count_values($lastDayVisitors));
      echo '</pre>
  </p>
</div>
<div id="month">
  <h2>This Month&#39;s Stats</h1>
  <p>Number of visitors this month (last 30 days):';
      echo $totalMonthsVisitors . '</p>
  <p>IP Addresses of visitors this month (last 30 days):<br />
    <pre style="font-size:0.9rem;">';
      print_r(array_count_values($lastMonthVisitors));
      echo '</pre>
  </p>
</div>';
    }
    public function buildGraphInterface($data)
    {
      $monthlyUsersAsPercentage = $data[6];
      echo '<style>#graph{margin:0 auto; width:80%; background-color:#EFEFEF;padding:0;}#graph *{padding:0;margin:0;}.month{display:block;text-overflow:clip;white-space:nowrap;overflow:hidden;float:left;}</style>';
      echo '<div id="graph">
  <h1>Your visitors over the past year</h1>
  <p>Total: <?php echo $TotalVisitors;?></p>
  <div style="background-color:#FFFF66;width:' . $monthlyUsersAsPercentage[0] . '%;" class="month">
    <p>Jan, ' . round($monthlyUsersAsPercentage[0], 3) . '&#37;</p>
  </div>
  <div style="background-color:#99FF33;width:' . $monthlyUsersAsPercentage[1] . '%;" class="month">
    <p>Feb, ' . round($monthlyUsersAsPercentage[1], 3) . '&#37;</p>
  </div>
  <div style="background-color:#FF9966;width:' . $monthlyUsersAsPercentage[2] . '%;" class="month">
    <p>Mar, ' . round($monthlyUsersAsPercentage[2], 3) . '&#37;</p>
  </div>
  <div style="background-color:#00FFFF;width:' . $monthlyUsersAsPercentage[3] . '%;" class="month">
    <p>Apr, ' . round($monthlyUsersAsPercentage[3], 3) . '&#37;</p>
  </div>
  <div style="background-color:#CC99FF;width:' . $monthlyUsersAsPercentage[4] . '%;" class="month">
    <p>May, ' . round($monthlyUsersAsPercentage[4], 3) . '&#37;</p>
  </div>
  <div style="background-color:#FF66CC;width:' . $monthlyUsersAsPercentage[5] . '%;" class="month">
    <p>Jun, ' . round($monthlyUsersAsPercentage[5], 3) . '&#37;</p>
  </div>
  <div style="background-color:#66FFCC;width:' . $monthlyUsersAsPercentage[6] . '%;" class="month">
    <p>Jul, ' . round($monthlyUsersAsPercentage[6], 3) . '&#37;</p>
  </div>
  <div style="background-color:#996633;width:' . $monthlyUsersAsPercentage[7] . '%;" class="month">
    <p>Aug, ' . round($monthlyUsersAsPercentage[7], 3) . '&#37;</p>
  </div>
  <div style="background-color:#FF6600;width:' . $monthlyUsersAsPercentage[8] . '%;" class="month">
    <p>Sep, ' . round($monthlyUsersAsPercentage[8], 3) . '&#37;</p>
  </div>
  <div style="background-color:#FF0000;width:' . $monthlyUsersAsPercentage[9] . '%;" class="month">
    <p>Oct, ' . round($monthlyUsersAsPercentage[9], 3) . '&#37;</p>
  </div>
  <div style="background-color:#993399;width:' . $monthlyUsersAsPercentage[10] . '%;" class="month">
    <p>Nov, ' . round($monthlyUsersAsPercentage[10], 3) . '&#37;</p>
  </div>
  <div style="background-color:#0000CC;width:' . $monthlyUsersAsPercentage[11] . '%;" class="month">
    <p>Dec, ' . round($monthlyUsersAsPercentage[11], 3) . '&#37;</p>
  </div>
</div>';
    }
  }
}
?>
