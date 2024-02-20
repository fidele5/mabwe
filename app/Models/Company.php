<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description", 
        "company_type_id",
    ];

    /**
     * Get all of the ads for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ads()
    {
        return $this->hasMany(CompanyAd::class);
    }

    /**
     * Get the company_type that owns the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company_type()
    {
        return $this->belongsTo(CompanyType::class);
    }
    
    /**
     * Get all of the images for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(CompanyImage::class);
    }
}
