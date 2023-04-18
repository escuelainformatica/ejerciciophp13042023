<?php

namespace App\Rules;

use App\Servicios\CompraServicio;
use App\Servicios\ProductoServicio;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ProductoExiste implements ValidationRule
{
    /** @var ProductoServicio */
    private $productoServicio;
    public function __construct(ProductoServicio $productoServicio) {
        $this->productoServicio=$productoServicio;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!$this->productoServicio->exist($value)) {
            $fail("el <b>$attribute</b> no existe");
        }
    }
}
