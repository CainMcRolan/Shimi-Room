<?php

require "partials/head.php";
require "partials/background.php";
require "partials/header.php";
require "partials/nav.php";
?>
    <div class="w-full h-full overflow-auto p-4 flex flex-col" id="projects_div">
        <h1 class="text-lg font-bold mt-2 2xl:text-2xl">Home</h1>
        <hr class="border border-[#61a0ff] w-full">
        <p class="my-2 lg:text-md 2xl:text-base">welcome back <b><?= $user ?></b>! where did u go? i was bored so i
            added
            some
            program that you might not have seen yet😃, check them out!!!</p>
        <div class="w-full grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-2 2xl:grid-cols-3"
             id="projects_container">
            <?php foreach ($projects as $project) : ?>
                <div class="bg-[#d9e8ff] w-full h-full border border-[#61a0ff] p-1">
                    <img src="images/cat-load.gif" alt="">
                    <h1 class="font-bold cursor-pointer"><a href="<?= $project['redirectLink'] ?>"
                                                            class="text-[#003f9e]
                    underline"><?=
                            $project['title'] ?></a></h1>
                    <p class="my-1">-<?= $project['description'] ?></p>
                    <p class="text-[10px]">Author: <?= $project['author'] ?> | Date: <?= $project['date'] ?> | Tags: <a
                                class="underline
            text-blue-500"><?= $project['tags'] ?></a></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php
require "partials/aside.php";
require "partials/footer.php";
?>