        <div class="container-fluid  dashboard-content">  
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <!-- <h2 class="pageheader-title">Data Tables</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Quảng lý sách</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Danh sách tác giả</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Data Tables</li> -->
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body"> <button type="button" class="btn btn-outline-primary add_tacgia" data-toggle="modal" data-target="#myModal1"><i class="far fa-plus-square"></i> Thêm tác giả mới</button></div>
                        <!-- <div id="custom-search" class="search-bar">
                            <input class="form-control  _search" type="text" placeholder="Search for books here...">
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tên tác giả</th>
                                            <th>Website</th>
                                            <th>Số tác phẩm lưu trữ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include "../../data.php";
                                            include "../../function.php";
                                            $dt = new database();



                                            if(!empty($_POST['search'])){
                                                $dt->select('SELECT tg.Id, tg.Ten_tac_gia, tg.website FROM tac_gia tg 
                                                WHERE tg.Ten_tac_gia LIKE "%'.$_POST['search'].'%" ORDER BY tg.Ten_tac_gia ASC');
                                            }else{
                                                $dt->select('SELECT tg.Id, tg.Ten_tac_gia, tg.website FROM tac_gia tg ORDER BY tg.Ten_tac_gia ASC');
                                            }
                                            while($r=$dt->fetch()){
                                                echo "<tr>
                                                        <td>{$r['Id']}</td>
                                                        <td natsort='".$r['Ten_tac_gia']."'url='tacgia/profiletacgia.php' class = 'profile' >{$r['Ten_tac_gia']}</td>
                                                        <td>{$r['website']}</td>
                                                        <td> ".tong_sach_tac_gia($r['Id'])."</td>
                                                    </tr>";
                                            }
                                            
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>