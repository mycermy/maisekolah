<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php view('partials/banner.php', ['heading' => $heading]) ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <p><?= htmlspecialchars($rows['kodAktiviti']) ?></p>
        <p>Event: <?= htmlspecialchars($rows['namaAktiviti']) ?></p>
        <p>Location: <?= htmlspecialchars($rows['tempat']) ?></p>
        <p>Date: 
            <?php
            $date = new DateTime($rows['tarikh']);
            echo $date->format('d-M-Y');
            ?>
        </p>
        <p class="text-sm text-gray-400">Created By: <?= htmlspecialchars($rows['namaGuru']) ?></p>

        <div class="mt-10 flex items-center justify-start gap-x-6">
            <!-- Go Back Button -->
            <a href="/projects">
                <button type="button" class="flex items-center justify-center w-1/2 px-3 py-2 text-sm text-gray-700 font-semibold transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:rotate-180">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>

                    <span>Go back</span>
                </button>
            </a>

            <?php if ($isAuthorized): ?>
                <!-- Edit Button -->
                <a href="/project/edit?kod=<?= $rows['kodAktiviti'] ?>">
                    <button type="button" class="flex items-center justify-center w-1/2 px-3 py-2 bg-indigo-600 text-sm text-white font-semibold shadow-sm hover:bg-indigo-500 border rounded-lg gap-x-2 sm:w-auto focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>

                        <span>Edit</span>
                    </button>
                </a>

                <!-- Delete Button -->
                <form method="POST" action="/project" class="m-auto">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="kod" value='<?= $rows['kodAktiviti'] ?>'>
                    <button type="submit" class="flex items-center justify-center w-1/2 px-3 py-2 text-sm text-white font-semibold transition-colors duration-200 bg-red-500 border rounded-lg gap-x-2 sm:w-auto hover:bg-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:rotate-180">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>

                        <span>Delete</span>
                    </button>
                </form>
            <?php endif; ?>
        </div>

    </div>
</main>

<?php view('partials/footer.php') ?>