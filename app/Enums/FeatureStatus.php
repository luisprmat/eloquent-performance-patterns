<?php

namespace App\Enums;

enum FeatureStatus: string
{
    case REQUESTED = 'Requested';
    case PLANNED = 'Planned';
    case COMPLETED = 'Completed';
}
