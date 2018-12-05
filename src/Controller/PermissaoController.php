<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Permissao Controller
 *
 * @property \App\Model\Table\PermissaoTable $Permissao
 *
 * @method \App\Model\Entity\Permissao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermissaoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $permissao = $this->paginate($this->Permissao);

        $this->set(compact('permissao'));
    }

    /**
     * View method
     *
     * @param string|null $id Permissao id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permissao = $this->Permissao->get($id, [
            'contain' => []
        ]);

        $this->set('permissao', $permissao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permissao = $this->Permissao->newEntity();
        if ($this->request->is('post')) {
            $permissao = $this->Permissao->patchEntity($permissao, $this->request->getData());
            if ($this->Permissao->save($permissao)) {
                $this->Flash->success(__('The permissao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permissao could not be saved. Please, try again.'));
        }
        $this->set(compact('permissao'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permissao id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permissao = $this->Permissao->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permissao = $this->Permissao->patchEntity($permissao, $this->request->getData());
            if ($this->Permissao->save($permissao)) {
                $this->Flash->success(__('The permissao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permissao could not be saved. Please, try again.'));
        }
        $this->set(compact('permissao'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permissao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permissao = $this->Permissao->get($id);
        if ($this->Permissao->delete($permissao)) {
            $this->Flash->success(__('The permissao has been deleted.'));
        } else {
            $this->Flash->error(__('The permissao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
