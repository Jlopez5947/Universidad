#language: es 
Característica: Puntos Colombia
    Reglas:

    - 1 punto por cada dolar.
    - 10 puntos equivalen a un descuento de 1 dolar.
    - El IVA es del 10%

    Antecedentes:
        Dados los siguientes articulos:
        | número | precio|
        | 1      | 10    |
        | 2      | 12    |
        | 3      | 8     |

    Escenario: Ganar puntos al pagar en efectivo
        Dado que he comprado 5 articulos del número 1
        Cuando pido la cuenta recibo una factura de 55 dolares
        Y pago en efectivo con 55 dolares
        Entonces la factura está pagada
        Y he obtenido 50 puntos

    Escenario: Pagar con dinero y puntos
        Dado que he comprado 5 articulos del número 1
        Cuando pido la cuenta recibo una factura de 55 dolares
        Y pago con 10 puntos y 54 dolares
        Entonces la factura está pagada
        Y he obtenido 0 puntos

    Escenario: Pagar con puntos
        Dado que he comprado 5 articulos del número 1
        Cuando pido la cuenta recibo una factura de 55 dolares
        Y pago con 500 puntos y 5 dolares
        Entonces la factura está pagada
        Y he obtenido 0 puntos

    Escenario: Intentar pagar el IVA con puntos
        Dado que he comprado 5 articulos del número 1
        Cuando pido la cuenta recibo una factura de 55 dolares
        Y pago con 550 puntos y 0 dolares
        Entonces quedan 5 dolares por pagar

    Escenario: Comprar articulos de varios tipos
        Dado que he comprado 1 articulo del número 1
        Y que he comprado 2 articulos del número 2
        Y que he comprado 2 articulos del número 3
        Cuando pido la cuenta recibo una factura de 55 dolares
        Y pago en efectivo con 55 dolares
        Entonces la factura está pagada
        Y he obtenido 50 puntos