<?php
logout();
$alertMessage = null;

function signUp()
{
    if(isset($_POST['signup']))
    {
        $validate   = new SignupValidator($_POST);
        $validated  = $validate->validatedForm();
        $errors     = $validate->validateErrorForm();

        if(count($errors) > 0)
        {
            return $validated;

        }else{
            $user = new Signup($_POST);
            $user = $user->register();
            $_SESSION['fullname']   = $user['fullname'];
            $_SESSION['user_id']    = $user['user_id'];
            header('Location:/php_ajax_crud');
        }
    }
}

function logIn()
{
    if(isset($_POST['login']))
    {
        $u_id   = $_POST['u_id'];
        $pwd    = $_POST['password'];
        $user   = new Login($_POST);
        $user   = $user->logIn();
        
        if($user['isUser'] == false)
        {
            return $error = [
                'errorText' => 'Sorry, credential was incorrect',
                'is-invalid' => 'is-invalid',
                'text-danger' => 'text-danger'
            ];
        }else{
            $_SESSION['fullname']   = $user['fullname'];
            $_SESSION['user_id']    = $user['user_id'];
            header('Location:/php_ajax_crud');
        }
    }
}

function fetch_data()
{
    $data       = null;
    $employee   = new Employee($data);
    $employees  = $employee->read();
    foreach ($employees as $key => $employee)
    {
        echo 
        '<tr>
            <td>'. $key+1 . '</td>
            <td>' . $employee['lastname'] . ', ' . $employee['firstname'] . '</td>
            <td>' . $employee['emp_no'] . '</td>
            <td>' . $employee['department'] . '</td>
            <td>
                <button class="btn btn-primary btn-sm me-2" value="' . $employee['id'] .'"onclick="viewEmployee(this.value)">View</button>
                <button class="btn btn-secondary btn-sm me-2" value="'. $employee['id'] .'" onclick="editEmployee(this.value)">Edit</button>
                <button class="btn btn-danger btn-sm " value="' . $employee['id'] .'" data-bs-toggle="modal" data-bs-target="#empDelModal" onclick="setDeleteId(this)">
                    Delete
                </button>
            </td>
        </tr>';
    }
}

function insert()
{
    if(isset($_POST['submit']))
    {
        $validate   = new EmployeeValidator($_POST);
        $validated  = $validate->validatedForm();
        $errors     = $validate->validateErrorForm();
       
        if(count($errors) > 0)
        {
            return $validated;

        }else{
            $employee = new Employee($_POST);
            if($employee->insert())
            {
                $alertMessage = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Holy guacamole!</strong> You have successfully added new employee!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                require_once('read-employee.php');
                exit;
            }
        }
    }
}

function getId()
{
    if(isset($_GET['id']))
    {
        $employee   = new Employee($_GET);
        $employees  = $employee->edit();
        return $employees;
    }
}

function update()
{
    if(isset($_POST['update']))
    {
        $validate   = new EmployeeValidator($_POST);
        $validated  = $validate->validatedForm();
        $errors     = $validate->validateErrorForm();
        if(count($errors) > 0)
        {
           return $result = array($validated,$_POST);

        }else{
            $employee = new Employee($_POST);
            if($employee->update())
            {
                $alertMessage = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Holy guacamole!</strong> You have successfully updated employee records!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                require_once('read-employee.php');
                exit;
            }
        }
    }
}

function delete()
{
    if(isset($_GET['id']))
    {
        $employee = new Employee($_GET);
        if($employee->delete()){
            $alertMessage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Holy guacamole!</strong> You have successfully deleted employee records!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
        }
    }
}

function logout()
{
    if(isset($_GET['action']) == 'logout')
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['fullname']);
        session_destroy();
        header('Location:/php_oop_crud');
    }
}

function check_session()
{
    if(!isset($_SESSION['user_id'])){
        header('Location:/php_oop_crud/login.php');
    }
}
?>
