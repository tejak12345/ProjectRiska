<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/lucide-static@0.321.0/font/lucide.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f6f9fc 0%, #edf2f7 100%);
            min-height: 100vh;
        }

        .form-container {
            max-width: 700px;
            margin: 40px auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-5px);
        }

        input, textarea {
            transition: all 0.3s ease;
            border: 2px solid #e2e8f0;
        }

        input:focus, textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .submit-btn {
            background: linear-gradient(135deg, #2C3E50 0%, #3498db 100%);
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(44, 62, 80, 0.15);
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .custom-file-input {
            position: relative;
            z-index: 2;
            cursor: pointer;
            background: #f8fafc;
            border: 2px dashed #cbd5e1;
            padding: 2rem;
            text-align: center;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .custom-file-input:hover {
            border-color: #3b82f6;
            background: #f1f5f9;
        }
    </style>
</head>

<body>
    <div class="container mx-auto px-4 py-8 max-w-screen-xl">
        <div class="form-container">
            <div class="flex items-center mb-8">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-4">
                    <i data-lucide="package" class="text-white w-6 h-6"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-800">Edit Product</h1>
            </div>

            <form action="/admin/products/update/<?= esc($product['id']) ?>" method="post" enctype="multipart/form-data" class="space-y-6">
                <?= csrf_field() ?>

                <!-- Product Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Product Name</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <i data-lucide="tag" class="h-5 w-5 text-gray-400"></i>
                        </span>
                        <input type="text" id="name" name="name" value="<?= esc($product['name']) ?>"
                            class="pl-10 w-full rounded-lg border-gray-300 py-3 focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                </div>

                <!-- Product Price -->
                <div>
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Price</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <i data-lucide="dollar-sign" class="h-5 w-5 text-gray-400"></i>
                        </span>
                        <input type="number" id="price" name="price" value="<?= esc($product['price']) ?>" step="0.01"
                            class="pl-10 w-full rounded-lg border-gray-300 py-3 focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                </div>

                <!-- Product Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <div class="relative">
                        <textarea id="description" name="description" rows="4"
                            class="w-full rounded-lg border-gray-300 py-3 focus:ring-blue-500 focus:border-blue-500"
                            required><?= esc($product['description']) ?></textarea>
                    </div>
                </div>

                <!-- Product Image -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Product Image</label>
                    <?php if ($product['image'] && file_exists(ROOTPATH . '/public/img/products/' . $product['image'])): ?>
                        <div class="mb-4">
                            <img src="<?= base_url('/img/products/' . $product['image']) ?>" alt="Product Image"
                                class="rounded-lg object-cover w-40 h-40 border-4 border-white shadow-lg">
                        </div>
                    <?php endif; ?>
                    
                    <div class="custom-file-input">
                        <i data-lucide="upload-cloud" class="w-12 h-12 text-blue-500 mx-auto mb-2"></i>
                        <div class="text-sm text-gray-600">Drag and drop your image here or click to browse</div>
                        <input type="file" id="image" name="image"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    </div>
                    <p class="mt-2 text-sm text-gray-500">Leave blank to keep the current image</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-6">
                    <a href="/admin/products"
                        class="px-6 py-3 rounded-lg text-gray-700 bg-gray-100 hover:bg-gray-200 transition-all duration-200 flex items-center">
                        <i data-lucide="x" class="w-4 h-4 mr-2"></i>
                        Cancel
                    </a>
                    <button type="submit"
                        class="submit-btn px-6 py-3 rounded-lg text-white flex items-center">
                        <i data-lucide="save" class="w-4 h-4 mr-2"></i>
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();

            // Add animation for file input
            const fileInput = document.querySelector('input[type="file"]');
            const fileInputWrapper = document.querySelector('.custom-file-input');

            fileInput.addEventListener('dragover', (e) => {
                e.preventDefault();
                fileInputWrapper.style.borderColor = '#3b82f6';
                fileInputWrapper.style.backgroundColor = '#f1f5f9';
            });

            fileInput.addEventListener('dragleave', (e) => {
                e.preventDefault();
                fileInputWrapper.style.borderColor = '#cbd5e1';
                fileInputWrapper.style.backgroundColor = '#f8fafc';
            });

            fileInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const fileName = this.files[0].name;
                    fileInputWrapper.querySelector('.text-sm').textContent = `Selected: ${fileName}`;
                }
            });
        });
    </script>
</body>
</html>