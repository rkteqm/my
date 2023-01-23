<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize(): void
    {
        // $this->Model = $this->loadModel('Details');
        $this->loadComponent('Flash');
        // $this->loadComponent('Rahul');        
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users, [
            'contain' => ['Details'],
        ]);

        // ****************************
        // echo $this->Rahul->mydata();
        // ****************************


        // $users = $this->Users->getUsersData();
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
        $user = $this->Users->get($id, [
            'contain' => ['Details'],
        ]);

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
            $email = $this->request->getData('email');
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    // public function add()
    // {
    //     $user = $this->Users->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $email = $this->request->getData('email');
    //         $user = $this->Users->patchEntity($user, $this->request->getData());
    //         if ($this->Users->save($user)) {
    //             $users = TableRegistry::get("Users");
    //             $result = $users->find('all')->where(['email' => $email])->first();

    //             $user2 = $this->Details->newEmptyEntity();
    //             $data = $this->request->getData();
    //             $data['user_id'] = $result['id'];
    //             $user2 = $this->Details->patchEntity($user2, $data);
    //             if ($this->Details->save($user2)) {
    //                 $this->Flash->success(__('The user has been saved.'));
    //                 return $this->redirect(['action' => 'index']);
    //             }
    //             $this->Flash->error(__('The user could not be saved. Please, try again.details'));
    //         }
    //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('user'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Details'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                return $this->redirect(['action' => 'index']);

                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
    }

    // public function edit($id = null)
    // {
    //     $user = $this->Users->get($id, [
    //         'contain' => ['Details'],
    //     ]);
    //     $user['city'] = $user->detail['city'];
    //     $user['phone'] = $user->detail['phone'];
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $data = $this->request->getData();
    //         $user = $this->Users->patchEntity($user, $this->request->getData());
    //         if ($this->Users->save($user)) {
    //             $user = $this->Details->patchEntity($user, $data);
    //             $user['city'] = $data['city'];
    //             $user['phone'] = $data['phone'];
    //             if ($this->Details->save($user)) {
    //                 $this->Flash->success(__('The user has been saved.'));
    //                 return $this->redirect(['action' => 'index']);
    //             }
    //             $this->Flash->error(__('The user could not be saved. Please, try again.details'));
    //         }
    //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('user'));
    // }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
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
}
