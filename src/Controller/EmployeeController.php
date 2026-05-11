<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

class EmployeeController extends AppController
{
    protected $Employees;
    protected $ShiftAllocations;
    protected $Shifts;
    protected $Services;

    public function initialize(): void
    {
        parent::initialize();

        // Because controller name is non‑standard, we must load models manually
        $locator = TableRegistry::getTableLocator();

        $this->Employees        = $locator->get('Employees');
        $this->ShiftAllocations = $locator->get('ShiftAllocations');
        $this->Shifts           = $locator->get('Shifts');
        $this->Services         = $locator->get('Services');
    }

    /**
     * Index method
     */
    public function index()
    {
        $employees = $this->paginate(
            $this->Employees->find()
        );

        $this->set(compact('employees'));
    }

    /**
     * View method
     */
    public function view($id = null)
    {
        if (!$id) {
            $this->Flash->error('Invalid employee ID.');
            return $this->redirect(['action' => 'index']);
        }

        try {
            $employee = $this->Employees->get($id, [
                'contain' => [
                    'ShiftAllocations' => [
                        'Shifts' => ['Services']
                    ]
                ]
            ]);
        } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
            $this->Flash->error('Employee not found.');
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('employee'));
    }

    /**
     * Add method
     */
    public function add()
    {
        $employee = $this->Employees->newEmptyEntity();

        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());

            if ($this->Employees->save($employee)) {
                $this->Flash->success('Employee created successfully.');
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('Unable to save employee.');
        }

        $this->set(compact('employee'));
    }

    /**
     * Edit method
     */
    public function edit($id = null)
    {
        try {
            $employee = $this->Employees->get($id, [
                'contain' => ['ShiftAllocations']
            ]);
        } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
            $this->Flash->error('Employee not found.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());

            if ($this->Employees->save($employee)) {
                $this->Flash->success('Employee updated successfully.');
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('Unable to update employee.');
        }

        $this->set(compact('employee'));
    }

    /**
     * Delete method
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        try {
            $employee = $this->Employees->get($id);
        } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
            $this->Flash->error('Employee not found.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Employees->delete($employee)) {
            $this->Flash->success('Employee deleted.');
        } else {
            $this->Flash->error('Unable to delete employee.');
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Dashboard for logged-in employee
     */
    public function dashboard()
    {
        $identity = $this->request->getAttribute('identity');

        if (!$identity) {
            return $this->redirect('/users/login');
        }

        $employeeId = $identity->get('employee_id');

        try {
            $employee = $this->Employees->get($employeeId, [
                'contain' => [
                    'ShiftAllocations' => [
                        'Shifts' => ['Services']
                    ]
                ]
            ]);
        } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
            $this->Flash->error('Employee profile not found.');
            return $this->redirect('/');
        }

        $this->set(compact('employee'));
    }

    /**
     * Shift detail view
     */
    public function shiftDetail($id = null)
    {
        try {
            $shift = $this->Shifts->get($id, [
                'contain' => ['Services']
            ]);
        } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
            $this->Flash->error('Shift not found.');
            return $this->redirect(['action' => 'dashboard']);
        }

        $this->set(compact('shift'));
    }
}
