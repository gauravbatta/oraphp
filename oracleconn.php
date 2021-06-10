<html>
   <head>
  	<title>GB's queries on Oracle Database</title>
  	<!-- You need to include the following JS file to render the chart.
  	When you make your own charts, make sure that the path to this JS file is correct.
  	Else, you will get JavaScript errors. -->

  </head>

   <body>
        	<FORM NAME ="form1" METHOD ="post" ACTION = "">
        	<br> Username : <INPUT TYPE = "Text" NAME = "loginu" value ="system" > <br>
        	<br> Password : <INPUT TYPE = "password" NAME = "loginp" value ="ADMIN#UTD#987" > <br>
			<br> Database :
			  <select id="ezconn" name="ezconn">
				<option value="ecdb0802p/WFSJ1P_PRIMARY">SJ WF</option>
				<option value="ecdb0805p/WFFF1P_PRIMARY">FF WF</option>
				<option value="ecdb0804p/WFTK1P_PRIMARY">TK WF</option>
				<option value="centdbscan/CDHQ2P">Central</option>
				<option value="centdbscan/EVHQ2P">EVENTS</option>
				<option value="centdbscan/DHHQ2P">DataHub</option>
			  </select> <br>
        	<br> Query:  <br> <br><textarea name="queryarea" rows="15" cols="150">  </textarea> <br>
        	<INPUT TYPE = "Submit" Name = "Submit" VALUE = "Go"> <br> <br> Output: <br> <br>


<?php

				$usr = $_POST["loginu"];
				$pass = $_POST["loginp"];
				$ezc = $_POST["ezconn"];
				$query = nl2br($_POST["queryarea"]);
				
				
error_reporting(E_ALL);
ini_set('display_errors', '1');
$conn = oci_connect($usr, $pass, $ezc);
$stid = oci_parse($conn, $query);
oci_execute($stid);

echo "<table border=1>\n";
while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>".($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;")."</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";

?>