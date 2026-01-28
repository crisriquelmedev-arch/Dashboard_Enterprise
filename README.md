# 📊 Dashboard Metrics Platform

Plataforma backend profesional para visualización de métricas empresariales en tiempo real, construida con **PHP 8.1**, **MySQL 8**, **Docker** y arquitectura orientada a escalabilidad empresarial.

Este proyecto está diseñado siguiendo **estándares enterprise**, priorizando:

* Seguridad
* Escalabilidad
* Mantenibilidad
* Separación de responsabilidades
* Reproducibilidad del entorno

---

## 🚀 Objetivo del Proyecto

Proveer un **dashboard backend robusto** capaz de:

* Exponer métricas empresariales vía API REST
* Procesar grandes volúmenes de datos
* Servir dashboards en tiempo real
* Soportar múltiples usuarios y roles
* Integrarse con sistemas externos

---

## 🧱 Arquitectura General

```
Client (Browser / Frontend)
        ↓
      Nginx
        ↓
    PHP-FPM 8.1
        ↓
     Application Layer
        ↓
     Domain / Services
        ↓
     Repositories
        ↓
        MySQL
```

---

## 🐳 Infraestructura Docker

El proyecto utiliza **Docker Compose** para garantizar entornos idénticos entre todos los desarrolladores.

### Servicios

| Servicio    | Descripción                   |
| ----------- | ----------------------------- |
| **nginx**   | Reverse proxy y servidor HTTP |
| **php-fpm** | Backend API PHP 8.1           |
| **mysql**   | Base de datos relacional      |

---



## 🔐 Principios de Seguridad

* PHP-FPM ejecutándose como **usuario no root**
* Punto de entrada único (`public/index.php`)
* Acceso web restringido únicamente a `/public`
* Variables sensibles mediante `.env`
* Contenedores aislados por red

---

## ⚙️ Requisitos

* Docker Desktop
* WSL2 (Windows)
* Docker Compose v2+

---



## 🧪 Endpoints iniciales

| Método | Endpoint  | Descripción             |
| ------ | --------- | ----------------------- |
| GET    | `/`       | Estado de la API        |
| GET    | `/health` | Healthcheck del sistema |

---

## 🧠 Estándares de Desarrollo

* PHP 8.1 strict types
* PSR-4 autoloading
* Clean Architecture
* SOLID principles
* Código desacoplado
* Sin frameworks pesados

---

## 📈 Roadmap

### Próximas fases

* [X] Conexión PDO
* [X] Repository Pattern
* [ ] Sistema de autenticación JWT
* [ ] Roles y permisos
* [ ] Métricas en tiempo real
* [ ] WebSockets
* [ ] Redis cache
* [ ] Exportación CSV / Excel / PDF
* [ ] CI/CD con GitHub Actions

---

## 🧑‍💻 Autor

**Cristian**
Backend Developer

---




