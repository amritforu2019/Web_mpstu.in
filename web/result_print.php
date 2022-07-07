<!DOCTYPE html>
<html lang="en"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="assets/links/css/css.css" rel="stylesheet">
    <title><?php echo $SITE_NAME;?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <?php include("include/top.php");?>
</head>
<body>



<div class="container container-padding" style="padding-bottom: 15px;">
    <div class="row pb-2 pt-2">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="overflow : hidden">
                        <div class="row mt-4">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">


                    <div class="row mb-3">

                        <?php
                        if(isset($_POST['finder']))
                        {
                        $sql="SELECT * FROM  tbl_student  where  	student_id='".$_POST['rollno']."'  ";
                        $result =mysqli_query($DB_LINK,$sql);

                        $data =mysqli_fetch_object($result);
                        ?>
                        <table  class="table  table-borderless  text-center  text-uppercase  "
                               >
                            <tr>
                                <td  class="text-center h1">  MAHARANA PRATAP SCIENCE & TECHNOLOGY UNIVERSITY - TELANGANA
                                    <div class="btm-border"></div></td>

                            </tr>
                            <tr  ><td class="h4"> <?php echo $data->course;?>  YEAR / SEMESTER : <?php echo numberToRomanRepresentation($data->year);?>
                                   </td>
                            </tr>

                        </table>




                        <table class="table  table-bordered  text-center  text-uppercase  ">
                            <tr>
                                <td  class="bg-secondary text-white">Roll NO.</td>
                                <td><?php echo $data->student_id;?> </td>
                                <td class="bg-secondary text-white" >Enrollment No.</td>
                                <td><?php echo $data->enr_no;?></td>
                                <td rowspan="5"   >
                                    <img src="student_portal/upload/student/image/<?php echo $data->image; ?>"
                                         width="100px"></td>
                            </tr>
                            <tr>
                                <td class="bg-secondary text-white">STUDENT NAME</td>
                                <td><?php echo $data->name;?></td>
                                <td class="bg-secondary text-white" >COURSE</td>
                                <td><?php echo $data->course;?></td>
                            </tr>
                            <tr>

                                <td class="bg-secondary text-white">FATHER’S NAME</td>
                                <td><?php echo $data->f_name;?></td>
                                <td class="bg-secondary text-white">MOTHER'S NAME</td>
                                <td><?php echo $data->m_name;?></td>
                            </tr>
                            <tr>
                                <td class="bg-secondary text-white">DATE OF BIRTH</td>
                                <td><?php echo date_dm($data->dob);?></td>
                                <td class="bg-secondary text-white" >SESSION</td>
                                <td><?php echo $data->session;?></td>
                            </tr>
                            <tr>
                                <td class="bg-secondary text-white">STATUS</td>
                                <td><?php echo $data->seat;?></td>
                                <td class="bg-secondary text-white">BRANCH</td>
                                <td ><?php echo get_course_branch($data->course);?></td>
                            </tr>
                          <!--  <tr>
                                <td class="bg-secondary text-white">Subject</td>
                                <td colspan="4"> <?php /*echo ($data->subject_title);*/?></td>
                            </tr>-->


                        </table>
                            <table class="table  table-bordered  text-center  text-uppercase  ">
                            <tr>
                                <td class="bg-secondary text-white">NAME OF PAPER / SUBJECT	</td>
                                <td class="bg-secondary text-white"  >TOTAL MARKS	</td>
                                <td class="bg-secondary text-white"   > PRACTICAL </td>
                                <td class="bg-secondary text-white"    > THEORY </td>
                                <td class="bg-secondary text-white"    > TOTAL OBTAINED MARKS</td>

                                <!--<td class="bg-secondary text-white"    >ACTION</td>-->

                            </tr>
                            <?php
                            $allm=0;
                            $totm=0;
                            //`session`='".$_POST['session']."'  and
                            $sql_data="select * from tbl_result_marks where  `roll_no`='".$_POST['rollno']."'
         and  is_lock='1' order by id asc ";
                            $result=mysqli_query($DB_LINK,$sql_data);
                            while ($row=mysqli_fetch_object($result))
                            {
                                ?>
                                <tr>
                                    <td ><?php echo $row->subject;?></td>
                                    <td   ><?php echo $row->m_mark;$allm+=$row->m_mark;?></td>
                                    <td     ><?php echo $row->obt_mark_1;?></td>
                                    <td      ><?php echo $row->obt_mark_2;?></td>
                                    <td      ><?php echo $row->t_mark;$totm+=$row->t_mark;?></td>
                                    <!--<td  ><a href="javascript:void(0)" onClick="return del_result(<?php /*echo $row->id;*/?>);" title="Delete ">
                        <i class="fas fa-trash-alt color-tomato"></i>
                    </a></td>-->

                                </tr>
                                <?php $result_status=$row->r_status; $rdd=$row->rdd; }?>

                            <tr class="bg-primary text-white">
                                <td>Total</td>
                                <td   ><?php echo $allm;?></td>
                                <td colspan="2"></td>
                                <td ><?php echo $totm;?></td>

                            </tr></table>


                            <table class="table  table-bordered  text-center  text-uppercase  ">


                            <tr class="bg-warning text-white">
                                <td  >Result Status</td>
                                <td  ><?php echo $result_status;?></td>
                                <td>Result Declaration Date</td>
                                <td>
                                    <?php echo date_dm($rdd);?>
                                </td>
                            </tr>
                        </table>

                        <?php } ?>
                        Note :-
                        result late due to non recipt/ non eligibility of awards the students concermed  should submit details wiz :  name of examination centre, date of examination, name of subject along with a copy of the downloaded Result Branch within 15 days positively, failing which he/she will be treated 'absent' in the said paper and the result will be finalized accordingly.

                    </div>
                    <a class="btn btn-success br-0" href="javascript:void(0)" onclick="window.print();"><i class="fa fa-print" aria-hidden="true"></i>
                        Print</a>
                    <a class="btn btn-primary br-0" href="index"><i class="fa fa-home" aria-hidden="true"></i>
                        Home</a>
                        </div>
            </div>
        </div>


    </div>
</div>



<?php include("include/last.php");?>







</body></html>
