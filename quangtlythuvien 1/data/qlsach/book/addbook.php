

<?php
    function getyear(){
        $date = getdate();
        for($i = 1980; $i <= $date["year"];$i++){
            echo "<option value='$i'> $i </option>";
        }

    }
?>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom01">Tên sách</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Tên sách" value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                        <label for="input-select">Nhà xuất bản</label>
                                        <input list="brow" type="text" class="form-control" id="input-select" placeholder="Chọn..." required>
                                        <datalist id="brow">
                                            <option value="Internet Explorer">
                                            <option value="Firefox">
                                            <option value="Chrome">
                                            <option value="Opera">
                                            <option value="Safari">
                                        </datalist> 
                                        <div class="invalid-feedback">
                                            Please provide a valid city.
                                        </div>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card"></div>
                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal" data-toggle="modal" data-target="#myModal2"><i class="far fa-plus-square"></i> Thêm thông tin NXB mới</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <label for="validationCustom02">Thể loại</label>
                                        <input list="brow" type="text" class="form-control" id="validationCustom02" placeholder="Chọn..." required>
                                        <datalist id="brow">
                                            <option value="Internet Explorer">
                                            <option value="Firefox">
                                            <option value="Chrome">
                                            <option value="Opera">
                                            <option value="Safari">
                                        </datalist> 
                                        <div class="invalid-feedback">
                                            Please provide a valid city.
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card"></div>
                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal" data-toggle="modal" data-target="#myModal2"><i class="far fa-plus-square"></i> Thêm thông tin thể loại</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <label for="validationCustom03">Vị trí trong thư viện</label>
                                        <input list="brow" type="text" class="form-control" id="validationCustom03" placeholder="Chọn..." required>
                                        <datalist id="brow">
                                            <option value="Internet Explorer">
                                            <option value="Firefox">
                                            <option value="Chrome">
                                            <option value="Opera">
                                            <option value="Safari">
                                        </datalist> 
                                        <div class="invalid-feedback">
                                            Please provide a valid city.
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card"></div>
                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal" data-toggle="modal" data-target="#myModal2"><i class="far fa-plus-square"></i> Thêm thông tin vị trí mới</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
                                <div class="row">
                                    <!-- ============================================================== --> 
                                    <!-- boxed multiselect  -->
                                    <!-- ============================================================== -->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <label for="demo-2">Tác giả</label>
                                        <select name="demo-2" id="demo-2" class="form-control" placeholder="Chọn...." multiple>
                                            <!-- <option value="" selected>Dropdown item 6</option> -->
                                            <option value="Dropdown item 1">Dropdown item 1</option>
                                            <option value="Dropdown item 2">Dropdown item 2</option>
                                            <option value="Dropdown item 3" >Dropdown item 3</option>
                                            <option value="Dropdown item 4" >Dropdown item 4</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid city.
                                        </div>
                                    </div>
                                    <!-- ============================================================== -->
                                    <!-- end boxed multiselect  -->
                                    <!-- ============================================================== -->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card"></div>
                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal" data-toggle="modal" data-target="#myModal2"><i class="far fa-plus-square"></i> Thêm thông tin tác giả mới</button>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="form-row">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="nam">Năm xuất bản</label>
                                <!-- <input type="text" class="form-control" id="validationCustom03"
                                    placeholder="City" required> -->
                                <select name="" class="form-control" id="nam" required>
                                    <option value="" hidden selected> Chọn năm</option>
                                    <?php
                                        getyear();
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="validationCustom04">Giá sách</label>
                                <input type="text" class="form-control" id="validationCustom04"
                                    placeholder="VNĐ" required>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="validationCustom05">Kích thước</label>
                                <input type="text" class="form-control" id="validationCustom05"
                                    placeholder="Dài*rộng" required>
                                <div class="invalid-feedback">
                                    Please provide a valid zip.
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Example textarea</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
<script>
    var secondElement = new Choices('#demo-2', { allowSearch: false }).setValue();
    $(document).ready(function(){
        $("input").click(function(){
            $(this).next().show();
            $(this).next().hide();
        });
    });
</script>

<?php

?>
