<?php
class database{
    private $conn = null;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $data = 'qlthuvien'; //tên database muốn sử dụng.
    public $result = null;
    private function connect(){
        $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->data)
        or die('kết nối thất bại');
        $this->conn->query('SET NAMES UTF8');
    }
    //phương thức select dữ liệu
    public function select($sql){
        $this->connect();
        $this->result = $this->conn->query($sql);
    }
    public function fetch(){
        if($this->result->num_rows > 0){
            $row = $this->result->fetch_assoc();
        }else{
            $row = 0;
        }
        return $row;
    }
    //phương thức chung cho insert, update, delete
    public function command($sql){
        $this->connect();
        $this->conn->query($sql);
    }
}
    

// class count extends database{
//     public function tong_sach($a){
//         parent::select();
//         parent::fetch();
//         $this->select("SELECT COUNT(sach.Id) FROM sach INNER JOIN loai_sach ls ON sach.Ma_ten_sach = ls.Id WHERE ls.Ten_sach = '".$a."';");
//         $sl=$this->fetch();
//         return $sl['COUNT(sach.Id)'];
//     }
//     public function tong_sach_trong_kho($b){
//         parent::select();
//         parent::fetch();
//         $this->select("SELECT COUNT(sach.Id) FROM sach INNER JOIN loai_sach ls ON sach.Ma_ten_sach = ls.Id WHERE ls.Ten_sach = '".$b."' AND sach.Hien_co = 1;");
//         $sl1=$this->fetch();
//         return $sl1['COUNT(sach.Id)'];
//     }
// }
    // $count = new count();
?>