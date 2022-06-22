<?php

namespace Comment\Models;

use Illuminate\Database\Eloquent\Model;

class CommentSetup extends Model
{
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
