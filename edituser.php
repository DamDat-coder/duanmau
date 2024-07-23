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
                        <form action="index.php?page=edit_user" method="post" enctype="multipart/form-data">
                            <?php
                            $detail_user = $data['detail_user'];
                            ?>
                        
                            <label for="">Username</label>
                            <input type="text" name="username" id="username" class="form-control" disabled value="<?= $detail_user['username'] ?>">
                            <label for="">Email</label>
                            <input type="text" name="email" id="email" class="form-control" disabled value="<?= $detail_user['email'] ?>">
                            <label for="">Password</label>
                            <input type="text" name="password" id="password" class="form-control" value="<?= $detail_user['password'] ?>">
                            <input type="hidden" name="iduser" value="<?= $detail_user['id'] ?>">
                            <input type="hidden" name="password_old" value="<?= $detail_user['password'] ?>">
                            <input type="submit" value="Cập nhật người dùng" onclick="" name="sub">
                        </form>
                    </div>
                </div>