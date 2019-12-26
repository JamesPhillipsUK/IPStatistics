# IPStatistics
IPStatistics, Originally created by James Phillips <[james@jamesphillipsuk.com](mailto:james@jamesphillipsuk.com "Send a Message")> 2016 - released to GitHub 2017.  
IPStatistics is a PHP plugin to allow website admins to monitor their analytics.

## About
IPStatistics is a simple, database-driven PHP Analytics plugin for websites.  It consists of two main scripts: Stat.php  - which logs statistics when run on every page, and Analyse.php - which analyses and formats these statistics for your use.

### Simplicity
In an aim to be as simple and efficient as possible, this plugin consists of only:

| Code            | Amount    | Purpose                                                                                                |
|:--------------- |:--------- |:------------------------------------------------------------------------------------------------------ |
| Includes (.inc) | 6 lines   | To hold database login data above the web root.                                                        |
| PHP             | 220 lines | This is a combination of both: the mechanism that gathers analytic data, and the one that analyses it. |

## Installation
1. Fill in the gaps in DataBaseDetails.inc with your database login details.
2. Save DataBaseDetails.inc above the web root on your server.
3. Create a MySQL database and table.  The table needs to contain the following SQL structure: 
```SQL
CREATE TABLE IPTable('ID' BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,'IP' VARCHAR(25) NOT NULL,'Date' DATE NOT NULL,Time VARCHAR(10) NOT NULL,'Month' INT(11) NOT NULL);
```
4. Save Stat.php and Analyse.php below the web root.
5. Insert the following code into each page of the site where you want to take analytics:
```PHP
<?php
  include("./Stat.php"); //Gather stats for analytics.
?>
```
6. When you want to check your site analytics, simply navigate to your web address /Analyse.php.

## GDPR
>"A much discussed topic is the IP address. The GDPR states that IP addresses should be considered personal data as it enters the scope of ‘online identifiers’." - eugdprcompliant.com/personal-data.  

As such, you should handle IP addresses as you would with any personal data under GDPR.  I'm not here to offer legal advice, but I ask that if you choose to use software I've created - you ensure that you do so in accordance with the law.

## Release Details
This plugin was released on 26th July 2017 under the GNU General Public License v3.0 or later by James Phillips.  See the LICENSE file for more details.
