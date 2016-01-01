<?php

//mysql
/*
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=db',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
*/

//sqlite3
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'sqlite:'.__DIR__.'/../db/sqlite.db',
    'username' => '',
    'password' => '',
    'charset' => 'utf8',
];
