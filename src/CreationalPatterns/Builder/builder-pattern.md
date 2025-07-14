
# Patrón de Diseño Builder

## Definición

El patrón de diseño Builder es un patrón creacional que nos permite construir objetos complejos paso a paso. A diferencia de otros patrones creacionales, el Builder no requiere que los productos tengan una interfaz o clase base común.

Este patrón es especialmente útil cuando se necesita crear un objeto con múltiples atributos, algunos de los cuales pueden ser opcionales. En lugar de tener un constructor con una larga lista de parámetros, el Builder nos proporciona una API fluida para construir el objeto de una manera más legible y mantenible.

## Estructura

El patrón Builder generalmente consta de las siguientes partes:

- **Builder**: Una interfaz o clase abstracta que define los pasos para construir el objeto.
- **ConcreteBuilder**: Una implementación de la interfaz Builder que construye y ensambla las partes del objeto.
- **Product**: El objeto complejo que se está construyendo.
- **Director**: Una clase opcional que encapsula la lógica para construir el objeto utilizando el Builder.

## Ejemplo

A continuación, se muestra un ejemplo de cómo se puede implementar el patrón Builder en PHP para construir un objeto `Customer`.

<img src="./Build Pattern.png" alt="Builder Pattern PHP" width="520" />

## Descripción
El patrón Builder se utiliza para construir objetos complejos paso a paso. El proceso de construcción permite producir diferentes tipos y representaciones del objeto utilizando el mismo código de construcción. En esta implementación, las clases principales involucradas son [Customer](Customer.php), [CustomerBuilder](./CustomerBuilder.php), [Address](./Address.php), [Order](./Order.php), [TypeCustomer](./TypeCustomer.php) y [Genre](./Genre.php).

### Clase **Customer**

* Representa un cliente con sus datos personales, dirección, tipo de cliente y género.

### Clase **CustomerBuilder**

* Es el constructor concreto que implementa la lógica para construir un objeto [Customer](./Customer.php) paso a paso.

### Clase **Order**

* Representa una orden realizada por un cliente.

### Clases **Address**, **TypeCustomer**, **Genre**

* Estas son clases de valor o entidades más pequeñas que representan atributos específicos de un cliente.

