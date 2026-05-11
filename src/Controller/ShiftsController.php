<?php
declare(strict_types=1);

namespace App\Controller;

class ShiftsController extends AppController
{
    public function index()
    {
        $query = $this->Shifts->find()
            ->contain(['Services']);
        $shifts = $this->paginate($query);

        $this->set(compact('shifts'));
    }

    public function view($id = null)
    {
        // Load shift with employees + equipment + services
        $shift = $this->Shifts->get($id, contain: [
            'Services',
            'ShiftAllocations' => ['Employees'],
            'Equipment'
        ]);

        // Load available equipment list
        $equipment = $this->Shifts->Equipment->find(
            'list',
            keyField: 'id',
            valueField: 'type'
        )
        ->where(['status' => 'available']);

        $this->set(compact('shift', 'equipment'));
    }

    public function add()
    {
        $shift = $this->Shifts->newEmptyEntity();

        if ($this->request->is('post')) {
            $shift = $this->Shifts->patchEntity($shift, $this->request->getData(), [
                'associated' => ['Employees', 'Equipment']
            ]);

            if ($this->Shifts->save($shift)) {
                $this->Flash->success('Shift created with employees and equipment.');
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('Failed to create shift.');
        }

        $services  = $this->Shifts->Services->find('list')->all();
        $employees = $this->Shifts->Employees->find('list')->all();
        $equipment = $this->Shifts->Equipment->find(
            'list',
            keyField: 'id',
            valueField: 'type'
        )->where(['status' => 'available'])->all();

        $enquiries = $this->Shifts->Enquiries->find(
            'list',
            keyField: 'id',
            valueField: 'name'
        )->all();

        $customers = $this->Shifts->Customers->find(
            'list',
            keyField: 'id',
            valueField: 'name'
        )->all();

        $this->set(compact('shift', 'services', 'employees', 'equipment', 'enquiries', 'customers'));
    }

    public function edit($id = null)
{
    $shift = $this->Shifts->get($id, contain: ['Employees', 'Equipment']);

    if ($this->request->is(['patch', 'post', 'put'])) {
        $shift = $this->Shifts->patchEntity($shift, $this->request->getData(), [
            'associated' => ['Employees', 'Equipment']
        ]);

        if ($this->Shifts->save($shift)) {
            $this->Flash->success('Shift updated with employees and equipment.');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('The shift could not be saved. Please try again.');
    }

    $services  = $this->Shifts->Services->find('list')->all();
    $employees = $this->Shifts->Employees->find('list')->all();
    $equipment = $this->Shifts->Equipment->find('list',
        keyField: 'id',
        valueField: 'type'
    )->where(['status' => 'available'])->all();
    $enquiries = $this->Shifts->Enquiries->find('list',
        keyField: 'id',
        valueField: 'name'
    )->all();
    $customers = $this->Shifts->Customers->find('list',
        keyField: 'id',
        valueField: 'name'
    )->all();

    $this->set(compact('shift', 'services', 'employees', 'equipment', 'enquiries', 'customers'));
}

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shift = $this->Shifts->get($id);

        if ($this->Shifts->delete($shift)) {
            $this->Flash->success('The shift has been deleted.');
        } else {
            $this->Flash->error('The shift could not be deleted. Please try again.');
        }

        return $this->redirect(['action' => 'index']);
    }

    public function availableEmployees()
    {
        $this->request->allowMethod(['get']);
        $this->viewBuilder()->disableAutoLayout();

        $date      = $this->request->getQuery('date');
        $startTime = $this->request->getQuery('start_time');
        $endTime   = $this->request->getQuery('end_time');
        $excludeId = $this->request->getQuery('exclude_shift_id');

        if (!$date || !$startTime || !$endTime) {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([]));
        }

        $bookedQuery = $this->Shifts->ShiftAllocations->find()
            ->select(['ShiftAllocations.employee_id'])
            ->join([
                'S' => [
                    'table'      => 'shifts',
                    'type'       => 'INNER',
                    'conditions' => 'S.id = ShiftAllocations.shift_id'
                ]
            ])
            ->where([
                'S.shift_date'               => $date,
                'ShiftAllocations.status !=' => 'cancelled',
                'S.start_time <'             => $endTime,
                'S.end_time >'               => $startTime,
            ]);

        if ($excludeId) {
            $bookedQuery->where(['ShiftAllocations.shift_id !=' => $excludeId]);
        }

        $bookedIds = $bookedQuery->all()->map(fn($r) => $r->employee_id)->toList();

        $allEmployees = $this->Shifts->Employees->find()
            ->select(['id', 'name'])
            ->where(['status' => 'active'])
            ->all();

        $result = [];
        foreach ($allEmployees as $emp) {
            $result[] = [
                'id'        => $emp->id,
                'name'      => $emp->name,
                'available' => !in_array($emp->id, $bookedIds)
            ];
        }

        return $this->response->withType('application/json')
            ->withStringBody(json_encode($result));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['availableEmployees']);
    }


}
