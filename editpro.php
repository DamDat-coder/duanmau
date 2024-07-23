<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Cập nhật sản phẩm</h4>
                        <p class="category"></p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <form action="index.php?page=edit_pro" method="post" enctype="multipart/form-data">
                            <select name="cate" id="cate" class="form-control">
                                <?php
                                    $listcate = $data['cate'];
                                    $detail_pro = $data['detail_pro'];
                                    $kq = [];
                                    foreach ($listcate as $item){
                                        extract($item);
                                        if($id == $detail_pro['id_cate']){
                                            $kq .= '<option value="'.$id.'" selected >'.$name.'</option> ';
                                        } else {
                                            $kq .= '<option value="".' . $id . '">' . $name . '</option>';
                                        }
                                        echo $kq;
                                    }
                                ?>
                            </select>
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?=$detail_pro['name']?>">
                            <label for="">Giá sản phẩm</label>
                            <input type="number" name="price" id="price" class="form-control" value="<?=$detail_pro['price']?>">
                            <label for="">Số lượng sản phẩm</label>
                            <input type="number" name="amount" id="amount" class="form-control" value="<?=$detail_pro['amount']?>">
                            <label for="">Lượt xem</label>
                            <input type="text" name="view" id="view" class="form-control" value="<?=$detail_pro['view']?>">
                            <label for="">Hình ảnh</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <img width="20%" src="../img/<?=$detail_pro['image']?>" alt=""> <br>
                            <input type="hidden" name="idpro" value="<?=$detail_pro['id']?>">
                            <input type="hidden" name="image_old" value="<?=$detail_pro['image']?>">
                            <input type="submit" value="Cập nhật sản phẩm" onclick="" name="sub">
                        </form>
                    </div>
                </div>