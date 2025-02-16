# Prestashop Docker Setup

Este proyecto contiene la configuración necesaria para ejecutar Prestashop 8.1+ con MySQL usando Docker.

## Requisitos previos

- Docker
- Docker Compose

## Configuración

El proyecto incluye:
- Prestashop 8.1+
- MySQL 8.0
- Volúmenes persistentes para la base de datos y archivos de Prestashop

## Instrucciones de uso

1. Clona este repositorio
2. Ejecuta los contenedores:
   ```bash
   docker-compose up -d
   ```
3. Espera unos minutos mientras Prestashop se instala automáticamente
4. Accede a la tienda:
   - Frontend: http://localhost:8080
   - Backend: http://localhost:8080/admin4577

## Credenciales

### Base de datos
- Host: localhost:3306
- Database: prestashop
- Usuario: prestashop
- Contraseña: prestashop

### Prestashop Admin
- La contraseña del admin se mostrará en los logs del contenedor de Prestashop
- Para ver los logs: `docker logs prestashop_app`
