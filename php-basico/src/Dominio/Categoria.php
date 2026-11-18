<?php

declare(strict_types=1);

namespace App\Dominio;

enum Categoria: string
{
    case Medicamento = 'medicamento';
    case Dispositivo = 'dispositivo';
    case Cosmetico = 'cosmetico';

    public function requiereFormula(): bool
    {
        return match ($this) {
            self::Medicamento => true,
            self::Dispositivo, self::Cosmetico => false,
        };
    }
}