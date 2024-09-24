<?php
class Member {
    private $id;
    private $prefix;
    private $firstName;
    private $lastName;
    public $date_of_birth; 
    private $age;
    private $profilePicture;
    private $updated_at;

    public function __construct($prefix, $firstName, $lastName, $date_of_birth, $profilePicture) {
        $this->prefix = $prefix;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->$date_of_birth = $date_of_birth;
        $this->age = $this->calculateAge($date_of_birth);
        $this->profilePicture = $profilePicture;
        $this->updated_at = date("Y-m-d H:i:s");
    }

    private function calculateAge($date_of_birth) {
        $birthDate = new DateTime($date_of_birth);
        $today = new DateTime('today');
        return $birthDate->diff($today)->y;
    }

    public function save() {
        $db = Database::getInstance();
        $sql = "INSERT INTO members (prefix, first_name, last_name, date_of_birth, age, profile_picture, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$this->prefix, $this->firstName, $this->lastName, $this->date_of_birth, $this->age, $this->profilePicture, $this->updated_at]);
        return $db->lastInsertId();
    }

    public static function getAllMembers() {
        $db = Database::getInstance();
        $sql = "SELECT * FROM members ORDER BY age ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getMemberById($id) {
        $db = Database::getInstance();
        $sql = "SELECT * FROM members WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id) {
        $db = Database::getInstance();
        $sql = "UPDATE members SET prefix = ?, first_name = ?, last_name = ?, date_of_birth = ?, age = ?, profile_picture = ?, updated_at = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$this->prefix, $this->firstName, $this->lastName, $this->date_of_birth, $this->age, $this->profilePicture, $this->updated_at, $id]);
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $sql = "DELETE FROM members WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
    }
    public static function addMember($prefix, $first_name, $last_name, $date_of_birth, $age, $profile_picture) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO members (prefix, first_name, last_name, date_of_birth, age, profile_picture, updated_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$prefix, $first_name, $last_name, $date_of_birth, $age, $profile_picture]);
    }
    

    // เพิ่มฟังก์ชันเพื่ออัปเดตข้อมูลสมาชิก
    public static function updateMember($id, $prefix, $first_name, $last_name, $date_of_birth, $profile_picture) {
        $db = Database::getInstance();
        $sql = "UPDATE members SET prefix = :prefix, first_name = :first_name, last_name = :last_name, 
                date_of_birth = :date_of_birth, profile_picture = :profile_picture, updated_at = NOW() WHERE id = :id";
        
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':prefix', $prefix);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':date_of_birth', $date_of_birth);
        $stmt->bindParam(':profile_picture', $profile_picture);
        
        return $stmt->execute();
    }
}
?>
