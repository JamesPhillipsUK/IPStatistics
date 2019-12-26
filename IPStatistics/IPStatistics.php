<?php
/**
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
namespace IPStatistics
{
  class IPStatistics
  {
    public function __construct()
    {
      require_once("databaseLogin.php");
      require_once("connector.php");
      require_once("userInterface.php");
    }

    public function record()
    {
      connector.recordData();
    }

    public function print()
    {
      $data = connector.getData();
      userInterface.buildDataInterface($data);
    }

    public function data()
    {
      $data = connector.getData();
      userInterface.buildGraphInterface($data);
    }
  }
}
?>