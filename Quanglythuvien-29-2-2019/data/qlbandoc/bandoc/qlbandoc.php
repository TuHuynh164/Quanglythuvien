        <div class="container-fluid  dashboard-content">  
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Data Tables</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <!-- <h5 class="card-header">Basic Table</h5>
                        <div id="custom-search" class="search-bar">
                            <input class="form-control  _search" type="text" placeholder="Search for books here...">
                        </div> -->
                        
                        <div class="card-body"> <button type="button" class="btn btn-outline-primary add_member_btn" data-toggle="modal" data-target="#myModal1"><i class="far fa-plus-square"></i> Thêm bạn đọc</button></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tên</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th>Ghi chú</th>
                                            <th>Mã thẻ (CMND)</th>
                                            <th>Số sách đang mượn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include "../../data.php";
                                            include "../../function.php";
                                            $dt = new database();
                                            if(!empty($_POST['search'])){
                                                $dt->select('SELECT * FROM nguoi_muon WHERE Ten LIKE "%'.$_POST['search'].'%" ORDER BY Ten ASC');
                                                // $dt2->select('SELECT ls.Id, ls.Ten_sach, tl.Ten theloai, nxb.Ten nhaxuatban FROM loai_sach ls 
                                                // INNER JOIN the_loai tl ON ls.Ma_the_loai = tl.Id INNER JOIN nha_xuat_ban nxb ON ls.Ma_NXB = nxb.Id WHERE ls.Ten_sach LIKE "%'.$_POST['search'].'%" ORDER BY ls.Ten_sach ASC');
                                            }else{
                                                $dt->select('SELECT * FROM nguoi_muon ORDER BY Id ASC');
                                            }
                                            while($r=$dt->fetch()){
                                                echo "<tr>  <td>".$r["Id"]."</td> 
                                                <td natsort='".$r["Ten"]."' url='bandoc/profilemember.php' class = 'profile_member'>".$r["Ten"]."</td>";
                                            ?>

                                            <?php
                                                echo "<td class = 'profile'>".$r["Dia_chi"]."</td>
                                                <td class = 'profile'>".$r["Email"]."</td>
                                                <td class = 'profile'>".$r["Ghi_chu"]."</td>
                                                <td class = 'profile'>".$r["CMND"]."</td>
                                                <td>0</td></tr>";
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
<script>

</script>
