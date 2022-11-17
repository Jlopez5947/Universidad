<?php

namespace spec\Lista;

use Lista\Articulos;
use PhpSpec\ObjectBehavior;

class ArticulosSpec extends ObjectBehavior
{
    const NUMERO = 10;
    const PRECIO = 2500;

    function it_is_initializable()
    {
        $this->shouldHaveType(Articulos::class);
    }
    function let()
    {
        $this->beConstructedWith(self::NUMERO, self::PRECIO);
    }
    function it_has_a_menu_number()
    {
        $this->numero()->shouldBe(self::NUMERO);
    }

    function it_has_a_price()
    {
        $this->precio()->shouldBe(self::PRECIO);
    }
    function it_implements_price_interface()
    {
        $this->shouldImplement(\Lista\Priced::class);
    }
}
