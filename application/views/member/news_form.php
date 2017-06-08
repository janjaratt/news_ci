<?php if (@!isset($news_edit)): ?>

	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">เพิ่มข่าว</h1>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>

	<?php echo form_open_multipart('admin/news_add') ?>
<table>

<tr>
  <td height="80">หัวข้อข่าว</td>
  <td><input type="text" name="news_name" required="required" class="form-control" ></td>
</tr>
<tr>
  <td>เนื้อหาข่าว</td>
  <td><textarea name="news_detail"  rows="8" cols="60" required="required"  class="form-control"></textarea></td>
</tr>
<tr>
  <td height="80">เลือกประเภทข่าว</td>
  <td>
    <select name="news_type" required="required"  class="form-control">
        <option value="">--กรุณาเลือกประเภทข่าว--</option>
        <?php foreach ($type as $info ): ?>
          <option value="<?php echo $info['type_id'] ;?>"><?php echo $info['type_name'] ;?></option>
        <?php endforeach; ?>
      </select>
  </td>
</tr>
<tr>
  <td height="80">วันที่เพิ่มข่าว</td>
  <td><input type="text" name="news_date_add" value="" class="date form-control" required="required" /></td>
</tr>
<tr>
  <td height="80">วันที่ลบข่าว</td>
  <td><input type="text" name="news_date_exp" value="" class="date form-control" required="required" /></td>
</tr>
<tr>
  <td height="80">ภาพประกอบข่าว</td>
  <td><input type="file" name="news_pic" id="fileupload" /></td>
</tr>


</table>

<input type="submit" value="บันทึก" class="btn btn-primary">

	<?php echo form_close() ?>


<a href="<?php echo SITE_URL('admin/news_list')?>">
	<button type="button" class="btn">ย้อนกลับ</button>
</a>



<?php else: ?>

	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">แก้ไขข่าว</h1>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>

	<?php echo form_open_multipart('admin/news_edit') ?>
<table>

<tr>
  <td height="80">หัวข้อข่าว</td>
  <td><input type="text" name="news_name" required="required" value="<?php echo $news_edit[0]['news_name'] ;?>"></td>
</tr>
<tr>
  <td>เนื้อหาข่าว</td>
  <td><textarea name="news_detail"  rows="8" cols="60" required="required" ><?php echo $news_edit[0]['news_detail'] ;?></textarea></td>
</tr>
<tr>
  <td height="80">เลือกประเภทข่าว</td>
  <td>
    <select name="news_type" required="required">
        <option value="<?php echo $news_edit[0]['type_id'] ;?>"><?php echo $news_edit[0]['type_name'] ;?></option>
        <?php foreach ($type as $info ): ?>
          <option value="<?php echo $info['type_id'] ;?>"><?php echo $info['type_name'] ;?></option>
        <?php endforeach; ?>
      </select>
  </td>
</tr>
<tr>
  <td height="80">วันที่เพิ่มข่าว</td>
  <td><input type="text" name="news_date_add" class="date" required="required" value="<?php echo $news_edit[0]['news_date_add'] ;?>" /></td>
</tr>
<tr>
  <td height="80">วันที่ลบข่าว</td>
  <td><input type="text" name="news_date_exp" class="date" required="required" value="<?php echo $news_edit[0]['news_date_exp'] ;?>" /></td>
</tr>
<tr>
  <td height="80">ภาพประกอบข่าว (ใหม่)</td>
  <td><input type="file" name="news_pic" id="fileupload" /></td>
</tr>
<tr>
  <td height="80">ภาพประกอบข่าว (เดิม)</td>
  <td><img src="<?php echo BASE_URL('uploads/news/'.$news_edit[0]['news_pic'])?>" width="200"></td>
</tr>

</table>
<input type="hidden" name="news_id" value="<?php echo $news_edit[0]['news_id'];?> ">

<input type="submit" value="บันทึก" class="btn btn-primary">

	<?php echo form_close() ?>


<a href="<?php echo SITE_URL('admin/news_list')?>">
	  <button type="button" class="btn">ย้อนกลับ</button>
</a>


<?php endif; ?>
