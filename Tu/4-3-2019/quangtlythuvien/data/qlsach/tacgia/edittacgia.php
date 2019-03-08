<?php
include "../../data.php";
$dt = new database();
if(isset($_POST["editname"])){
    $name = $_POST["editname"];
}
if(!empty($_POST["name"]) && !empty($_POST["web"]) && isset($_POST["ghichu"]) && isset($_POST["soluoc"])){
    $web = $_POST["web"];
    $name = $_POST["name"];
    $ghichu = $_POST["ghichu"];
    $soluoc = $_POST["soluoc"];
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        // echo $id;
    }
    $dt->command("UPDATE `tac_gia` SET `Ten_tac_gia` = '$name', `website` = '$web', `Ghi_chu` = '$ghichu', `So_luoc_thong_tin` = '$soluoc' WHERE `tac_gia`.`Id` = '$id';");
    // $dt->command("INSERT INTO `tac_gia` (`Id`, `Ten_tac_gia`, `website`, `Ghi_chu`, `So_luoc_thong_tin`) VALUES (NULL, '$name', '$web', '$ghichu', '$soluoc');");
}
$dt->select("SELECT * FROM tac_gia WHERE Ten_tac_gia ='$name'");
$tg = $dt->fetch();
$idtg = $tg["Id"];
?>


                        <div id="status2"></div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="ten">Tên tác giả</label>
                                <input type="text" class="form-control" id="ten"
                                    placeholder="Tên nhà xuất bản" name="ten" value="<?php echo $tg["Ten_tac_gia"]; ?>" autocomplete="off" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
                                <label for="web">Website</label>
                                <input type="text" class="form-control" id="web" name="web"
                                    placeholder="Website" value="<?php echo $tg["website"]; ?>" autocomplete="off" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
                                <label for="ghichu">Ghi chú</label>
                                <input type="text" class="form-control" id="ghichu" name="ghichu" placeholder="Ghi chú" autocomplete="off" value="<?php echo $tg["Ghi_chu"]; ?>">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="soluoc">Sơ lược về tác giả</label>
                                    <textarea class="form-control" id="soluoc" rows="3"><?php echo $tg["So_luoc_thong_tin"]; ?> </textarea>
                                </div>
                            </div>
                        </div>
<script>
    var secondElement = new Choices('#mutiadd2', { allowSearch: false }).setValue();
    $(document).ready(function(){
        $("input").click(function(){
            $(this).next().show();
            $(this).next().hide();
        });
    });
    function submitform(){
        // alert("asdasdas");
        var name = $("input[name='ten']").val();
        var web = $("input[name='web']").val();
        var ghichu = $("input[name='ghichu']").val();
        var soluoc = $("#soluoc").val();
        // alert(detail);
        if(name != '' && web != ''){
            var editname = "<?php echo $name; ?>";
            var Id = "<?php echo $idtg; ?>";
            $.ajax({
                type: 'post',
                url: '../data/qlsach/tacgia/edittacgia.php',
                data:{
                    name:name,
                    web:web,
                    ghichu:ghichu,
                    soluoc:soluoc,
                    editname:editname,
                    id:Id
                },
                cache: false,
                success: function (html) {

                    // $('#formloading1').html(html);
                    profile(name, 'tacgia/profiletacgia.php');
                    $(".close").click();
                }
            });
            return false;
        }else{
            $("#status2").children().remove();
            $("#status2").append("<p style='color:red'>Thêm không thành công! <br> Nhập biểu mẫu theo đúng chỉ dẫn để tránh lỗi</p>");
        }
        return false;
    }
</script>