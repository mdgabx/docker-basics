<?php

declare(strict_types=1);

namespace App\Enums;

enum InvoiceStatus: int
{
    case Pending = 0;
    case Paid = 1;
    case Void = 2;
    case Failed = 3;

    // public const PENDING = 0;
    // public const PAID = 1;
    // public const VOID = 2;
    // public const FAILED = 3;

    // public static function all(): array
    // {
    //     return [
    //         self::PAID,
    //         self::FAILED,
    //         self::PENDING,
    //         self::VOID,
    //     ];
    // }

    public function toString():string
    {
        return match($this) {
            self::Paid => 'Paid',
            self::Void => 'Void',
            self::Failed => 'Failed',
            default => 'Pending',
        };
    }

    
    public function color(): string
    {
        return match($this) {
            self::Paid => 'green',
            self::Void => 'red',
            self::Failed => 'gray',
            default => 'orange',
        };
    }
}