<?php
namespace woodlands\Controllers;

class Messages {
    private $messagesTable;
    // private $studentsTable;


    public function __construct($messagesTable) {
        $this->messagesTable = $messagesTable;
        // $this->studentsTable = $studentsTable;
    }
    public function messages()
{
    if (isset($_GET['id'])) {
        $messages = $this->messagesTable->find('message_id', $_GET['id']);
    } else {
        $messages = $this->messagesTable->findAll();
    }
    return [
        'template' => 'messageList.html.php',
        'variables' => [
            'messages' => $messages
        ],
        'title' => 'Messages'
    ];
}
    public function manageMessage() {
        if (isset($_GET['id'])) {
            $result = $this->messagesTable->find('message_id', $_GET['id']);
            $message = $result[0];
        } else {
            $message = false;
        }
    
    return [
        'template' => 'manageMessage.html.php',
        'variables' => [
        'message'=>$message ],
        'title' => 'Manage Message'
    ];
    }

    public function manageMessageSubmit() {
        $this->messagesTable->save($_POST['message']);
        header('location:/messages/messages');

        
    }

    public function deleteSubmit()
	{
		$this->messagesTable->delete($_POST['id']);

		header('location: /messages/messages');
	}
}