<?php
namespace woodlands\Controllers;
class Announcements {
    private $announcementsTable;
    public function __construct($announcementsTable) {
        $this->announcementsTable = $announcementsTable;
    }
    public function announcements() {
        if (isset($_GET['id'])) {
            $announcements = $this->announcementsTable->find('announcement_id', $_GET['id']);
        } else {
            $announcements = $this->announcementsTable->findAll();
        }
        return [
            'template' => 'announcementList.html.php',
            'variables' => [
                'announcements' => $announcements
            ],
            'title' => 'Announcements'
        ];
    }

    public function manageAnnouncement() {

        if (isset($_GET['id'])) {
            $result = $this->announcementsTable->find('announcement_id', $_GET['id']);
            $announcement = $result[0];
        } else {
            $announcement = false;

        }

        return [
            'template' => 'manageAnnouncement.html.php',
            'variables' => [
                'announcement' => $announcement
            ],
            'title' => 'Manage Announcement'
        ];
    }

    public function manageAnnouncementSubmit() {

        $this->announcementsTable->save($_POST['announcement']);
        header('location: /announcements/announcements');
        exit;
    }
    
    public function deleteSubmit()
	{
		$this->announcementsTable->delete($_POST['id']);
		header('location: /announcements/announcements');
	}
}