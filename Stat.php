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

	$DBConnection = mysqli_connect($DBSERVER,$DBUSER,$DBPASS,$DBASE);
	if (!$DBConnection)
	{
		die('Could not connect: ' . mysqli_connect_error());
	}
	$IP = $_SERVER["REMOTE_ADDR"];
	$IP = mb_convert_encoding($IP, "UTF-8");
	$IP = mysqli_real_escape_string($DBConnection,$IP);
	$Date = date("Y-m-d");
	$Date = mb_convert_encoding($Date, "UTF-8");
	$Date = mysqli_real_escape_string($DBConnection,$Date);
	$Time = date("h:i:sa");
	$Time = mb_convert_encoding($Time, "UTF-8");
	$Time = mysqli_real_escape_string($DBConnection,$Time);
	$Month = date("n");
	$Month = mb_convert_encoding($Month, "UTF-8");
	$Month = mysqli_real_escape_string($DBConnection,$Month);
	$DBQuery = "INSERT INTO `IPTable` (`IP`, `Date`, `Time`,`Month`) VALUES ('$IP', '$Date', '$Time', '$Month');";
	mysqli_query($DBConnection,$DBQuery);
	mysqli_close($DBConnection);
?>