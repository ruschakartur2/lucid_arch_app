<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class KeyValueCast implements CastsAttributes
{
    /**
     * @var
     */
    private $enum;

    /**
     * @param $enum
     */
    public function __construct($enum)
    {
        $this->enum = $enum;
    }

    /**
     * @param $model
     * @param $key
     * @param $value
     * @param $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        return $this->enum::getValue($value);
    }

    /**
     * @param $model
     * @param $key
     * @param $value
     * @param $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        return $value;
    }
}
