<?php
require_once 'AppController.php';

class StatsController extends AppController {
    
    public function stats()
    {
        $this->render('stats');
    }
}
?>