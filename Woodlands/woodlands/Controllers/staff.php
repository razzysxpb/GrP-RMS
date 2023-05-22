<?php
namespace woodlands\Controllers;

class staff {
    private $staffTable;

    public function __construct($staffTable) {
        $this->staffTable = $staffTable;
    }

    public function home() {
        return [
            'template' => 'home.html.php',
            'variables' => [],
            'title' => 'Home'
        ];
    }

    public function manageStaff() {
        $staffMembers = $this->staffTable->findAll(); // Fetch staff members from the database

        return [
            'template' => 'manageStaff.html.php',
            'variables' => [
                'staffMembers' => $staffMembers
            ],
            'title' => 'Manage Staff'
        ];
    }

    public function manageStaffSubmit() {
        $this->staffTable->save($_POST['staff']);
        header('location:/staff/staffList');
    }

    public function staffList() {
        $staffMembers = $this->staffTable->findAll();

        return [
            'template' => 'staffList.html.php',
            'variables' => [
                'staffMembers' => $staffMembers
            ],
            'title' => 'Staff List'
        ];
    }
}
