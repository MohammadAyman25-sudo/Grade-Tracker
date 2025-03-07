<?php 
    use Illuminate\Support\Facades\Route;
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
            </style>
        @endif
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-white dark:text-white/50">
            <!-- <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" /> -->
            <div class="relative min-h-screen flex flex-col items-center justify-start selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 lg:grid-cols-2">
                        <div class="flex lg:justify-left lg:col-start-1">
                            <!-- <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z" fill="currentColor"/></svg> -->
                            <a href="{{ route('home') }}">
                                <svg width="169" height="143" viewBox="0 0 169 143" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_102_5)">
                                        <path
                                            d="M28.4137 93.3994C28.4137 92.8427 28.4542 92.3192 28.5353 91.8288C28.6164 91.3251 28.7278 90.8944 28.8697 90.5365C29.0115 90.1654 29.1762 89.8738 29.3637 89.6617C29.5562 89.4364 29.7588 89.3237 29.9716 89.3237H35.8842C36.097 89.3237 36.2971 89.4364 36.4846 89.6617C36.6771 89.8738 36.8443 90.1654 36.9861 90.5365C37.128 90.8944 37.2395 91.3251 37.3205 91.8288C37.4016 92.3192 37.4421 92.8427 37.4421 93.3994V97.0775H35.8842V93.3994H29.9716V113.758H35.8842V106.839H32.9279V102.764H37.4421V113.758C37.4421 114.315 37.4016 114.845 37.3205 115.348C37.2395 115.839 37.128 116.27 36.9861 116.641C36.8443 117.012 36.6771 117.303 36.4846 117.515C36.2971 117.728 36.097 117.834 35.8842 117.834H29.9716C29.7588 117.834 29.5562 117.728 29.3637 117.515C29.1762 117.303 29.0115 117.012 28.8697 116.641C28.7278 116.27 28.6164 115.839 28.5353 115.348C28.4542 114.845 28.4137 114.315 28.4137 113.758V93.3994Z"
                                            fill="#C50000" />
                                        <path
                                            d="M41.5764 100.577V117.834H40.0868V96.66H41.5764V100.398C41.5865 99.8807 41.6321 99.397 41.7132 98.9463C41.7942 98.4824 41.9006 98.0848 42.0323 97.7534C42.1691 97.4088 42.3262 97.1437 42.5035 96.9582C42.6808 96.7594 42.8708 96.66 43.0735 96.66H44.6618C44.8696 96.66 45.0621 96.766 45.2394 96.9781C45.4218 97.1769 45.5814 97.4552 45.7182 97.8131C45.855 98.1577 45.9614 98.5686 46.0374 99.0457C46.1184 99.5229 46.159 100.033 46.159 100.577V104.155H44.6618V100.577H41.5764Z"
                                            fill="black" />
                                        <path
                                            d="M48.0209 108.589C48.0209 108.045 48.0589 107.542 48.1349 107.078C48.216 106.601 48.3223 106.183 48.4541 105.825C48.5909 105.467 48.7505 105.189 48.9329 104.99C49.1152 104.778 49.3078 104.672 49.5104 104.672H53.3711V100.577H48.4845V96.66H53.3711C53.5788 96.66 53.7739 96.766 53.9562 96.9781C54.1386 97.1769 54.2957 97.4552 54.4274 97.8131C54.5642 98.1577 54.6706 98.5686 54.7466 99.0457C54.8277 99.5229 54.8682 100.033 54.8682 100.577V117.834H53.3711V114.255C53.3559 114.745 53.3052 115.209 53.2191 115.647C53.1329 116.084 53.0215 116.468 52.8847 116.8C52.753 117.118 52.601 117.37 52.4287 117.555C52.2565 117.741 52.0741 117.834 51.8815 117.834H49.5104C49.3078 117.834 49.1152 117.734 48.9329 117.535C48.7505 117.323 48.5909 117.045 48.4541 116.7C48.3223 116.342 48.216 115.925 48.1349 115.448C48.0589 114.971 48.0209 114.46 48.0209 113.917V108.589ZM49.5104 113.917H53.3711V108.589H49.5104V113.917Z"
                                            fill="black" />
                                        <path
                                            d="M57.3685 100.577C57.3685 100.033 57.4065 99.5229 57.4825 99.0457C57.5636 98.5686 57.67 98.1577 57.8017 97.8131C57.9385 97.4552 58.0981 97.1769 58.2805 96.9781C58.4629 96.766 58.6554 96.66 58.858 96.66H63.0303V88.5086H64.5274V117.834H63.0303V114.255C63.0151 114.745 62.9644 115.209 62.8783 115.647C62.7922 116.084 62.6807 116.468 62.5439 116.8C62.4122 117.118 62.2602 117.37 62.0879 117.555C61.9157 117.741 61.7333 117.834 61.5407 117.834H58.858C58.6554 117.834 58.4629 117.734 58.2805 117.535C58.0981 117.323 57.9385 117.045 57.8017 116.7C57.67 116.342 57.5636 115.925 57.4825 115.448C57.4065 114.971 57.3685 114.46 57.3685 113.917V100.577ZM58.858 113.917H63.0303V100.577H58.858V113.917Z"
                                            fill="black" />
                                        <path
                                            d="M73.8674 109.245H68.5097V113.917H73.8674V117.834H68.5097C68.307 117.834 68.1145 117.734 67.9321 117.535C67.7497 117.323 67.5901 117.045 67.4533 116.7C67.3216 116.342 67.2152 115.925 67.1341 115.448C67.0581 114.971 67.0201 114.46 67.0201 113.917V100.577C67.0201 100.033 67.0581 99.5229 67.1341 99.0457C67.2152 98.5686 67.3216 98.1577 67.4533 97.8131C67.5901 97.4552 67.7497 97.1769 67.9321 96.9781C68.1145 96.766 68.307 96.66 68.5097 96.66H72.3703C72.578 96.66 72.7731 96.766 72.9555 96.9781C73.1379 97.1769 73.2949 97.4552 73.4266 97.8131C73.5634 98.1577 73.6698 98.5686 73.7458 99.0457C73.8269 99.5229 73.8674 100.033 73.8674 100.577V109.245ZM68.5097 100.577V105.328H72.3703V100.577H68.5097Z"
                                            fill="black" />
                                    </g>
                                    <g filter="url(#filter1_d_102_5)">
                                        <path d="M94.395 89.3237H103.188V93.3994H99.577V117.834H98.0056V93.3994H94.395V89.3237Z" fill="#C50000" />
                                        <path
                                            d="M105.472 100.577V117.834H103.969V96.66H105.472V100.398C105.482 99.8807 105.528 99.397 105.61 98.9463C105.692 98.4824 105.799 98.0848 105.932 97.7534C106.07 97.4088 106.228 97.1437 106.407 96.9582C106.586 96.7594 106.778 96.66 106.982 96.66H108.584C108.794 96.66 108.988 96.766 109.167 96.9781C109.351 97.1769 109.512 97.4552 109.65 97.8131C109.788 98.1577 109.895 98.5686 109.972 99.0457C110.053 99.5229 110.094 100.033 110.094 100.577V104.155H108.584V100.577H105.472Z"
                                            fill="black" />
                                        <path
                                            d="M111.972 108.589C111.972 108.045 112.011 107.542 112.087 107.078C112.169 106.601 112.277 106.183 112.409 105.825C112.547 105.467 112.708 105.189 112.892 104.99C113.076 104.778 113.271 104.672 113.475 104.672H117.369V100.577H112.44V96.66H117.369C117.579 96.66 117.775 96.766 117.959 96.9781C118.143 97.1769 118.302 97.4552 118.435 97.8131C118.573 98.1577 118.68 98.5686 118.757 99.0457C118.838 99.5229 118.879 100.033 118.879 100.577V117.834H117.369V114.255C117.354 114.745 117.303 115.209 117.216 115.647C117.129 116.084 117.016 116.468 116.879 116.8C116.746 117.118 116.592 117.37 116.419 117.555C116.245 117.741 116.061 117.834 115.867 117.834H113.475C113.271 117.834 113.076 117.734 112.892 117.535C112.708 117.323 112.547 117.045 112.409 116.7C112.277 116.342 112.169 115.925 112.087 115.448C112.011 114.971 111.972 114.46 111.972 113.917V108.589ZM113.475 113.917H117.369V108.589H113.475V113.917Z"
                                            fill="black" />
                                        <path
                                            d="M122.904 100.577V113.917H126.798V110.338H128.308V113.917C128.308 114.46 128.267 114.971 128.185 115.448C128.109 115.925 128.001 116.342 127.863 116.7C127.731 117.045 127.572 117.323 127.388 117.535C127.204 117.734 127.007 117.834 126.798 117.834H122.904C122.699 117.834 122.505 117.734 122.321 117.535C122.137 117.323 121.976 117.045 121.838 116.7C121.705 116.342 121.598 115.925 121.516 115.448C121.44 114.971 121.401 114.46 121.401 113.917V100.577C121.401 100.033 121.44 99.5229 121.516 99.0457C121.598 98.5686 121.705 98.1577 121.838 97.8131C121.976 97.4552 122.137 97.1769 122.321 96.9781C122.505 96.766 122.699 96.66 122.904 96.66H126.798C127.007 96.66 127.204 96.766 127.388 96.9781C127.572 97.1769 127.731 97.4552 127.863 97.8131C128.001 98.1577 128.109 98.5686 128.185 99.0457C128.267 99.5229 128.308 100.033 128.308 100.577V104.155H126.798V100.577H122.904Z"
                                            fill="black" />
                                        <path
                                            d="M136.227 117.834L132.333 108.788V117.834H130.83V88.5086H132.333V105.01L135.912 96.66H138.036L133.651 106.879L138.35 117.834H136.227Z"
                                            fill="black" />
                                        <path
                                            d="M146.353 109.245H140.949V113.917H146.353V117.834H140.949C140.744 117.834 140.55 117.734 140.366 117.535C140.182 117.323 140.021 117.045 139.883 116.7C139.75 116.342 139.643 115.925 139.561 115.448C139.485 114.971 139.446 114.46 139.446 113.917V100.577C139.446 100.033 139.485 99.5229 139.561 99.0457C139.643 98.5686 139.75 98.1577 139.883 97.8131C140.021 97.4552 140.182 97.1769 140.366 96.9781C140.55 96.766 140.744 96.66 140.949 96.66H144.843C145.052 96.66 145.249 96.766 145.433 96.9781C145.617 97.1769 145.776 97.4552 145.908 97.8131C146.046 98.1577 146.154 98.5686 146.23 99.0457C146.312 99.5229 146.353 100.033 146.353 100.577V109.245ZM140.949 100.577V105.328H144.843V100.577H140.949Z"
                                            fill="black" />
                                        <path
                                            d="M150.378 100.577V117.834H148.875V96.66H150.378V100.398C150.388 99.8807 150.434 99.397 150.516 98.9463C150.597 98.4824 150.705 98.0848 150.838 97.7534C150.976 97.4088 151.134 97.1437 151.313 96.9582C151.492 96.7594 151.683 96.66 151.888 96.66H153.49C153.699 96.66 153.894 96.766 154.072 96.9781C154.256 97.1769 154.417 97.4552 154.555 97.8131C154.693 98.1577 154.801 98.5686 154.877 99.0457C154.959 99.5229 155 100.033 155 100.577V104.155H153.49V100.577H150.378Z"
                                            fill="black" />
                                    </g>
                                    <path
                                        d="M34.7255 57.9062V51.44H36.3707C36.8985 51.44 37.3149 51.4928 37.6199 51.5984C37.9307 51.704 38.1595 51.8389 38.3061 52.0031C38.4586 52.1673 38.5583 52.3403 38.6052 52.5221C38.6521 52.704 38.6756 52.874 38.6756 53.0324C38.6756 53.2025 38.6492 53.3814 38.5964 53.569C38.5495 53.7509 38.4674 53.9209 38.3501 54.0793C38.2328 54.2318 38.0715 54.355 37.8662 54.4488C38.3061 54.5602 38.617 54.7538 38.7988 55.0294C38.9864 55.2992 39.0803 55.6013 39.0803 55.9356C39.0803 56.1643 39.0539 56.396 39.0011 56.6306C38.9483 56.8652 38.8369 57.0792 38.6668 57.2728C38.5026 57.4605 38.2533 57.613 37.919 57.7303C37.5847 57.8476 37.136 57.9062 36.573 57.9062H34.7255ZM35.6932 54.1849H36.529C36.834 54.1849 37.0686 54.135 37.2328 54.0353C37.397 53.9297 37.5114 53.7948 37.5759 53.6306C37.6463 53.4664 37.6815 53.2934 37.6815 53.1116C37.6815 52.9591 37.6463 52.8213 37.5759 52.6981C37.5114 52.5691 37.3912 52.4664 37.2152 52.3902C37.0451 52.3139 36.8017 52.2758 36.485 52.2758H35.6932V54.1849ZM35.6932 57.0792H36.705C37.0041 57.0792 37.2416 57.0441 37.4176 56.9737C37.5994 56.9033 37.7372 56.8124 37.831 56.7009C37.9249 56.5895 37.9865 56.4693 38.0158 56.3403C38.0451 56.2054 38.0598 56.0734 38.0598 55.9444C38.0598 55.6394 37.9571 55.4019 37.7519 55.2318C37.5466 55.0558 37.224 54.9678 36.7841 54.9678H35.6932V57.0792Z"
                                        fill="#FF0000" />
                                    <path
                                        d="M41.3812 57.0968V55.4781H39.7185V54.6687H41.3812V53.05H42.2346V54.6687H43.9061V55.4781H42.2346V57.0968H41.3812Z"
                                        fill="#FF0000" />
                                    <path d="M44.2267 58.7156L46.1269 50.6307H46.9803L45.08 58.7156H44.2267Z" fill="#FF0000" />
                                    <path d="M47.5675 56.1203V55.2758H50.5851V56.1203H47.5675Z" fill="#FF0000" />
                                    <path
                                        d="M48.9185 74.0964C48.4024 74.0964 47.942 74.0084 47.5373 73.8325C47.1385 73.6565 46.7983 73.4161 46.5168 73.1111C46.2411 72.8002 46.03 72.4483 45.8834 72.0554C45.7426 71.6566 45.6722 71.2343 45.6722 70.7885C45.6722 70.3017 45.7514 69.856 45.9098 69.4513C46.074 69.0466 46.3027 68.6977 46.596 68.4044C46.8892 68.1053 47.2382 67.8736 47.6429 67.7094C48.0476 67.5452 48.4933 67.4631 48.9801 67.4631C49.2968 67.4631 49.5783 67.4953 49.8247 67.5598C50.071 67.6244 50.2733 67.6977 50.4317 67.7798C50.59 67.856 50.6897 67.9176 50.7308 67.9645L50.2997 68.8443C50.1414 68.7035 49.9449 68.5892 49.7103 68.5012C49.4816 68.4132 49.2118 68.3692 48.9009 68.3692C48.4962 68.3692 48.1297 68.4689 47.8012 68.6683C47.4787 68.8677 47.2206 69.1493 47.0271 69.5129C46.8394 69.8765 46.7455 70.3076 46.7455 70.8061C46.7455 71.246 46.8276 71.6478 46.9919 72.0114C47.1561 72.3691 47.3966 72.6565 47.7133 72.8735C48.0358 73.0905 48.4259 73.199 48.8833 73.199C49.1355 73.199 49.3819 73.1668 49.6223 73.1023C49.8686 73.0319 50.1208 72.9175 50.3789 72.7592L50.6692 73.5949C50.593 73.6653 50.4639 73.7416 50.2821 73.8237C50.1003 73.8999 49.8892 73.9644 49.6487 74.0172C49.4141 74.07 49.1707 74.0964 48.9185 74.0964Z"
                                        fill="#FF0000" />
                                    <path
                                        d="M52.1204 73.2254V71.6067H50.4577V70.7973H52.1204V69.1786H52.9738V70.7973H54.6453V71.6067H52.9738V73.2254H52.1204Z"
                                        fill="#FF0000" />
                                    <path d="M54.9658 74.8442L56.8661 66.7593H57.7195L55.8192 74.8442H54.9658Z" fill="#FF0000" />
                                    <path d="M58.3067 72.2489V71.4044H61.3242V72.2489H58.3067Z" fill="#FF0000" />
                                    <path
                                        d="M48.2961 35.3026H48.3929L51.5072 41.7776H50.3723L49.8181 40.5108H46.8533L46.2991 41.7776H45.1994L48.2961 35.3026ZM48.3401 37.1765L47.953 38.0563L47.2492 39.6222H49.431L48.736 38.0651L48.3577 37.1765H48.3401Z"
                                        fill="#FF0000" />
                                    <path
                                        d="M53.0515 40.9682V39.3495H51.3888V38.5401H53.0515V36.9214H53.9049V38.5401H55.5764V39.3495H53.9049V40.9682H53.0515Z"
                                        fill="#FF0000" />
                                    <path d="M55.897 42.587L57.7972 34.5021H58.6506L56.7503 42.587H55.897Z" fill="#FF0000" />
                                    <path d="M59.2378 39.9917V39.1472H62.2553V39.9917H59.2378Z" fill="#FF0000" />
                                    <g filter="url(#filter2_d_102_5)">
                                        <path
                                            d="M67.7572 79.4089C64.2441 81.4372 60.6517 82.6929 56.9801 83.176C53.3509 83.6347 49.8338 83.4079 46.4288 82.4955C43.0417 81.5164 39.9002 79.8875 37.0045 77.6089C34.1266 75.2635 31.6857 72.3554 29.6818 68.8846C27.7024 65.4561 26.4744 61.9606 25.9978 58.3981C25.5212 54.8356 25.7513 51.3731 26.6881 48.0104C27.6249 44.6477 29.2448 41.5397 31.5479 38.6862C33.8265 35.7904 36.7224 33.3284 40.2356 31.3001C42.9868 29.7116 45.5038 28.5971 47.7864 27.9565C50.0869 27.2491 52.0008 26.8495 53.5281 26.7579C55.0732 26.5994 56.1129 26.5918 56.647 26.7349L57.2991 34.3159C56.8562 34.233 56.0437 34.1941 54.8615 34.1994C53.6794 34.2047 52.162 34.46 50.3092 34.9653C48.4987 35.4462 46.3448 36.4076 43.8475 37.8494C40.3767 39.8533 37.8537 42.3258 36.2785 45.267C34.6788 48.1658 33.9561 51.2638 34.1102 54.561C34.2643 57.8581 35.2333 61.0517 37.0172 64.1415C39.0944 67.7393 41.659 70.5196 44.711 72.4823C47.7386 74.4027 50.9531 75.425 54.3546 75.5493C57.7316 75.6312 61.0074 74.7558 64.1819 72.923C66.002 71.8722 67.7088 70.5764 69.3024 69.0355C70.9383 67.4702 72.0946 65.7586 72.7714 63.9005L67.5662 54.8848L57.9791 60.4199L54.2035 53.8804L70.838 44.2765L81.395 62.5617C81.0246 65.1459 79.7278 67.9828 77.5046 71.0723C75.2814 74.1618 72.0322 76.9407 67.7572 79.4089Z"
                                            fill="black" />
                                        <circle cx="54.5103" cy="54.7156" r="25.8362" fill="white" fill-opacity="0.2" stroke="black" stroke-width="6" />
                                        <path
                                            d="M88.8978 121.664L65.5477 81.2206L53.6115 88.112L50.0192 81.8899L81.0661 63.965L84.6584 70.1871L72.5952 77.1518L95.9452 117.595L88.8978 121.664Z"
                                            fill="black" />
                                    </g>
                                    <line x1="50.3906" y1="83.0027" x2="81.6706" y2="64.6746" stroke="white" stroke-width="2" />
                                    <defs>
                                        <filter id="filter0_d_102_5" x="28.4137" y="88.5086" width="59.4537" height="42.325"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                result="hardAlpha" />
                                            <feOffset dx="9" dy="8" />
                                            <feGaussianBlur stdDeviation="2.5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_102_5" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_102_5" result="shape" />
                                        </filter>
                                        <filter id="filter1_d_102_5" x="94.395" y="88.5086" width="74.605" height="42.325" filterUnits="userSpaceOnUse"
                                            color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                result="hardAlpha" />
                                            <feOffset dx="9" dy="8" />
                                            <feGaussianBlur stdDeviation="2.5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_102_5" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_102_5" result="shape" />
                                        </filter>
                                        <filter id="filter2_d_102_5" x="25.674" y="25.8793" width="84.2712" height="108.785"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                result="hardAlpha" />
                                            <feOffset dx="9" dy="8" />
                                            <feGaussianBlur stdDeviation="2.5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_102_5" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_102_5" result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black text-2xl font-bold ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] light:text-black light:hover:text-black/80 light:focus-visible:ring-black"
                                    >
                                        Dashboard
                                    </a>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button class="rounded-md px-3 py-2 text-2xl text-black font-bold ring-1 ring-transparent transition hover:text-black/70
                                         focus:outline-none focus-visible:ring-[#FF2D20] light:text-black light:hover:text-black/80 
                                         light:focus-visible:ring-black">
                                            Log out
                                        </button>
                                    </form>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black text-2xl font-bold ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] light:text-black light:hover:text-black/80 light:focus-visible:ring-black"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register', ["id" => "0"]) }}"
                                            class="rounded-md px-3 py-2 text-black text-2xl font-bold ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] light:text-black light:hover:text-black/80 light:focus-visible:ring-black"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                                    </nav>
                        @endif
                    </header>
                    @if(session("error") !== null)
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                            <span class="font-medium">{{ session(key: 'error') }}</span>
                        </div>
                    @endif
                    <main class="mt-6 flex flex-col items-center">
                        <div class="greetings">
                            <h1 class="mb-4 text-5xl font-black text-center tracking-tight text-gray-900 md:text-5xl lg:text-7xl">Welcome to Grade Tracker</h1>
                            <h1 class="mb-4 text-5xl font-black
                             text-center tracking-tight
                              text-gray-900 md:text-5xl lg:text-7xl">
                              <span class="text-transparent bg-clip-text bg-gradient-to-r to-orange-600 from-yellow-400">Your Collegue Who'll Send You Your Grades As Soon As They Are Published</span>
                            </h1>
                        </div>
                        <p class="mb-3 text-lg dark:text-gray-600 text-center">No need to go to your college or visit thier site and waste your time</p>
                        <p class="mb-3 text-lg dark:text-gray-600 text-center">just give use your college credintials and let us handle it</p>
                        @auth
                            <a 
                                href="{{ route('college-credentials') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg font-semibold text-2xl px-10 py-5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Get Started
                            </a>
                        @else
                            <a 
                                href="{{ route('register', ["id" => "1"]) }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg font-semibold text-2xl px-10 py-5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Get Started
                            </a>
                        @endauth
                    </main>

                    <!-- <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    </footer> -->
                </div>
            </div>
        </div>
    </body>
</html>
