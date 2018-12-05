<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Investimento Controller
 *
 * @property \App\Model\Table\InvestimentoTable $Investimento
 *
 * @method \App\Model\Entity\Investimento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvestimentoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $investimento = $this->paginate($this->Investimento);

        $this->set(compact('investimento'));
    }

    /**
     * View method
     *
     * @param string|null $id Investimento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $investimento = $this->Investimento->get($id, [
            'contain' => []
        ]);

        $this->set('investimento', $investimento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $investimento = $this->Investimento->newEntity();
        $data = array();
        if ($this->request->is('post')) {
            $investimento = $this->Investimento->patchEntity($investimento, $this->request->getData());
            $investimento->data_deposito = date('Y-m-d H:i:s');
            if ($this->Investimento->save($investimento)) {
                $data = ['status' => true, 'mensagem' => 'Depósito realizado com sucesso!'];
            }else{
                $data = ['status' => false, 'mensagem' => 'Erro ao realizar depósito!'];
            }
        }
        $this->set(compact('data'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Investimento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $investimento = $this->Investimento->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $investimento = $this->Investimento->patchEntity($investimento, $this->request->getData());
            if ($this->Investimento->save($investimento)) {
                $this->Flash->success(__('The investimento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The investimento could not be saved. Please, try again.'));
        }
        $this->set(compact('investimento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Investimento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $investimento = $this->Investimento->get($id);
        if ($this->Investimento->delete($investimento)) {
            $this->Flash->success(__('The investimento has been deleted.'));
        } else {
            $this->Flash->error(__('The investimento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
