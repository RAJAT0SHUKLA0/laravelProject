const fileInputMultiple = document.getElementById("upload-file-multiple");
  const uploadedImgsContainer = document.querySelector(".uploaded-imgs-container");

  fileInputMultiple.addEventListener("change", (e) => {
    const files = e.target.files;
    Array.from(files).forEach(file => {
      const src = URL.createObjectURL(file);

      const imgContainer = document.createElement('div');
      imgContainer.classList.add('position-relative', 'h-120-px', 'w-120-px', 'border', 'input-form-light', 'radius-8', 'overflow-hidden', 'border-dashed', 'bg-neutral-50');

      const removeButton = document.createElement('button');
      removeButton.type = 'button';
      removeButton.classList.add('uploaded-img__remove', 'position-absolute', 'top-0', 'end-0', 'z-1', 'text-2xxl', 'line-height-1', 'me-8', 'mt-8', 'd-flex');
      removeButton.innerHTML = '<iconify-icon icon="radix-icons:cross-2" class="text-xl text-danger-600"></iconify-icon>';
      if(src){
        const imagePreview = document.createElement('img');
        imagePreview.classList.add('w-100', 'h-100', 'object-fit-cover');
        imagePreview.src = src;
  
        imgContainer.appendChild(removeButton);
        imgContainer.appendChild(imagePreview);
        uploadedImgsContainer.appendChild(imgContainer);
  
        removeButton.addEventListener('click', () => {
          URL.revokeObjectURL(src);
          imgContainer.remove();
          $(".upload-file-multiple").removeClass('d-none')

        });
        $(".upload-file-multiple").addClass('d-none')
      }

    });

    // Clear the file input so the same file(s) can be uploaded again if needed
    fileInputMultiple.value = '';
  });