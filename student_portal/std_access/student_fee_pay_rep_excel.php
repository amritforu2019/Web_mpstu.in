<?php    include("../con_base/config.inc.php");
 
$file_name="Student_Export_on_Date_".date("d-m-Y");
$file_name = preg_replace('/\s+/', '', $file_name); 
 

$select="SELECT    `session`, `category`,   `course`, `fee`,      `enr_no`, `dob`, `name`, `f_name`, `cont`,   `religion`, `year`, `subject`, `address`,   `pay_dt`, `trn_id`, `trn_id_m`, `trn_id_b`, `pay_amt`, `email`, `rec_no`, `pay_mode` FROM `tbl_student` where is_paid ='1'	   ";
 



 
 //run mysql query and then count number of fields
$export = mysqli_query ($select) or die ( "Sql error : " . mysqli_error( ) );
$fields = mysql_num_fields ( $export );


//create csv header row, to contain table headers 
//with database field names
for ( $i = 0; $i < $fields; $i++ ) {
	$header .= mysql_field_name( $export , $i ) . ",";
}



//this is where most of the work is done. 
//Loop through the query results, and create 
//a row for each
 while( $row = mysql_fetch_row( $export ))
 {
	$line = '';
	//for each field in the row
	foreach( $row as $value ) {
		//if null, create blank field
		if ( ( !isset( $value ) ) || ( $value == "" ) ){
			$value = ",";
		}
		//else, assign field value to our data
		else {
			$value = str_replace( '"' , '""' , $value );
			$value = '"' . $value . '"' . ",";
		}
		//add this field value to our row
		$line .= $value;
	}
	//trim whitespace from each row
	$data .= trim( $line ) . "\n";
}
//remove all carriage returns from the data
$data = str_replace( "\r" , "" , $data );


//create a file and send to browser for user to download
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$file_name.".csv");
print "$header\n$data";
 
 




 
   ?>
 
