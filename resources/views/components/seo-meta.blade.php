
<title>{{ $title ?? $settings->site_title ?? $settings->site_name }}</title>
<meta name="description" content="{{ $description ?? $settings->site_description }}">
<meta name="keywords" content="{{ $keywords ?? $settings->site_keywords }}">
<meta name="author" content="{{ $author ?? $settings->site_name }}">
<meta name="robots" content="{{ $robots ?? 'index, follow' }}">
<meta name="language" content="{{ $settings->site_language }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ $canonical ?? url()->current() }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ $ogType ?? $settings->og_type }}">
<meta property="og:url" content="{{ $ogUrl ?? url()->current() }}">
<meta property="og:title" content="{{ $ogTitle ?? $title ?? $settings->site_title }}">
<meta property="og:description" content="{{ $ogDescription ?? $description ?? $settings->site_description }}">
<meta property="og:image" content="{{ $ogImage ?? $settings->og_image }}">
<meta property="og:locale" content="{{ $settings->og_locale }}">
<meta property="og:site_name" content="{{ $settings->site_name }}">

@if($settings->facebook_app_id)
<meta property="fb:app_id" content="{{ $settings->facebook_app_id }}">
@endif

<!-- Twitter -->
<meta name="twitter:card" content="{{ $twitterCard ?? $settings->twitter_card }}">
<meta name="twitter:url" content="{{ $twitterUrl ?? url()->current() }}">
<meta name="twitter:title" content="{{ $twitterTitle ?? $title ?? $settings->site_title }}">
<meta name="twitter:description" content="{{ $twitterDescription ?? $description ?? $settings->site_description }}">
<meta name="twitter:image" content="{{ $twitterImage ?? $settings->og_image }}">

@if($settings->twitter_site)
<meta name="twitter:site" content="{{ $settings->twitter_site }}">
@endif

@if($settings->twitter_creator)
<meta name="twitter:creator" content="{{ $settings->twitter_creator }}">
@endif

<!-- Site Verification -->
@if($settings->google_site_verification)
<meta name="google-site-verification" content="{{ $settings->google_site_verification }}">
@endif

@if($settings->bing_site_verification)
<meta name="msvalidate.01" content="{{ $settings->bing_site_verification }}">
@endif

@if($settings->yandex_site_verification)
<meta name="yandex-verification" content="{{ $settings->yandex_site_verification }}">
@endif

<!-- Favicons -->
@if($settings->logo_favicon)
<link rel="icon" type="image/x-icon" href="{{ asset($settings->logo_favicon) }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset($settings->logo_favicon) }}">
@endif

@if($settings->logo_apple_touch)
<link rel="apple-touch-icon" href="{{ asset($settings->logo_apple_touch) }}">
@endif

<!-- Theme Color -->
<meta name="theme-color" content="{{ $themeColor ?? '#3b82f6' }}">
<meta name="msapplication-TileColor" content="{{ $themeColor ?? '#3b82f6' }}">

<!-- Additional Meta Tags -->
@foreach($settings->meta_tags ?? [] as $meta)
<meta {!! $meta !!}>
@endforeach

<!-- Schema Markup -->
@foreach($settings->schema_markup ?? [] as $schema)
<script type="application/ld+json">
{!! json_encode($schema) !!}
</script>
@endforeach

<!-- Google Analytics -->
@if($settings->google_analytics && !app()->environment('local'))
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings->google_analytics }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{ $settings->google_analytics }}');
</script>
@endif

<!-- Google Tag Manager -->
@if($settings->google_tag_manager && !app()->environment('local'))
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','{{ $settings->google_tag_manager }}');</script>
@endif

<!-- Facebook Pixel -->
@if($settings->facebook_pixel && !app()->environment('local'))
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '{{ $settings->facebook_pixel }}');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id={{ $settings->facebook_pixel }}&ev=PageView&noscript=1"
/></noscript>
@endif

<!-- Custom CSS -->
@foreach($settings->custom_css ?? [] as $css)
<style>
{!! $css !!}
</style>
@endforeach

<!-- Custom JS (Head) -->
@foreach($settings->custom_js ?? [] as $js)
@if($js['position'] === 'head')
<script>
{!! $js['code'] !!}
</script>
@endif
@endforeach<div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
</div>