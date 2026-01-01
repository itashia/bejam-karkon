<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        @php
         $settings = \App\Models\Setting::getSettings();

            $pageTitle = isset($title) ? $title . ' - ' . $settings->site_name : $settings->site_name;
        @endphp
        <x-seo-meta
            :title="$pageTitle"
            :description="$description ?? $settings->site_description"
            :keywords="$keywords ?? $settings->site_keywords"
            :ogImage="$ogImage ?? $settings->og_image"
            :canonical="$canonical ?? url()->current()"
        />
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        @if(isset($styles))
            {{ $styles }}
        @endif
        @livewireStyles
    </head>
    <body class="font-main antialiased bg-gray-50">

        {{ $slot }}
        
        @foreach($settings->custom_js ?? [] as $js)
        @if(isset($js['position']) && $js['position'] === 'body' && isset($js['code']))
        <script>
        {!! $js['code'] !!}
        </script>
        @endif
        @endforeach
        
        @if(isset($scripts))
            {{ $scripts }}
        @endif

        @livewireScripts
    </body>
</html>