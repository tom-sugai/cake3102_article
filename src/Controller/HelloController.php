<?php
    namespace App\Controller;

    //use Cake\App\Controller;
    use cake\Event\Event;

    class HelloController extends AppController {
        public function initialize() {
            parent::initialize();
            $this->loadComponent('PersonalDatum.PersonalDataInfo');
        }

        public function index() {
        $data = $this->PersonalDataInfo->getByName('tom');
        $this->set('data', $data);
        }
    }
?>