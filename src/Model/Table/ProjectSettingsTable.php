<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectSettings Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\ProjectSetting get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectSetting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectSetting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSetting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectSetting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSetting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSetting findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectSettingsTable extends Table
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

        $this->setTable('project_settings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('color')
            ->maxLength('color', 50)
            ->allowEmpty('color');

        $validator
            ->boolean('spaces')
            ->requirePresence('spaces', 'create')
            ->notEmpty('spaces');

        $validator
            ->boolean('environments')
            ->requirePresence('environments', 'create')
            ->notEmpty('environments');

        $validator
            ->boolean('issues')
            ->requirePresence('issues', 'create')
            ->notEmpty('issues');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'));

        return $rules;
    }
}
