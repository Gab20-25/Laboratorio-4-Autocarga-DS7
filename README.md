# Laboratorio #4 – Autocarga de Clases con Composer (PSR-4)

## Introducción

En este laboratorio se implementó el mecanismo de autocarga de clases en PHP utilizando Composer y el estándar PSR-4.

El objetivo principal fue comprender cómo organizar correctamente un proyecto en PHP mediante namespaces y cómo automatizar la carga de clases sin necesidad de utilizar múltiples instrucciones `require` o `include`.

---

## Objetivo del Laboratorio

* Comprender el uso de namespaces en PHP.
* Implementar el estándar PSR-4 para la carga automática de clases.
* Configurar correctamente el archivo `composer.json`.
* Utilizar Composer para gestionar el autoload.
* Aplicar buenas prácticas en la organización de proyectos PHP.

---

## Concepto de Autoload (PSR-4)

El estándar **PSR-4** permite cargar automáticamente clases en función de su namespace y estructura de carpetas.

Esto elimina la necesidad de incluir manualmente archivos con `require`, haciendo el código más limpio, mantenible y escalable.

En este laboratorio se definieron dos namespaces principales:

* `App` → para clases generales
* `Database` → para modelos relacionados con datos

---

## Estructura del Proyecto

```
lab4_carga/
│
├── App/
│   └── User.php
│
├── Database/
│   └── ProductModel.php
│
├── vendor/
│
├── composer.json
└── Prueba.php
```

---

## Implementación

### 1. Clase User

Ubicada en:

```
App/User.php
```

```php
<?php
namespace App;

class User {
    public function getName(): string {
        return "Dave";
    }
}
```

---

### 2. Clase ProductModel

Ubicada en:

```
Database/ProductModel.php
```

```php
<?php
namespace Database;

class ProductModel {
    public function getId(): int {
        return 123;
    }
}
```

---

### 3. Configuración de Composer

Archivo:

```
composer.json
```

```json
{
    "autoload": {
        "psr-4": {
            "App\\": "App/",
            "Database\\": "Database/"
        }
    }
}
```

Esta configuración indica que:

* El namespace `App` corresponde a la carpeta `App/`
* El namespace `Database` corresponde a la carpeta `Database/`

---

### 4. Archivo Principal

Archivo:

```
Prueba.php
```

```php
<?php

use App\User;
use Database\ProductModel;

require_once 'vendor/autoload.php';

$user = new App\User;
echo $user->getName();
echo "\n";

$product = new Database\ProductModel;
echo $product->getId();
echo "\n";
```

Este archivo:

* Importa las clases mediante `use`
* Utiliza el autoload generado por Composer
* Ejecuta métodos de ambas clases

---

## Instalación y Configuración

Para ejecutar este proyecto se siguieron los siguientes pasos:

```
composer install
php Prueba.php
```

---

## Resultado del Laboratorio

Salida esperada en consola:

```
Dave
123
```

Esto confirma que:

* Las clases fueron cargadas automáticamente
* Los namespaces están correctamente configurados
* Composer está funcionando adecuadamente

---

## Consideraciones Adicionales

### Uso de `require_once`

En este laboratorio solo se utiliza:

```php
require_once 'vendor/autoload.php';
```

Esto es suficiente para cargar todas las clases del proyecto gracias a Composer.

---

### Organización del Código

El uso de namespaces permite:

* Evitar conflictos entre clases
* Mejorar la estructura del proyecto
* Facilitar el mantenimiento y escalabilidad

---

### Buenas Prácticas

* Mantener una estructura de carpetas coherente con los namespaces
* Utilizar Composer en lugar de múltiples `require`
* Separar responsabilidades (App, Database, etc.)

---

## Dificultades y Soluciones

* Error: Class not found

  **Causa:** Uso incorrecto de namespaces o falta de configuración del autoload
  **Solución:** Verificar la estructura de carpetas y la configuración en `composer.json`

---

## Referencias

* Documentación oficial de Composer (https://getcomposer.org/doc/)
* Video de guia proporcionado por la profesora (https://www.youtube.com/watch?v=Al8WVUQMA6Y)
* Guía de laboratorio proporcionada por la profesora

---

## Información del estudiante

Este laboratorio ha sido desarrollado por el estudiante de la Universidad Tecnológica de Panamá:

* Nombre: Gabriel Ah Chu
* Correo: [gabriel.ahchu@utp.ac.pa](mailto:gabriel.ahchu@utp.ac.pa)
* Curso: Desarrollo de Software 7
* Instructor del Laboratorio: Irina Fong
* Fecha de Ejecución del Laboratorio: 2 de mayo de 2026

---
