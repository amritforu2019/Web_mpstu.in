<? ob_start();
 
require_once("../config/functions.inc.php");
validate_admin();


if(isset($_POST["export"]))
{

$file_name="Data_Export_For_Feedback_on_Date_".date("d-m-Y");
$file_name = preg_replace('/\s+/', '', $file_name);
//where typ='".$_POST['expo_typ']."'
if($_POST['expo_typ']=='1')
{

$select="select feed_student.dt As Date, feed_student.name As Student_Name  , feed_student.contact As Student_Contact , feed_student.roll As Student_Roll_No 	, feed_student.course As Course , feed_student.sem As Semester, feed_student.year As Year , feed_student.subj As Subject,feed_student.a As Teacher_Name, feed_student.b As  Subject_clarity , feed_student.c As His_Motivation_to_students	, feed_student.d As His_Regularity_and_Punctuality	, feed_student.e As His_Communication_Skill	, feed_student.f As His_Subject_Knowledge , feed_student.g As Course_Completion_by_him, feed_student.h As His_Practical_Knowledge,
feed_student.i As  Outside_class_interaction_with_him , feed_student.j As His_Computer_Skill , feed_student.k As 		
His_Overall_Performance, feed_student.l As  Will_you_suggest_him_to_teach_the_same_subject_to_your_juniors_also  , feed_student.m As Will_you_suggest_him_to_teach_any_other_subject ,  feed_student.n As Your_opinion_Strengths_of_the_teacher  , feed_student.o As  Weakness_of_the_teacher , feed_student.p As  Any_Suggestion from feed_student where typ='".$_POST['expo_typ']."'  order by id desc";
 
}


if($_POST['expo_typ']=='2')
{

$select="select feed_student.dt As Date, feed_student.name As Student_Name  , feed_student.contact As Student_Contact , feed_student.roll As Student_Roll_No 	, feed_student.course As Course , feed_student.edulev As Student_of, feed_student.sem As Semester, feed_student.year As Year , feed_student.subj As Subject, feed_student.paper As  Paper ,  
feed_student.a As  	Fulfillment_of_Objective_of_the_paper 	,
feed_student.b As His_Motivation_to_students  ,
feed_student.c As Relevance_of_This_paper_with_Prac1tical_or_Lab,	
feed_student.d As References_that_are_suggested,
feed_student.e As Your_Opinion_or_Suggestion_for_improvement_in_syllabus

    from feed_student where typ='".$_POST['expo_typ']."' order by id desc";
 
}

if($_POST['expo_typ']=='3')
{

$select="select    feed_student.dt As Date, feed_student.name As Alumni_Student_Name  , feed_student.contact As Student_Contact , feed_student.roll As Student_Roll_No 	, feed_student.course As Degree ,  feed_student.dep As Department , feed_student.work As Work_On,   feed_student.year As Year , 


feed_student.a As	 'assessment of our College’s Academic Level _ Admission Procedure',				
feed_student.b As 'Fee structure', 		
feed_student.c As	Environment ,	
feed_student.d As 'Infrastructure & Lab facility' ,
feed_student.e As	'Project Guidance', 				
feed_student.f As 	Placement ,			
feed_student.g As Library  ,		
feed_student.h As Canteen ,			
feed_student.i As 'Hostel Facilities' ,				
feed_student.j As 	'Overall Rating of the College' , 
feed_student.k As 'Your Suggestions_Regarding any change in syllabi',
feed_student.l As	'Regarding Improvements in teaching and learning Process' ,
feed_student.m As	 'Any other suggestions'		

 
from feed_student where typ='".$_POST['expo_typ']."'  order by id desc";
 
}


if($_POST['expo_typ']=='4')
{

$select="select feed_student.f_name  As Parent_Name,  feed_student.dt As Date, feed_student.name As Student_Name  , feed_student.contact As Student_Contact , feed_student.roll As Student_Roll_No 	, feed_student.course As Course , feed_student.edulev As Student_of, feed_student.sem As Semester, feed_student.year As Year , feed_student.subj As Subject,

feed_student.a As  Your_ward_studying_in_the_College_is_a_matter_of_pride_for_me   ,
feed_student.b As	'Your ward is improving his knowledge base. '			,
feed_student.c As 	'The atmosphere in the College is conducive for learning.'  ,		
feed_student.d As 	'College’s website is very informative and regularly updated.'  ,
feed_student.e As 	'Hostel facilities are good and available.'  	,		
feed_student.f As	'The College administration is cooperative.' , 		
feed_student.g As 	'Direct Communication with Principal is easy.' ,		
feed_student.h As 	'The college  is a secured campus for your ward.'  ,			
feed_student.i As   'Your Kind Suggestions for further improvement'    			

 
from feed_student where typ='".$_POST['expo_typ']."'  order by id desc";
 
}
 
 //run mysql query and then count number of fields
$export = mysql_query ($select) or die ( "Sql error : " . mysql_error( ) );
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

 header("location :expo.php");

exit;
 


} 

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $ADMIN_HTML_TITLE;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<link href="css/admin_style.css" rel="stylesheet" type="text/css">
 
</head>
<body>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><? require_once("adheader.php");?></td> 
  </tr>
  <tr>
    <td width="253" valign="top" class="left"><? require_once("adleft.php");?></td>
    <td width="750" align="center" valign="top">
	<div id="mid">  
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			   <tr>
                   <td height="30" colspan="2" bgcolor="#0c5994" class="heading"><strong>Export feedback data</strong> </td>
            </tr>
			   <tr>
			     <td colspan="2" align="center">
				      <form action="" method="post" enctype="multipart/form-data" name="form1"> 
                   
			  
                    <table width="75%" border="0" align="center" cellpadding="5" cellspacing="0">
                      <tr>
                       <td class="vali" align="center">
                        <select name="expo_typ">
                         <option value="1">Student&rsquo;s Feedback Form</option>
                         <option value="2">Student&rsquo;s Feedback Form for Curriculum</option>
                         <option value="3">Alumni Feedback Form</option>
                         <option value="4">Parents Feedback Form</option>
                        </select> <label></label>                        </td>
                       <td class="vali" align="center"><input type="submit" name="export" id="export" value="Submit"></td>
                      </tr>
                    </table>
                </form>
			     </td>
	      </tr> 
               </table> 
	</div>
	</td>
  </tr>
  <tr>
    <td colspan="2"><? require_once("adfooter.php");?></td>
  </tr>
</table>
</body>
</html>
<? ob_end_flush(); ?>