<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class DashboardController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        // Require login for all admin pages
        $this->loadComponent('Authentication.Authentication');
        $this->viewBuilder()->setHelpers(['Authentication']);    }

    public function index()
    {
        $contactMessagesTable = $this->fetchTable('ContactMessages');
        $servicesTable        = $this->fetchTable('Services');

        $enquiryCount = $contactMessagesTable->find()->count();
        $serviceCount = $servicesTable->find()->count();

        $this->set(compact('enquiryCount', 'serviceCount'));
    }
}
