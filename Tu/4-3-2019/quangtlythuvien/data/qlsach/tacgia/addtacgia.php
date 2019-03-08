                        
                        
                        


<?php
include "../../data.php";
$dt = new database();
if(!empty($_POST["name"]) && !empty($_POST["web"]) && isset($_POST["ghichu"]) && isset($_POST["soluoc"])){
    $web = $_POST["web"];
    $name = $_POST["name"];
    $ghichu = $_POST["ghichu"];
    $soluoc = $_POST["soluoc"];
    $dt->command("INSERT INTO `tac_gia` (`Id`, `Ten_tac_gia`, `website`, `Ghi_chu`, `So_luoc_thong_tin`) VALUES (NULL, '$name', '$web', '$ghichu', '$soluoc');");
}
?>


                        <div id="status2"></div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="ten">Tên tác giả</label>
                                <input type="text" class="form-control" id="ten"
                                    placeholder="Tên nhà xuất bản" name="ten" value="" autocomplete="off" required>
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
                                    placeholder="Website" value="" autocomplete="off" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "> 
                                <label for="ghichu">Ghi chú</label>
                                <input type="text" class="form-control" id="ghichu" name="ghichu" placeholder="Ghi chú" autocomplete="off" value="">
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
                                    <textarea class="form-control" id="soluoc" rows="3"></textarea>
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
    function submitform1(){
        var name = $("input[name='ten']").val();
        var web = $("input[name='web']").val();
        var ghichu = $("input[name='ghichu']").val();
        var soluoc = $("#soluoc").val();
        // alert(detail);
        if(name != '' && web != ''){
            $.ajax({
                type: 'post',
                url: '../data/qlsach/tacgia/addtacgia.php',
                data:{
                    name:name,
                    web:web,
                    ghichu:ghichu,
                    soluoc:soluoc
                },
                cache: false,
                success: function (html) {
                    if(tap2 == "qlsach/tacgia/listtacgia.php"){
                        $('#formloading1').html(html);
                        $("#status2").append("<p style='color:green'>Thêm thành công! <br> Tiếp tục thêm hoặc thoát</p>");
                        var first = $("table").children(":first");
                        first.after("<tr style='color:green'> <td> setting... </td> <td>"+name+"</td> <td>"+web+"</td></tr>");
                    }else{
                        $(".close2").click();
                        $("#test").children().remove();
                        $("#test").append(mutiselect).find("#tacgia").append("<option value='"+name+"' selected>"+name+"</option>").append(savetext);
                        updateselect();
                        // alert("aaaaaaaaaaaaaaa");
                    }
                    
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