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

    public function manageStaffSubmit()
{
    $staff = $_POST['staff'];
    $staff['isAdmin'] = $_POST['staff']['isAdmin'] ?? 0;

    // Check if a new password is provided
    if (!empty($staff['password']) && !password_needs_rehash($staff['password'], PASSWORD_DEFAULT)) {
        // Retrieve the existing password from the database
        $existingStaff = $this->staffTable->findById($staff['staff_id']);
        $staff['password'] = $existingStaff['password'];
    } elseif (!empty($staff['password'])) {
        $staff['password'] = password_hash($staff['password'], PASSWORD_DEFAULT);
    }

    $this->staffTable->save($staff);
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

    public function login()
	{

		return [
			'template' => 'login.html.php',
			'variables' => [],
			'title' => 'Login'
		];
	}

    public function loginSubmit()
{
    $staff = $this->staffTable->find('staff_id', $_POST['staff']['staff_id']);
    if (count($staff) > 0) {
        $staff = $staff[0];
        if (password_verify($_POST['staff']['password'], $staff->password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['staff_id'] = $staff->staff_id;
            $_SESSION['isAdmin'] = $staff->isAdmin;
            // $_SESSION['accountName'] = $staff->firstname;

            if ($_SESSION['isAdmin']) {
                header('location: /');
                exit();
            } else {
                header('location: /');
                exit();
            }
        }
    }

    return [
        'template' => 'login.html.php',
        'variables' => ['error' => 'Invalid staff ID or password'],
        'title' => 'Wrong credentials'
    ];
}



	public function logout()
	{
		session_destroy();
		$_SESSION = [];
		header('location: /staff/login');
	}

    public function needAdmin()
	{

		return [
			'template' => 'needAdmin.html.php',
			'variables' => [],
			'title' => 'Need to be admin'
		];
	}
	
}
