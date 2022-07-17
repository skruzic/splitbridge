<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{
    use NodeTrait, HasFactory;

    protected $fillable = ['title', 'uri'];

    public function isActive()
    {
        $nodes = Menu::descendantsAndSelf($this->id);

        foreach ($nodes as $node) {
            if (Request::is($node->uri)) {
                return true;
            }
        }

        return false;
    }
}
