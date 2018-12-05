<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Investimento Model
 *
 * @method \App\Model\Entity\Investimento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Investimento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Investimento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Investimento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Investimento|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Investimento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Investimento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Investimento findOrCreate($search, callable $callback = null, $options = [])
 */
class InvestimentoTable extends Table
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

        $this->setTable('investimento');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->numeric('deposito')
            ->requirePresence('deposito', 'create')
            ->notEmpty('deposito');

        $validator
            ->dateTime('data_deposito')
            ->requirePresence('data_deposito', 'create')
            ->notEmpty('data_deposito');

        $validator
            ->dateTime('data_aceitacao')
            ->allowEmpty('data_aceitacao');

        $validator
            ->integer('id_usuario')
            ->allowEmpty('id_usuario');

        $validator
            ->integer('id_plano')
            ->allowEmpty('id_plano');

        $validator
            ->boolean('aceito')
            ->allowEmpty('aceito');

        return $validator;
    }
}
