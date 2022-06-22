<?php

namespace Pondit\PonditCommerce\PonditCommerceTemplate\Models;

use Illuminate\Database\Eloquent\Model;

class PonditCommerceTemplate extends Model
{
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
