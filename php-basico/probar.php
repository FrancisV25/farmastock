<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Dominio\Categoria;

// 1. Recorrer todos los casos del enum
foreach (Categoria::cases() as $categoria) {
    printf(
        "%-12s -> requiere fórmula: %s%s",
        $categoria->value,
        $categoria->requiereFormula() ? 'Sí' : 'No',
        PHP_EOL,
    );
}

// 2. Convertir texto (como vendría de la BD) a enum
$desdeBaseDeDatos = Categoria::from('medicamento');
echo PHP_EOL . 'Desde BD: ' . $desdeBaseDeDatos->name . PHP_EOL;

// 3. Un valor que no existe
$invalida = Categoria::tryFrom('medicamneto');
echo 'Valor con error de tipeo: ' . ($invalida === null ? 'null (no existe)' : $invalida->name) . PHP_EOL;