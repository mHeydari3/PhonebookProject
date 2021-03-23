<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <form method="post">
                <input type="text" name="txt" />
                <input type="submit" value="جستجو" name="btn" />
            </form>
            <header class="panel-heading">
                لیست مخاطبین
            </header>
            <table class="table table-striped table-advance table-hover">
                <thead>
                <tr>
                    <th> نام نام خانوادگی</th>
                    <th>  شماره تلفن </th>
                    <th> آدرس</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                <?php

                if (isset($_POST['btn']) ) {
                    if ($_POST['btn']){
                    $txt = $_POST['txt'];
                    include_once 'app/contactClass.php';
                    $object = new contact();
                    $object->setTbl('contacts_tbl');




                $result = $object->likeData('name' , $txt);

                if ($result != NULL) :
                    foreach ($result as $val):
                        ?>
<!--                    <pre style="direction: ltr;">--><?php //var_dump($val); ?><!--</pre>-->
                        <tr>
                            <td><?php echo $val->name . " " . $val->lastname; ?></td>
                            <td><?php echo $val->tel; ?></td>
                            <td><?php echo $val->addr; ?></td>
                            <td><a href="?contact=edit&id=<?=$val->id ?>" class="btn btn-primary btn-xs"><i class="icon-pencil"></i></a></td>
                            <td><a href="?contact=delete&id=<?=$val->id ?>" class="btn btn-danger btn-xs"><i class="icon-trash "></i></a></td>
                        </tr>
                <?php
                    endforeach;
                endif;
                }
                }
                ?>

                </tbody>
            </table>
        </section>
    </div>
</div>