<?php
if (isset($_POST['submit'])){
    $data = $_POST['frm'];
    //print_r($data);
    //print_r($_FILES['frm']);
    $img=uploader("frm","../images/news/",$data['newsTitle'],"news","newsImage");
    echo "<pre style='direction:ltr;'>"; var_dump($img); echo "</pre>";
    addNewsDetails($data,$img);
    header('location:?m=news&p=list');
}

?>



<h1>افزودن خبر جدید</h1>
<div class="col-lg-4"></div>
<div class="col-lg-4 ">
    <section class="panel">
        <header class="panel-heading">
            افزودن خبر جدید

        </header>
        <div class="panel-body">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="newsTitle">عنوان خبر</label>
                    <input type="text" class="form-control" id="newsTitle" name="frm[newsTitle]" placeholder="عنوان را وارد کنید  ">
                </div>

                <div class="form-group">
                    <label for="newsDetails">توضیحات</label>
                    <textarea type="text" class="form-control" id="newsDetails" name="frm[newsDetails]" placeholder="توضیحات را وارد کنید  "></textarea>
                </div>

                <div class="form-group">
                    <label for="">دسته‌بندی</label>
                    <select name="frm[newsCategory]" id="parent" class="form-control input-lg m-bot15">
                        <?php
                        $categories=listNewsCategory();
                        foreach ($categories as $cat){

                            echo '<option value="' . $cat['id'] .'">' . $cat['title'] . '</option>';
                            //echo  $sub['title'] ;
                        }
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">تصویر خبر</label>
                    <input type="file" id="exampleInputFile" name="frm[newsImage]" required/>
                    <p class="help-block">یک تصویر انتخاب فرمایید</p>
                </div>


                <button type="submit" class="btn btn-info" name="submit">افزودن</button>
            </form>

        </div>
    </section>
</div>
<div class="col-lg-4"></div>