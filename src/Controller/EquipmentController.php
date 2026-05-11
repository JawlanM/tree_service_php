<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Equipment Controller
 *
 * @property \App\Model\Table\EquipmentTable $Equipment
 */
class EquipmentController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Base query
        $query = $this->Equipment->find();

        // Pagination settings
        $this->paginate = [
            'limit' => 8,
            'order' => ['Equipment.id' => 'DESC']
        ];

        try {
            $equipment = $this->paginate($query);
        } catch (\Cake\Http\Exception\NotFoundException $e) {
            return $this->redirect(['action' => 'index', '?' => ['page' => 1]]);
        }

        // Count broken equipment
        $brokenCount = $this->Equipment->find()
            ->where(['status' => 'broken'])
            ->count();

        // Summary of available equipment by type
        $summary = $this->Equipment->find()
            ->select([
                'type',
                'count' => $this->Equipment->find()->func()->count('*')
            ])
            ->where(['status' => 'available'])
            ->groupBy('type')
            ->toArray();

        $this->set(compact('equipment', 'summary', 'brokenCount'));
    }

    /**
     * View method
     *
     * @param string|null $id Equipment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipmentEntity = $this->Equipment->get($id, contain: []);
        $this->set(compact('equipmentEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipmentEntity = $this->Equipment->newEmptyEntity();
        if ($this->request->is('post')) {
            $equipmentEntity = $this->Equipment->patchEntity($equipmentEntity, $this->request->getData());
            if ($this->Equipment->save($equipmentEntity)) {
                $this->Flash->success(__('The equipment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equipment could not be saved. Please, try again.'));
        }
        $this->set(compact('equipmentEntity'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equipmentEntity = $this->Equipment->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipmentEntity = $this->Equipment->patchEntity($equipmentEntity, $this->request->getData());
            if ($this->Equipment->save($equipmentEntity)) {
                $this->Flash->success(__('The equipment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equipment could not be saved. Please, try again.'));
        }
        $this->set(compact('equipmentEntity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equipmentEntity = $this->Equipment->get($id);
        if ($this->Equipment->delete($equipmentEntity)) {
            $this->Flash->success(__('The equipment has been deleted.'));
        } else {
            $this->Flash->error(__('The equipment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $user = $this->request->getAttribute('identity');

        if (!$user || $user->role !== 'admin') {
            $this->Flash->error('You are not authorized to access this page.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
}
