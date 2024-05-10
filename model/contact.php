<?php
include_once __DIR__ . '/../config/dbconn.php';

class Contact
{
    private static $conn;

    static function setConnection($connection)
    {
        self::$conn = $connection;
    }

    static function select( )
    {
        $query = "SELECT * FROM list_contact";
        $result = mysqli_query(self::$conn, $query);
        return $result;
    }

    static function createContact($NO_HP,$Owner)
    {
        $query = "INSERT INTO list_contact (NO_HP, Owner) VALUES (?, ?)";
        $stmt = self::$conn->prepare($query);
        $stmt->bind_param("ss", $NO_HP,$Owner);
        $result = $stmt->execute();
        return $result;
    }

    static function getContactById($id)
    {
        $stmt = self::$conn->prepare("SELECT * FROM list_contact WHERE NO_ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $contact = $result->fetch_assoc();
        $stmt->close();
        return $contact;
    }

    static function updateContact($id,$new_NO_HP,$new_Owner)
    {
        $query = "UPDATE list_contact SET NO_HP = ?, Oener = ? WHERE NO_ID = ?";
        $stmt = self::$conn->prepare($query);
        $stmt->bind_param("ssi", $new_NO_HP,$new_Owner,$id);
        $result = $stmt->execute();
        return $result;
    }

    static function deleteContact($id)
    {
        $query = "DELETE FROM list_contact WHERE NO_ID = ?";
        $stmt = self::$conn->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        return $result;
    }
}
