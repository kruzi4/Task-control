<?php
    class Home extends Controller {
        public function index($page = 1) {
            $per_page = 3;
            $page = $page == 1 ? 0 : ($page - 1) * $per_page;
            $limit = $page.','.$per_page;

            $tasks = $this->model('TaskModel');

            $total = ceil($tasks->countTasks() / $per_page);

            if(isset($_POST['title'])){
                $tasks->setData($_POST['title'], $_POST['text'], $_POST['user_name'], $_POST['user_email']);
            }

            $isValid = $tasks->validForm();
            if($isValid == "Верно")
                $tasks->addTask();
            else
                $error = $isValid;

            $sort = $tasks->getTasksLimited(id, $limit);
            if(isset($_POST['sort_by_name']))
                $sort = $tasks->getTasksLimited(user_name, $limit);
            if(isset($_POST['sort_by_email']))
                $sort = $tasks->getTasksLimited(user_email, $limit);
            if(isset($_POST['sort_by_status']))
                $sort = $tasks->getTasksLimited(status, $limit);

            $data = [
              'task' => $sort,
              'pages' => $total,
              'message' => $this->error,
            ];
            $this->view('home/index', $data);
        }
    }
