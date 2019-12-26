# IPStatistics

IPStatistics, Originally created by James Phillips <[james@jamesphillipsuk.com](mailto:james@jamesphillipsuk.com "Send a Message")> 2016 - released to GitHub 2017.  
IPStatistics is a PHP API to allow website admins to monitor their analytics based on the IP addresses of visitors.

## About

IPStatistics is a simple, database-driven PHP Analytics API that can be run as a plugin for PHP websites.  It consists of one namespace (IPStatistics), and a driver class (also called IPStatistics), with three API calls: record, graph, and data.  A quick how-to for using IPStatistics can be found in step 4 of the Installation instructions below.

### Simplicity

In an aim to be as simple and efficient as possible, this plugin consists of only:

| Code | Amount | Purpose |
|:---- |:------ |:------- |
| PHP | 222 lines | This is the entire API.  Short, sweet, and simple.  (Not including the example file) |
| Markdown | 61 lines | The README file. |
| Text | 675 lines | The license file |

## Installation

1. Fill in the gaps in IPStatistics/databaseLogin.php with your database login details.
2. Save the IPStatistics directory.
3. Create a MySQL database and table containing the following SQL structure:

```SQL
CREATE TABLE IPTable (ID BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,IP VARCHAR(25) NOT NULL,Date DATE NOT NULL,Time VARCHAR(10) NOT NULL,Month INT(11) NOT NULL);
```

4. Use the following snippets of code where you want to record a visit, display a graph of your visitors over the past year, or display the corresponding raw data.

```PHP
<?php
include("IPStatistics/IPStatistics.php");// Include the IPStatistics API.
use IPStatistics\IPStatistics as IPStatistics;// Access the API.
$stats = new IPStatistics();// Create an instance of the Statistics.

...

$stats->record();// Record the visit.

...

$stats->graph();// Display a graph of the visit data.

...

$stats->data();// Display the raw data, including IP addresses.
?>
```

## GDPR

>"A much discussed topic is the IP address. The GDPR states that IP addresses should be considered personal data as it enters the scope of ‘online identifiers’." - eugdprcompliant.com/personal-data.  

As such, you should handle IP addresses as you would with any personal data under GDPR.  I'm not here to offer legal advice, but if you choose to use software I've created - you must ensure that you do so in accordance with the law.

## Release Details

This plugin was released on 26th July 2017 under the GNU General Public License v3.0 or later by James Phillips.  See the LICENSE file for more details.
