<?php

namespace App\Models;

class Comment extends DatabaseModel
{

    protected static $columns = ['id', 'userID', 'postID', 'created', 'comment'];

    protected static $tableName = "comments";

    protected static $validationRules = [
        'postID'    => 'numeric,exists:\App\Models\Movie',
        'userID'     => 'numeric,exists:\App\Models\User',
        'comment'     => 'minlength:10,maxlength:16000',
    ];

    public function user()
    {
        return new User($this->userID);
    }

    public function movie()
    {
        return new Movie($this->postID);
    }   
}