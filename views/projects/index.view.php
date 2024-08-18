<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php view('partials/banner.php', ['heading' => $heading]) ?>


<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
    <a href="/project/create">
      <button type="button" class="mb-6 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Add event</button>
    </a>

    <?php foreach ($rows as $row) : ?>
      <li>
        <?= $row['namaAktiviti'] ?>
        <a href="/project?kod=<?= $row['kodAktiviti'] ?>" class="text-red-500"> more...</a>
      </li>
    <?php endforeach; ?>
  </div>
</main>

<?php view('partials/footer.php') ?>