<?php

namespace App\View\Components;

use App\Enums\FeatureAction;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class FeatureTitle extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $splittedTitle = $this->splitByFirstWord($this->title);

        $translatedAction = match ($splittedTitle['firstWord']) {
            'Add' => FeatureAction::ADD->label(),
            'Fix' => FeatureAction::FIX->label(),
            'Improve' => FeatureAction::IMPROVE->label(),
            default => '',
        };

        $translatedActionTitle = $translatedAction.$splittedTitle['remainingText'];

        return view('components.feature-title', ['label' => $translatedActionTitle]);
    }

    private function splitByFirstWord(string $string): array
    {
        $positionOfFirstSpace = Str::position($string, ' ');

        $firstWord = Str::substr($string, 0, $positionOfFirstSpace);
        $remainingText = Str::substr($string, $positionOfFirstSpace);

        return [
            'firstWord' => $firstWord,
            'remainingText' => $remainingText,
        ];
    }
}
