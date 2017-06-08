<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">จัดการสมาชิก</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

  <a href="<?php echo SITE_URL('admin/member_form')?>">
    <button style="margin-bottom:20px;" type="button" class="btn btn-primary">เพิ่มสมาชิก</button>
  </a>
  <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr class="info">
    			<td>อีเมลล์</td>
    			<td>ชื่อ</td>
    			<td>สกุล</td>
    			<td>ตัวเลือก</td>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($member as $info): ?>
        <tr>
          <td><?php echo $info['member_email'] ;?></td>
    			<td><?php echo $info['member_fname'] ;?></td>
          <td><?php echo $info['member_lname'] ;?></td>
    			<td>
            <a href="<?php echo SITE_URL('admin/member_accept/'.$info['member_id'])?>">
              <button type="button" class="btn btn-success"  onclick="return confirm('กรุณายืนยันการอนุมัติสมาชิกอีกครั้ง !!!')" >อนุมัติสมาชิก</button>
            </a>
            <a href="<?php echo SITE_URL('admin/member_update/'.$info['member_id'])?>">
              <button type="button" class="btn btn-warning">แก้ไข</button>
            </a>
            <a href="<?php echo SITE_URL('admin/member_delete/'.$info['member_id'])?>">
              <button type="button" class="btn btn-danger" onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')">ลบ</button>
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>

  </table>
