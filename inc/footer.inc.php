<?php
 
 $startYear = 2015;
 $thisYear = date('Y');
 
 if ($startYear == $thisYear) {
 
 echo $startYear;
 
 } else {
 
 echo "<p>&copy; {$startYear}&#8211;{$thisYear} Kostiuk Taras</p>";
 
 }
 
 ?>