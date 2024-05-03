<?php
include_once __DIR__ . '/../app/config/dbconn.php';

class Contact
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getContacts($userId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM list_contact WHERE NO_ID = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $contacts = array();
        while ($row = $result->fetch_assoc()) {
            $contacts[] = $row;
        }
        return $contacts;
    }

    public function createdata ($data=[])
    {
        extract($data);
        $stmt = $this->conn->prepare("INSERT INTO list_contact (NO_HP, Owner) VALUES (?, ?, NOW())");
        $stmt->bind_param("ssi", $NO_HP, $Owner);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function getContactById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM list_contact WHERE NO_ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updatedata ($data=[])
    {
        $new_NO_HP = $data['NO_HP'];
        $new_Owner = $data['Owner'];
        $id = $data['NO_ID'];
        $stmt = $this->conn->prepare("UPDATE list_contact SET cNO_HP = ?, Owner = ?, user_id = ? WHERE id = ?");
        $stmt->bind_param("ssi", $new_NO_HP, $new_Owner, $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}