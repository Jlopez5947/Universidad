<?php
declare(strict_types=1);

namespace Lista;

class Articulos implements Priced
{
    private $numero;
    private $precio;

    public function __construct(int $numero, int $precio)
    {
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function numero(): int
    {
        return $this->numero;
    }

    public function precio(): int
    {
        return $this->precio;
    }
}
