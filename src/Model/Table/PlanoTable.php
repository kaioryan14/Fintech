<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Plano Model
 *
 * @method \App\Model\Entity\Plano get($primaryKey, $options = [])
 * @method \App\Model\Entity\Plano newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Plano[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Plano|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Plano|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Plano patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Plano[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Plano findOrCreate($search, callable $callback = null, $options = [])
 */
class PlanoTable extends Table
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

        $this->setTable('plano');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        $this->hasMany('grupo', ['foreignKey'=>'id_plano']);
        $this->hasMany('investimento', ['foreignKey'=>'id_plano']);
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
            ->scalar('plano')
            ->maxLength('plano', 255)
            ->requirePresence('plano', 'create')
            ->notEmpty('plano')
            ->add('plano', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('periodo')
            ->requirePresence('periodo', 'create')
            ->notEmpty('periodo');

        $validator
            ->numeric('taxa_mensal')
            ->requirePresence('taxa_mensal', 'create')
            ->notEmpty('taxa_mensal');

        $validator
            ->boolean('coletivo')
            ->requirePresence('coletivo', 'create')
            ->notEmpty('coletivo');

        $validator
            ->boolean('ativo')
            ->requirePresence('ativo', 'create')
            ->notEmpty('ativo');

        $validator
            ->scalar('conta')
            ->maxLength('conta', 6)
            ->requirePresence('conta', 'create')
            ->notEmpty('conta');

        $validator
            ->scalar('agencia')
            ->maxLength('agencia', 6)
            ->requirePresence('agencia', 'create')
            ->notEmpty('agencia');

        $validator
            ->scalar('banco')
            ->maxLength('banco', 255)
            ->requirePresence('banco', 'create')
            ->notEmpty('banco');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['plano']));

        return $rules;
    }
}
