<?php
namespace woodlands\Entities;

class Announcements {
    private $modulesTable;

    public $announcement_id;
    public $title;
    public $description;
    public $date;
    public $modules_id;

    public function __construct(\central\DatabaseTable $modulesTable) {
        $this->modulesTable = $modulesTable;
    }
    public function moduleTitle(){
        return $this->modulesTable->find('module_id',$this->modules_id)[0]->name;
    }


}
