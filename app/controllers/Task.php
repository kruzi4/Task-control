<?php
class Task extends Controller {
    public function create() {
        $tasks = $this->model(TaskModel);

        if(isset($_POST['title'])){
            $tasks->setData($_POST['title'], $_POST['text'], $_POST['user_name'], $_POST['user_email']);
        }

        $isValid = $tasks->validForm();
        if($isValid == "Верно"){
            $tasks->addTask();
            header("Location: /");
        }elseif($isValid != "Верно" && $isValid != ""){
            $data['message'] = $isValid;
            $this->view('task/create', $data);
        }else{
            $this->view('task/create');
        }
    }
}
