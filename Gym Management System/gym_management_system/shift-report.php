<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `shift`";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_shift(shift_id)
{
	if(confirm("Do you want to delete the shift?"))
	{
		this.document.frm_shift.shift_id.value=shift_id;
		this.document.frm_shift.act.value="delete_shift";
		this.document.frm_shift.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Shift Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_shift" action="lib/shift.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
					    <td scope="col">ID</td>
						<td scope="col">Name</td>
						<td scope="col">From Time</td>
						<td scope="col">To Time</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[shift_id]?></td>
						<td><?=$data[shift_title]?></td>
						<td><?=$data[shift_from_time]?></td>
						<td><?=$data[shift_to_time]?></td>
						<td style="text-align:center">
							<a href="shift.php?shift_id=<?php echo $data[shift_id] ?>">Edit</a> | <a href="Javascript:delete_shift(<?=$data[shift_id]?>)">Delete</a> </td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="shift_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 