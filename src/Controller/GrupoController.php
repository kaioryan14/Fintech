<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Grupo Controller
 *
 * @property \App\Model\Table\GrupoTable $Grupo
 *
 * @method \App\Model\Entity\Grupo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GrupoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $grupo = $this->paginate($this->Grupo);
        $user = $this->Auth->user();

        $this->set(compact('grupo','user'));
    }
    
    public function buscarGrupo(){
        $data = array();
        $this->loadModel('Usuario');
        $this->loadModel('Investimento');
        
        $post = $this->request->getData();
        
        $data = $this->Grupo->find('all')
            ->contain('Usuario.Investimento', function(\Cake\ORM\Query $q){
                $mes = date('m');
                return $q->where(["data_deposito between '2018-{$mes}-01' and '2018-{$mes}-30'"]);
            })
            ->toArray();
        
        
        $this->set(compact('data'));
    }
    
    public function pesquisar(){
        $this->loadModel('Plano');
        $data = array();
        
        if( $this->request->is('post') ){
            $post = $this->request->getData();
            $_GET['id_usuario'] = $post['id_usuario'];
            $where = array();
                        
            $planos = $this->Plano->find()->where($where)->toArray();
            
            $search = $this->Plano->find('all',['order' => ['plano.plano']])->where($where)->page(1)->limit(10)->toArray();
            
            /*$search = $this->Plano->find()->contain(['Grupo'])->matching('Grupo', function(\Cake\ORM\Query $q){
               return $q->where(['Grupo.id_usuario' => 1]); 
            })->toArray();*/
            
            $search = $this->Plano->find('all')
                ->contain('Grupo', function(\Cake\ORM\Query $q){
                    return $q->where(["grupo.id_usuario = {$_GET['id_usuario']}"]);
                })
                ->contain('Investimento', function(\Cake\ORM\Query $q){
                    return $q->where(["investimento.id_usuario = {$_GET['id_usuario']}"]);
                })
                ->where(['coletivo' => false])
                ->toArray();
            
            $data = ['total' => count($planos), 'data'=>$search];
        }
        
        $this->set(compact('data'));
    }

    /**
     * View method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $grupo = $this->Grupo->get($id, [
            'contain' => []
        ]);

        $this->set('grupo', $grupo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $grupo = $this->Grupo->newEntity();
        $data = array();
        if ($this->request->is('post')) {
            $grupo = $this->Grupo->patchEntity($grupo, $this->request->getData());
            $grupo->data_adesao = date('Y-m-d H:i:s');
            if ($this->Grupo->save($grupo)) {
                $data = ['mensagem' => 'Cadastro no plano de investimento realizado com sucesso!', 'status' => true];
            }else{
                $data = ['mensagem' => 'Erro ao participar do plano de investimento!', 'status' => false];
            }
        }
        $this->set(compact('data'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $grupo = $this->Grupo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grupo = $this->Grupo->patchEntity($grupo, $this->request->getData());
            if ($this->Grupo->save($grupo)) {
                $this->Flash->success(__('The grupo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grupo could not be saved. Please, try again.'));
        }
        $this->set(compact('grupo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $grupo = $this->Grupo->get($id);
        if ($this->Grupo->delete($grupo)) {
            $this->Flash->success(__('The grupo has been deleted.'));
        } else {
            $this->Flash->error(__('The grupo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
