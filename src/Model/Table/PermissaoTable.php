<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Permissao Model
 *
 * @method \App\Model\Entity\Permissao get($primaryKey, $options = [])
 * @method \App\Model\Entity\Permissao newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Permissao[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Permissao|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permissao|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permissao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Permissao[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Permissao findOrCreate($search, callable $callback = null, $options = [])
 */
class PermissaoTable extends Table
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

        $this->setTable('permissao');
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
            ->scalar('permissao')
            ->maxLength('permissao', 255)
            ->requirePresence('permissao', 'create')
            ->notEmpty('permissao');

        return $validator;
    }
}
