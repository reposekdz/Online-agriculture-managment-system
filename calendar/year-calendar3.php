<?Php
//***************************************
// This is downloaded from www.plus2net.com //
// You can distribute this code with the link to www.plus2net.com ///
// Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
// The author is not responsible for any type of loss or problem or damage on using this script.//
// You can use it at your own risk. /////
//*****************************************


?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>plus2net Yearly Calendar</title>
<link rel="canonical" href="http://www.plus2net.com/php_tutorial/cal2.php"/>
<script langauge="javascript">
function post_value(mm,dt,yy){
opener.document.f1.p_name.value = mm + "/" + dt + "/" + yy;
/// cheange the above line for different date format
self.close();
}

function reload(form){
var month_val=document.getElementById('month').value; // collect month value
var year_val=document.getElementById('year').value;      // collect year value
self.location='cal2.php?month=' + month_val + '&year=' + year_val ; // reload the page
}
</script>
<style type="text/css">
/* ===== CSS Custom Properties (Theme Variables) ===== */
:root {
  --table-bg-color: #ffffff;
  --table-border-color: #e0e0e0; /* Lighter border */
  --table-shadow-color: rgba(0, 0, 0, 0.08);
  --table-hover-shadow-color: rgba(0, 0, 0, 0.15);

  --header-bg-color: #f8f9fa; /* Very light grey for a clean header */
  --header-text-color: #343a40; /* Dark grey text for header */
  --header-border-color: #dee2e6;
  --header-hover-bg-color: #e9ecef;
  --header-active-bg-color: #dee2e6; /* For potential sort indication */

  --row-text-color: #495057;
  --row-bg-color: #ffffff;
  --row-hover-bg-color: #f1f3f5; /* Subtle hover for rows */
  --row-striped-bg-color: #fbfcfd; /* Very subtle striping */
  --row-border-color: #ebebeb;

  --link-color: #007bff;
  --link-hover-color: #0056b3;
  --link-active-color: #004085;

  --font-family-primary: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
  --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;

  --border-radius-main: 8px; /* Rounded corners */
  --transition-speed-fast: 0.15s;
  --transition-speed-normal: 0.25s;
}

/* ===== Main Table Styling ===== */
table.main {
  width: 100%;
  border-collapse: separate; /* Use separate for border-radius to work on table */
  border-spacing: 0; /* Remove spacing between cells when using separate */
  background-color: var(--table-bg-color);
  border-radius: var(--border-radius-main);
  box-shadow: 0 4px 12px var(--table-shadow-color);
  transition: box-shadow var(--transition-speed-normal) ease-in-out, transform var(--transition-speed-normal) ease-in-out;
  overflow: hidden; /* Ensures child elements also respect the border-radius */
  /* Adding a slight perspective for subtle 3D effects on row hover if desired later */
  /* perspective: 1000px; */
}

table.main:hover {
  box-shadow: 0 8px 20px var(--table-hover-shadow-color);
  transform: translateY(-2px); /* Slight lift effect */
}

/* ===== Table Header Styling ===== */
table.main th {
  background-color: var(--header-bg-color);
  color: var(--header-text-color);
  border-bottom: 2px solid var(--header-border-color); /* Stronger bottom border for header */
  padding: 16px 20px; /* More generous padding */
  text-align: left;
  font-family: var(--font-family-primary);
  font-size: 14px;
  font-weight: 600; /* Semi-bold for emphasis */
  text-transform: capitalize; /* Capitalize instead of uppercase for a softer look */
  letter-spacing: 0.3px;
  position: sticky; /* Sticky header */
  top: 0; /* Required for sticky */
  z-index: 10; /* Ensure header stays above scrolling content */
  transition: background-color var(--transition-speed-fast) ease;
}

table.main th:hover {
  background-color: var(--header-hover-bg-color);
}

/* Style for sortable header indication (add class .sortable to th) */
table.main th.sortable {
  cursor: pointer;
}

table.main th.sortable::after {
  content: '\\2195'; /* Up-down arrow */
  font-size: 0.8em;
  opacity: 0.4;
  margin-left: 8px;
  transition: opacity var(--transition-speed-fast) ease;
}

table.main th.sortable:hover::after {
  opacity: 0.8;
}

table.main th.sortable.asc::after {
  content: '\\2191'; /* Up arrow */
  opacity: 1;
}

table.main th.sortable.desc::after {
  content: '\\2193'; /* Down arrow */
  opacity: 1;
}


/* ===== Table Row Styling ===== */
table.main tr {
  transition: background-color var(--transition-speed-fast) ease-in-out, transform var(--transition-speed-fast) ease-in-out;
  border-bottom: 1px solid var(--row-border-color); /* Separator lines for rows */
}

table.main tr:last-child {
  border-bottom: none; /* Remove border from the last row */
}

table.main tr:hover {
  background-color: var(--row-hover-bg-color);
  /* transform: scale(1.01); */ /* Optional: slight scale on row hover */
}

/* Subtle row striping */
table.main tr:nth-child(even) {
  background-color: var(--row-striped-bg-color);
}
table.main tr:nth-child(even):hover {
  background-color: var(--row-hover-bg-color); /* Ensure hover overrides stripe */
}


/* ===== Table Data Cell Styling ===== */
table.main td {
  font-family: var(--font-family-primary);
  font-size: 14px;
  color: var(--row-text-color);
  padding: 14px 20px; /* Consistent padding with header */
  vertical-align: middle; /* Align cell content vertically */
  transition: color var(--transition-speed-fast) ease, background-color var(--transition-speed-fast) ease;
}

/* Example: Highlighting a cell on row hover if you want more specific interaction */
/* table.main tr:hover td:first-child {
  font-weight: 500;
  color: var(--link-hover-color);
} */

/* ===== Link Styling in Table ===== */
table.main a {
  color: var(--link-color);
  text-decoration: none;
  font-weight: 500;
  position: relative; /* For pseudo-element underline animation */
  transition: color var(--transition-speed-fast) ease-in-out;
}

table.main a::after {
  content: '';
  position: absolute;
  width: 100%;
  height: 1.5px; /* Thickness of the underline */
  bottom: -2px; /* Position below the text */
  left: 0;
  background-color: var(--link-hover-color);
  visibility: hidden;
  transform: scaleX(0);
  transition: all var(--transition-speed-normal) ease-in-out;
}

table.main a:hover,
table.main a:focus { /* Consistent focus style */
  color: var(--link-hover-color);
  outline: none; /* Remove default outline if custom focus is handled */
}

table.main a:hover::after,
table.main a:focus::after {
  visibility: visible;
  transform: scaleX(1);
}

table.main a:active {
  color: var(--link-active-color);
}
table.main a:active::after {
  background-color: var(--link-active-color);
}

/* ===== Focus visible for keyboard navigation ===== */
table.main *:focus-visible {
  outline: 2px solid var(--link-color);
  outline-offset: 2px;
  box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.25); /* Subtle glow */
}
</style>
</head>
<body>
<?Php

$year=2022; // change this to another year
$row=0; // to set the number of rows and columns in yearly calendar 
echo "<table class='main'>"; // Outer table 
////// Starting of for loop/// 
///  Creating calendars for each month by looping 12 times ///
for($m=1;$m<=12;$m++){
$month =date($m);  // Month 
$dateObject = DateTime::createFromFormat('!m', $m);
$monthName = $dateObject->format('F'); // Month name to display at top



$d= 2; // To Finds today's date
//$no_of_days = date('t',mktime(0,0,0,$month,1,$year)); //This is to calculate number of days in a month
$no_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);//calculate number of days in a month

$j= date('w',mktime(0,0,0,$month,1,$year)); // This will calculate the week day of the first day of the month
//echo $j;// Sunday=0 , Saturday =6
//// if starting day of the week is Monday then add following two lines ///
$j=$j-1;  
if($j<0){$j=6;}  // if it is Sunday //
//// end of if starting day of the week is Monday ////


$adj=str_repeat("<td bgcolor='#ffff00'>*&nbsp;</td>",$j);  // Blank starting cells of the calendar 
$blank_at_end=42-$j-$no_of_days; // Days left after the last day of the month
if($blank_at_end >= 7){$blank_at_end = $blank_at_end - 7 ;} 
$adj2=str_repeat("<td bgcolor='#ffff00'>*&nbsp;</td>",$blank_at_end); // Blank ending cells of the calendar

/// Starting of top line showing year and month to select ///////////////
if(($row % 3)== 0){
echo "</tr><tr>";
}

echo "<td><table class='main' ><td colspan=6 align=center> $monthName $year


 </td><td align='center'><a href=# onClick='self.close();'>X</a></td></tr>";
//echo "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>";
echo "<tr><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th></tr><tr>";
////// End of the top line showing name of the days of the week//////////

//////// Starting of the days//////////
for($i=1;$i<=$no_of_days;$i++){
$pv="'$month'".","."'$i'".","."'$year'";
echo $adj."<td><a href='#' onclick=\"post_value($pv);\">$i</a>"; // This will display the date inside the calendar cell
echo " </td>";
$adj='';
$j ++;
if($j==7){echo "</tr><tr>"; // start a new row
$j=0;}

}
echo $adj2;   // Blank the balance cell of calendar at the end 

echo "</tr></table></td>";

$row=$row+1;
} // end of for loop for 12 months
echo "</table>";
?>
<a href='http://www.plus2net.com/php_tutorial/php_calendar.php'><b>plus2net.com Calendar</b></a>

</body>
</html>
