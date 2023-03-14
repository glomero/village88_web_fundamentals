<?php
    session_start();
    require_once('connection.php');
    if (isset($_POST['action'])) {
        $filename = $_FILES['import_file']['name'];
        $file_type = 'text/csv';
        $upload_path = 'upload/';

        //file validation
        $_SESSION['errors'] = array();
        // //validation file type
        $invalid_file = false;
        if ($_FILES['import_file']['type'] != $file_type) {
            $_SESSION['errors'][] = "Invalid type of File!";
            $invalid_file = true;
            // header('Location: home.php');
        }
        //if upload path already exist
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
        //this will check if file already in the database
        require_once('connection.php');
        $query = "SELECT * FROM directories";
        $filenames = fetch_all($query);
        foreach ($filenames as $file) {
            if ($file['filename'] == $filename) {
                $_SESSION['errors'][] = "file already Uploaded";
                break;
            }
        }
        //Set file uploaded to path
        $file_uploaded = false;
        $temp_file = $_FILES['import_file']['tmp_name']; //path
        if (!empty($temp_file) && $invalid_file != true) {
            $new_file = $upload_path . $filename;
            if (move_uploaded_file($temp_file, $new_file)) {
                $file_uploaded = true;
            } else {
                $_SESSION['errors'][] = "Uploading File has an error!";
            }
        }
        //this inseert new csv file to database
        if (empty($_SESSION['errors']) && $file_uploaded == true) {
            
            $query = "INSERT INTO directories (file_name, dir, created_at, updated_at) VALUES ('{$filename}','{$upload_path}', NOW(), NOW())";
            // var_dump($query);
            // die();
            run_mysql_query($query);

            //success message
            $_SESSION['success'] = "Uploaded files is success!";
            header('Location: home.php');
            die();
        } else { //error messge
            $_SESSION['error'] = "Uploaded file has an error!";
            header('Location: home.php');
            die();
        }
    }
    
    if(isset($_GET['id'])){
        $file_name= fetch_record("SELECT * FROM directories WHERE id = {$_GET['id']}");
        $_SESSION['file_name'] = $file_name['file_name'];
        header('Location: exceltohtml.php');
        die();
    }
    
    
?>
