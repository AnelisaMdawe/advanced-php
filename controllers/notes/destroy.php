<?php
use core\App;
use core\Database;

$db = App::resolve(Database::class);


$currentUserId = 1;

    $note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']
    ])->findOrFail();

    authorise($note['user_id'] == $currentUserId);
    //form was submitted. delete the current note.
    $db->query('delete from notes where id = :id',[
        'id' => $_POST['id']
    ]);
    header('location: /notes');
    exit();

