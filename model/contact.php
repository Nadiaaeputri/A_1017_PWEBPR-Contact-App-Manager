<?php
include_once __DIR__ . '/../config/dbconn.php';

class Contact
{
    private static $conn;

    static function setConnection($connection)
    {
        self::$conn = $connection;
    }

    static function getAllContacts($userId)
    {
        $stmt = self::$conn->prepare("SELECT * FROM list_contact WHERE NO_ID = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $contacts = [];
        while ($row = $result->fetch_assoc()) {
            $contacts[] = $row;
        }
        $stmt->close();
        return $contacts;
    }

    static function createContact($data=[])
    {
        $stmt = self::$conn->prepare("INSERT INTO list_contact (NO_HP, Owner) VALUES (?, ?, NOW())");
        $stmt->bind_param("ssi", $data['NO_HP'], $data['Owner'], $data['NO_ID']);
        $stmt->execute();
        $insertedId = $stmt->insert_id;
        $stmt->close();
        return $insertedId;
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

    static function updateContact($data=[])
    {
        $stmt = self::$conn->prepare("UPDATE list_contact SET NO_HP = ?, Owner = ?, NO_ID = ? WHERE id = ?");
        $stmt->bind_param("ssii", $data['NO_HP'], $data['Owner'], $data['NO_ID'], $data['id']);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();
        return $affectedRows;
    }

    static function deleteContact($id)
    {
        $stmt = self::$conn->prepare("DELETE FROM list_contact WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();
        return $affectedRows;
    }
}
