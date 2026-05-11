<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * QuoteVisits Controller
 *
 * @property \App\Model\Table\QuoteVisitsTable $QuoteVisits
 */
class QuoteVisitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $identity = $this->request->getAttribute('identity');
        $role = $identity->get('role');
        $employeeId = $identity->get('employee_id');

        // ADMIN → see all quote visits
        if ($role === 'admin') {
            $query = $this->QuoteVisits->find()
                ->contain(['Enquiries', 'Staffs']);
        }

        // STAFF → see only their assigned visits
        else {
            $query = $this->QuoteVisits->find()
                ->where(['staff_id' => $employeeId])
                ->contain(['Enquiries', 'Staffs']);
        }

        $quoteVisits = $this->paginate($query);
        $this->set(compact('quoteVisits'));
    }


    /**
     * View method
     *
     * @param string|null $id Quote Visit id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quoteVisit = $this->QuoteVisits->get($id, contain: ['Enquiries', 'Staffs']);
        $this->set(compact('quoteVisit'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quoteVisit = $this->QuoteVisits->newEmptyEntity();
        if ($this->request->is('post')) {
            $quoteVisit = $this->QuoteVisits->patchEntity($quoteVisit, $this->request->getData());
            if ($this->QuoteVisits->save($quoteVisit)) {
                $this->Flash->success(__('The quote visit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote visit could not be saved. Please, try again.'));
        }
        $enquiries = $this->QuoteVisits->Enquiries->find('list', limit: 200)->all();
        $staffs = $this->QuoteVisits->Staffs->find('list', limit: 200)->all();
        $this->set(compact('quoteVisit', 'enquiries', 'staffs'));
        $contactMessages = $this->QuoteVisits->Enquiries->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ])->toArray();

        $staff = $this->QuoteVisits->Staffs->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ])->toArray();

        $this->set(compact('quoteVisit', 'contactMessages', 'staff'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quote Visit id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quoteVisit = $this->QuoteVisits->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quoteVisit = $this->QuoteVisits->patchEntity($quoteVisit, $this->request->getData());
            if ($this->QuoteVisits->save($quoteVisit)) {
                $this->Flash->success(__('The quote visit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote visit could not be saved. Please, try again.'));
        }
        $enquiries = $this->QuoteVisits->Enquiries->find('list', limit: 200)->all();
        $staffs = $this->QuoteVisits->Staffs->find('list', limit: 200)->all();
        $this->set(compact('quoteVisit', 'enquiries', 'staffs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quote Visit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quoteVisit = $this->QuoteVisits->get($id);
        if ($this->QuoteVisits->delete($quoteVisit)) {
            $this->Flash->success(__('The quote visit has been deleted.'));
        } else {
            $this->Flash->error(__('The quote visit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
