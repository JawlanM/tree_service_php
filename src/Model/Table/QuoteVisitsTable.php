<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuoteVisits Model
 *
 * @property \App\Model\Table\ContactMessagesTable&\Cake\ORM\Association\BelongsTo $Enquiries
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\BelongsTo $Staffs
 *
 * @method \App\Model\Entity\QuoteVisit newEmptyEntity()
 * @method \App\Model\Entity\QuoteVisit newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\QuoteVisit> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuoteVisit get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\QuoteVisit findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\QuoteVisit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\QuoteVisit> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuoteVisit|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\QuoteVisit saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\QuoteVisit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\QuoteVisit>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\QuoteVisit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\QuoteVisit> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\QuoteVisit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\QuoteVisit>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\QuoteVisit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\QuoteVisit> deleteManyOrFail(iterable $entities, array $options = [])
 */
class QuoteVisitsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('quote_visits');
        $this->setDisplayField('location');
        $this->setPrimaryKey('id');

        $this->belongsTo('Enquiries', [
            'foreignKey' => 'enquiry_id',
            'className' => 'ContactMessages',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Staffs', [
            'foreignKey' => 'staff_id',
            'className' => 'Employees',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('enquiry_id')
            ->notEmptyString('enquiry_id');

        $validator
            ->integer('staff_id')
            ->notEmptyString('staff_id');

        $validator
            ->date('visit_date')
            ->requirePresence('visit_date', 'create')
            ->notEmptyDate('visit_date');

        $validator
            ->time('visit_time')
            ->requirePresence('visit_time', 'create')
            ->notEmptyTime('visit_time');

        $validator
            ->scalar('location')
            ->maxLength('location', 255)
            ->requirePresence('location', 'create')
            ->notEmptyString('location');

        $validator
            ->dateTime('created_time')
            ->allowEmptyDateTime('created_time');

        $validator
            ->dateTime('last_modified')
            ->allowEmptyDateTime('last_modified');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['enquiry_id'], 'Enquiries'), ['errorField' => 'enquiry_id']);
        $rules->add($rules->existsIn(['staff_id'], 'Staffs'), ['errorField' => 'staff_id']);

        return $rules;
    }
}
