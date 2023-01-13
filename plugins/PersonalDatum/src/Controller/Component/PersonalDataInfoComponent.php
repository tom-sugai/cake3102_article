<?php
    namespace PersonalDatum\Controller\Component;

    use Cake\Controller\Component;
    use Cake\ORM\TableRegistry;

    class PersonalDataInfoComponent extends Component {
        public $name = "PersonalDataInfo";
        public function getByName($name){
            $table = TableRegistry::get("PersonalDatum");
            $data = $table->findByUsername($name)->first();
            return $data;
        }
    }
?>