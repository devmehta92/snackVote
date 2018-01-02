<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fruits Model
 *
 * @property \App\Model\Table\VotesTable|\Cake\ORM\Association\HasMany $Votes
 *
 * @method \App\Model\Entity\Fruit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fruit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fruit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fruit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fruit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fruit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fruit findOrCreate($search, callable $callback = null, $options = [])
 */
class FruitsTable extends Table
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

        $this->setTable('fruits');
        $this->setDisplayField('ID');
        $this->setPrimaryKey('ID');

        $this->hasMany('Votes', [
            'foreignKey' => 'fruit_id'
        ]);
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
            ->integer('ID')
            ->allowEmpty('ID', 'create');

        $validator
            ->scalar('Name')
            ->maxLength('Name', 20)
            ->requirePresence('Name', 'create')
            ->notEmpty('Name');

        return $validator;
    }
}
