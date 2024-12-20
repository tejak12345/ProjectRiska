<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success">
    <?= session()->getFlashdata('success'); ?>
</div>
<?php endif; ?>

<?php if (session()->getFlashdata('errors')): ?>
<div class="alert alert-danger">
    <?= session()->getFlashdata('errors'); ?>
</div>
<?php endif; ?>

<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-[#0F4C75] mb-6">Profil Saya</h2>

    <form action="/profil/update" method="POST">
        <?= csrf_field(); ?>
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
            <input type="text" name="username" id="username" value="<?= set_value('username', $user['username']); ?>"
                class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="<?= set_value('email', $user['email']); ?>"
                class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password"
                class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="bg-[#1A73E8] text-white px-4 py-2 rounded-full hover:bg-[#0F4C75] transition">Simpan
                Perubahan</button>
        </div>
    </form>
</div>