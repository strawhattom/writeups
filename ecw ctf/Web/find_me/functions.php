<?php

session_start();

$DATABASE_USER = "find_me.users";
$DATABASE_NOTE = "find_me.notes";
$MANAGER = new MongoDB\Driver\Manager("mongodb://localhost:27017");

function isDBInit() {
    global $MANAGER, $DATABASE_USER;
    $query = new MongoDB\Driver\Query(['username' => 'admin']);
    $rows = $MANAGER->executeQuery($DATABASE_USER, $query);
    foreach($rows as $row) {
        if($row->username === 'admin') {
            return true;
        }
    }
    return false;
}

function findUser($username, $password) {
    global $MANAGER, $DATABASE_USER;
    $filter = ['username' => $username, 'password' => $password];
    $query = new MongoDB\Driver\Query($filter);
    $res = $MANAGER->executeQuery($DATABASE_USER, $query);
    $user = current($res->toArray());
    if(!empty($user)) {
        $_SESSION['username'] = $user->username;
        return true;
    }
    return false;
}

function findNotes($username) {
    global $MANAGER, $DATABASE_NOTE;
    $ret = array();
    $filter = ['username' => $username];
    $query = new MongoDB\Driver\Query($filter);
    $rows = $MANAGER->executeQuery($DATABASE_NOTE, $query);
    $tab = $rows->toArray();
    $tab = $tab[0];
    foreach($tab->notes as $note) {
        array_push($ret, $note);
    }
    return $ret;
}

if(!isDBInit()) {
    include_once('init.php');
    initDB();
    unlink('init.php');
}

?>
