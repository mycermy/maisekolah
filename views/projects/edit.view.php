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
                                <input class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    type="text"
                                    id="aktivitikod"
                                    name="aktivitikod"
                                    value="<?= htmlspecialchars($rows['kodAktiviti']) ?>"
                                    readonly>
                            </div>
                            <?php if (isset($errors['kod'])) : ?>
                                <p class="mt-3 text-sm leading-6 text-red-600"><?= $errors['kod'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-span-4">
                        <label for="aktivitinama" class="block text-sm font-medium leading-6 text-gray-900">Nama Aktiviti</label>
                        <div class="mt-2">
                            <textarea id="aktivitinama" name="aktivitinama" rows="3"
                                required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= htmlspecialchars($rows['namaAktiviti']) ?></textarea>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about new aktiviti.</p>
                        <?php if (isset($errors['nama'])) : ?>
                            <p class="mt-3 text-sm leading-6 text-red-600"><?= $errors['nama'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="aktivititempat" class="block text-sm font-medium leading-6 text-gray-900">Tempat</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    type="text"
                                    id="aktivititempat"
                                    name="aktivititempat"
                                    required
                                    value="<?= htmlspecialchars($rows['tempat']) ?>">

                                <?php if (isset($errors['tempat'])) : ?>
                                    <p class="mt-3 text-sm leading-6 text-red-600"><?= $errors['tempat'] ?></p>
                                <?php endif; ?>
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
                                <?php if (isset($errors['tarikh'])) : ?>
                                    <p class="mt-3 text-sm leading-6 text-red-600"><?= $errors['tarikh'] ?></p>
                                <?php endif; ?>
                                <input name="aktivititarikh" id="datepicker-actions" datepicker datepicker-format="yyyy-mm-dd" datepicker-buttons datepicker-autoselect-today type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date"
                                    value="<?= htmlspecialchars($rows['tarikh']) ?>">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-10 flex items-center justify-end gap-x-6">
                <a href="/project?kod=<?= $rows['kodAktiviti'] ?>">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                </a>
                <button type="submit" class="flex items-center gap-x-2 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                    <span>Update</span>
                </button>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6"></div>

            <input type="hidden" name="_method" value="PATCH">

        </form>
    </div>
</main>

<?php view('partials/footer.php') ?>