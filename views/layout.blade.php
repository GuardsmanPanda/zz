<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Generaxion Access</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Super Awesome Funtime Game">

    <link href="/static/fonts.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{mix('/static/dist/app.css')}}">

    <script src="/static/hyperscript.min.js"></script>
    <script src="{{mix('/static/dist/app.js')}}"></script>
</head>
<body hx-indicator="#loading-status" hx-target="#primary" class="subpixel-antialiased">
<nav class="absolute bg-gray-800 flex  h-10 items-center justify-between shadow-md w-full top-0"
     style="font-family: 'Inkwell Sans',Verdana,sans-serif; line-height: 1.3; font-size: 1.3rem;">
    <div class="flex items-center gap-2">
        <a href="/" class="flex items-center ">
            <img src="/static/img/icons/top.png" class="ml-4" alt="Logo">
        </a>
        @if(\Infrastructure\Http\Auth::has_permission('admin'))
            <a href="/admin/country" class="rounded text-orange-600 font-bold border-2 border-orange-600 px-2 text-2xl leading-6 hover:bg-orange-600 hover:text-gray-50">Admin</a>
        @endif
        @if(\Infrastructure\Http\Auth::has_permission('dev'))
            <a href="/dev" class="rounded text-red-600 font-bold border-2 border-red-600 px-2 text-2xl leading-6 hover:bg-red-600 hover:text-gray-50">Dev</a>
        @endif
    </div>


    <div class="flex items-center gap-2">
        <div class="font-bold mr-2 text-gray-400 relative group">{{\Areas\_System\Auth\Auth::user()->display_name}}
            <div class="absolute bg-gray-800 group-hover:block hidden px-4 py-2 rounded-b-md z-40">
                <a href="/auth/logout" class="hover:text-gray-200">
                    <div class="flex gap-2"><x-icon name="logout" class="text-gray-600"></x-icon>
                        <div >{{t('Logout')}}</div></div>
                </a>
            </div>
        </div>
    </div>
</nav>
<dialog class="dialog" id="general-dialog">
    <div class="flex bg-blueGray-600 text-gray-100 justify-between h-8 items-center font-medium pl-4 gap-4">
        <div id="pop-title">{{t('Dialog')}}</div>
        <form method="dialog">
            <button class="w-8 h-8 hover:text-red-600 align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </form>
    </div>
    <div class="px-4 pb-4 pt-2 grid gap-2" id="pop">Please report system error</div>
</dialog>
@if($area === 'admin')
    <div class="w-full min-w-0  min-h-screen text-gray-800 bg-gray-100 ">
        <div class="pt-10 bg-gray-100 flex justify-center pb-4">
            <div class="bg-gray-800 flex gap-4 px-4 py-2 rounded-b-md shadow-lg" hx-boost="true" hx-target="#primary">
                <a href="/admin/language" class="small-button-blue">Languages</a>
            </div>
        </div>
        <div id="primary" {!!$primary_hx!!} hx-trigger="load" class="px-4"></div>
    </div>
@elseif($area === 'dev')
    <div class="w-full min-w-0  min-h-screen text-gray-800 bg-gray-100 ">
        <div class="pt-10 bg-gray-100 flex justify-center pb-4">
            <div class="bg-gray-800 flex gap-4 px-4 py-2 rounded-b-md shadow-lg" hx-boost="true" hx-target="#primary">
                <a href="/dev/finder" class="small-button-blue">Finder</a>
            </div>
        </div>
        <div id="primary" {!!$primary_hx!!} hx-trigger="load" class="px-4"></div>
    </div>
@else
    <div id="primary" {!!$primary_hx!!} hx-trigger="load" class="w-full min-w-0 min-h-screen text-gray-800 bg-gray-100"></div>
@endif

<script>
    window.pop = document.getElementById('general-dialog');
    Dialog.registerDialog(window.pop);
    tippy('[data-tippy-content]');
</script>
</body>
</html>
