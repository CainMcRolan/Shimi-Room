</div>
<aside class="bg-[#d9e8ff] h-full flex rounded-md overflow-auto flex-col items-center">
    <h1 class="font-bold text-center">Shimi's Room</h1>
    <a href="/home"><img class="my-2" src="images/cat.gif" alt=""></a>
    <a href="/guest"><img src="images/guest-book.gif" alt=""></a>
    <img class="my-2" src="images/flower.gif" alt="">
    <ul class="list-disc pl-5 custom-list">
        <li class="text-[#003f9e] underline"><a href="https://github.com/CainMcRolan">Github</a></li>
        <li class="text-[#003f9e] underline"><a href="https://facebook.com/shimi34">Say Hello</a></li>
        <li class="text-[#003f9e] underline"><a href="/changes">Recent Changes</a></li>
        <li class="text-[#003f9e] underline">Leave Something</li>
        <li class="text-[#003f9e] underline">Donate</li>
    </ul>
    <hr class="border border-[#61a0ff] w-5/6 my-2">
    <form action="" class="full flex flex-col items-center">
        <label for="search_input"></label><input id="search_input" type="text" name="search"
                                                 class="border border-[#61a0ff] w-5/6" placeholder="search">
        <!--        Script for Search Function-->
        <script src="scripts/helper/search.js" defer></script>
        <input type="button" value="Search" class="text-center border border-gray-500 bg-gray-200
                       rounded-sm cursor-pointer">
    </form>
    <hr class="border border-[#61a0ff] w-5/6 my-2">
    <ul class="list-disc pl-5 custom-list">
        <?php if ($_SESSION['user'] ?? false) : ?>
            <form action="/logout" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <li><input type="submit" class="text-[#003f9e] underline cursor-pointer" value="Logout"></li>
            </form>
        <?php endif; ?>
    </ul>
</aside>