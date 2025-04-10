<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'symbol',
        'type',
        'direction',
        'entry_price',
        'exit_price',
        'amount',
        'profit',
        'status',
        'entry_date',
        'exit_date',
        'trader_name',
        'notes'
    ];

    protected $casts = [
        'entry_date' => 'datetime',
        'exit_date' => 'datetime',
        'entry_price' => 'float',
        'exit_price' => 'float',
        'amount' => 'float',
        'profit' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSymbolIconAttribute()
    {
        $symbol = strtoupper($this->symbol);
        $symbol = str_replace('USD', '', $symbol);

        //return "https://s3-symbol-logo.tradingview.com/crypto/XTVC{$symbol}--big.svg";
        return "https://s3-symbol-logo.tradingview.com/crypto/XTVCBTC--big.svg";
    }

    public function getFormattedProfitAttribute()
    {
        return number_format($this->profit, 2) . ' USD';
    }

    public function getFormattedAmountAttribute()
    {
        return number_format($this->amount, 2);
    }
}
