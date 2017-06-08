<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">จัดการข่าวสาร</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

  <a href="<?php echo SITE_URL('admin/news_form')?>">
    <button style="margin-bottom:20px;" type="button" class="btn btn-primary">เพิ่มข่าว</button>
  </a>
  <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr class="info">
    			<td>หัวข้อข่าว</td>
    			<td>เนื้อหาข่าว</td>
    			<td>ประเภทข่าว</td>
    			<td>วันที่เพิ่มข่าว</td>
    			<td>วันที่ลบข่าว</td>
          <td>รูปภาพประกอบ</td>
    			<td>ตัวเลือก</td>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($news as $info): ?>
        <tr>
          <td><?php echo $info['news_name'] ;?></td>
    			<td><?php echo $info['news_detail'] ;?></td>
          <td><?php echo $info['type_name'] ;?></td>
    			<td><?php echo $this->thaidate->FullDate($info['news_date_add']) ;?></td>
    			<td><?php echo $this->thaidate->FullDate($info['news_date_exp']) ;?></td>
    			<td>
          <img src="<?php echo BASE_URL('uploads/news/'.$info['news_pic'])?>" width="200">
          </td>
    			<td>
            <a href="<?php echo SITE_URL('admin/news_update/'.$info['news_id'])?>">
              <button type="button" class="btn btn-warning">แก้ไข</button>
            </a>
            <a href="<?php echo SITE_URL('admin/news_delete/'.$info['news_id'])?>">
              <button type="button" class="btn btn-danger" onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')">ลบ</button>
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>

  </table>
