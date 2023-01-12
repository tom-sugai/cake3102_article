<?php
    namespace PersonalDatum\Model\Table;

    use Cake\ORM\Query;
    use Cake\ORM\RulesChecker;
    use Cake\ORM\Tablr;
    use Cake\Validation\Validator;

    class PersonalDatumTable extends Table {
        public function initialize(array $config){
            parent::initialize($config);
        }

        public function validationDefault(Validator $validator){
            $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

            $validator
                ->allowEmpty('name');

            return $validator;
        }
    }
?>