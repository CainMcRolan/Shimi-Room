<nav class="bg-gray-50 rounded-md w-3/4 h-[2%] px-4 flex items-center mb-1 lg:w-1/2 2xl:w-1/2">
    <p class="font-sans text-xs text-gray-500">Trace: <a href="<?= $sub_dir ?? $trace ?>"
                                                         class="underline
    text-blue-400"><?=
            isset($sub_dir) ? $sub_dir . $trace : $trace ?? '' ?></a>
    </p>
</nav>

<main class="bg-white rounded-md w-3/4 h-[75%] text-xs grid grid-cols-[75%_25%] lg:grid-cols-[85%_15%]
    2xl:grid-cols-[75%_25%]
    lg:w-1/2 2xl:w-1/2">