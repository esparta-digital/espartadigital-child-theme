# Esparta Digital - Child Theme
Este tema hijo hereda del framework base personalizado (fork de Underscores) y está diseñado para servir como capa de presentación y personalización por proyecto dentro del ecosistema de Esparta Digital.

## Características
- Sobrecarga de estilos personalizados
- Eliminación de dependencias innecesarias del core
- Optimización de rendimiento para uso con Elementor y WooCommerce
- Preparado para despliegues en producción con políticas de rendimiento exigentes (Core Web Vitals)

## Estructura base
- `style.css`: Define los metadatos del child theme y hereda del tema padre.
- `functions.php`: Gestiona las colas de estilos y scripts, elimina bloat innecesario de WordPress.

## Requisitos
- WordPress 6.x
- PHP 8.0 o superior
- Tema padre activo: Esparta Digital Base Theme (fork de Underscores)

## Mantenimiento
Este child theme debe mantenerse desacoplado del core y contener solo lógica específica del proyecto/cliente. Toda lógica reusable debe mantenerse en el parent theme o como plugin MU.