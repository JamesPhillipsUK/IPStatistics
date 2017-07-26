<?php
/**
 * IPStatistics, Originally created by James Phillips <james@jamesphillipsuk.com> 2016 - released to GitHub 2017.  
 * IPStatistics is a PHP plugin to allow website admins to monitor their analytics.
 * 
 * Copyright (C) 2016 James Phillips, Released under the GNU GPL v3.0 or later.
 * 
 * This program is free software: you can redistribute it and/or modify it under the terms of the 
 * GNU General Public License as published by the Free Software Foundation, either version 3 of the License, 
 * or (at your option) any later version.  This program is distributed in the hope that it will be useful, 
 * but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.   
 * You should have received a copy of the GNU General Public License along with this program.
 * If not, see <http://www.gnu.org/licenses/>.
 * 
**/

function AccessDBStats()
{
	global $DBUSER, $DBPASS, $DBSERVER; //Invite the Global vars.
	$TotalVisitors = 0;
	$TotalDaysVisitors = 0;
	$TotalMonthsVisitors = 0;
	$UsersInJan = 0;
	$UsersInFeb = 0;
	$UsersInMar = 0;
	$UsersInApr = 0;
	$UsersInMay = 0;
	$UsersInJun = 0;
	$UsersInJul = 0;
	$UsersInAug = 0;
	$UsersInSep = 0;
	$UsersInOct = 0;
	$UsersInNov = 0;
	$UsersInDec = 0;
	$LastMonthVisitors = array();
	$LastDayVisitors = array();
	$DBConnection = mysqli_connect($DBSERVER,$DBUSER,$DBPASS,$DBASE);
	if (!$DBConnection)
	{
		die('Could not connect: ' . mysqli_connect_error());
	}

	$DBQuery = "SELECT * FROM IPTable WHERE ID > 0 AND Date > CURDATE() - INTERVAL 1 YEAR;";
	$DBResult = mysqli_query($DBConnection,$DBQuery) or die(mysqli_connect_error());
	while($DBRow = mysqli_fetch_array($DBResult, MYSQLI_ASSOC))
	{
		$ID = $DBRow['ID'];
		$IP = $DBRow['IP'];
		$Date = $DBRow['Date'];
		$Time = $DBRow['Time'];
		$Month = $DBRow['Month'];
		$Today = date("Y-m-d");
		if ($Date == $Today)
		{
			$LastDayVisitors[$TotalDaysVisitors] = $IP;
			$TotalDaysVisitors = $TotalDaysVisitors + 1;
		}
		if (strtotime($Date) > strtotime('-30 days'))
		{
			$LastMonthVisitors[$TotalMonthsVisitors] = $IP;
			$TotalMonthsVisitors = $TotalMonthsVisitors + 1;
		}
		if ($Month == 1)
		{
			$UsersInJan = $UsersInJan + 1;
		}
		else if ($Month == 2)
		{
			$UsersInFeb = $UsersInFeb + 1;
		}
		else if ($Month == 3)
		{
			$UsersInMar = $UsersInMar + 1;
		}
		else if ($Month == 4)
		{
			$UsersInApr = $UsersInApr + 1;
		}
		else if ($Month == 5)
		{
			$UsersInMay = $UsersInMay + 1;
		}
		else if ($Month == 6)
		{
			$UsersInJun = $UsersInJun + 1;
		}
		else if ($Month == 7)
		{
			$UsersInJul = $UsersInJul + 1;
		}
		else if ($Month == 8)
		{
			$UsersInAug = $UsersInAug + 1;
		}
		else if ($Month == 9)
		{
			$UsersInSep = $UsersInSep + 1;
		}
		else if ($Month == 10)
		{
			$UsersInOct = $UsersInOct + 1;
		}
		else if ($Month == 11)
		{
			$UsersInNov = $UsersInNov + 1;
		}
		else if ($Month == 12)
		{
			$UsersInDec = $UsersInDec + 1;
		}
		$TotalVisitors = $TotalVisitors + 1;
	}
	$UsersInJan = ($UsersInJan/$TotalVisitors)*100;
	$UsersInFeb = ($UsersInFeb/$TotalVisitors)*100;
	$UsersInMar = ($UsersInMar/$TotalVisitors)*100;
	$UsersInApr = ($UsersInApr/$TotalVisitors)*100;
	$UsersInMay = ($UsersInMay/$TotalVisitors)*100;
	$UsersInJun = ($UsersInJun/$TotalVisitors)*100;
	$UsersInJul = ($UsersInJul/$TotalVisitors)*100;
	$UsersInAug = ($UsersInAug/$TotalVisitors)*100;
	$UsersInSep = ($UsersInSep/$TotalVisitors)*100;
	$UsersInOct = ($UsersInOct/$TotalVisitors)*100;
	$UsersInNov = ($UsersInNov/$TotalVisitors)*100;
	$UsersInDec = ($UsersInDec/$TotalVisitors)*100;
	mysqli_close($DBConnection);   
?>
<div style="padding-top:1em;">
	<style>
		*{padding:0 0 0 0;margin:0 0 0 0;}
		.Month{display:block;text-overflow:clip;white-space:nowrap;overflow:hidden;float:left;}
		@media screen and (min-width:651px)
		{
			#MainWrapper{display:flex;width:80%;margin:1rem auto 0 auto;}
			#LeftData{flex:0 0 50%;}
			#RightData{flex:1;}
		}
		@media screen and (max-width:650px)
		{
			#MainWrapper{display:block;width:80%;margin:1rem auto 0 auto;}
			#LeftData{width:100%;display:block;}
			#RightData{width:100%;display:block;}
		}
	</style>
	<h1>Month - by - Month Traffic Breakdown</h1>
	<div style = "margin:0 auto 0 auto; width:80%; background-color:#EFEFEF;padding:0 0 0 0;">
		<p>Total: <?php echo $TotalVisitors;?></p>
		<div style="background-color:#FFFF66;width:<?php echo $UsersInJan; ?>%;" class="Month"><p>Jan, <?php echo round($UsersInJan,3); ?>&#37;</p></div>
		<div style="background-color:#99FF33;width:<?php echo $UsersInFeb; ?>%;" class="Month"><p>Feb, <?php echo round($UsersInFeb,3); ?>&#37;</p></div>
		<div style="background-color:#FF9966;width:<?php echo $UsersInMar; ?>%;" class="Month"><p>Mar, <?php echo round($UsersInMar,3); ?>&#37;</p></div>
		<div style="background-color:#00FFFF;width:<?php echo $UsersInApr; ?>%;" class="Month"><p>Apr, <?php echo round($UsersInApr,3); ?>&#37;</p></div>
		<div style="background-color:#CC99FF;width:<?php echo $UsersInMay; ?>%;" class="Month"><p>May, <?php echo round($UsersInMay,3); ?>&#37;</p></div>
		<div style="background-color:#FF66CC;width:<?php echo $UsersInJun; ?>%;" class="Month"><p>Jun, <?php echo round($UsersInJun,3); ?>&#37;</p></div>
		<div style="background-color:#66FFCC;width:<?php echo $UsersInJul; ?>%;" class="Month"><p>Jul, <?php echo round($UsersInJul,3); ?>&#37;</p></div>
		<div style="background-color:#996633;width:<?php echo $UsersInAug; ?>%;" class="Month"><p>Aug, <?php echo round($UsersInAug,3); ?>&#37;</p></div>
		<div style="background-color:#FF6600;width:<?php echo $UsersInSep; ?>%;" class="Month"><p>Sep, <?php echo round($UsersInSep,3); ?>&#37;</p></div>
		<div style="background-color:#FF0000;width:<?php echo $UsersInOct; ?>%;" class="Month"><p>Oct, <?php echo round($UsersInOct,3); ?>&#37;</p></div>
		<div style="background-color:#993399;width:<?php echo $UsersInNov; ?>%;" class="Month"><p>Nov, <?php echo round($UsersInNov,3); ?>&#37;</p></div>
		<div style="background-color:#0000CC;width:<?php echo $UsersInDec; ?>%;" class="Month"><p>Dec, <?php echo round($UsersInDec,3); ?>&#37;</p></div>
	</div>
<div>
<div id="MainWrapper">
	<div id="LeftData">
		<h2>Today&#39;s Stats</h1>
		<p>Number of people on today:<?php echo $TotalDaysVisitors;?></p>
		<p>Addresses of people on today:<br />
			<pre style="font-size:0.9rem;"><?php print_r(array_count_values($LastDayVisitors)); ?></pre>
		</p>
	</div>
	<div id="RightData">
		<h2>This Month&#39;s Stats</h1>
		<p>Number of people on this month (30 days):<?php echo $TotalMonthsVisitors;?></p>
		<p>Addresses of people on this month (30 days):<br />
			<pre style="font-size:0.9rem;"><?php print_r(array_count_values($LastMonthVisitors)); ?></pre>
		</p>
	</div>
</div>
<?php
}
include (../DataBaseDetails.inc)
AccessDBStats();
?>
