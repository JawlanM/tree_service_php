<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        /**
         * PUBLIC PAGES (no login required)
         */
        $this->Authentication->allowUnauthenticated([
            'login',
            'logout',
            'forgotPassword',
            'resetPassword',
            'verifyCode',
            'display',
            'add'// <-- homepage + any PagesController::display()
        ]);

        /**
         * If user is NOT logged in, AuthenticationMiddleware
         * will automatically redirect them.
         * DO NOT manually redirect here.
         */
        $identity = $this->Authentication->getIdentity();
        if (!$identity) {
            return;
        }

        /**
         * ADMIN ROLE → full access
         */
        if ($identity->get('role') === 'admin') {
            return;
        }

        if ($identity->get('role') === 'customer') {
            $customerAllowed = [
                'Customers' => ['dashboard', 'view', 'edit'],
                'Users'     => ['logout', 'resetPassword', 'verifyCode', 'forgotPassword', 'login'],
                'Pages'     => ['display'],
            ];

            $controller     = $this->request->getParam('controller');
            $action         = $this->request->getParam('action');
            $allowedActions = $customerAllowed[$controller] ?? [];

            if (!in_array($action, $allowedActions, true)) {
                throw new \Cake\Http\Exception\ForbiddenException(
                    'You are not allowed to access this page.'
                );
            }
            return;
        }

        /**
         * EMPLOYEE ROLE → restricted access
         */
        $employeeAllowed = [
            'Pages' => ['display'],
            'EmpDashboard' => ['index'],
            'Employees'    => ['dashboard', 'view', 'shiftDetail'],
            'Employee'     => ['dashboard', 'view', 'shiftDetail'],
            'Equipment'    => ['index', 'view'],
            'QuoteVisits'  => ['index', 'view'],
            'Shifts'       => ['index', 'view'],
            'Users' => [
                'logout',
                'resetPassword',
                'verifyCode',
                'forgotPassword',
                'login',
            ],
        ];

        $controller = $this->request->getParam('controller');
        $action     = $this->request->getParam('action');

        $allowedActions = $employeeAllowed[$controller] ?? [];

        if (!in_array($action, $allowedActions, true)) {
            throw new \Cake\Http\Exception\ForbiddenException(
                'You are not allowed to access this page.'
            );
        }
    }
}
