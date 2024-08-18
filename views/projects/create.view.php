<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php view('partials/banner.php', ['heading' => $heading]) ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <form method="POST">
            <div class="space-y-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="aktivitikod" class="block text-sm font-medium leading-6 text-gray-900">Kod Aktiviti</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" id="aktivitikod" name="aktivitikod" required class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="A01">
                            </div>
                            <?php if (isset($error['kod'])) : ?>
                                <p class="mt-3 text-sm leading-6 text-red-600"><?= $errors['kod'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="aktivitinama" class="block text-sm font-medium leading-6 text-gray-900">Nama Aktiviti</label>
                        <div class="mt-2">
                            <textarea id="aktivitinama" name="aktivitinama" rows="3" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about new aktiviti.</p>
                        <?php if (isset($error['nama'])) : ?>
                            <p class="mt-3 text-sm leading-6 text-red-600"><?= $errors['nama'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="aktivititempat" class="block text-sm font-medium leading-6 text-gray-900">Tempat</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" id="aktivititempat" name="aktivititempat" required class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="aktivititarikh" class="block text-sm font-medium leading-6 text-gray-900">Tarikh</label>
                        <div class="mt-2">
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input name="aktivititarikh" id="datepicker-actions" datepicker datepicker-format="yyyy-mm-dd" datepicker-buttons datepicker-autoselect-today type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-10 flex items-center justify-end gap-x-6">
                <a href="/projects">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                </a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add</button>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
            </div>
        </form>
    </div>
</main>

<?php view('partials/footer.php') ?>