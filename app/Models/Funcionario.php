<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    use SoftDeletes;
    
    protected $table = 'funcionarios';
    protected $fillable = ['nome', 'setor', 'cargo', 'email'];
    
}
