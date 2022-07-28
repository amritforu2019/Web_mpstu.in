<?php
include("../con_base/config.inc.php");

if(isset($_POST['excel']))
{
	if($_POST['course']!='')
	{
		$whr=" and course='".$_POST['course']."' ";
	}
	if($_POST['category']!='')
	{
		$whr2=" and category='".$_POST['category']."' ";
	}
 
 
$file_name="Student_Export_on_Date_".date("d-m-Y");
$file_name = preg_replace('/\s+/', '', $file_name); 
 

$select="SELECT    `session`, `category`,   `course`, `fee`,      `enr_no`, `dob`, `name`, `f_name`, `cont`,   `religion`, `year`, `subject`, `address`,   `pay_dt`, `trn_id`, `trn_id_m`, `trn_id_b`, `pay_amt`, `email`, `rec_no`, `pay_mode` FROM `tbl_student` where is_paid ='1' $whr $whr2	   ";
 



 
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
 exit;
}




/**
 * Copyright (c) 2017. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

  include("../con_base/functions.inc.php"); //  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
<script type="text/javascript" src="modernizr.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>

<title><?php echo $ADMIN_HTML_TITLE;?></title>
<link rel="stylesheet" type="text/css" href="codebase/dhtmlxcalendar.css" />
<link rel="stylesheet" type="text/css" href="codebase/skins/dhtmlxcalendar_dhx_skyblue.css" />
<script src="codebase/dhtmlxcalendar.js"></script>
<script>
var myCalendar;
function doOnLoad() {
    myCalendar = new dhtmlXCalendarObject(["doj", "dob", "doe"]);
}


</script>
<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
			$(".submit").click(function(){
				jQuery("#formID").validationEngine('validate');
			})
		});

		/**
		*
		* @param {jqObject} the field where the validation applies
		* @param {Array[String]} validation rules for this field
		* @param {int} rule index
		* @param {Map} form options
		* @return an error string if validation failed
		*/
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
	</script>
</head>
<body onLoad="doOnLoad()">
<?php include('header.php');?>
<div class="conten">
<h1> Student Fees Pay Report</h1>
   
 
  <form action="" method="post"  name="productsform" id="productsform" autocomplete='off'  >
    <table width="100%"  border="1"  cellpadding="5" cellspacing="0" align="center">
 
      
      <tr  >
        <td colspan="5"   align="center" bgcolor="#E1FEFF" >- : : Filter Option : : -</td>
      </tr>
      <tr  >
        <td   align="left" bgcolor="#E1FEFF" >Search by Course : </td>
        <td align="left" bgcolor="#E1FEFF" ><select name="course" id="course"   class="textbox"  >
          <option value=""  >Select Course</option>
          <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_course  order by title asc")or die(mysqli_error($DB_LINK));
 while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
          <option value="<? echo $country_fetch['title']?>" <? if(  $_POST['course']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
          <?  } ?>
        </select></td>
        <td align="left" bgcolor="#E1FEFF" >Search by Category :</td>
        <td align="left" bgcolor="#E1FEFF" ><select name="category" class="textbox" id="category">
          <option value="" >..Select Category..</option>
          <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_category  order by id asc")or die(mysqli_error($DB_LINK));
 while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
          <option value="<? echo $country_fetch['title']?>" <? if(  $_POST['category']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
          <?  } ?>
        </select></td>
        <td align="left" bgcolor="#E1FEFF" ><label>
          <input name="filter" type="submit" class="subm" id="filter" value="Filter" />
          <input name="excel" type="submit" class="subm" id="excel" value="Excel" />
        </label></td>
      </tr>
      <tr  >
        <td colspan="2"   align="left" bgcolor="#E1FEFF" >Search by Name / contact / Enrolment No : </td>
        <td colspan="2" align="left" bgcolor="#E1FEFF" ><input name="student_id" type="text" class="textbox   " id="student_id"   value="<?php echo $_POST['student_id']; ?>"/></td>
        <td align="left" bgcolor="#E1FEFF" ><input name="finder" type="submit" class="subm" id="finder" value="Find" /> 
        <input name="sms" type="submit" class="subm" id="sms" value="SMS" />
        <input name="mail" type="submit" class="subm" id="mail" value="Email" /></td>
      </tr>
    
    </table>
    <br />
       <table width="100%"  border="1"  cellpadding="5" cellspacing="0" align="center">
      <tr  >
        <td   align="left" bgcolor="#E1FEFF" >SN</td>
        <td align="left" bgcolor="#E1FEFF" >Enrol No.</td>
       <td align="left" bgcolor="#E1FEFF" >Student Info</td> 
       <td   align="left" bgcolor="#E1FEFF">Admission Info</td>
        <td   align="left" bgcolor="#E1FEFF">Contact Info</td>


          <td   align="left" bgcolor="#E1FEFF">Fees</td>
          <td   align="left" bgcolor="#E1FEFF"><label> Select All<input type="checkbox"   name="select_all" id="select_all"   />
           </label>
           <script>
		 $('#select_all').click(function(event) {
  if(this.checked) {
      // Iterate each checkbox
      $(':checkbox').each(function() {
          this.checked = true;
      });
  }
  else {
    $(':checkbox').each(function() {
          this.checked = false;
      });
  }
});
         
         </script>
           </td>
             <td   align="left" bgcolor="#E1FEFF">Payment Status</td>


      </tr>
      <?php
if(isset($_POST['filter']))
{
	if($_POST['course']!='')
	{
		$whr=" and course='".$_POST['course']."' ";
	}
	if($_POST['category']!='')
	{
		$whr2=" and category='".$_POST['category']."' ";
	}
}






if(isset($_POST['finder']))
{
	if($_POST['student_id']!='')
	{
		$whr=" and (name like '%".$_POST['student_id']."%' or enr_no like '%".$_POST['student_id']."%' or cont like '%".$_POST['student_id']."%' or f_name like '%".$_POST['student_id']."%' )  ";
	}
	 
}


	  $where=" where is_paid ='1' $whr $whr2   ";

	/*   $q=1;
      	$qry=mysqli_query($DB_LINK,"select * from tbl_student $where order by pay_dt desc limit 0,10")or die(mysqli_error($DB_LINK));
		$counter=mysqli_num_rows($qry);  
		while($row=mysqli_fetch_array($qry)){ extract($row);	*/	
		
		
		$start=0;
          $pagesize=5000;
          if(isset($_GET['start']))$start=$_GET['start'];
		$Prod=mysqli_query($DB_LINK,"select * from tbl_student $where order by pay_dt desc"); 
       $q=mysqli_query($DB_LINK,"select * from tbl_student $where order by pay_dt desc limit $start, $pagesize"); 
       $count=mysqli_num_rows($q);
       $reccnt=mysqli_num_rows($Prod);
        $P=1;
       if($count!=0)
				  {
				      $i=$start+1;	
			    while($row=mysqli_fetch_array($q))
				{
				extract($row);
	  ?>
      <tr>
        <td align="left" valign="top"  ><?php echo $i++; ?></td>
        <td align="left" valign="top"  >Enrolment No : <?php echo $row["enr_no"]; ?><br />
Student Id : <?php echo $row["student_id"]; ?><br /> Date Of Birth : <?php echo $row["dob"]; ?> </td>
        <td align="left" valign="top"  ><?php echo $row["name"]; ?><br />
       Father Name : <?php echo $row["f_name"]; ?> <br /><?php echo $row["address"]; ?></td>
        <td align="left" valign="top"  >Course : <?php echo $row["course"]; ?><br />Seat : <?php echo $row["seat"]?><br /> Category : <?php echo $row["category"]?></td>
        <td align="left" valign="top"  >Contact : <?php echo $row["cont"]; ?><br />Alternate Contact : <?php echo $row["cont2"]?><br /> Email : <?php echo $row["email"]?> </td>
           <td  align="left" valign="top"  ><?php echo $row["fee"]?>
			   <br>Date : <?php echo $row["pay_dt"]?>

			   <?php if($row["rec_no"]!='') { ?><br>Receipt : <?php echo $row["rec_no"]; } ?>
			   <?php if($row["trn_id"]!='') { ?><br>Transaction ID : <?php echo $row["trn_id"]; } ?>
			   <?php if($row["pay_mode"]!='') { ?><br>Payment Mode : <?php echo $row["pay_mode"]; } ?>
			   <?php if($row["trn_id_b"]!='') { ?><br>Bank Transaction Id : <?php echo $row["trn_id_b"]; } ?>
			   <?php if($row["trn_id_m"]!='') { ?><br>Transaction ID Merchant : <?php echo $row["trn_id_m"]; } ?>
			   <?php if($row["pay_amt"]!='') { ?><br>Payment Amount : <?php echo $row["pay_amt"]; } ?>


		   </td>
           <td  align="left" valign="top"  ><label>
             <input type="checkbox" value="<?php echo $row["rec_no"]; ?>" name="checkbox" id="checkbox" /> Select
           </label>
           
           <br>
             <a  title="Fee Receipt" href="receipt_fee?id=<?php echo $row["id"];?>" target="_blank" >Fee_Rec</a>
           
           </td>
           
            <td  align="left" valign="top"  >
                <?php
                
 
              //  $url='https://payment.atomtech.in/paynetz/vfts?merchantid=29062&merchanttxnid=3052&amt=6030.00&tdate=2017-09-07';
              //  echo $sxml = simplexml_load_file($url);
        if($row["pay_mode"]!='Offline') 
        {  
             if($row["gateway_status"]!='1') 
        { 
              
       $url="https://payment.atomtech.in/paynetz/vfts?merchantid=29062&merchanttxnid=".$row["trn_id_m"]."&amt=".$row["pay_amt"].".00&tdate=".$row["pay_dt"].""; //rss link for the twitter timeline
        //$url="https://payment.atomtech.in/paynetz/vfts?merchantid=29062&merchanttxnid=3052&amt=6030.00&tdate=2017-09-07";
        $actualdata=file_get_contents($url); //dumps the content, you can manipulate as you wish toecho 
       $filterdata=str_replace('<?xml version="1.0" encoding="UTF-8" ?>',"",$actualdata);
        $filterdata1=str_replace('<VerifyOutput ',"",$filterdata);
        $filterdata2=str_replace('/>',"",$filterdata1);
        $myarray=explode(" ",$filterdata2);

                for ($x = 0; $x <= sizeof($myarray); $x++)
                {
                    if(trim($myarray[$x])!='')
                    {
                   // echo $myarray[$x].'<br>';
                     $myarray2=explode("=",trim($myarray[$x]));

                            for ($y = 0; $y <= sizeof($myarray2); $y++)
                            {
                                if($myarray2['0']=='VERIFIED')
                                {
                                     //echo $myarray2['1'].'<br>';
                                     $verificationdata=str_replace('"',"",$myarray2['1']);
                                     if($verificationdata=='SUCCESS')
                                     {
                                         //echo 'Payment Received';
                                         mysqli_query($DB_LINK,"update tbl_student set gateway_status='1' where id='".$row["id"]."' ");
                                     }
                                     else
                                     {
                                         echo 'Payment Not Received, Error : '.$verificationdata;
                                         mysqli_query($DB_LINK,"update tbl_student set gateway_status='0' where id='".$row["id"]."' ");
                                     }
                                     break;
                                }
                            }
                    }
                }
        }

        }
        else
        {
            echo 'Offine Mode';
            mysqli_query($DB_LINK,"update tbl_student set gateway_status='1' where id='".$row["id"]."' ");
        }
 
/* gets the data from a URL */
 ?>
 <br>
 <?php
  if($row["pay_mode"]!='Offline') 
        { 
   if($row['gateway_status']==0) { echo '<span style="color:red">Payment Not received</span> '; } 
   if($row['gateway_status']==1) { echo '<span style="color:green">Payment Confirm from bank</span>'; } 
        }
   ?> 
		   </td>
 
      </tr>
      
      <?php }  } ?>
    </table>
    <p><? require_once("../con_base/paging.inc.php");?></p>
 </form> 
</div>
<?php include('footer.php');?>
</body>
</html>
