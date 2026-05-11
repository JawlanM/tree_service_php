<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\I18n\FrozenTime;
use Cake\Routing\Router;
use Cake\Mailer\Mailer;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use App\Mailer\ResetPasswordMailer;



/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // Allow login without authentication
        $this->Authentication->allowUnauthenticated([
            'login',
            'logout',
            'forgotPassword',
            'resetPassword',
            'verifyCode'
        ]);

        $this->Authentication->allowUnauthenticated([
            'login',
            'logout',
            'forgotPassword',
            'resetPassword',
            'verifyCode',
            'generateHash'
        ]);

    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);

        $result = $this->Authentication->getResult();

        if ($result && $result->isValid()) {

            $identity = $this->Authentication->getIdentity();
            $this->request->getSession()->renew();
            $role = $identity->get('role');
            $loginType = $this->request->getData('login_type');

            // Block customer using employee tab
            if ($loginType === 'employee' && $role === 'customer') {
                $this->Authentication->logout();
                $this->Flash->error('Invalid email or password.');
                return $this->redirect(['action' => 'login']);
            }

            // Block employee/admin using customer tab
            if ($loginType === 'customer' && in_array($role, ['admin', 'employee'])) {
                $this->Authentication->logout();
                $this->Flash->error('Invalid email or password.');
                return $this->redirect(['action' => 'login']);
            }

            if ($role === 'admin') {
                return $this->redirect([
                    'prefix'     => 'Admin',
                    'controller' => 'Dashboard',
                    'action'     => 'index'
                ]);
            }

            if ($role === 'employee') {
                return $this->redirect([
                    'controller' => 'Employees',
                    'action'     => 'dashboard'
                ]);
            }

            if ($role === 'customer') {
                return $this->redirect([
                    'controller' => 'Customers',
                    'action'     => 'dashboard'
                ]);
            }

            return $this->redirect('/');
        }

        // FAILED LOGIN HANDLING
        $data  = $this->request->getData();
        $email = $data['email'] ?? null;

        if ($email) {
            $user = $this->Users->find()
                ->where(['email' => $email])
                ->first();

            if ($user) {
                $this->Flash->error('Invalid email or password.');
            }
        }
    }

    public function login_layout()
    {
        $this->viewBuilder()->setLayout('blank');
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect('/');
    }

    public function forgotPassword()
    {
        if ($this->request->is('post')) {

            $email = $this->request->getData('email');
            $user = $this->Users->find()->where(['email' => $email])->first();

            // Always show same message (security)
            $this->Flash->success('If that email exists, a reset code has been sent.');

            if (!$user) {
                return $this->redirect(['action' => 'login']);
            }

            // Generate 6‑digit code
            $code = (string)random_int(100000, 999999);

            // Hash it before saving
            $hashed = (new DefaultPasswordHasher())->hash($code);

            $user->reset_token = $hashed;
            $user->reset_token_expires = new FrozenTime('+1 hour');
            $this->Users->save($user);

            $verifyLink = Router::url([
                'controller' => 'Users',
                'action' => 'verifyCode',
                $user->id,
                '?' => ['code' => $code]
            ], true);


            // Send email (DebugKit will capture it)
            $mailer = new ResetPasswordMailer();
            $mailer->sendCode($user, $code, $verifyLink);
            $mailer->deliver();

            // Redirect to login page
            return $this->redirect(['action' => 'login']); }
    }

    /**
     * STEP 2 — User enters the 6‑digit code
     */
    public function verifyCode($id)
    {
        $prefilledCode = $this->request->getQuery('code');
        $this->set('prefilledCode', $prefilledCode);

        $user = $this->Users->get($id);

        if ($this->request->is('post')) {

            $input = $this->request->getData('code');
            $hasher = new DefaultPasswordHasher();

            // Check expiry
            if ($user->reset_token_expires < FrozenTime::now()) {
                $this->Flash->error('Code expired');
                return $this->redirect(['action' => 'forgotPassword']);
            }

            // Check code
            if ($hasher->check($input, $user->reset_token)) {
                // Code correct → go to reset password
                return $this->redirect(['action' => 'resetPassword', $user->id]);
            }

            $this->Flash->error('Invalid code');
        }

        $this->set(compact('user'));
    }

    /**
     * STEP 3 — User sets a new password
     */
    public function resetPassword($id)
    {
        $user = $this->Users->get($id);

        if ($this->request->is(['post', 'put'])) {

            $user->password = $this->request->getData('password');

            // Clear token
            $user->reset_token = null;
            $user->reset_token_expires = null;

            if ($this->Users->save($user)) {
                $this->Flash->success('Your password has been reset.');
                return $this->redirect(['action' => 'login']);
            }

            $this->Flash->error('Could not reset password. Please try again.');
        }

        $this->set(compact('user'));
    }

    /**
     * DebugKit email preview
     */
    public function testEmail()
    {
        $user = (object)[
            'email' => 'test@example.com',
            'name' => 'JM'
        ];

        $code = random_int(100000, 999999);

        $mailer = new ResetPasswordMailer();
        $mailer->sendCode($user, $code);
        $mailer->deliver();

        $this->Flash->success('Email generated. Check DebugKit → Emails.');
        return $this->redirect($this->referer());
    }
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication');


    }

    public function generateHash()
    {
        $hasher = new \Authentication\PasswordHasher\DefaultPasswordHasher();
        $hash = $hasher->hash('password');
        echo $hash;
        die();
    }



}
