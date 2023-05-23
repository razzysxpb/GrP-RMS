<?php
namespace woodlands\Entities;

class Announcements {
    private $announcementsTable;

    public $announcement_id;
    public $title;
    public $description;
    public $date;

    public function __construct(\central\DatabaseTable $announcementsTable) {
        $this->announcementsTable = $announcementsTable;
    }

}
