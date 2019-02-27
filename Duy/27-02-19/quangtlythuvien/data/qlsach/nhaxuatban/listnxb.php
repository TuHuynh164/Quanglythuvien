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
                        <h5 class="card-header">Basic Table</h5>
                        <!-- <div id="custom-search" class="search-bar">
                            <input class="form-control  _search" type="text" placeholder="Search for books here...">
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tên NXB</th>
                                            <th>Dia_chi</th>
                                            <th>Email</th>
                                            <th>Thong_tin</th>
                                            <th>Số tác phẩm lưu trữ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include "../../data.php";
                                            include "../../function.php";
                                            $dt = new database();



                                            if(!empty($_POST['search'])){
                                                $dt->select('SELECT nxb.Id, nxb.Ten, nxb.Dia_chi, nxb.Email, nxb.Thong_tin FROM nha_xuat_ban nxb
                                                WHERE nxb.Ten LIKE "%'.$_POST['search'].'%" ORDER BY nxb.Ten ASC');
                                            }else{
                                                $dt->select('SELECT nxb.Id, nxb.Ten, nxb.Dia_chi, nxb.Email, nxb.Thong_tin FROM nha_xuat_ban nxb ORDER BY nxb.Ten ASC');
                                            }
                                            while($r=$dt->fetch()){
                                                echo "<tr>
                                                        <td>{$r['Id']}</td>
                                                        <td natsort='".$r['Ten']."'url='nhaxuatban/profilenxb.php' class = 'profile' >{$r['Ten']}</td>
                                                        <td>{$r['Dia_chi']}</td>
                                                        <td>{$r['Email']}</td>
                                                        <td>{$r['Thong_tin']}</td>
                                                        <td> ".dem_ten_sach($r['Id'])."</td>
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