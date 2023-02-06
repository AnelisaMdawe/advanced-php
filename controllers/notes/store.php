<?php
use core\App;
use core\validator;
use core\Database;

$db = App::resolve(Database::class);

$errors = [];

    if (! validator::string($_POST['body'], 1, 100)) {
        $errors['body'] = 'A body of no  more than 100 is required.';
    }
    if (! empty($errors)){
        return view("notes/create.view.php",[
            'heading'=> 'create note',
            'errors'=> $errors
        ]);
    }

        $db->query('INSERT INTO notes(body, user_id) VALUE (:body,:user_id)',
            [
                'body' => $_POST['body'],
                'user_id' => 1
            ]);

        header('location:/notes');
        die();
