<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $user = $this->userModel->getUsers();
        $data = [
            'title' => 'Home Page',
            'user' => $user
        ];

        $this->view('pages/index', $data);
    }

    public function insertrecord()
    {
        $data = [
            'name' => '',
            'address' => '',
            'contact' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => trim($_POST['name']),
                'address' => trim($_POST['address']),
                'contact' => trim($_POST['contact'])
            ];
            if ($this->userModel->setUsers($data)) {
                header('location: ' . URLROOT . '/');
            } else {
                die('Something went wrong.');
            }
        }
        $this->view('pages/insertrecord', $data);
    }

    public function deleterecord()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            var_dump($url);

            $id = $url[2];
            if ($this->userModel->deleteRecord($id)) {
                header('location: ' . URLROOT . '/');
            } else {
                die('Something went wrong.');
            }
        }


    }

    public function about() {
        echo 'about';
    }

    public function editrecord()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            $id = $url[2];
            $user = $this->userModel->editrecord($id);
            $data = [
                'title' => 'Update Page',
                'user' => $user
            ];
            $this->view('pages/updaterecord', $data);
        }
    }

    public function updaterecord() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => trim($_POST['id']),
                'name' => trim($_POST['name']),
                'address' => trim($_POST['address']),
                'contact' => trim($_POST['contact'])
            ];
           /* var_dump($data);
            die();*/
            if ($this->userModel->updateRecord($data)) {
                header('location: '. URLROOT .'/');
            }
            else {
                die('Something went wrong');
            }
            $this->view('pages/updaterecord', $data);
            //$this->view('pages/index', $data);
        }

        /*$user = $this->userModel->getUsers();
        $data = [
            'title' => 'Home Page',
            'user' => $user
        ];*/

    }
}
