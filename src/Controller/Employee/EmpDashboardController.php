<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class EmpDashboardController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        // Require authentication (no public access)
        $this->Authentication->addUnauthenticatedActions([]);

        $user = $this->request->getAttribute('identity');

        // Not logged in
        if (!$user) {
            $this->Flash->error('Please log in to access the dashboard.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        // Not an employee
        if ($user->role !== 'employee') {
            $this->Flash->error('You are not authorized to access the employee dashboard.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function index()
    {
        // Example: show employee info
        $user = $this->request->getAttribute('identity');

        $this->set(compact('user'));
    }
}
