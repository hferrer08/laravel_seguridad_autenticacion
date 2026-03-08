# Laravel Seguridad y Autenticación

## Descripción del proyecto

Este proyecto corresponde a la implementación de una aplicación en
**Laravel** utilizando autenticación, autorización basada en roles y
permisos, y un CRUD protegido mediante control de acceso.

Se desarrolló como parte de la actividad académica de seguridad web,
aplicando:

-   Autenticación con starter kit de Laravel
-   Gestión de roles y permisos con Spatie Laravel Permission
-   CRUD protegido de tareas (`Task`)
-   Vista de usuarios con acceso restringido por rol

------------------------------------------------------------------------

## Tecnologías utilizadas

-   PHP 8+
-   Laravel 12
-   Laravel Breeze
-   Laravel Permission (Spatie)
-   Blade
-   Tailwind CSS
-   SQLite

------------------------------------------------------------------------

## Funcionalidades implementadas

### Autenticación

Se instaló el starter kit de Laravel Breeze para disponer de:

-   Registro de usuarios
-   Inicio de sesión
-   Cierre de sesión
-   Gestión básica de perfil

### Roles y permisos

Se definieron tres roles principales:

-   **Administrador**
-   **Editor**
-   **Usuario**

Permisos configurados:

-   `task.view`
-   `task.create`
-   `task.edit`
-   `task.delete`
-   `users.view`

### CRUD de tareas

El módulo de tareas permite:

-   Crear tareas
-   Listar tareas
-   Editar tareas
-   Eliminar tareas
-   Visualizar detalle

Acceso según rol:

-   **Administrador:** CRUD completo
-   **Editor:** CRUD completo
-   **Usuario:** solo visualización

### Gestión de usuarios

Se implementó una vista de usuarios accesible únicamente para:

-   **Administrador**

------------------------------------------------------------------------

## Instalación del proyecto

### 1. Clonar repositorio

``` bash
git clone https://github.com/hferrer08/laravel_seguridad_autenticacion.git
```

### 2. Entrar al proyecto

``` bash
cd laravel_seguridad_autenticacion
```

### 3. Instalar dependencias PHP

``` bash
composer install
```

### 4. Instalar dependencias frontend

``` bash
npm install
```

### 5. Copiar variables de entorno

``` bash
cp .env.example .env
```

### 6. Generar clave

``` bash
php artisan key:generate
```

### 7. Ejecutar migraciones

``` bash
php artisan migrate
```

### 8. Ejecutar seeders

``` bash
php artisan db:seed
```

### 9. Levantar frontend

``` bash
npm run dev
```

### 10. Levantar servidor Laravel

``` bash
php artisan serve
```

------------------------------------------------------------------------

## Usuarios de prueba

### Administrador

-   correo: admin@test.com
-   contraseña: password

### Editor

-   correo: editor@test.com
-   contraseña: password

### Usuario

-   correo: user@test.com
-   contraseña: password

------------------------------------------------------------------------

## Repositorio GitHub

Repositorio oficial del proyecto:

https://github.com/hferrer08/laravel_seguridad_autenticacion

------------------------------------------------------------------------

## Objetivo académico cumplido

El proyecto demuestra:

-   autenticación segura
-   autorización por roles
-   separación de privilegios
-   protección de funcionalidades sensibles

------------------------------------------------------------------------

## Autor

Hubert Ferrer Guerrero
