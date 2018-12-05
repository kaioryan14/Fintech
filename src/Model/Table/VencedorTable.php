<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vencedor Model
 *
 * @method \App\Model\Entity\Vencedor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vencedor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vencedor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vencedor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vencedor|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vencedor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vencedor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vencedor findOrCreate($search, callable $callback = null, $options = [])
 */
class VencedorTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('vencedor');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        $this->belongsTo('usuario', ['foreignKey' => 'id_usuario']);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('id_usuario')
            ->allowEmpty('id_usuario');

        $validator
            ->integer('id_plano')
            ->allowEmpty('id_plano');

        $validator
            ->integer('mes')
            ->allowEmpty('mes');

        return $validator;
    }
}
