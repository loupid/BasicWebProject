<?php
//put here the same properties as the DB
namespace models;

class Admin implements \Model
{
    public $id;
    public $firstname;
    public $lastname;
    public $password;
    public $email;
    public $workphone;
    public $desk;
    public $cellphone;
    public $status;
    public $creation_date;
    public $last_connection_date;

    public function create($array = [])//['*']
    {
        extract($_POST);
        dump($_POST);
        $attributes = "";
        $values = "";
        foreach ($_POST as $key => $value) {
            $attributes .= "'".$key."',";
            $values .= "'".$value."',";
        }
        dump(rtrim($attributes, ","));
        dump(rtrim($values, ","));
        $query = 'INSERT INTO ADMINS VALUES (';

    }

    public static function update($id, $db, $array = [])
    {
        // TODO: Implement update() method.
        $query = 'UPDATE admins SET';
        $comma = ' ';
        foreach ($array as $key => $value){
            $query .= $comma . $key . " = STR_TO_DATE('".$value."', '%d/%m/%Y %H:%i:%s')";
            $comma = ', ';
        }
        $query .= ' where id = '.$id;
        $db->prepare($query)->execute();
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}