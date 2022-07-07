<!--[if IE]>
<style type="text/css">
#mid{
	height:325px;
}
</style>
<![endif]-->
<table width="100%" border="0" cellspacing="0" cellpadding="0"  bgcolor="#0c5994">
  <tr>
    <td valign="top" style="background:#0c5994;">
    
    <table width="100%" border="1" cellspacing="0" cellpadding="0" >
  
      <tr>
      
        <td valign="top"  bgcolor="0c5994" colspan="2" >
<marquee scrollamount="1" onmouseover="this.stop();" onmouseout="this.start();" direction="right"  behavior="alternate" ><div  style="font-size:50px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; color:#FFFFFF; text-shadow:5px #F00;  " ><?=$ADMIN_HTML_TITLE; ?></div></marquee></td>
      </tr>
      <tr>
        <td height="35" align="right" bgcolor="#5287BD" style="padding-right:20px; color:#fff; font-weight:bold;"><a href="admin_home.php" style="color:#FFFFFF;">Home</a> <? if(isset($_SESSION['sess_admin_id'])) { ?><strong>| </strong><a href="logout.php" style="color:#FFFFFF;"><strong>Logout</strong></a> <? } ?></td>
      </tr>
      <tr>
        <td height="5" align="right" bgcolor="#FFFFFF" style="padding-right:20px;"></td>
      </tr>
    </table></td>
  </tr> 
</table> 