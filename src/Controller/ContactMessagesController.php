<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ContactMessages Controller
 *
 * @property \App\Model\Table\ContactMessagesTable $ContactMessages
 */
class ContactMessagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $search = $this->request->getQuery('search');

        // Base query (latest first)
        $query = $this->ContactMessages
            ->find()
            ->order(['created_time' => 'DESC']);

        // Search filter
        if (!empty($search)) {
            $query->where([
                'OR' => [
                    'ContactMessages.name LIKE' => '%' . $search . '%',
                    'ContactMessages.email LIKE' => '%' . $search . '%',
                    'ContactMessages.title LIKE' => '%' . $search . '%',
                ]
            ]);
        }

        // Pagination settings
        $this->paginate = [
            'limit' => 8
        ];

        try {
            $contactMessages = $this->paginate($query);
        } catch (\Cake\Http\Exception\NotFoundException $e) {
            // FIX: fallback to page 1 if page doesn't exist
            return $this->redirect(['action' => 'index', '?' => ['page' => 1]]);
        }

        $this->set(compact('contactMessages', 'search'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact Message id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactMessage = $this->ContactMessages->get($id, contain: []);
        $this->set(compact('contactMessage'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactMessage = $this->ContactMessages->newEmptyEntity();

        if ($this->request->is('post')) {

            // -----------------------------
            // 1. CAPTCHA VALIDATION
            // -----------------------------
            $input = $this->request->getData('captcha_input');
            $correct = $this->request->getSession()->read('captcha_code');

            if (!$correct || $input != $correct) {
                $this->Flash->error('Incorrect CAPTCHA. Please try again.');
                return ;
            }

            // -----------------------------
            // 2. GET RAW DATA
            // -----------------------------
            $data = $this->request->getData();

            // -----------------------------
            // 3. HANDLE PHOTO UPLOADS
            // -----------------------------
            $photoFiles = $data['photos'] ?? [];
            $savedPhotos = [];

            if (!empty($photoFiles)) {
                foreach ($photoFiles as $file) {
                    if ($file && $file->getError() === UPLOAD_ERR_OK) {

                        $filename = time() . '_' . $file->getClientFilename();
                        $targetPath = WWW_ROOT . 'uploads/photos/' . $filename;

                        $file->moveTo($targetPath);

                        $savedPhotos[] = 'uploads/photos/' . $filename;
                    }
                }
            }

            // convert to JSON for DB storage
            $data['photos'] = json_encode($savedPhotos);

            // -----------------------------
            // 4. HANDLE VIDEO UPLOAD
            // -----------------------------
            $videoFile = $data['video'] ?? null;
            $videoPath = null;

            if ($videoFile && $videoFile->getError() === UPLOAD_ERR_OK) {

                $videoName = time() . '_' . $videoFile->getClientFilename();
                $videoTarget = WWW_ROOT . 'uploads/videos/' . $videoName;

                $videoFile->moveTo($videoTarget);

                $videoPath = 'uploads/videos/' . $videoName;
            }

            $data['video'] = $videoPath;

            // -----------------------------
            // 5. HANDLE HAZARDS (MULTI SELECT)
            // -----------------------------
            if (!empty($data['hazards'])) {
                $data['hazards'] = json_encode($data['hazards']);
            }

            // -----------------------------
            // 6. PATCH ENTITY (ONLY AFTER CLEANING DATA)
            // -----------------------------
            $contactMessage = $this->ContactMessages->patchEntity($contactMessage, $data);

            // -----------------------------
            // 7. SAVE
            // -----------------------------
            if ($this->ContactMessages->save($contactMessage)) {

                $this->Flash->success(
                    'Thank you for contacting us. We will respond to you as soon as possible.'
                );

                return $this->redirect('/');
            }

            // DEBUG IF FAILS
            $this->Flash->error('The contact message could not be saved. Please try again.');
            debug($contactMessage->getErrors());
        }

        $this->set(compact('contactMessage'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Message id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactMessage = $this->ContactMessages->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactMessage = $this->ContactMessages->patchEntity($contactMessage, $this->request->getData());
            if ($this->ContactMessages->save($contactMessage)) {
                $this->Flash->success(__('The contact message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact message could not be saved. Please, try again.'));
        }
        $this->set(compact('contactMessage'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact Message id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactMessage = $this->ContactMessages->get($id);
        if ($this->ContactMessages->delete($contactMessage)) {
            $this->Flash->success(__('The contact message has been deleted.'));
        } else {
            $this->Flash->error(__('The contact message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //add a admin checker here maybe



    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        //  Allow public access to add ONLY
        $this->Authentication->allowUnauthenticated(['add']);

        $identity = $this->Authentication->getIdentity();
        $action = $this->request->getParam('action');

        // 1. Public user
        if (!$identity) {
            if ($action === 'add') {
                return; // allow public to submit form
            }
            return; // let middleware redirect to login
        }

        //  2. Admin → full access
        if ($identity->get('role') === 'admin') {
            return;
        }

        //  3. Employee → NO access at all
        throw new \Cake\Http\Exception\ForbiddenException(
            'Employees are not allowed to access contact messages.'
        );
    }



}
