<?php
session_start();
require_once("dbconnect.php");
class register extends DB_con
{
    public function registration($fname, $username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $reg = mysqli_query($this->dbcon, "INSERT INTO tableuser(fullname,username,useremail,password)
        VALUES('$fname','$username','$email','$password')");
        return $reg;
    }
}

class loging extends DB_con
{
    public function login($username, $password)
    {
        $userdata = new DB_con();
        $conn = $userdata->getConnection();


        // เตรียมคำสั่ง SQL
        $stmt = $conn->prepare("SELECT * FROM `tableuser` WHERE username = ?");
        $stmt->bind_param("s", $username); // ผูกค่าชื่อผู้ใช้
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // พบผู้ใช้
            $row = $result->fetch_assoc();
            if ($password == $row["password"]) {
                if($row["UserStatus"] == "Admin") {
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['UserStatus'] = $row['UserStatus'];

                    echo "<script>window.location.href='Adminpage.php';</script>";
                } else {
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['UserStatus'] = $row['UserStatus'];

                    echo "<script>alert('ล็อคอินสำเร็จ');</script>";
                    echo "<script>window.location.href='index.php';</script>";
                    // นำไปสู่หน้าหลักหรือการทำงานที่ต้องการ
                }
            } else {
                echo "<script>alert('ชื่อผู้ใช้รหัสผ่านไม่ถูกต้อง');</script>";
            }
        } else {
            // ไม่พบชื่อผู้ใช้
            echo "<script>alert('ไม่พบชื่อผู้ใช้');</script>";
        }

        $stmt->close(); // ปิดการเตรียมคำสั่ง
    }
}

class Auth extends DB_con
{

    public function isLoggedIn()
    {
        return isset($_SESSION['username']);
    }

    public function logout()
    {
        session_destroy(); // ล้างข้อมูล session
        echo "<script>window.location.href = 'index.php';</script>";
    }
}
