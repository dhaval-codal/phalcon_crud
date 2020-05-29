<?php
declare(strict_types=1);

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$data = Stud::find();
    	echo "Data Count : ".count($data);

    	// foreach ($data as $d ) {
    	// 	echo $d->name;
    	// }

    	$this->view->data = $data;
    }

}

