<? 
require_once("../con_base/functions.inc.php");

$roll_no=$_REQUEST['roll_no'];
$session=get_curr_session();
$session=$_REQUEST['session'];
  ?>
<table width="100%"  border="1" align="center" cellpadding="5" cellspacing="0" style="text-transform: uppercase; ">
    <tr>
        <td class="bg2">NAME OF PAPER / SUBJECT	</td>
        <td class="bg2" style="text-align: center" >TOTAL MARKS	</td>
        <td class="bg2"   style="text-align: center" > PRACTICAL </td>
        <td class="bg2"   style="text-align: center" > THEORY </td>
        <td class="bg2" style="text-align: center"   > TOTAL OBTAINED MARKS</td>
        <td class="bg2"  style="text-align: center"  >ACTION</td>

       
    </tr>
    <?php
    $allm=0;
    $totm=0;
$sql_data="select * from tbl_result_marks where  `roll_no`='$roll_no' and `session`='$session' and is_lock='0' order by id asc ";
    $result=mysqli_query($DB_LINK,$sql_data);
    while ($row=mysqli_fetch_object($result))
    {
?>
    <tr>
        <td ><?php echo $row->subject;?></td>
        <td  style="text-align: center" ><?php echo $row->m_mark;$allm+=$row->m_mark;?></td>
        <td   style="text-align: center"  ><?php echo $row->obt_mark_1;?></td>
        <td    style="text-align: center"  ><?php echo $row->obt_mark_2;?></td>
        <td   style="text-align: center"   ><?php echo $row->t_mark;$totm+=$row->t_mark;?></td>
        <td style="text-align: center" ><a href="javascript:void(0)" onClick="return del_result(<?php echo $row->id;?>);" title="Delete ">
                <i class="fas fa-trash-alt color-tomato"></i>
            </a></td>

    </tr>
    <?php }?>

<tr>
    <td>Total</td>
    <td style="text-align: center"><?php echo $allm;?></td>
    <td colspan="2"></td>
    <td style="text-align: center"><?php echo $totm;?></td>
    <td></td>
</tr></table>
<script>
    function del_result(id)
    {
        var nm=confirm("Are you sure to confirm this action");
        if(nm) {

            $.ajax({
                type: "POST",
                url: "ajax_result_del.php",
                data: 'id=' + id ,
                success: function(data) {
                    view_result();

                },
                beforeSend: function() {
                    $("#update_result").html('Processing.. ');
                }
            });
        }
        else
            return false;
    }
</script>
