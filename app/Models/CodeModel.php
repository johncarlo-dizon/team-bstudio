<?php
namespace App\Models;

use CodeIgniter\Model;

class CodeModel extends Model
{
    protected $table = 'template';  
    protected $primaryKey = 'id';
    protected $allowedFields = ['tempemail', 'code_content', 'created_at', 'tempname'];
}
