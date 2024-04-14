<?php
require_once 'index.php';
require_once 'database.php';

class Contact {
    private static $koneksi;

    public static function setKoneksi($koneksi) {
        self::$koneksi = $koneksi;
    }

    public static function select() {
        $query = "SELECT * FROM list_contact";
        $result = mysqli_query(self::$koneksi, $query);
        return $result;
    }

    public static function insert($NO_HP, $Owner) {
        $query = "INSERT INTO list_contact (NO_HP, Owner) VALUES (?, ?)";
        $stmt = self::$koneksi->prepare($query);
        $stmt->bind_param("ss", $NO_HP, $Owner);
        $result = $stmt->execute();
        return $result;
    }

    public static function delete($id) {
        $query = "DELETE FROM list_contact WHERE NO_ID = ?";
        $stmt = self::$koneksi->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        return $result;
    }

    public static function update($id, $new_NO_HP, $new_Owner) {
        $query = "UPDATE list_contact SET NO_HP = ?, Owner = ? WHERE NO_ID = ?";
        $stmt = self::$koneksi->prepare($query);
        $stmt->bind_param("ssi", $new_NO_HP, $new_Owner, $id);
        $result = $stmt->execute();
        return $result;
    }
}
?>

<!-- CONTOH PENGGUNAAN CRUD UPDATE -->

<?php
require_once 'Contact.php';

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

Contact::setKoneksi($conn);

$idToUpdate = 25; 
$newNO_HP = '087689654786';
$newOwner = 'Serafin Ayodya'; 

$resUpdate = Contact::update($idToUpdate, $newNO_HP, $newOwner);
echo $resUpdate;

mysqli_close($conn);
?>