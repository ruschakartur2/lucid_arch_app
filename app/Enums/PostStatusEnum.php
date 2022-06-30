<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

class PostStatusEnum extends Enum
{
    const active = 'Active';
    const draft = 'Draft';
    const close = 'Close';
}
