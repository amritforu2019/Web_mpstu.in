<?php
ini_set("session.gc_maxlifetime",3600);

	 global $DB;
         $DB["dbName"] = "pmssvaranasi_mpstnew";
	 $DB["host"]   = "localhost";
	 $DB["user"]   = "pmssvaranasi_mpstnew";
	 $DB["pass"]   = "NTWK54zP";
 
	 $link = mysql_pconnect($DB["host"],$DB["user"],$DB["pass"]) or die("Connection Failed");
	 mysql_select_db($DB["dbName"]); 

?>

