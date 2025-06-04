<?php

namespace App\Enums;

enum FeatureAction: string
{
    case ADD = 'Add';
    case FIX = 'Fix';
    case IMPROVE = 'Improve';

    public function label(): string
    {
        return match ($this) {
            self::ADD => __('features-app.actions.add'),
            self::FIX => __('features-app.actions.fix'),
            self::IMPROVE => __('features-app.actions.improve'),
            default => $this->value,
        };
    }
}
