<?php

use Illuminate\Database\Capsule\Manager;

if(!Manager::schema()->hasTable('comments')) {
    Manager::schema()->create('comments', function($table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email');
        $table->string('title');
        $table->text('text');
        $table->timestamps();
    });
}
