<x-layouts.app-layout>
    <form action="{{ route('user.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-forms.img :img="Storage::url(Auth::user()->img_path)"></x-forms.img>
        <x-forms.input name="username" label="Username" :item="Auth::user()->username"></x-forms.input>
        <x-forms.input name="email" label="Email" :item="Auth::user()->email" type="email"></x-forms.input>
        <x-forms.input name="phone" label="Phone" type="number"></x-forms.input>
        <x-forms.textarea name="address" label="Address"></x-forms.textarea>
        <input type="submit" value="Edit Settings">
    </form>

<script>
    document.addEventListener("DOMContentLoaded", (event) => {
        const dropArea = document.querySelector('[data-drop-area]')
        const fileUpload = document.querySelector('[data-file-upload]')
        const img = document.querySelector('[data-img]')
        const closeBtn = document.querySelector('[data-delete-img]')
        const texts = document.querySelector('[data-text]')
        
        closeBtn.addEventListener('click', () => {
            img.src = ''
            texts.classList.remove('hidden')
            fileUpload.value = ''
            closeBtn.classList.add('hidden')
        })

        fileUpload.addEventListener("change", () => {
            closeBtn.classList.remove('hidden')
            const imgLink = URL.createObjectURL(fileUpload.files[0])
            img.src = imgLink
            texts.classList.add('hidden')
            console.log(fileUpload.files)
        })

        dropArea.addEventListener('dragover', (e) => e.preventDefault())
        dropArea.addEventListener('drop', (e) => {
            e.preventDefault()
            const files = e.dataTransfer.files
            console.log(files)
            closeBtn.classList.remove('hidden')
            // console.log(fileUpload.files)
            const imgLink = URL.createObjectURL(files[0])
            texts.classList.add('hidden')
            img.src = imgLink
        })

    });
    </script>
</x-layouts.app-layout>
