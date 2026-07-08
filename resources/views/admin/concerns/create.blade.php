<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Concern') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="w-full">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form action="{{ route('admin.concerns.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                        @csrf
                        
                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required />
                        </div>
                        
                        <div>
                            <x-input-label for="description" value="Short Description (For Card)" />
                            <textarea id="description" name="description" rows="3" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>{{ old('description') }}</textarea>
                        </div>

                        <div>
                            <x-input-label for="details" value="Detailed Description (For Details Page - Paragraphs)" />
                            <textarea id="details" name="details" rows="6" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('details') }}</textarea>
                        </div>
                        
                        <div>
                            <x-input-label for="images" value="Details Page Images (Multiple)" />
                            <div id="image-inputs-container" class="space-y-3 mt-1">
                                <input type="file" name="images[]" multiple accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" onchange="previewImages(this)">
                            </div>
                            <button type="button" id="add-more-images" class="mt-2 text-sm text-indigo-600 hover:text-indigo-900">+ Add another image field</button>
                            <p class="text-xs text-gray-500 mt-1">Tip: You can select multiple files at once by holding Ctrl (Windows) or Cmd (Mac).</p>
                            
                            <div id="image-preview-container" class="flex flex-wrap gap-4 mt-4"></div>
                        </div>
                        
                        <div>
                            <x-input-label for="icon_class" value="Icon Class (e.g. fa-shirt)" />
                            <x-text-input id="icon_class" name="icon_class" type="text" class="mt-1 block w-full" :value="old('icon_class')" />
                        </div>
                        
                        <div>
                            <x-input-label for="order_index" value="Order Index" />
                            <x-text-input id="order_index" name="order_index" type="number" class="mt-1 block w-full" :value="old('order_index', 0)" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.concerns.index') }}" class="text-gray-600 hover:text-gray-900" style="margin-right: 1rem;">Cancel</a>
                            <x-primary-button>
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function previewImages(input) {
        const previewContainer = document.getElementById('image-preview-container');
        // We will just append to preview for simplicity, or clear and rebuild
        // For a robust preview, we clear and rebuild from all file inputs
        previewContainer.innerHTML = '';
        
        const fileInputs = document.querySelectorAll('input[name="images[]"]');
        
        fileInputs.forEach(fileInput => {
            if (fileInput.files) {
                Array.from(fileInput.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        // Use inline styles to bypass Tailwind JIT compilation issues if npm run dev is not active
                        img.style.height = '100px';
                        img.style.width = 'auto';
                        img.style.objectFit = 'cover';
                        img.style.border = '1px solid #e5e7eb';
                        img.style.borderRadius = '0.375rem';
                        img.style.boxShadow = '0 1px 2px 0 rgba(0, 0, 0, 0.05)';
                        previewContainer.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                });
            }
        });
    }

    document.getElementById('add-more-images').addEventListener('click', function() {
        const container = document.getElementById('image-inputs-container');
        const input = document.createElement('input');
        input.type = 'file';
        input.name = 'images[]';
        input.multiple = true;
        input.accept = 'image/*';
        input.className = 'block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400';
        input.onchange = function() { previewImages(this); };
        
        container.appendChild(input);
    });
</script>
