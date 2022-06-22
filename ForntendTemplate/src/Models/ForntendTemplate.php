<?php

namespace Pondit\PonditCommerce\ForntendTemplate\Models;

use Illuminate\Database\Eloquent\Model;

class ForntendTemplate extends Model
{
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
