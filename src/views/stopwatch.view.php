<?php

require "partials/head.php";
require "partials/background.php";
require "partials/header.php";
require "partials/nav.php";
require "partials/main.php";
?>
    <p id="stopwatch_timer" class="font-bold text-2xl text-center">00:00:00</p>
    <div class="self-center">
        <button id="reset" class="border border-blue-500 p-2 hover:bg-blue-400 ">Reset</button>
        <button id="start" class="border border-blue-500 p-2 hover:bg-blue-400 ">Start</button>
    </div>
    <script>
        const textDisplay = document.querySelector('#stopwatch_timer');
        const startBtn = document.querySelector('#start');
        const resetBtn = document.querySelector('#reset');
        let intervalID = null;
        let startingTime = 0;
        let isRunning = false;
        let elapsedTime = 0;

        startBtn.addEventListener('click', () => {
            isRunning ? stopWatch() : startWatch();
        });

        resetBtn.addEventListener('click', resetWatch)

        function startWatch() {
            if (isRunning) return;

            startingTime = Date.now() - elapsedTime;
            intervalID = setInterval(() => {

                elapsedTime = Date.now() - startingTime;

                textDisplay.textContent = displayText(elapsedTime);
            }, 10)

            startBtn.textContent = 'Pause';

            isRunning = true;
        }

        function stopWatch() {
            clearInterval(intervalID);
            isRunning = false;
            startBtn.textContent = 'Start';
        }

        function resetWatch() {
            stopWatch();
            textDisplay.textContent = '00:00:00';
            elapsedTime = 0;
        }

        function displayText(time) {
            let minutes = Math.floor(time / (1000 * 60)) % 60;
            let seconds = Math.floor(time / 1000) % 60;
            let milliseconds = Math.floor(time % 1000 / 10);

            return `${formatTime(minutes)}:${formatTime(seconds)}:${formatTime(milliseconds)}`;
        }

        function formatTime(time) {
            return time.toString().padStart(2, '0');
        }

    </script>
<?php
require "partials/info.php";
require "partials/aside.php";
require "partials/footer.php";
?>