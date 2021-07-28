<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalCertificate extends Model
{
    protected $primaryKey = 'certificate_id';

    public $timestamps = false;

    protected $fillable = [
        'certificate_title',
        'certificate_abbrev',
        'certificate_rating',
    ];
}
