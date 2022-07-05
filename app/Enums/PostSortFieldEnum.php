<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

class PostSortFieldEnum extends Enum
{
    const created_at = 'By date';
    const status_sort = 'By status';
}
