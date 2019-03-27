<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[shift_id])
	{
		$SQL="SELECT * FROM `shift` WHERE shift_id = $_REQUEST[shift_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Shift Entry Form</h4>
				<?php if($_REQUEST['msg']) { ?>
					<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php } ?>
				<form action="lib/shift.php" enctype="multipart/form-data" method="post" name="frm_shift">
					<ul class="forms">
						<li class="txt">Shift Name</li>
						<li class="inputfield"><input name="shift_title" id="shift_title" type="text" class="bar" required value="<?=$data[shift_title]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Shift From Time</li>
						<li class="inputfield"><input name="shift_from_time" id="shift_from_time" type="text" class="bar" required value="<?=$data[shift_from_time]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Shift To Time</li>
						<li class="inputfield"><input name="shift_to_time" id="shift_to_time" type="text" class="bar" required value="<?=$data[shift_to_time]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="shift_description" cols="" rows="6" required><?=$data[shift_description]?></textarea></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_shift">
					<input type="hidden" name="shift_id" value="<?=$data[shift_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 