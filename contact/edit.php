<?php
$id = $_GET['id'];

include_once 'app/contactClass.php';
$object = new contact();
$object->setTbl('contacts_tbl');
$result = $object->searchData('id'  , $id);
$val = $result;
if (isset($_POST['submit'])){
    $data = $_POST['frm'];

    $object->update_contact($data,$id);



    header('location:?contact=list');
}

?>



<div class="col-lg-4"></div>
<div class="col-lg-4 ">
    <section class="panel">
        <header class="panel-heading">
            ویرایش مخاطب

        </header>
        <div class="panel-body">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="contactName">نام مخاطب</label>
                    <input type="text" class="form-control" id="contactName" name="frm[contactName]" placeholder="نام را وارد کنید  " value="<?php echo $val->name  ?>">
                </div>
                <div class="form-group">
                    <label for="contactLastName">نام خانوادگی مخاطب</label>
                    <input type="text" class="form-control" id="contactLastName" name="frm[contactLastName]" placeholder="نام خانوادگی را وارد کنید  " value="<?php echo $val->lastname;  ?>">
                </div>
                <div class="form-group">
                    <label for="contactAddress">آدرس مخاطب</label>
                    <input type="text" class="form-control" id="contactAddress" name="frm[contactAddress]" placeholder="آدرس را وارد کنید  " value="<?php echo $val->addr; ?>">
                </div>
                <div class="form-group">
                    <label for="contactTel">شماره تماس مخاطب</label>
                    <input type="text" class="form-control" id="contactTel" name="frm[contactTel]" placeholder="شماره تماس را وارد کنید  " value="<?php echo $val->tel; ?>">
                </div>






                <button type="submit" class="btn btn-info" name="submit">ثبت تغییرات</button>
            </form>

        </div>
    </section>
</div>
<div class="col-lg-4"></div>