<?php
/**
 * IPStatistics is a simple, database-driven PHP Analytics API that can be run as a plugin for PHP websites..
 * 
 * Copyright (C) 2016 - 2019 James Phillips, Released under the GNU GPL v3.0 or later.
 * 
 * This program is free software: you can redistribute it and/or modify it under the terms of the 
 * GNU General Public License as published by the Free Software Foundation, either version 3 of the License, 
 * or (at your option) any later version.  This program is distributed in the hope that it will be useful, 
 * but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.   
 * You should have received a copy of the GNU General Public License along with this program.
 * If not, see <http://www.gnu.org/licenses/>.
 **/
namespace IPStatistics
{
  /**
   * Driver class for the IPStatistics API.  You'll want to call this.
   **/
  define("AccessToken", true);// Make the API files accessible.
  require_once("databaseLogin.php");// Login details.
  require_once("connector.php");// Connects the database to the UI.
  require_once("userInterface.php");// Calls the UI components.

  class IPStatistics
  {
    public function __construct()// Unused constructor.
    {
    }

    /**
     * Records a visit to the site.
     **/
    public function record()
    {
      connector::recordData();
    }

    /**
     * Outputs raw visit data to the page.
     **/
    public function data()
    {
      $data = connector::getData();
      userInterface::buildDataInterface($data);
    }

    /**
     * Outputs the visit graph for the past year.
     **/
    public function graph()
    {
      $data = connector::getData();
      userInterface::buildGraphInterface($data);
    }
  }
}
?>