<?php
    namespace PersonalDatum\Model\Entity;

    use Cake\ORM\Entity;

    class PersonalData extends Entity {
        protected $_accessible = [
            '*' => true,
            'id' => false
        ];
    }
?>