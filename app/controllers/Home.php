<?php
    class Home extends Controller {
        public function index($page = 1) {
            $per_page = 3;
            $page = $page == 1 ? 0 : ($page - 1) * $per_page;
            $limit = $page.','.$per_page;

            $tasks = $this->model('TaskModel');

            $total = ceil($tasks->countTasks() / $per_page);

            $sort = $tasks->getTasksLimited(id, $limit);
            if(isset($_POST['sort_by_name']))
                $sort = $tasks->getTasksLimited(user_name, $limit);
            if(isset($_POST['sort_by_email']))
                $sort = $tasks->getTasksLimited(user_email, $limit);
            if(isset($_POST['sort_by_status']))
                $sort = $tasks->getTasksLimited(status, $limit);

            if(isset($_POST['task_done']))
                $tasks->updateTaskStatus($_POST['task_done'], 2);

            $data = [
              'task' => $sort,
              'pages' => $total,
              'message' => $this->error,
            ];
            $this->view('home/index', $data);
        }
    }
