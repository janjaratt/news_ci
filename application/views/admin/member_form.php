<?php if (@!isset($member_edit)): ?>

	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">สมัครสมาชิก</h1>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>

	<?php echo form_open_multipart('admin/member_add') ?>
<table>

<tr>
  <td height="80">อีเมลล์</td>
  <td><input class="form-control" placeholder="E-mail" name="member_email" type="email" autofocus></td>
</tr>
<tr>
	<td height="80">รหัสผ่าน</td>
  <td><input class="form-control" placeholder="Password" name="member_pass" type="password"></td>
</tr>
<tr>
  <td height="80">ชื่อ</td>
  <td><input type="text" name="member_fname" required="required" class="form-control" ></td>
</tr>
<tr>
  <td height="80">สกุล</td>
  <td><input type="text" name="member_lname" required="required" class="form-control" ></td>
</tr>


</table>

<input type="submit" value="บันทึก" class="btn btn-primary">

	<?php echo form_close() ?>


<a href="<?php echo SITE_URL('admin/member_list')?>">
	<button type="button" class="btn">ย้อนกลับ</button>
</a>



<?php else: ?>

	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">แก้ไขสมาชิก</h1>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>

	<?php echo form_open_multipart('admin/member_edit') ?>
	<table>

	<tr>
	  <td height="80">อีเมลล์</td>
	  <td><input class="form-control" placeholder="E-mail" name="member_email" type="email" value="<?php echo $member_edit[0]['member_email'] ;?>" autofocus></td>
	</tr>
	<tr>
		<td height="80">รหัสผ่าน</td>
	  <td><input class="form-control" placeholder="Password" name="member_pass" type="password" value="<?php echo $member_edit[0]['member_pass'] ;?>" ></td>
	</tr>
	<tr>
	  <td height="80">ชื่อ</td>
	  <td><input type="text" name="member_fname" required="required" class="form-control" value="<?php echo $member_edit[0]['member_fname'] ;?>" ></td>
	</tr>
	<tr>
	  <td height="80">สกุล</td>
	  <td><input type="text" name="member_lname" required="required" class="form-control" value="<?php echo $member_edit[0]['member_lname'] ;?>" ></td>
	</tr>


	</table>

<input type="hidden" name="member_id" value="<?php echo $member_edit[0]['member_id'];?> ">
<input type="submit" value="บันทึก" class="btn btn-primary">

	<?php echo form_close() ?>


<a href="<?php echo SITE_URL('admin/member_list')?>">
	  <button type="button" class="btn">ย้อนกลับ</button>
</a>


<?php endif; ?>
