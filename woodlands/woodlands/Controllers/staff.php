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
        if (isset($_GET['id'])) {
			$result = $this->staffTable->find('staff_id', $_GET['id']);
			$staffMember = $result[0];
		} else {
			$staffMember = false;
		}

        return [
            'template' => 'manageStaff.html.php',
            'variables' => [
                'staffMember' => $staffMember
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

    public function deleteSubmit()
	{
		$this->staffTable->delete($_POST['id']);

		header('location: /staff/staffList');
	}
}
