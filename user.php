<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Danh sách người dùng</h4>
                        
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>STT</th>

                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Chức năng</th>
                            </thead>
                            <tbody>
                                <?php
                                $listuser = $data['user'];
                                $stt = 1;
                                foreach ($listuser as $item) {
                                    extract($item);
                                    echo '<tr>
                                        	<td>' . $stt . '</td>
                                            <td>' . $username . '</td>
                                            <td>' . $password . '</td>
                                            <td>' . $email . '</td>
                                        	<td><a href="index.php?page=edituser&id=' . $id . '">Sửa</a> | <a href="index.php?page=deluser&id=' . $id . '".$id>Xóa</a></td>
                                        </tr>';
                                    $stt++;
                                }
                                ?>


                            </tbody>
                        </table>

                    </div>
                    <ul class="pagination-list">
                        <li class="pagination-item">
                            <a href="" class="pagination-link">
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-link">1</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-link">2</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-link">3</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-link">...</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-link">10</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-link">
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>