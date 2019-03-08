<?php
//đêm sách
    function tong_sach($a){
        $sql = new database();
        $sql->select("SELECT COUNT(sach.Id) FROM sach INNER JOIN loai_sach ls ON sach.Ma_ten_sach = ls.Id WHERE ls.Id = '".$a."'");
        $sl=$sql->fetch();
        return $sl["COUNT(sach.Id)"];
    }
    function tong_sach_trong_kho($a){
        $sql = new database();
        $sql->select("SELECT COUNT(sach.Id) FROM sach INNER JOIN loai_sach ls ON sach.Ma_ten_sach = ls.Id WHERE ls.Id = '".$a."' AND sach.Hien_co = 1");
        $sl1=$sql->fetch();
        return $sl1["COUNT(sach.Id)"];
    }
    function tong_sach_tac_gia($a){
        $sql = new database();
        $sql->select("SELECT COUNT(Ma_tg) sl FROM ls_tg WHERE Ma_tg = $a;");
        $sl = $sql->fetch();
        return $sl["sl"];
    }
    function dem_ten_sach($a){
        $sql = new database();
        $sql->select("SELECT COUNT(Id) sl FROM loai_sach WHERE Ma_the_loai = $a;");
        $sl = $sql->fetch();
        return $sl["sl"];
    }
    function dem_ten_sach_nxb($a){
        $sql = new database();
        $sql->select("SELECT COUNT(Id) sl FROM loai_sach WHERE Ma_NXB = $a;");
        $sl = $sql->fetch();
        return $sl["sl"];
    }
    function dem_ten_sach_vt($a){
        $sql = new database();
        $sql->select("SELECT COUNT(Id) sl FROM loai_sach WHERE Ma_vi_tri = $a;");
        $sl = $sql->fetch();
        return $sl["sl"];
    }
    /////////////////
//lấp sanh sách tác giả
    function tg($a){
        $sql = new database();
        $sql->select('SELECT tg.Ten_tac_gia tacgia FROM tac_gia tg INNER JOIN ls_tg ON tg.Id = ls_tg.Ma_tg WHERE ls_tg.Ma_ls = "'.$a.'"');
        $tg = array();
        while($r2 =$sql->fetch()){
            $tg[] = $r2["tacgia"];
        }
        return $tg;
    }
?>