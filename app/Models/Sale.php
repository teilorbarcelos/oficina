<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Sale extends Model
{
    use HasFactory;
    use Sortable;

    protected $casts = [
        'prods' => 'array',
        'amountprods' => 'array',
        'subtprods' => 'array'
    ];

    public $sortable = [
        'id',
        'client',
        'vtotal',
        'created_at'
    ];
}
