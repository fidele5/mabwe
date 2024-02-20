<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAd extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'image_path',
        'title',
        'expire_at'
    ];

    /**
     * Get the company that owns the CompanyAd
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
