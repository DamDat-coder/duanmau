<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Cập nhật danh mục</h4>
                        <p class="category"></p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <form action="index.php?page=edit_cate" method="post" enctype="multipart/form-data">
                            <?php
                            $detail_cate = $data['detail_cate'];
                            ?>
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?= $detail_cate['name'] ?>">

                            <label for="">Hình ảnh</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <img width="20%" src="../img/<?= $detail_cate['image'] ?>" alt=""> <br>
                            <input type="hidden" name="idcate" value="<?= $detail_cate['id'] ?>">
                            <input type="hidden" name="image_old" value="<?= $detail_cate['image'] ?>">
                            <input type="submit" value="Cập nhật sản phẩm" onclick="" name="sub">
                        </form>
                    </div>
                </div>