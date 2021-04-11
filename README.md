# Aplicación para puesto de desarrollador backend
- Esta aplicación fue realizada como challenge.
- Puede probar la aplicación en el siguiente link [EstoEsChallenge](http://estoeschallenge.codesolutions.com.ar)

## Instalación
### Clonar el repositorio
```bash
git clone https://github.com/BrunoContartese1/estoeschallenge
```
### Crear el archivo .env
```bash
cp .env.example .env
```
### Configurar el archivo .env colocando la dirección URL y sus credenciales para conectarse a la base de datos
### Generar la clave de aplicación
```bash
php artisan key:generate
```
### Migrar las tablas de la base de datos junto con los datos iniciales.
```bash
php artisan migrate --seed
```

### Luego de los pasos anteriores ingresar con el navegador web a la URL (Ej: estoeschallenge.codesolutions.com.ar) y probar la API.
