<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
* Defines application features from the specific context.
*/
class FeatureContext implements Context
{

    private $articulos;
    private $bill;


    public function __construct()
    {
        $this->articulos = [];
        $this->bill = new \Lista\Bill();
    }

    /**
     * @Given los siguientes articulos:
     */
    public function losSiguientesArticulos(TableNode $table)
    {
        foreach ($table->getHash() as $articulo) {
            $this->articulos[$articulo['número']] = new \Lista\Articulos($articulo['número'], $articulo['precio'] * 100);
        }
    }


   /**
     * @Then la factura está pagada
     */
    public function laFacturaEstaPagada()
    {
        \PHPUnit\Framework\Assert::assertEquals(0, $this->bill->restToPay());
    }

    /**
     * @Given que he comprado :arg1 articulos del número :arg2
     * @Given que he comprado :arg1 articulo del número :arg2
     */
    public function queHeCompradoArticuloDelNumero($count, $numeroArticulo)
    {
        $artuculo = $this->articulos[$numeroArticulo];

        for($i = 0; $i < $count; $i++) {
            $this->bill->addItem($artuculo);
        }
    }

    /**
     * @Then he obtenido :arg1 puntos
     */
    public function heObtenidoPuntos($points)
    {
        \PHPUnit\Framework\Assert::assertEquals($points, $this->bill->getPoints());
    }

    /**
     * @When pido la cuenta recibo una factura de :arg1 dolares
     */
    public function pidoLaCuentaReciboUnaFacturaDeDolares($total)
    {
        \PHPUnit\Framework\Assert::assertEquals($total * 100, $this->bill->getTotal());
    }

    /**
     * @When pago en efectivo con :arg1 dolares
     */
    public function pagoEnEfectivoConDolares($amount)
    {
        $this->bill->payWithMoney($amount * 100);
    }

    /**
     * @When pago con :arg1 puntos y :arg2 dolares
     */
    public function pagoConPuntosYDolares($points, $money)
    {
        $this->bill->payWithMoney($money * 100);
        $this->bill->payWithPoints($points);    
    }

    /**
     * @Then quedan :arg1 dolares por pagar
     */
    public function quedanDolaresPorPagar($amount)
    {
        \PHPUnit\Framework\Assert::assertEquals($amount * 100, $this->bill->restToPay());
    }

}
