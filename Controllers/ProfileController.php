<?php
require_once 'AppController.php';
require_once __DIR__.'\..\\Models\\Details.php';
require_once __DIR__.'\..\\Repository\\DetailsRepository.php';

class ProfileController extends AppController {
    
    public function profile()
    {
        $detailsRepository = new DetailsRepository();
        $details = $detailsRepository->getDetails();

        $this->render('profile', ['details' => $details]);
    }
}
?>