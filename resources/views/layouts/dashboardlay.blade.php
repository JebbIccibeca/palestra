<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
    <link rel="shortcut icon" href="dist/images/logo.svg" />
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<body class="is-boxed has-animations">
    <div class="body-wrap">
        <header class="site-header">
            <div class="w-full text-gray-700 bg-transparent dark-mode:text-gray-200 dark-mode:bg-gray-800">
                <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                  <div class="p-4 flex flex-row items-center justify-between">
                    <a href="/" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                        <img src="dist/images/full_logo.svg" alt="Logo" style="width: 150px">
                    </a>
                    <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                      <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                      </svg>
                    </button>
                  </div>






                  <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-start md:flex-row">
                    <div class="lg:mt-3 mt-0">
                        <a href="/" class="button bg-blue-500 hover:bg-blue-600 lg:my-0 my-2 lg:mr-2">Corsi</a>
                        <a href="/abbonamenti" class="button bg-blue-500 hover:bg-blue-600 my-2">Abbonamenti</a>
                    </div>
                    <div :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row lg:my-5" style="z-index: 60">
                        @php
                            use App\Models\abbonamento;
                            if (Auth::check()) {
                                $user = Auth::user()->id;
                                $abbon = abbonamento::select('id_abbo')->where('abbonamenti.id_utente','=', $user)->get();
                            }else{
                                $abbon = NULL;
                            }
                        @endphp

                        @if (Route::has('login'))

                                @auth
                                @if (Auth::user()->hasRole('user'))
                                    <a href="/carrello" class="button bg-blue-500 hover:bg-blue-600 inline-block lg:mr-3 lg:mt-0 mt-5 ">Carrello<svg class=" inline-block" width="25px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
                                        <g><path d="M186.1,132.5H40.6c-16.9,0-30.6-13.7-30.6-30.6C10,85,23.7,71.3,40.6,71.3h145.5c16.9,0,30.6,13.7,30.6,30.6C216.7,118.8,203,132.5,186.1,132.5L186.1,132.5z M844.5,775.6H346.9c-16.9,0-30.6-13.7-30.6-30.6c0-16.9,13.7-30.6,30.6-30.6h497.7c16.9,0,30.6,13.7,30.6,30.6C875.2,761.9,861.4,775.6,844.5,775.6L844.5,775.6z M959.4,255H232c-16.9,0-30.6-13.7-30.6-30.6c0-16.9,13.7-30.6,30.6-30.6h727.3c16.9,0,30.6,13.7,30.6,30.6C990,241.3,976.3,255,959.4,255L959.4,255z M911.5,438.8H279.9c-16.9,0-30.6-13.7-30.6-30.6c0-16.9,13.7-30.6,30.6-30.6h631.6c16.9,0,30.6,13.7,30.6,30.6C942.1,425,928.4,438.8,911.5,438.8L911.5,438.8z M867.5,622.5H327.7c-16.9,0-30.6-13.7-30.6-30.6c0-16.9,13.7-30.6,30.6-30.6h539.8c16.9,0,30.6,13.7,30.6,30.6C898.1,608.8,884.4,622.5,867.5,622.5L867.5,622.5z M588,618.7c-16.9,0-30.6-13.7-30.6-30.6V258.8c0-16.9,13.7-30.6,30.6-30.6c16.9,0,30.6,13.7,30.6,30.6V588C618.7,605,605,618.7,588,618.7L588,618.7z M798.8,236.8l-39.2,326.9c-2,16.8-17.3,28.8-34.1,26.8c-16.8-2-28.8-17.3-26.8-34L738,229.6c2-16.8,17.3-28.8,34.1-26.8C788.9,204.8,800.8,220.1,798.8,236.8L798.8,236.8z M988.3,232.6l-88.3,356c-4,16.4-20.6,26.5-37.1,22.4c-16.4-4-26.5-20.6-22.4-37.1l88.3-356c4-16.4,20.6-26.5,37.1-22.4C982.3,199.6,992.3,216.2,988.3,232.6L988.3,232.6z M451.5,595.2c-16.8,2.2-32.1-9.7-34.3-26.5l-39.4-307.6c-2.2-16.8,9.7-32.1,26.5-34.3c16.8-2.2,32.1,9.7,34.3,26.5L478,560.9C480.1,577.7,468.3,593,451.5,595.2L451.5,595.2z M352.6,768.4c-16.5,4.1-33.1-5.9-37.2-22.3L158,115.5c-4.1-16.4,5.9-33,22.4-37.1c16.5-4.1,33.1,5.9,37.2,22.3l157.3,630.6C379,747.7,369,764.4,352.6,768.4L352.6,768.4z M400.5,928.7c-33.8,0-61.2-27.4-61.2-61.2c0-33.8,27.4-61.3,61.2-61.3c33.8,0,61.2,27.4,61.2,61.3C461.7,901.3,434.3,928.7,400.5,928.7L400.5,928.7z M775.6,928.7c-33.8,0-61.2-27.4-61.2-61.2c0-33.8,27.4-61.3,61.2-61.3c33.8,0,61.3,27.4,61.3,61.3C836.9,901.3,809.4,928.7,775.6,928.7L775.6,928.7z"/></g>
                                    </svg></a>
                                    <button class=" bg-blue-500 hover:bg-blue-600 inline-block rounded-sm h-7 lg:mr-0 lg:mt-0 mt-3">
                                        <a href="/mycorsi" >
                                            <svg style="z-index:50" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="inline-block relative h-8" width="60px" height="40px" viewBox="0 0 874.1 874.1" style="enable-background:new 0 0 874.1 874.1;" xml:space="preserve">
                                                <path d="M50,300.05c-27.6,0-50,22.4-50,50v174c0,27.6,22.4,50,50,50s50-22.4,50-50v-174C100,322.45,77.6,300.05,50,300.05z"/>
                                                <path d="M690.1,244.55c-27.6,0-50,22.4-50,50v102.5h-406v-102.5c0-27.6-22.4-50-50-50c-27.6,0-50,22.4-50,50v285
                                                    c0,27.6,22.4,50,50,50c27.6,0,50-22.4,50-50v-102.5h406v102.5c0,27.6,22.4,50,50,50s50-22.4,50-50v-285
                                                    C740.1,266.95,717.699,244.55,690.1,244.55z"/>
                                                <path d="M824.1,300.05c-27.6,0-50,22.4-50,50v174c0,27.6,22.4,50,50,50s50-22.4,50-50v-174
                                                    C874.1,322.45,851.699,300.05,824.1,300.05z"/>
                                            </svg>
                                        </a>
                                    </button>

                                @elseif (Auth::user()->hasRole('admin'))
                                    <a href="/dashboard" class="button bg-blue-500 hover:bg-blue-600 inline-block lg:my-0 my-2 lg:mr-10">AdminPanel</a>
                                @elseif (Auth::user()->hasRole('istruttore'))
                                    <a href="/carrello" class="button bg-blue-500 hover:bg-blue-600 inline-block lg:my-0 my-2 lg:mr-2 lg:mt-0">Carrello</a>
                                    <button class=" bg-blue-500 hover:bg-blue-600 inline-block rounded-sm h-7 my-2 lg:ml-3 lg:mt-0" >
                                        <a href="/mycorsi" >
                                            <svg style="z-index:50" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="inline-block relative h-8 " width="60px" height="40px" viewBox="0 0 874.1 874.1" style="enable-background:new 0 0 874.1 874.1;" xml:space="preserve">
                                                <path d="M50,300.05c-27.6,0-50,22.4-50,50v174c0,27.6,22.4,50,50,50s50-22.4,50-50v-174C100,322.45,77.6,300.05,50,300.05z"/>
                                                <path d="M690.1,244.55c-27.6,0-50,22.4-50,50v102.5h-406v-102.5c0-27.6-22.4-50-50-50c-27.6,0-50,22.4-50,50v285
                                                    c0,27.6,22.4,50,50,50c27.6,0,50-22.4,50-50v-102.5h406v102.5c0,27.6,22.4,50,50,50s50-22.4,50-50v-285
                                                    C740.1,266.95,717.699,244.55,690.1,244.55z"/>
                                                <path d="M824.1,300.05c-27.6,0-50,22.4-50,50v174c0,27.6,22.4,50,50,50s50-22.4,50-50v-174
                                                    C874.1,322.45,851.699,300.05,824.1,300.05z"/>
                                            </svg>
                                        </a>
                                    </button>
                                    <a href="/dashboard" class="button bg-blue-500 hover:bg-blue-600 inline-block lg:my-0 my-2 lg:ml-2">Pannello Istruttore</a>
                                @endif





                            <div class="inline-block ml-4 xsm:block xsm:float-none lg:mr-10 lg:mb-2">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-block text-sm font-medium text-black hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                            <div class="flex items-center text-white">
                                                {{ Auth::user()->name }}
                                                <div class="text-gray-200 ">

                                                    @if ($abbon != '[]')
                                                        <div class="inline-block relative ">
                                                            <svg
                                                            class="w-6 h-6"
                                                            xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                            xmlns:cc="http://creativecommons.org/ns#"
                                                            xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                            xmlns:svg="http://www.w3.org/2000/svg"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            id="svg4734"
                                                            version="1.1"
                                                            viewBox="0 0 54.175114 39.116997"
                                                            height="39.116997mm"
                                                            width="54.175114mm">
                                                            <defs
                                                                id="defs4728" />
                                                            <metadata
                                                                id="metadata4731">
                                                                <rdf:RDF>
                                                                <cc:Work
                                                                    rdf:about="">
                                                                    <dc:format>image/svg+xml</dc:format>
                                                                    <dc:type
                                                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                                                    <dc:title></dc:title>
                                                                </cc:Work>
                                                                </rdf:RDF>
                                                            </metadata>
                                                            <g
                                                                transform="translate(66.39708,-99.036739)"
                                                                id="layer1">
                                                                <g
                                                                id="g9099"
                                                                transform="matrix(0.27539482,0,0,0.27539482,60.333862,131.21137)"
                                                                style="display:inline;stroke-width:0.96074188;stroke-miterlimit:4;stroke-dasharray:none">
                                                                <g
                                                                    style="stroke-width:0.37907794;stroke-miterlimit:4;stroke-dasharray:none"
                                                                    transform="matrix(2.5552825,0,0,2.5137239,948.91383,147.74554)"
                                                                    id="g9067">
                                                                    <path
                                                                    style="fill:#fee46e;fill-opacity:1;stroke:none;stroke-width:0.37907794;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                                                    d="m -484.92861,-69.60699 c 3.14841,-11.981014 7.45711,-20.705293 9.99109,-24.260749 -8.24441,2.537931 -14.08607,11.920807 -17.04582,17.834698 -1.1891,-7.022842 -1.14274,-16.90312 0.23245,-23.742098 -7.62915,4.471464 -11.71748,15.063897 -14.25625,20.846777 l -6.94357,-25.600368 -6.94355,25.600368 c -2.53878,-5.78288 -6.6271,-16.375313 -14.25625,-20.846777 1.37518,6.838978 1.42154,16.719256 0.23245,23.742098 -2.95976,-5.913891 -8.80141,-15.296767 -17.04582,-17.834698 2.53398,3.555456 6.84268,12.279735 9.99109,24.260749 z"
                                                                    id="path1049" />
                                                                    <path
                                                                    style="fill:#e7ce5a;fill-opacity:1;stroke:none;stroke-width:0.37907794;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                                                    d="m -512.94972,-96.467987 -5.04297,18.269379 c -0.56146,2.066384 -2.9958,2.302191 -3.84375,0.372344 -2.05241,-4.675022 -5.06496,-11.752156 -9.5293,-16.503072 0.56383,6.22683 0.34917,13.195371 -0.59375,18.764323 -0.37153,2.190762 -2.87836,2.680614 -3.8457,0.751475 -1.91568,-3.827716 -9.24175,-14.63711 -12.26172,-14.225918 1.87981,4.096617 4.76499,10.849089 6.48437,17.011626 h 28.63282 28.63086 c 1.71938,-6.162537 4.60456,-12.915009 6.48437,-17.011626 -3.01997,-0.411192 -10.34604,10.398202 -12.26172,14.225918 -0.96734,1.929139 -3.47417,1.439287 -3.8457,-0.751475 -0.94292,-5.568952 -1.15758,-12.537493 -0.59375,-18.764323 -4.46434,4.750916 -7.47689,11.82805 -9.5293,16.503072 -0.84795,1.929847 -3.28229,1.69404 -3.84375,-0.372344 z m 0,6.647541 3.3789,12.241647 c 0.4956,1.811456 1.91541,2.952514 3.33399,3.089923 1.42076,0.137629 2.98514,-0.717057 3.73047,-2.413364 1.50381,-3.425418 3.50953,-7.98335 6.07226,-11.905641 -0.0883,4.73448 0.0781,9.494044 0.7793,13.635635 0.076,0.448226 0.35801,0.734086 0.53515,1.112463 h -17.83007 -17.83008 c 0.17713,-0.378377 0.45915,-0.664237 0.53515,-1.112463 0.70129,-4.141591 0.8676,-8.901155 0.7793,-13.635635 2.56274,3.922291 4.56845,8.480223 6.07227,11.905641 0.74533,1.696307 2.30971,2.550993 3.73047,2.413364 1.41858,-0.13742 2.83838,-1.278467 3.33398,-3.089923 z m -32.69066,4.282278 c 3.2756,3.136582 6.25826,7.143019 8.50629,11.339442 l -3.74494,0.138943 c -0.9166,-3.041613 -3.63435,-8.675032 -4.76135,-11.478385 z m 64.90318,0.416853 c -1.127,2.803353 -3.24708,8.158874 -4.16368,11.200486 h -3.50587 c 2.36049,-4.49608 4.49799,-7.84021 7.66955,-11.200486 z"
                                                                    id="path4471" />
                                                                    <path
                                                                    style="fill:none;fill-opacity:1;stroke:#fff1a1;stroke-width:0.37907794;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                                                    d="m -476.57393,-91.245702 c -6.60663,2.865612 -11.82592,11.177744 -14.21322,15.947804 -0.58337,1.165172 -2.09729,0.868908 -2.32031,-0.454067 -1.04129,-6.149881 -1.11264,-14.097546 -0.26562,-20.746323 -5.60175,4.798208 -9.14175,13.081635 -11.4043,18.235332 -0.51156,1.163866 -1.97973,1.021529 -2.31836,-0.224762 l -5.74414,-21.179957 -5.74609,21.179957 c -0.33863,1.246291 -1.8068,1.388628 -2.31836,0.224762 -2.26256,-5.153701 -5.80256,-13.437126 -11.4043,-18.235332 0.84701,6.648776 0.77566,14.596445 -0.26562,20.746323 -0.22301,1.322994 -1.73695,1.61926 -2.32032,0.454067 -2.3873,-4.770063 -7.82097,-13.331409 -14.42761,-16.32163"
                                                                    id="path8243" />
                                                                    <path
                                                                    id="path4473"
                                                                    d="m -484.92861,-69.60699 c 3.14841,-11.981014 7.45711,-20.705293 9.99109,-24.260749 -8.24441,2.537931 -14.08607,11.920807 -17.04582,17.834698 -1.1891,-7.022842 -1.14274,-16.90312 0.23245,-23.742098 -7.62915,4.471464 -11.71748,15.063897 -14.25625,20.846777 l -6.94357,-25.600368 -6.94355,25.600368 c -2.53878,-5.78288 -6.6271,-16.375313 -14.25625,-20.846777 1.37518,6.838978 1.42154,16.719256 0.23245,23.742098 -2.95976,-5.913891 -8.80141,-15.296767 -17.04582,-17.834698 2.53398,3.555456 6.84268,12.279735 9.99109,24.260749 z"
                                                                    style="fill:none;fill-opacity:1;stroke:#806600;stroke-width:0.37907794;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />
                                                                </g>
                                                                <ellipse
                                                                    ry="20.478416"
                                                                    rx="76.137947"
                                                                    cy="-26.643051"
                                                                    cx="-361.8201"
                                                                    id="ellipse1058"
                                                                    style="fill:#fee46e;fill-opacity:1;stroke:#806600;stroke-width:0.96074188;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />
                                                                <path
                                                                    style="fill:#e4c900;fill-opacity:1;stroke:none;stroke-width:0.96074188;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                                                    d="m -302.52618,1.4887639 10.15392,-24.1616929 c 4e-5,-0.166477 -0.13786,-3.404654 -4.22565,-5.63606 -3.0265,-1.965322 -8.10462,-4.076107 -14.6013,-5.823499 -12.9934,-3.49478 -31.76569,-5.614557 -50.62089,-5.614384 -18.85519,-1.73e-4 -37.62748,2.119604 -50.62088,5.614384 -6.49668,1.747392 -11.57481,3.858177 -14.6013,5.823499 -4.08777,2.231406 -4.22569,5.469588 -4.22566,5.63606 l 10.15393,24.1616929 z"
                                                                    id="path1065" />
                                                                <path
                                                                    style="fill:#fee46e;fill-opacity:1;stroke:none;stroke-width:0.96074188;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                                                    d="m -302.49365,-5.0230984 7.53638,-17.9360776 c -0.0469,-0.179418 -0.0976,-0.37683 -0.2324,-0.650884 -0.33993,-0.691348 -0.99273,-1.622906 -2.60174,-2.501209 -0.056,-0.03011 -0.11086,-0.06234 -0.16437,-0.09664 -2.64182,-1.71552 -7.56488,-3.804232 -13.89009,-5.505502 -12.6563,-3.404113 -31.30549,-5.528414 -49.97425,-5.528241 -18.66874,-1.73e-4 -37.31795,2.124128 -49.97424,5.528241 -6.32521,1.70127 -11.24828,3.789982 -13.89009,5.505502 -0.0535,0.0343 -0.1084,0.06653 -0.16438,0.09664 -1.60897,0.8783 -2.26179,1.809844 -2.60173,2.501209 -0.13481,0.27406 -0.18555,0.471457 -0.23239,0.650884 l 7.76226,18.4649878 c 28.43046,-13.4992388 83.70974,-14.9467748 118.42704,-0.5289102 z"
                                                                    id="path938" />
                                                                <path
                                                                    style="fill:#fff1a1;fill-opacity:1;stroke:none;stroke-width:0.96074188;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                                                    d="m -361.82325,-44.404209 c -19.74245,1.27e-4 -39.38288,2.207484 -53.13431,5.906264 -6.87571,1.849391 -12.30549,4.071426 -15.7351,6.298499 -3.42551,2.224407 -4.5518,4.19687 -4.55445,5.550981 0.007,0.783657 0.39523,1.721073 1.40007,2.870705 0.009,-0.04062 10e-4,-0.0521 0.0116,-0.09664 0.11768,-0.554314 0.3299,-1.262034 0.71419,-2.043602 0.76107,-1.547847 2.24992,-3.363384 4.72167,-4.732401 3.44529,-2.214087 8.63188,-4.324282 15.2533,-6.105225 13.3594,-3.593225 32.26566,-5.707481 51.32329,-5.707305 19.05765,-1.76e-4 37.9639,2.11408 51.3233,5.707305 6.62142,1.780943 11.80801,3.891138 15.2533,6.105225 2.47176,1.369015 3.96059,3.184543 4.72167,4.732401 0.38429,0.781573 0.59655,1.489278 0.71419,2.043602 0.0116,0.05502 0.004,0.07026 0.0145,0.119374 1.01298,-1.158366 1.39965,-2.098987 1.4029,-2.887759 v -0.0029 c -0.001,-1.354224 -1.13204,-3.327802 -4.56012,-5.553822 -3.42979,-2.227128 -8.85625,-4.449098 -15.73227,-6.2985 -13.75203,-3.698803 -33.39423,-5.906333 -53.13714,-5.906263 z"
                                                                    id="ellipse915" />
                                                                <path
                                                                    id="path931"
                                                                    d="m -302.52618,1.4887639 10.15392,-24.1616929 c 4e-5,-0.166477 -0.13786,-3.404654 -4.22565,-5.63606 -3.0265,-1.965322 -8.10462,-4.076107 -14.6013,-5.823499 -12.9934,-3.49478 -31.76569,-5.614557 -50.62089,-5.614384 -18.85519,-1.73e-4 -37.62748,2.119604 -50.62088,5.614384 -6.49668,1.747392 -11.57481,3.858177 -14.6013,5.823499 -4.08777,2.231406 -4.22569,5.469588 -4.22566,5.63606 l 10.15393,24.1616929 z"
                                                                    style="fill:none;fill-opacity:1;stroke:#806600;stroke-width:0.96074188;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />
                                                                <g
                                                                    id="g936"
                                                                    transform="matrix(1.4510756,0,0,1.455249,381.8804,17.977244)"
                                                                    style="stroke-width:0.66113943;stroke-miterlimit:4;stroke-dasharray:none">
                                                                    <ellipse
                                                                    ry="12.144042"
                                                                    rx="45.280926"
                                                                    cy="-7.5053363"
                                                                    cx="-512.51672"
                                                                    id="path1035"
                                                                    style="fill:#fee46e;fill-opacity:1;stroke:#806600;stroke-width:0.66113943;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />
                                                                    <path
                                                                    style="fill:#b9a300;fill-opacity:1;stroke:#806600;stroke-width:0.66113943;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                                                    d="m -512.51586,-14.455527 c -10.59777,-9.6e-5 -21.15487,1.192857 -28.40507,3.137321 -3.6251,0.972232 -6.43924,2.1480337 -8.0497,3.190828 -1.61046,1.042793 -1.60579,1.634138 -1.60583,1.359089 4e-5,-0.27505 -0.004,0.316296 1.60583,1.359089 1.61046,1.042794 4.4246,2.218596 8.0497,3.190828 7.2502,1.944464 17.8073,3.137418 28.40507,3.137321 10.59748,-2.1e-5 21.15352,-1.192874 28.40334,-3.137321 3.62492,-0.972223 6.43935,-2.148072 8.04971,-3.190828 1.61035,-1.042755 1.60578,-1.634131 1.60583,-1.359089 -5e-5,0.275042 0.004,-0.316333 -1.60583,-1.359089 -1.61036,-1.0427561 -4.42479,-2.218605 -8.04971,-3.190828 -7.24982,-1.944447 -17.80586,-3.137299 -28.40334,-3.137321 z"
                                                                    id="ellipse1050" />
                                                                    <path
                                                                    style="fill:#fff1a1;fill-opacity:1;stroke:none;stroke-width:0.66113943;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                                                    d="m -512.51834,-18.374943 c -11.71566,7.6e-5 -23.37077,1.33298 -31.53121,3.566476 -4.08023,1.116748 -7.30238,2.458516 -9.3376,3.803327 -2.03278,1.3431993 -2.70115,2.5342647 -2.70272,3.3519396 0.004,0.4732088 0.23455,1.0392642 0.83084,1.7334656 0.005,-0.024526 8.5e-4,-0.031459 0.007,-0.058358 0.0699,-0.3347209 0.19578,-0.7620748 0.42382,-1.2340218 0.45164,-0.9346625 1.33516,-2.0309672 2.80197,-2.8576444 2.04451,-1.336968 5.12235,-2.611202 9.05166,-3.686618 7.9278,-2.169756 19.14725,-3.446441 30.45651,-3.446335 11.30928,-1.06e-4 22.5287,1.276579 30.4565,3.446335 3.92932,1.075416 7.00718,2.34965 9.05169,3.686618 1.46681,0.8266761 2.35031,1.9229757 2.80196,2.8576444 0.22804,0.4719496 0.354,0.8992947 0.42382,1.2340218 0.007,0.033226 0.003,0.042426 0.008,0.072084 0.60113,-0.6994756 0.8306,-1.267466 0.83252,-1.7437635 v -0.00176 c -6.4e-4,-0.8177435 -0.67178,-2.0094816 -2.70608,-3.3536567 -2.03533,-1.344843 -5.25552,-2.686572 -9.33592,-3.803326 -8.1608,-2.23351 -19.81695,-3.56652 -31.53289,-3.566477 z"
                                                                    id="path929" />
                                                                </g>
                                                                <path
                                                                    style="fill:#fff1a1;fill-opacity:1;stroke:none;stroke-width:0.96074188;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                                                    d="m -346.86298,-36.988692 -2.44019,21.928217 c 9.40599,0.385845 18.77207,1.435618 27.63845,3.186195 l 2.47987,-22.297709 c -8.28262,-1.418134 -17.80435,-2.393674 -27.67813,-2.816703 z m -41.08075,1.622943 c -6.04221,0.763184 -11.62451,1.738235 -16.51164,2.890602 l 4.00462,22.25224 c 5.1477,-1.336486 10.67139,-2.420093 16.45213,-3.228834 z"
                                                                    id="rect946" />
                                                                </g>
                                                            </g>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block relative " fill="none" viewBox="0 0 24 24" stroke="white">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>


                                <x-slot name="content">
                                    <!-- Authentication -->
                                    <form class="text-center" method="POST" action="{{ route('logout') }}">
                                        @csrf


                                        <x-dropdown-link :href="('profilo')">
                                            {{ __('Profilo') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log out') }}
                                        </x-dropdown-link>

                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                            @else
                                <a href="{{ route('login') }}" class="button button-primary ml-5">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="button button-primary ml-5">Register</a>
                                @endif
                            @endauth

                        @endif
                    </div>





                  </nav>
                </div>
              </div>
        </header>

        @yield('content')

        <footer class="site-footer">
            <div class="container">
                <div class="site-footer-inner">
                    <div class="brand footer-brand">
						<a href="/">
							<img class="header-logo-image" src="dist/images/logo.svg" alt="Logo">
						</a>
                    </div>
                    <ul class="footer-links list-reset">
                        <li>
                            <a href="#">Contact</a>
                        </li>
                        <li>
                            <a href="#">About us</a>
                        </li>
                        <li>
                            <a href="#">FAQ's</a>
                        </li>
                        <li>
                            <a href="#">Support</a>
                        </li>
                    </ul>
                    <ul class="footer-social-links list-reset">
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Facebook</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z" fill="#0270D7"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Twitter</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z" fill="#0270D7"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Google</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z" fill="#0270D7"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="footer-copyright">&copy; 2021 Solid, all rights reserved</div>
                </div>
            </div>
        </footer>
    </div>

    <script src="dist/js/main.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</html>

