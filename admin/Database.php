<?php


class Database1 {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "tranvantai";
    private $conn;

    // Phương thức khởi tạo
    public function __construct() {
        $this->connect();
    }

    // Kết nối cơ sở dữ liệu
    private function connect() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Kiểm tra kết nối
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Thực thi truy vấn
    public function exec($sql) {
        return $this->conn->query($sql);
    }

    // Lấy tất cả kết quả từ truy vấn
    public function getAll($sql) {
        $result = $this->exec($sql);
        $rows = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        return $rows;
    }

    // Lấy một kết quả từ truy vấn
    public function getOne($sql) {
        $result = $this->exec($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return null;
    }

    // Đóng kết nối cơ sở dữ liệu
    public function close() {
        $this->conn->close();
    }
}
?>
