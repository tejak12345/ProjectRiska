<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/lucide-static@0.321.0/font/lucide.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            font-weight: 600;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10 px-4 max-w-screen-xl">
        <!-- Form Container -->
        <div class="form-container">
            <h1 class="text-2xl font-bold text-[#2C3E50] mb-6">Edit Product</h1>

            <form action="/admin/products/update/<?= esc($product['id']) ?>" method="post"
                enctype="multipart/form-data">
                <?= csrf_field() ?>

                <!-- Product Name -->
                <div class="mb-4">
                    <label for="name" class="block mb-2">Product Name</label>
                    <input type="text" id="name" name="name" value="<?= esc($product['name']) ?>"
                        class="w-full border-gray-300 rounded-lg p-3 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        required>
                </div>

                <!-- Product Price -->
                <div class="mb-4">
                    <label for="price" class="block mb-2">Price</label>
                    <input type="number" id="price" name="price" value="<?= esc($product['price']) ?>" step="0.01"
                        class="w-full border-gray-300 rounded-lg p-3 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        required>
                </div>

                <!-- Product Description -->
                <div class="mb-4">
                    <label for="description" class="block mb-2">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full border-gray-300 rounded-lg p-3 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        required><?= esc($product['description']) ?></textarea>
                </div>

                <!-- Product Image -->
                <div class="mb-4">
                    <label for="image" class="block mb-2">Image</label>
                    <?php if ($product['image'] && file_exists(ROOTPATH . '/public/img/products/' . $product['image'])): ?>
                        <img src="<?= base_url('/img/products/' . $product['image']) ?>" alt="Product Image"
                            class="mb-2 rounded-lg object-cover w-32 h-32">
                    <?php endif; ?>
                    <input type="file" id="image" name="image"
                        class="w-full border-gray-300 rounded-lg p-3 focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    <small class="text-gray-500">Leave blank to keep the current image.</small>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <a href="/admin/products"
                        class="bg-gray-300 text-gray-700 py-2 px-4 rounded-lg mr-3 hover:bg-gray-400 transition">Cancel</a>
                    <button type="submit"
                        class="bg-[#2C3E50] text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">Update
                        Product</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>

</html>