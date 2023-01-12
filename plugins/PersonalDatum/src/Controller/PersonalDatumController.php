<?php

namespace PersonalDatum\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;
use Cake\Network\Exception\InvalidCsrfTokenException;
use Cake\ORM\TableRegistory;
use PersonalDatum\Controller\AppController;

class PersonalDatumController extends AppController
{
    public function index() {
        $data = $this->PersonalDatum->find('all');
        $this->set('data',$data);
    }   
}
?>