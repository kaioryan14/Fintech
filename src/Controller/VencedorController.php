<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vencedor Controller
 *
 * @property \App\Model\Table\VencedorTable $Vencedor
 *
 * @method \App\Model\Entity\Vencedor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VencedorController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $data = array();
        
        $post = $this->request->getData();
        $data = $this->Vencedor->find()
            ->contain('usuario')
            ->where(['id_plano' => $post['id_plano'], 'mes' => $post['mes']])->toArray();
        
        $this->set(compact('data'));
    }

    /**
     * View method
     *
     * @param string|null $id Vencedor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vencedor = $this->Vencedor->get($id, [
            'contain' => []
        ]);

        $this->set('vencedor', $vencedor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $data = array();
        $this->loadModel('Grupo');
        $vencedor = $this->Vencedor->newEntity();
        if ($this->request->is('post')) {
            
            $data = $this->Grupo->find('all')
            ->contain('Usuario.Investimento', function(\Cake\ORM\Query $q){
                $mes = date('m');
                return $q->where(["data_deposito between '2018-{$mes}-01' and '2018-{$mes}-30'"]);
            })
            ->toArray();
            
            $vencedor = $this->Vencedor->patchEntity($vencedor, $this->request->getData());
            $count = intval(rand(1, count($data)));
            $index = 1;
            foreach( $data as $plano ){
                if( $count == $index ){
                    $vencedor['id_usuario'] = $plano['usuario']['id'];   
                }
                $index++;
            }
            
            
            if ($this->Vencedor->save($vencedor)) {
                $data = ['status' => true, 'mensagem' => 'Vencedor gerado com sucesso!'];
            }else{
                $data = ['status' => false, 'mensagem' => 'Erro ao gerar vencedor!'];
            }
        }
        $this->set(compact('data'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vencedor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vencedor = $this->Vencedor->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vencedor = $this->Vencedor->patchEntity($vencedor, $this->request->getData());
            if ($this->Vencedor->save($vencedor)) {
                $this->Flash->success(__('The vencedor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vencedor could not be saved. Please, try again.'));
        }
        $this->set(compact('vencedor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vencedor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vencedor = $this->Vencedor->get($id);
        if ($this->Vencedor->delete($vencedor)) {
            $this->Flash->success(__('The vencedor has been deleted.'));
        } else {
            $this->Flash->error(__('The vencedor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
