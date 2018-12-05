<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Usuario Controller
 *
 * @property \App\Model\Table\UsuarioTable $Usuario
 *
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuarioController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $pg = 1;
        if( isset($_GET['pg']) && !empty($_GET['pg']) ){
            $pg = $_GET['pg'];
        }
        $this->set(compact('pg'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuario->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuario->patchEntity($usuario, $this->request->getData());
            if ($this->Usuario->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $this->set(compact('usuario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuario->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuario->patchEntity($usuario, $this->request->getData());
            if ($this->Usuario->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $this->set(compact('usuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuario->get($id);
        if ($this->Usuario->delete($usuario)) {
            $this->Flash->success(__('The usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function login(){
        if( $this->request->is('post') ){
            $user = $this->Auth->identify();
            if( $user ){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Login inválido!');
        }
    }
    
    public function logout(){
        $this->redirect($this->Auth->logout());
    }
    
    public function adicionar(){
        
        $data = array();
        
        if( $this->request->is('post') ){
            $usuario = $this->Usuario->newEntity();
            $usuario = $this->Usuario->patchEntity($usuario, $this->request->getData());
            $post = $this->request->getData();
            
            $emails = $this->Usuario->find()->where(['email =' => $post['email']])->toArray();
            $cpfs = $this->Usuario->find()->where(['cpf =' => $post['cpf']])->toArray();
            if( count($emails) > 0 ){
               array_push($data, ['mensagem'=>'Erro! Email já cadastrado!', 'status' => false]); 
            }else if( count($cpfs) > 0 ){
               array_push($data, ['mensagem'=>'Erro! CPF já cadastrado!', 'status' => false]); 
            }else{
                if( $this->Usuario->save($usuario) ){
                    array_push($data, ['mensagem'=>'Usuário cadastrado com sucesso!', 'status' => true]);
                }else{
                    array_push($data, ['mensagem'=>'Erro ao cadastrar usuário!', 'status' => false]);
                }
            }
        }
        
        $this->set(compact('data'));
    }
    
    public function buscar(){
        $data = array();
        if( $this->request->is('post') ){
            $post = $this->request->getData();
            $where = array();
            array_push($where, ['1 =' => 1]);
            
            if( !empty($post['nome']) ){
                array_push($where, ['nome like' => "{$post['nome']}%"]);
            }
            
            if( !empty($post['email']) ){
                array_push($where, ['email like' => "{$post['email']}%"]);
            }
            
            if( !empty($post['cpf']) ){
                $post['cpf'] = str_replace('.','',$post['cpf']);
                $post['cpf'] = str_replace('-','',$post['cpf']);
                array_push($where, ['cpf like' => "{$post['cpf']}%"]);
            }
            
            if( isset($post['ativo']) ){
                array_push($where, ['ativo =' => $post['ativo']]);
            }
            
            if( isset($post['tipo']) ){
                array_push($where, ['id_permissao =' => $post['tipo']]);
            }
            
            
            $usuarios = $this->Usuario->find()
                ->contain(['Permissao'])->where($where)->toArray();
            
            $dados = $this->Usuario->find('all',['order' => ['usuario.nome']])
                ->contain(['Permissao'])->where($where)->limit(10)->page($post['pagina'])->toArray();
            
            $data = ['data'=>$dados, 'total'=>count($usuarios)];
        }
        $this->set(compact('data'));
    }
    
    public function bloquearUsuario(){
        $data = array();
        if( $this->request->is('post') ){
            $post = $this->request->getData();
            $usuarioModel = $this->Usuario->query();
            
            $data = $usuarioModel->update()->set(['ativo' => $post['ativo']])->where(['id' => $post['id']])->execute();
            $data = ['mensagem' => 'Alteração realizada com sucesso!', 'status' => true];
        }
        $this->set(compact('data'));
    }
}
