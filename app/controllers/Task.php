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

    public function edit($id) {
        $task = $this->model(TaskModel);

        if(isset($_POST['edit_title']) && $_COOKIE['login'] == 'admin') {
                $task->updateTask($id, $_POST['edit_title'], $_POST['edit_text'], $_POST['edit_user_name'], $_POST['edit_user_email'], 3);
        }

        if($_COOKIE['login'] == 'admin') {
            $this->view('task/edit', $task->getOneTask($id));
        }elseif ($_COOKIE['login'] != 'admin' && $_COOKIE['login'] != '') {
            header("Location: /");
        }else{
            header("Location: /user/auth");
        }

    }
}
