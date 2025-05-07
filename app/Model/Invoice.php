<?php

namespace App\Model;

use PDO;
use App\Enums\InvoiceStatus;
use RuntimeException;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = "invoices";
}