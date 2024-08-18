<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php view('partials/banner.php', ['heading' => $heading]) ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <p><?= htmlspecialchars($rows['kodAktiviti']) ?></p>
        <p><?= htmlspecialchars($rows['namaAktiviti']) ?></p>
        <p><?= htmlspecialchars($rows['tempat']) ?></p>
        <p>
            <?php
            $date = new DateTime($rows['tarikh']);
            echo $date->format('d-M-Y');
            ?>
        </p>

        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="/projects">
                <button class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:rotate-180">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>

                    <span>Go back</span>
                </button>
            </a>
        </div>
    </div>
</main>

<?php view('partials/footer.php') ?>