<?php


namespace App\Validators;


use App\Validator;

class CommentsValidator extends Validator
{
    public function __construct()
    {
        $this->rules = [
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'text' => 'required',
        ];
    }
}
