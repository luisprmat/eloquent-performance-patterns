<?php

namespace App\Enums;

enum FeatureStatus: string
{
    case REQUESTED = 'Requested';
    case APPROVED = 'Approved';
    case COMPLETED = 'Completed';

    public function bgColor(): string
    {
        return match ($this) {
            self::REQUESTED => 'bg-orange-100',
            self::APPROVED => 'bg-blue-100',
            self::COMPLETED => 'bg-green-100',
            default => 'bg-gray-100',
        };
    }

    public function textColor(): string
    {
        return match ($this) {
            self::REQUESTED => 'text-orange-700',
            self::APPROVED => 'text-blue-700',
            self::COMPLETED => 'text-green-800',
            default => 'text-gray-700',
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::REQUESTED => __('features-app.status.requested'),
            self::APPROVED => __('features-app.status.approved'),
            self::COMPLETED => __('features-app.status.completed'),
            default => $this->value,
        };
    }
}
