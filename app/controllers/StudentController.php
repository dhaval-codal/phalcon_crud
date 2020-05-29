<?php
declare(strict_types=1);

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use Phalcon\Http\Request;


class StudentController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$data = Stud::find();
    	echo "Data Count : ".count($data);

    	// foreach ($data as $d ) {
    	// 	echo $d->name;
    	// }

    	$this->view->data = $data;
    	// return $this->response->redirect('student', true, 302);
    }

    public function createAction()
    {
    	// $this->view->pick('student/edit');
    }

    public function createnewAction()
    {
    	if($this->request->isPost()){

    		$stud = new Stud;
    		$stud->id = $this->request->getPost('roll');
    		$stud->name = $this->request->getPost('name');
    		$stud->marks = $this->request->getPost('marks');

    		$output = $stud->save();

    		if ($output) {
    			$this->flash->success("Student's Detail Saved.");
    			return $this->response->redirect('/');
    		} else {
    			$this->flash->error("Can't Save Student's Detail.");
    			return $this->response->redirect('/');
    		} 
    	} 
    }

    public function updateAction()
    {
    	if($this->request->isPost()){

    		$stud = Stud::findFirst($this->request->getPost('roll'));
    		//$stud->id = $this->request->getPost('roll');
    		$stud->name = $this->request->getPost('name');
    		$stud->marks = $this->request->getPost('marks');
    		
    		if ($stud->update()) {
    			$this->flash->success("Student's Detail Update.");
    			return $this->response->redirect('/');
    		} else {
    			$this->flash->error("Can't Update Student's Detail.");
    			return $this->response->redirect('/');
    		} 
    	} 
    }

    public function editAction($stud_id)
    {
    	$data = Stud::findFirst($stud_id);
    	foreach ($data as $d ) {
    		echo $d->name;
    	}
		$this->view->data = $data;
    	// return $this->response->redirect('student', true, 302);
    }

    public function deleteAction($stud_id)
    {
    	$data = Stud::find($stud_id);

        if(!$data->delete())
        {
           $this->flash->error("Student's Detail Is Not Deleted.");
           return $this->response->redirect('/');
        }
        else
        {
           $this->flash->success("Student's Detail Deleted SuccessFully.");
           return $this->response->redirect('/');
        } 
    }

}

