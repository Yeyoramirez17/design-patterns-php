# Patrón de Diseño Memento

Este patrón de comportamiento permite capturar y restaurar el estado interno de un objeto sin romper su encapsulación. Es ideal para implementar funcionalidades de "deshacer" (undo).

## Estructura de las Clases

Nuestra implementación consta de tres componentes principales:

### 1. Originator (`ShoppingCar.php`)

Es el objeto cuyo estado queremos guardar.

-   **Responsabilidad:** Contiene la lógica de negocio y gestiona su propio estado.
-   **Métodos Clave:**
    -   `save(): Memento`: Crea un "snapshot" de su estado actual y lo devuelve dentro de un objeto `Memento`.
    -   `restore(Memento $memento)`: Restaura su estado a partir de un objeto `Memento` que recibe.

### 2. Memento (`Memento.php`)

Es el objeto que almacena el estado del `Originator`.

-   **Responsabilidad:** Actúa como un simple **Objeto de Transferencia de Datos (DTO) inmutable**.
-   **Estructura:** Sus propiedades son de solo lectura (`readonly`), lo que garantiza que el "snapshot" del estado no pueda ser modificado una vez creado. No contiene lógica de negocio.

```php
class Memento
{
    public function __construct(
        public readonly string $id,
        public readonly array $products,
        // ... resto de propiedades
    ) {}
}
```

### 3. Caretaker (`OrderHistory.php`)

Es el "cuidador" que almacena el historial de los Mementos.

-   **Responsabilidad:** Guarda y gestiona los objetos `Memento`. **Nunca inspecciona ni modifica su contenido**; los trata como cajas negras.
-   **Métodos Clave:**
    -   `addMemento(Memento $memento)`: Añade un nuevo snapshot al historial.
    -   `undone(): ?Memento`: Gestiona la lógica para deshacer, devolviendo el Memento del estado anterior.


## Flujo de Ejecución (Paso a Paso)

El proceso para guardar un estado y luego deshacerlo es el siguiente:

1.  **Creación del Snapshot:** El cliente (por ejemplo, un test o un controlador) le pide al `ShoppingCar` que guarde su estado.
    ```php
    $car = new ShoppingCar();
    // ...se modifica el estado del $car...
    $memento = $car->save(); 
    ```

2.  **Almacenamiento:** El cliente entrega el objeto `Memento` recién creado al `OrderHistory` para que lo guarde en su historial.
    ```php
    $history = new OrderHistory();
    $history->addMemento($memento);
    ```

3.  **Deshacer (Undo):** Para volver a un estado anterior, el cliente le pide al `OrderHistory` el último Memento válido.
    ```php
    $mementoAnterior = $history->undone();
    ```
    
4.  **Restauración:** Finalmente, el cliente pasa ese `Memento` anterior de vuelta al `ShoppingCar` para que este restaure su estado interno.
    ```php
    if ($mementoAnterior) {
        $car->restore($mementoAnterior);
    }
    ```
