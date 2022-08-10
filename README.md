
# Project Title

A brief description of what this project does and who it's for

# Reto BACKBONE

## Acerca de como lo resolví

Para desarrollar el ejercicio hice lo siguiente:

- Primero analicé la data para entender como se componia
- Luego inicie el proyecto en laravel
- Construí los componentes (controller, routes, models, migrations)
- Apliqué recursividad para poder alimentar un array de datos segun la estructura deseada
- Para incrementar el rendimiento, agregué indices en la base de datos


```sql
CREATE TABLE zip_codes (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `d_codigo` int(11) NOT NULL,
  `d_asenta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_tipo_asenta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_mnpio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_ciudad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_CP` int(11) NOT NULL,
  `c_estado` int(11) NOT NULL,
  `c_oficina` int(11) NOT NULL,
  `c_CP` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_tipo_asenta` int(11) NOT NULL,
  `c_mnpio` int(11) NOT NULL,
  `id_asenta_cpcons` int(11) NOT NULL,
  `d_zona` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_cve_ciudad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_codigo` (`d_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=1498024 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

```

- Y tambien, separé la recursividad para poder tener en el primer foreach la cabecera del array y luego el resto del cuerpo en otro array.

Alberto Sanchez S.

Saludos
