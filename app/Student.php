<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Student extends Model
{
    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'students.stamnr' => 10,
            'students.first_name' => 10,
            'students.last_name' => 10,
            'students.class' => 10,
        ],
    ];
    protected $table = 'students';
}
