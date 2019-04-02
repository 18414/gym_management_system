<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[attendance_id])
	{
		$SQL="SELECT * FROM `attendance` WHERE attendance_id = $_REQUEST[attendance_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?>
<script>
jQuery(function() {
	jQuery( "#attendance_date" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "0:+1",
	   dateFormat: 'd MM,yy'
	});
});
</script> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Attendance Entry Form</h4>
				<?php if($_REQUEST['msg']) { ?>
					<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php } ?>
				<form action="lib/attendance.php" enctype="multipart/form-data" method="post" name="frm_attendance">
					<ul class="forms">
						<li class="txt">Select Member</li>
						<li class="inputfield">
							<select name="attendance_user_id" class="bar" required/>
								<?php echo get_new_optionlist("user","user_id","user_name",$data[attendance_user_id]); ?>
							</select>
						</li>					
					</ul>
					<ul class="forms">
						<li class="txt">Attendance Date</li>
						<li class="inputfield"><input name="attendance_date" id="attendance_date" type="text" class="bar" required value="<?=$data[attendance_date]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="attendance_description" cols="" rows="6" required><?=$data[attendance_description]?></textarea></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_attendance">
					<input type="hidden" name="attendance_id" value="<?=$data[attendance_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 