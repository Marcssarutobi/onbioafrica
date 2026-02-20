
export function initTinyMCE(el, options) {
    tinymce.init({
        selector: '#' + el,
        menubar: true,
        language: 'fr_FR',
        //content_css: 'document',
        plugins: 'print importcss searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars',
        toolbar: 'undo redo | bold italic underline | link image | forecolor backcolor | alignleft aligncenter alignright alignjustify | fullscreen | lineheight | fontselect fontsizeselect formatselect | numlist bullist | outdent indent | pagebreak | table',
        image_class_list: [
            { title: 'Align Left', value: 'float-left' },
            { title: 'Align Right', value: 'float-right' },
            { title: 'None', value: '' }
        ],

        // ✅ ✅ Handler d’upload personnalisé
        images_upload_url: function (blobInfo, success, failure) {
            const xhr = new XMLHttpRequest();
            xhr.withCredentials = true;
            xhr.open('POST', '/api/uploadimgTi');

            // ✅ Ajouter le token CSRF
            const token = document.querySelector('meta[name="csrf-token"]');
            if (token) {
                xhr.setRequestHeader('X-CSRF-TOKEN', token.getAttribute('content'));
            }

            xhr.onload = function () {
                if (xhr.status !== 200) {
                    failure('Erreur HTTP : ' + xhr.status);
                    return;
                }

                const json = JSON.parse(xhr.responseText);
                if (!json || typeof json.location !== 'string') {
                    failure('Réponse JSON invalide : ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            const formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },

        automatic_uploads: true,
        file_picker_types: 'image media',
        file_picker_callback: function (cb, value, meta) {
          if (meta.filetype === 'image') {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function () {
              const file = this.files[0];
              const reader = new FileReader();
              reader.onload = function () {
                const id = 'blobid' + (new Date()).getTime();
                const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                const base64 = reader.result.split(',')[1];
                const blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), { title: '/' + file.name });
              };
              reader.readAsDataURL(file);
            };
            input.click();
          }
          if (meta.filetype === 'media') {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'video/*');
            input.onchange = function () {
              const file = this.files[0];
              const reader = new FileReader();
              reader.onload = function () {
                const id = 'blobid' + (new Date()).getTime();
                const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                const base64 = reader.result.split(',')[1];
                const blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), { title: '/' + file.name });
              };
              reader.readAsDataURL(file);
            };
            input.click();
          }
        },



        ...options
    });

    // Prevent Bootstrap dialog from blocking focusin for TinyMCE
    document.addEventListener('focusin', (e) => {
        if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
            e.stopImmediatePropagation();
        }
    });
}

export function updateTinyMCE(el, content) {
    tinymce.get(el).setContent(content);
}

export function destroyTinyMCE(el) {
    tinymce.get(el).destroy();
}
