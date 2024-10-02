<main class="bg-white rounded-md w-3/4 h-[75%] text-xs grid grid-cols-[75%_25%] lg:grid-cols-[85%_15%]
    2xl:grid-cols-[75%_25%]
    lg:w-1/2 2xl:w-1/2">

    <div id="projects_div" class="w-full overflow-auto h-full p-4 flex flex-col">
        <div class="w-full flex justify-between">
            <h1 class="text-lg font-bold mt-2 2xl:text-2xl"><?= $header_info['title'] ?? "u r lost😭" ?></h1>
            <p id="timer" class="text-lg font-bold mt-2 2xl:text-2xl hidden">00:00:00</p>
        </div>
        <hr class="border border-[#61a0ff] w-full">
        <p class=" my-1 lg:text-sm 2xl:text-sm"><?= $header_info['description'] ?? "ur cooked bro/sis🍭" ?></p>