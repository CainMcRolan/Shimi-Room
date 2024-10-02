<?php

require "partials/head.php";
require "partials/background.php";
require "partials/header.php";
require "partials/nav.php";
require "partials/main.php";
?>
<div class="w-full flex items-center justify-center">
    <form action="/register/verify" method="POST" class="w-full flex items-center
    justify-center">
        <fieldset class="border border-[#61a0ff] flex flex-col justify-center items-center lg:w-[18rem]">
            <legend class="lg:font-bold lg:text-md 2xl:text-base">Register</legend>
            <label for="username" class="font-bold">
                Username:
                <input id="username" type="text" name="username" class="border border-[#61a0ff] my-1 lg:p-1
                2x:p-1" value="<?= $_POST['username'] ?? '' ?>">
            </label>
            <label for="password" class="font-bold">
                Password:
                <input id="password" type="password" name="password" class="border border-[#61a0ff] my-1 lg:p-1
                2x:p-1">
            </label>
            <p class="text-red-500"><?= $errors['body'] ?? '' ?></p>
            <input type="submit" value="Register" class="text-center border border-gray-500 bg-gray-200
                   rounded-sm mt-2 lg:p-1">
        </fieldset>
    </form>
</div>
<p class="my-2 text-center lg:text-sm">Already have an account? Why are you here then? <a
            href="/login" class="text-blue-500">go back to login</a></p>
<?php
require "partials/aside.php";
require "partials/footer.php";
?>