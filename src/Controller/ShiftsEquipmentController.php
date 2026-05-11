<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ShiftsEquipment Controller
 *
 * @property \App\Model\Table\ShiftsEquipmentTable $ShiftsEquipment
 */
class ShiftsEquipmentController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ShiftsEquipment->find()
            ->contain(['Shifts', 'Equipment']);
        $shiftsEquipment = $this->paginate($query);

        $this->set(compact('shiftsEquipment'));
    }

    /**
     * View method
     *
     * @param string|null $id Shifts Equipment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shiftsEquipmentEntity = $this->ShiftsEquipment->get($id, contain: ['Shifts', 'Equipment']);
        $this->set(compact('shiftsEquipmentEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shiftsEquipmentEntity = $this->ShiftsEquipment->newEmptyEntity();
        if ($this->request->is('post')) {
            $shiftsEquipmentEntity = $this->ShiftsEquipment->patchEntity($shiftsEquipmentEntity, $this->request->getData());
            if ($this->ShiftsEquipment->save($shiftsEquipmentEntity)) {
                $this->Flash->success(__('The shifts equipment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shifts equipment could not be saved. Please, try again.'));
        }
        $shifts = $this->ShiftsEquipment->Shifts->find('list', limit: 200)->all();
        $equipment = $this->ShiftsEquipment->Equipment->find('list', limit: 200)->all();
        $this->set(compact('shiftsEquipmentEntity', 'shifts', 'equipment'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shifts Equipment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shiftsEquipmentEntity = $this->ShiftsEquipment->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shiftsEquipmentEntity = $this->ShiftsEquipment->patchEntity($shiftsEquipmentEntity, $this->request->getData());
            if ($this->ShiftsEquipment->save($shiftsEquipmentEntity)) {
                $this->Flash->success(__('The shifts equipment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shifts equipment could not be saved. Please, try again.'));
        }
        $shifts = $this->ShiftsEquipment->Shifts->find('list', limit: 200)->all();
        $equipment = $this->ShiftsEquipment->Equipment->find('list', limit: 200)->all();
        $this->set(compact('shiftsEquipmentEntity', 'shifts', 'equipment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shifts Equipment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shiftsEquipmentEntity = $this->ShiftsEquipment->get($id);
        if ($this->ShiftsEquipment->delete($shiftsEquipmentEntity)) {
            $this->Flash->success(__('The shifts equipment has been deleted.'));
        } else {
            $this->Flash->error(__('The shifts equipment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
