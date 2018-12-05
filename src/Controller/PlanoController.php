<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Plano Controller
 *
 * @property \App\Model\Table\PlanoTable $Plano
 *
 * @method \App\Model\Entity\Plano[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlanoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index(){
        
    }
    
    public function pesquisar()
    {
        $data = array();
        if( $this->request->is('post') ){
            $post = $this->request->getData();
            $where = array();
            
            $planos = $this->Plano->find()->where($where)->toArray();
            
            $search = $this->Plano->find('all',['order' => ['plano.plano']])->where($where)->page($post['pagina'])->limit(10)->toArray();
            
            $data = ['total' => count($planos), 'data'=>$search];
        }
        $this->set(compact('data'));
    }

    /**
     * View method
     *
     * @param string|null $id Plano id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $plano = $this->Plano->get($id, [
            'contain' => []
        ]);

        $this->set('plano', $plano);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $plano = $this->Plano->newEntity();
        $data = array();
        if( $this->request->is('post') ){
            $plano = $this->Plano->patchEntity($plano, $this->request->getData());
            $plano->coletivo = true;
            if( $this->Plano->save($plano) ){
                $data = ['mensagem' => 'Plano salvo com sucesso!', 'status' => true];
            }else{
                $data = ['mensagem' => 'Erro ao salvar o plano!', 'status' => false];
            }
        }
        $this->set(compact('data'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Plano id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $plano = $this->Plano->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $plano = $this->Plano->patchEntity($plano, $this->request->getData());
            if ($this->Plano->save($plano)) {
                $this->Flash->success(__('The plano has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plano could not be saved. Please, try again.'));
        }
        $this->set(compact('plano'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Plano id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plano = $this->Plano->get($id);
        if ($this->Plano->delete($plano)) {
            $this->Flash->success(__('The plano has been deleted.'));
        } else {
            $this->Flash->error(__('The plano could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
