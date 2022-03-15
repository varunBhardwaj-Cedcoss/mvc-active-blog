<?php

namespace App\Controllers;

use App\Libraries\Controller;

class Pages extends Controller
{
    public function signup()
    {
        if (isset($_SESSION['flag'])) {
            $data=$_SESSION['flag'];
        } else {
            $data = 1;
        }
        
        $this->view('/pages/signup', $data, $arr = []);
    }
    public function signin()
    {
        $this->view('/pages/signin', $arr = [], $arr = []);
    }
    public function user()
    {
        $error=[];
        if (empty($_POST['username'])) {
            array_push($error, 'enter user name');
        } if (empty($_POST['email'])) {
             array_push($error, 'enter email');
        } if (empty($_POST['password'])) {
            array_push($error, 'enter password');
        } if (empty($_POST['password2'])) {
            array_push($error, 'enter password in second filed also');
        } if (isset($_POST['password']) && isset($_POST['password2'])) {
            if ($_POST['password']!= $_POST['password2']) {
                array_push($error, 'enter same password in both filed');
            }
        }
        if (count($error) == 0) {
            $userNew = $this->model('Users');
            $userNew->user_name = $_POST['username'];
            $userNew->email = $_POST['email'];
            $userNew->password = $_POST['password'];
            $userNew->role = 'Admin';
            $userNew->status = 'Approved';
            $userNew->save();
            $this->view('/pages/signin', $arr = [], $arr = []);
        } else {
            $_SESSION['errors'] = $error;
            header("location:signup");
            /* $this->view('/pages/signup', $data, $arr = []); */
        }
    }
    public function check()
    {
        $error=[];
        if (empty($_POST['email'])) {
             array_push($error, 'enter email');
        } if (empty($_POST['password'])) {
            array_push($error, 'enter password');
        }
        if (count($error) == 0) {
            $user = $this->model('Users')::find('email', array('conditions' => array('email = ?', $_POST['email'])));
            if ($_POST['password'] == $user->password) {
                if ($user->status == 'Approved') {
                    $_SESSION['username'] = $user->user_name;
                    $_SESSION['email'] = $user->email;
                    $_SESSION['userid'] = $user->user_id;
                    $_SESSION['role'] = $user->role;
                    if ($_SESSION['role'] == 'Admin') {
                        $user = [];
                        $user = $this->model('Users')::all();
                        $blogs = $this->model('Blogs')::all();
                        $this->view('/pages/dashboard', $user, $blogs);
                    } else {
                        $blogs = $this->model('Blogs')::find('all', array('conditions' => array('email = ?',
                        $user->email)));
                        $this->view('/pages/dashboard', $user=[], $blogs);
                    }
                } else {
                    array_push($error, 'you have to wait profile needs to be approved');
                    array_push($error, 'or signup if new user');
                    $_SESSION['errors'] = $error;
                    $this->view('/pages/signin', $arr = [], $arr = []);
                }
                /* print_r($user); */
            } else {
                array_push($error, 'enter right password');
                array_push($error, 'new blogger signup first');
                $_SESSION['errors'] = $error;
                $this->view('/pages/signin', $arr = [], $arr = []);
            }
        } else {
            $_SESSION['errors'] = $error;
            $this->view('/pages/signin', $arr = [], $arr = []);
        }
    }
    public function dashboard($user)
    {
        if ($_SESSION['role'] == 'Admin') {
            $user = $this->model('Users')::all();
            $blogs = $this->model('Blogs')::all();
            $this->view('/pages/dashboard', $user, $blogs);
        } else {
            $blogs = $this->model('Blogs')::find('all', array('conditions' => array('email = ?', $_SESSION['email'])));
            $this->view('/pages/dashboard', $user=[], $blogs);
        }
    }
    public function blogs()
    {
        if ($_SESSION['role'] == 'Admin') {
            $blogs = $this->model('Blogs')::all();
            $this->view('/pages/blogs', $blogs, $arr = []);
        } else {
            $blogs = $this->model('Blogs')::find('all', array('conditions' => array('email = ?', $_SESSION['email'])));
            $this->view('/pages/blogs', $blogs, $user=[]);
        }
    }
    public function writeBlog()
    {
        $this->view('/pages/writeBlog', $arr = [], $arr = []);
    }
    public function addBlog()
    {
        $error=[];
        if (empty($_POST['title'])) {
             array_push($error, 'enter title');
        } if (empty($_POST['content'])) {
            array_push($error, 'enter content');
        }
        if (count($error) == 0) {
            $blogNew = $this->model('Blogs');
            $blogNew->user_name = $_SESSION['username'];
            $blogNew->email = $_SESSION['email'];
            $blogNew->title = $_POST['title'];
            $blogNew->content = $_POST['content'];
            $blogNew->status = 'Approved';
            $blogNew->user_id =$_SESSION['userid'];
            $blogNew->save();
            header('location: /pages/blogs');
        }
    }
    public function actionBlog()
    {
        if (isset($_POST['edit'])) {
            $blog = $this->model('Blogs')::find('all', array('conditions' => array('blog_id = ?', $_POST['edit'])));
            $this->view('/pages/writeBlog', $blog, $arr = []);
        }
        if (isset($_POST['update'])) {
            $blog  = $this->model('Blogs')::find_by_blog_id($_POST['update']);
            $blog->title = $_POST['title'];
            $blog->content = $_POST['content'];
            $blog->save();
            header('location: blogs');
        }
        if (isset($_POST['delete'])) {
            $blog  = $this->model('Blogs')::table()->delete(array('blog_id' => $_POST['delete']));
            header('location: blogs');
        }
        if (isset($_POST['status'])) {
            $blog  = $this->model('Blogs')::find_by_blog_id($_POST['status']);
            if ($blog->status == 'Approved') {
                $blog->status = 'Disapproved';
            } else {
                $blog->status = 'Approved';
            }
            $blog->save();
            header('location: blogs');
        }
    }
    public function users()
    {
        $users = $this->model('Users')::all();
        $this->view('/pages/users', $users, $arr = []);
    }
    public function actionUser()
    {
        if (isset($_POST['delete'])) {
            $user  = $this->model('Users')::table()->delete(array('user_id' => $_POST['delete']));
            header('location: users');
        }
        if (isset($_POST['role'])) {
            $user  = $this->model('Users')::find_by_user_id($_POST['role']);
            if ($user->role == 'Admin') {
                $user->role = 'Blogger';
            } else {
                $user->role = 'Admin';
            }
            $user->save();
            header('location: users');
        }
        if (isset($_POST['status'])) {
            $user  = $this->model('Users')::find_by_user_id($_POST['status']);
            if ($user->status == 'Approved') {
                $user->status = 'Disapproved';
            } else {
                $user->status = 'Approved';
            }
            $user->save();
            header('location: users');
        }
    }
    public function home()
    {
        $blogs = $this->model('Blogs')::find('all', array('conditions' => array('status = ?', 'Approved')));
        $this->view('/pages/home', $blogs, $arr = []);
    }
    public function actionHome()
    {
        $blog  = $this->model('Blogs')::find_by_blog_id($_POST['more']);
        $this->view('/pages/fullBlog', $blog, $arr = []);
    }
    public function signout()
    {
        $this->view('/pages/signout', $blog=[], $arr = []);
    }
}
