<div class="border border-[#61a0ff] bg-[#d9e8ff] my-3 p-4 w-full self-center lg:w-2/3">
    <span class="tracking-wide lg:text-sm"><b>Creation Date</b>: <?= $project_info['creation_date'] ?? '00/00/00 00:00' ?>, </span>
    <span class="tracking-wide lg:text-sm">Last modified: <?= $project_info['last_modified'] ?? '00/00/00 00:00' ?>, </span>
    <span class="tracking-wide lg:text-sm">Author: <i><?= $project_info['author'] ?? 'Shimi Jallores' ?>,</i></span>
    <span class="tracking-wide lg:text-sm">Tags:
            <?php foreach ($project_info['tags'] as $index => $tag) : ?>
                <span class="text-[#003f9e] cursor-pointer tracking-wide hover:underline lg:text-sm"><?= $tag ?><?= $index !== count($project_info['tags']) - 1 ? "," : "" ?></span>
            <?php endforeach; ?>
            </span>
</div>