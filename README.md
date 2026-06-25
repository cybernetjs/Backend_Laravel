# Sistema Academico 

 API 

---

##  ¿Qué es un Endpoint?

Un endpoint es una URL específica a la que puedes hacer una petición HTTP. Es la "puerta de entrada" a un recurso de la API.

```
http://127.0.0.1:8000/api/matriculas/1
│                    │   │           │
│                    │   │           └── ID del recurso
│                    │   └── recurso (tabla)
│                    └── prefijo API
└── servidor
```

---

##  ¿Qué es la API?

```
React (frontend)
      │
      │  HTTP Request (GET, POST, PUT, DELETE)
      ▼
   API Laravel
      │
      ├── routes/api.php   → define las URLs
      ├── Controllers      → procesa la petición
      └── Models           → consulta la base de datos
      │
      ▼
   MySQL (XAMPP)
      │
      ▼
   JSON Response → regresa a React
```

---
## Requisitos previos

Antes de instalar el proyecto necesitas tener en tu maquina:

- PHP 8.2 o superior
- Composer
- MySQL 8.0 o superior
- Node.js y npm
- Git

---

## Instalacion

### 1. Clonar el repositorio
```bash
git clone https://github.com/tu-usuario/tu-repositorio.git
cd tu-repositorio
```

### 2. Instalar dependencias de PHP
```bash
composer install
```

### 3. Copiar el archivo de entorno
```bash
cp .env.example .env
```

### 4. Configurar la base de datos en el .env
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_academico
DB_USERNAME=root
DB_PASSWORD=tu_password
SESSION_DRIVER=database
```

### 5. Generar la key de la aplicacion
```bash
php artisan key:generate
```

### 6. Crear la base de datos en MySQL
```bash
mysql -u root -p
```
```sql
CREATE DATABASE sistema_academico;
exit;
```

### 7. Ejecutar las migraciones
```bash
php artisan migrate
```

Si necesitas resetear todo desde cero:
```bash
php artisan migrate:fresh
```

### 8. Instalar API (necesario para las rutas /api)
```bash
php artisan install:api
```

### 9. Levantar el servidor
```bash
php artisan serve
```

El proyecto corre en `http://127.0.0.1:8000`

---

## Como funciona el proyecto 

El flujo completo desde que alguien hace una peticion hasta que la base de datos responde es el siguiente:

```
Cliente (navegador, en este caso thunder client)
        |
        | HTTP Request (GET, POST, PUT, DELETE)
        v
routes/api.php          <-- define las rutas y a que controlador van
        |
        v
app/Http/Controllers/   <-- recibe la peticion, valida los datos, llama al modelo
        |
        v
app/Models/             <-- representa la tabla en la base de datos, maneja relaciones
        |
        v
Base de datos MySQL     <-- ejecuta la consulta y devuelve el resultado
        |
        v
Controller              <-- recibe el resultado y lo convierte en JSON
        |
        v
Cliente recibe la respuesta en JSON
```

---

## Estructura de archivos importantes

```
routes/
  api.php                         <-- todas las rutas de la API

app/
  Http/
    Controllers/
      FacultadController.php
      EspecialidadController.php
      PlanEstudiosController.php
      PeriodoAcademicoController.php
      DocenteController.php
      EstudianteController.php
      CursoController.php
      SeccionController.php
      MatriculaController.php
      NotaController.php

  Models/
      Facultad.php
      Especialidad.php
      PlanEstudios.php
      PeriodoAcademico.php
      Docente.php
      Estudiante.php
      Curso.php
      Seccion.php
      Matricula.php
      Nota.php

database/
  migrations/
      create_facultad_table.php
      create_especialidad_table.php
      create_plan_estudios_table.php
      create_periodo_academico_table.php
      create_docente_table.php
      create_estudiante_table.php
      create_curso_table.php
      create_seccion_table.php
      create_matricula_table.php
      create_nota_table.php
      create_users_table.php
      create_sessions_table.php
      create_personal_access_tokens_table.php
      create_password_reset_tokens_table.php
      create_failed_jobs_table.php
```

---

## Que hace cada parte

**Migraciones** — Son archivos PHP que le dicen a Laravel como crear las tablas en la base de datos. En vez de crear las tablas a mano en phpMyAdmin, Laravel las crea automaticamente con `php artisan migrate`. Cada migracion representa una tabla.

**Modelos** — Cada modelo representa una tabla de la base de datos. Desde el modelo puedes consultar, insertar, actualizar y eliminar registros sin escribir SQL. Tambien definen las relaciones entre tablas (un estudiante tiene muchas matriculas, una matricula tiene una nota, etc).

**Controladores** — Reciben la peticion HTTP, validan los datos que llegan, usan el modelo para interactuar con la base de datos y devuelven la respuesta en formato JSON.

**Rutas (api.php)** — Conectan una URL con un controlador. Por ejemplo, cuando alguien hace GET a `/api/facultades`, la ruta le dice a Laravel que ejecute el metodo `index` del `FacultadController`.

---

## Endpoints disponibles

Todos los endpoints siguen el mismo patron para cada entidad: listar, crear, ver uno, actualizar y eliminar.

| Metodo | Ruta | Que hace |
|--------|------|----------|
| GET | /api/facultades | Lista todas las facultades |
| POST | /api/facultades | Crea una facultad nueva |
| GET | /api/facultades/{id} | Muestra una facultad especifica |
| PUT | /api/facultades/{id} | Actualiza una facultad |
| DELETE | /api/facultades/{id} | Elimina una facultad |
| GET | /api/especialidades | Lista especialidades con su facultad |
| POST | /api/especialidades | Crea una especialidad |
| GET | /api/plan-estudios | Lista planes de estudio |
| POST | /api/plan-estudios | Crea un plan de estudios |
| GET | /api/periodos | Lista periodos academicos |
| POST | /api/periodos | Crea un periodo academico |
| GET | /api/docentes | Lista docentes |
| POST | /api/docentes | Crea un docente |
| GET | /api/estudiantes | Lista estudiantes con su especialidad |
| POST | /api/estudiantes | Crea un estudiante |
| GET | /api/cursos | Lista cursos con su plan de estudios |
| POST | /api/cursos | Crea un curso |
| GET | /api/secciones | Lista secciones con curso, docente y periodo |
| POST | /api/secciones | Crea una seccion |
| GET | /api/matriculas | Lista matriculas con estudiante y seccion |
| POST | /api/matriculas | Matricula a un estudiante en una seccion |
| GET | /api/notas | Lista notas con su matricula |
| POST | /api/notas | Registra una nota |
| PUT | /api/notas/{id} | Actualiza una nota |

---

## Base de datos

Las tablas y sus columnas principales son:

| Tabla | Columnas principales |
|-------|---------------------|
| facultad | Codigo, Nombre, Decano |
| especialidad | Codigo, Nombre, Modalidad, Codigo_Facultad |
| plan_estudios | Codigo, Version, Anio, Codigo_Especialidad |
| periodo_academico | Id, Semestre, Fecha_Inicio, Fecha_Fin |
| docente | Codigo, Nombre, Apellidos, Categoria, Email |
| estudiante | Codigo, Nombre, Apellidos, DNI, Direccion, Codigo_Especialidad |
| curso | Codigo, Nombre, Creditos, HorasTeoria, HorasPractica, Codigo_PlanEstudios |
| seccion | Codigo, Nombre, Aforo, Codigo_Curso, Codigo_Docente, Codigo_PeriodoAcademico |
| matricula | Codigo, FechaMatricula, Codigo_Estudiante, Codigo_Seccion, Codigo_PeriodoAcademico |
| nota | Codigo, NotaParcial, NotaFinal, Estado, Codigo_Matricula |
