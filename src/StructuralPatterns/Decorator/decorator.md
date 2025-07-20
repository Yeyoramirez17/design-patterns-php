# Patrón de Diseño Decorator (Decorador)

El patrón Decorator es un patrón de diseño estructural que te permite añadir funcionalidades a objetos de forma dinámica, envolviéndolos en objetos especiales que contienen esas funcionalidades. Es una alternativa flexible a la herencia para extender la funcionalidad de una clase.

## Propósito

El objetivo principal es poder añadir responsabilidades a un objeto sin modificar su código y sin afectar a otros objetos de la misma clase. Esto se logra creando una serie de "envolturas" (decoradores) alrededor del objeto original.

## Estructura

El patrón Decorator se compone de los siguientes elementos:

1.  **Component (Componente):** Define la interfaz para los objetos que pueden tener responsabilidades añadidas. En nuestro ejemplo, esta es la interfaz `Order`.
2.  **ConcreteComponent (Componente Concreto):** Es la clase del objeto al que se le añaden nuevas funcionalidades. Implementa la interfaz del Componente. En nuestro ejemplo, es la clase `BasicOrder`.
3.  **Decorator (Decorador):** Mantiene una referencia a un objeto Componente y define una interfaz que se ajusta a la del Componente. Su principal responsabilidad es delegar el trabajo al componente que envuelve. En nuestro ejemplo, esta es la clase abstracta `OrderDecorator`.
4.  **ConcreteDecorator (Decorador Concreto):** Añade la funcionalidad específica al Componente. Hereda del Decorador y puede ejecutar su comportamiento antes o después de delegar la tarea al componente envuelto. En nuestro ejemplo, estas son las clases `ShippingCostDecorator`, `GiftWrappingDecorator` y `DiscountPercentageDecorator`.

## Explicación del Ejemplo

En este proyecto, hemos implementado el patrón Decorator para calcular el costo total de un pedido, añadiendo dinámicamente costos adicionales o descuentos.

-   **`Order` (Componente):** Es la interfaz que define los métodos que todos los pedidos y sus decoradores deben implementar: `calculateTotalCost()` y `getDescription()`.
-   **`BasicOrder` (Componente Concreto):** Representa un pedido simple con un precio base. Es el objeto inicial que vamos a "decorar".
-   **`OrderDecorator` (Decorador):** Es una clase abstracta que sirve como base para todos los decoradores. Contiene una instancia de `Order` y delega las llamadas a los métodos de esa instancia.
-   **Decoradores Concretos:**
    -   `ShippingCostDecorator`: Añade el costo de envío al total.
    -   `GiftWrappingDecorator`: Añade el costo de envoltura de regalo al total.
    -   `DiscountPercentageDecorator`: Aplica un descuento porcentual sobre el total.

### ¿Cómo funciona?

Puedes empezar con un `BasicOrder` y "envolverlo" con tantos decoradores como necesites. Cada decorador añade su propia lógica al cálculo del costo y a la descripción, mientras sigue llamando al método del objeto que envuelve.

### Ejemplo de uso en PHP

```php
<?php

require_once './vendor/autoload.php';

use DesignPatterns\StructuralPatterns\Decorator\BasicOrder;
use DesignPatterns\StructuralPatterns\Decorator\ShippingCostDecorator;
use DesignPatterns\StructuralPatterns\Decorator\GiftWrappingDecorator;
use DesignPatterns\StructuralPatterns\Decorator\DiscountPercentageDecorator;

// 1. Creamos un pedido básico.
$order = new BasicOrder();

// 2. Lo decoramos para añadirle costo de envío.
$order = new ShippingCostDecorator($order, 5.0);

// 3. Lo decoramos de nuevo para añadir envoltura de regalo.
$order = new GiftWrappingDecorator($order, 2.5);

// 4. Finalmente, aplicamos un descuento del 10% (0.1).
$order = new DiscountPercentageDecorator($order, 0.1);

// 5. Obtenemos la descripción y el costo final.
// El resultado incluirá el precio base, el envío, la envoltura y el descuento aplicado.
echo $order->getDescription();

/*
Salida esperada:

 --- Order N° 1 ---
 - Base Price:  15
 - ShippingFee: 5
 - Total:       20
 - Gif Wrapping: 2.5
 - Total:       22.5
 - Discount:    0.1
 - Total:       20.25
*/
```