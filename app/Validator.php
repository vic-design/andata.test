<?php


namespace App;


class Validator
{
    protected array $rules = [];

    // validate each rule from custom validator
    public function check(array $data)
    {
        $errors = [];
        foreach ($this->rules as $key => $rule) {
            $fieldRules = explode('|', $rule);

            foreach ($fieldRules as $fieldRule) {
                $error = $this->{$fieldRule}($data[$key]);
                if($error) {
                    $errors[$key] = $error;
                }
            }
        }
        return $errors;
    }


    ///// validation rules
    /**
     * @param mixed $data
     * @return string|bool
     */
    public function required(mixed $data): string|bool
    {
        return !isset($data) || empty($data) ? 'Поле не может быть пустым!' : false;
    }

    /**
     * @param string $data
     * @return string|bool
     */
    public function email(string $data): string|bool
    {
        $re = '/^(([^<>()[\]\\\\.,;:\s@"]+(\.[^<>()[\]\\\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

        preg_match($re, $data, $matches, PREG_OFFSET_CAPTURE, 0);

        return !count($matches) ? 'Формат Email неверный!' : false;
    }
}