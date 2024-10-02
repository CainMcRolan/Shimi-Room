<nav class="bg-gray-50 rounded-md w-3/4 h-[2%] px-4 flex items-center mb-1 lg:w-1/2 2xl:w-1/2">
    <p class="font-sans text-xs text-gray-500">Trace: <a href="<?= $header_info['sub_dir'] ?? $header_info['trace'] ?>"
                                                         class="underline
    text-blue-400"><?=
            isset($header_info['sub_dir']) ? $header_info['sub_dir'] . $header_info['trace'] : $header_info['trace'] ?? '' ?></a>
    </p>
</nav>

