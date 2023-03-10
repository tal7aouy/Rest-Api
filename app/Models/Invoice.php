<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = ['amount', 'status', 'billed_date', 'paid_date', 'customer_id'];
    protected $primaryKey = "invoice_id";
    protected $keyType = "string";
    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
}
