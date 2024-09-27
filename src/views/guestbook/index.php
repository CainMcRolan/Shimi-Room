<?php

require base_path("src/views/partials/head.php");
require base_path("src/views/partials/background.php");
require base_path("src/views/partials/header.php");
require base_path("src/views/partials/nav.php");
require base_path("src/views/partials/main.php");
?>
    <div class="w-full flex flex-col">
        <p class="text-xs lg:text-base">I'd appreciate if you leave a comment heree😁</p>
        <p class="text-xs lg:text-base my-2">It'll be nice if you can tell me your thoughts or suggestions!</p>
        <p class="text-xs lg:text-base"><b>NOTE!!</b> you're loved🥰💞💞</p>

    </div>
    <div class="w-full mt-2 flex flex-col h-1/2">
        <h1 class="text-lg mt-2 2xl:text-xl">Comments</h1>
        <hr class="border border-[#61a0ff] w-full">
        <div class="w-full flex flex-col items-center overflow-auto">
            <?php foreach ($comments as $comment) : ?>
                <?php
                $created_at = explode(" ", $comment['created_at']);
                $date = $created_at[0];
                $time = $created_at[1];
                ?>
                <div class="border border-[#61a0ff] w-10/12 mt-2 p-2">
                    <p class="text-justify mb-2"><?= $comment['comment'] ?></p>
                    <p class="text-[#003f9e] text-xs font-mono"><?= htmlspecialchars($comment['id']) ?? 0 ?>
                        | <?= htmlspecialchars(ucfirst($comment['username'])) ?? "Guest" ?>
                        | <?= htmlspecialchars($date) ?? "0000-00-00" ?> | <?= htmlspecialchars($time) ?? '00:00:00' ?>
                        | <button onclick="alert(`this feature will release soon`)">reply</button>
                    </p>
                    <?php if (is_array($user) && $user['id'] === $comment['user_id'] && $comment['user_id'] !== null) : ?>
                        <form action="/guest/destroy" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="delete_id" value="<?= $comment['id'] ?>">
                            <button type="submit" class="font-mono text-[11px] text-red-500 mt-1
                            hover:underline">Delete</button>
                        </form>
                        <a href="/edit?id=<?= $comment['id'] ?>" class="inline-block font-mono text-[11px] text-green-500 mt-1
                            hover:underline">Edit</a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="w-full flex flex-col items-center mt-2">
        <form action="/guest/create" method="POST" class="w-10/12 flex items-center flex-col">
            <?php if ($username) : ?>
                <input type="hidden" name="username" value="<?= $username ?>">
            <?php else : ?>
                <label for="username" class="font-bold">
                    Name:
                    <input id="username" type="text" name="username" class="border border-[#61a0ff] my-1 lg:p-1 2x:p-1">
                </label>
            <?php endif; ?>
            <label class="w-full flex justify-center">
                    <textarea class="border border-[#61a0ff] w-full h-20 p-1 lg:w-1/2" name="comment"
                              placeholder="Comment..."></textarea>
            </label>
            <input type="submit" name="submit" value="Comment" class="text-center mt-1 border border-gray-500 bg-gray-200
                       rounded-sm cursor-pointer">
            <p class="text-red-500"><?= $errors['body'] ?? '' ?></p>.
        </form>
    </div>
<?php
require base_path("src/views/partials/info.php");
require base_path("src/views/partials/aside.php");
require base_path("src/views/partials/footer.php");
?>