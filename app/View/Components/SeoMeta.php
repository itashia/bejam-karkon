<?php

namespace App\View\Components;

use App\Models\Setting;
use Illuminate\View\Component;

class SeoMeta extends Component
{
    public Setting $settings;
    public function __construct(

    ) {
        $this->settings = Setting::getSettings();
    }

    public function render()
    {
        return view('components.seo-meta');
    }
}
