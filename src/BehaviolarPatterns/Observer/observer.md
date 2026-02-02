# Patrón de Diseño Observer

El patrón Observer define una dependencia de uno-a-muchos entre objetos, de modo que cuando un objeto (el **Sujeto**) cambia su estado, todos sus dependientes (los **Observadores**) son notificados y actualizados automáticamente.

## Componentes de la Implementación

En PHP, este patrón se implementa de forma ideal utilizando las interfaces proporcionadas por la Standard PHP Library (SPL).

### 1. Sujeto (`Blog.php`)

Es el objeto que está siendo "observado". En nuestro ejemplo, es un blog que publica nuevas entradas.

-   **Interfaz:** `SplSubject`.
-   **Responsabilidad:**
    -   Mantiene una lista de observadores. En esta implementación se usa `SplObjectStorage`, una clase de la SPL optimizada para almacenar y gestionar colecciones de objetos.
    -   Provee métodos para que los observadores se suscriban (`attach()`) y cancelen su suscripción (`detach()`).
    -   Notifica a los observadores cuando ocurre un evento relevante llamando a su método `notify()`.

```php
// En Blog.php
use SplObjectStorage;
use SplObserver;
use SplSubject;

class Blog implements SplSubject
{
    private SplObjectStorage $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }
    
    public function attach(SplObserver $observer): void
    {
        // SplObjectStorage usa offsetSet o attach para añadir objetos
        $this->observers->offsetSet($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->offsetUnset($observer);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function releaseNewIssue(): void
    {
        echo "El Blog ha publicado una nueva entrada!\n";
        $this->notify(); // Notifica a todos los suscriptores.
    }
}
```

### 2. Observador (`Subscriber.php`)

Es el objeto que "observa" al sujeto y espera notificaciones. En nuestro ejemplo, es un suscriptor del blog.

-   **Interfaz:** `SplObserver`.
-   **Responsabilidad:**
    -   Debe implementar un único método: `update(SplSubject $subject)`.
    -   Este método contiene la lógica que se ejecutará cuando el Sujeto lo notifique.

```php
// En Subscriber.php
class Subscriber implements SplObserver
{
    private string $name;

    // ...

    public function update(SplSubject $subject): void
    {
        if (!$this->isReceivedNewsletter()) return;

        echo "Subscriber {" . $this->name . "} has been notified about the new magazine issue.\n";
    }
}
```

## Flujo de Ejecución (Ejemplo Práctico)

El proceso de suscripción y notificación funciona de la siguiente manera:

1.  **Creación:** Se instancian los objetos: uno o más `Subscriber` (Observadores) y un `Blog` (Sujeto).

    ```php
    $blog = new Blog();
    $subscriber1 = new Subscriber('email1@test.com', 'Juan', true);
    $subscriber2 = new Subscriber('email2@test.com', 'Ana', false);
    ```

2.  **Suscripción (Attach):** Los observadores se suscriben al sujeto para empezar a recibir notificaciones.

    ```php
    $blog->attach($subscriber1);
    $blog->attach($subscriber2);
    ```

3.  **Ocurre un Evento:** Se produce una acción en el `Blog` que debe ser notificada.

    ```php
    $blog->releaseNewIssue();
    ```

4.  **Notificación:** El método `releaseNewIssue()` llama internamente a `notify()`. El `Blog` recorre su colección de observadores y ejecuta el método `update()` de cada uno.

5.  **Actualización:** Cada `Subscriber` ejecuta la lógica dentro de su método `update()`. En este caso, solo el `subscriber1` mostrará el mensaje, porque el `subscriber2` tiene la recepción de noticias desactivada (`isReceivedNewsletter()` devuelve `false`).

    ```
    // Salida esperada:
    El Blog ha publicado una nueva entrada!
    Subscriber Juan has been notified about the new magazine issue.
    ```
