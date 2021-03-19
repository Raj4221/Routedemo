<?php
class User {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getUsers() {
        $this->db->query("SELECT * FROM tbl_mvc");

        $result = $this->db->resultSet();
        return $result;
    }

    public function setUsers($data)
    {
        $this->db->query('INSERT INTO tbl_mvc(name, address, contact) VALUES(:name,:address,:contact)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':contact', $data['contact']);

        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function deleteRecord($data)
    {
        $this->db->query('DELETE FROM tbl_mvc WHERE id = :id');

        $this->db->bind(':id', $data);

        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function editrecord($data) {
        $this->db->query("SELECT * FROM tbl_mvc WHERE id = :id");
        $this->db->bind(':id', $data);

        $result = $this->db->single();
        return $result;
    }

    public function updateRecord($data)
    {
        //var_dump($data); die();
        $this->db->query('UPDATE tbl_mvc SET name = :name, address = :address, contact = :contact WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':contact', $data['contact']);

        if($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }
}
