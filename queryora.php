<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Oracle PHP Client</title>
<link rel="stylesheet" type="text/css" href="view2.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
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

echo "<table border=1 id=\"customers\">\n";
$ncols = oci_num_fields($stid);
echo "<tr>\n";
for ($i = 1; $i <= $ncols; ++$i) {
    $colname = oci_field_name($stid, $i);
    echo "  <th><b>".htmlspecialchars($colname,ENT_QUOTES|ENT_SUBSTITUTE)."</b></th>\n";
}
echo "</tr>\n";
while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>".($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;")."</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";

?>
