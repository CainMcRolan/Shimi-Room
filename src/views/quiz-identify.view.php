<?php

require "partials/head.php";
require "partials/background.php";
require "partials/header.php";
require "partials/nav.php";
?>
    <div class="w-full h-full overflow-auto p-4 flex flex-col">
        <div class="w-full flex justify-between">
            <h1 class="text-lg font-bold mt-2 2xl:text-2xl">Technical Check-in v2</h1>
            <p id="timer" class="text-lg font-bold mt-2 2xl:text-2xl hidden">00:00:00</p>
        </div>
        <hr class="border border-[#61a0ff] w-full">
        <p class="lg:text-sm 2xl:text-sm"></p>
        <div class="w-full h-full flex flex-col justify-between">
            <button id="start_button" class="border border-blue-500 p-2 mt-2 w-16 hover:bg-blue-300
                cursor-pointer self-center">Start
            </button>
            <div id="display_div" class="flex justify-center items-center flex-col"></div>
            <div class="bg-[#d9e8ff] border border-[#61a0ff] flex flex-col items-center w-full my-2
                lg:self-center">
                <h1 class="font-bold text-md w-full text-center border border-[#61a0ff]">Leaderboards:</h1>
                <div class="grid grid-cols-3 w-full">
                    <p class="font-bold text-center">Username</p>
                    <p class="font-bold text-center">Score</p>
                    <p class="font-bold text-center">Time</p>
                    <?php foreach ($rankers as $index => $ranker): ?>
                        <p class="text-center">
                            <?php echo htmlspecialchars($index + 1); ?>.
                            <?php echo htmlspecialchars($ranker['username']); ?>
                            <?php echo ($index + 1) === 1 ? '👑 ' : ''; ?>
                        </p>
                        <p class="text-center"><?php echo htmlspecialchars($ranker['score']); ?></p>
                        <p class="text-center"><?php echo htmlspecialchars($ranker['time']); ?></p>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
    <script type="module" src="scripts/quiz.js" defer></script>
<?php
require "partials/aside.php";
require "partials/footer.php";
?>