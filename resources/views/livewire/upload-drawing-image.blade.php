<div>
    <div class="drawing-image" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
         x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
         x-on:livewire-upload-progress="progress = $event.detail.progress">
        <label>
            <input
                x-ref="fileInput"
                type="file"
                id="drawingImage"
                multiple
                wire:change="$emit('drawingChoosen')"
                wire:model="drawingImages"
            />
            <img src="/html/assets/images/bg-up-file.png" alt="">
            <div class="wrap-bg">
                <img class="display " src="/html/assets/images/icons/up-file.png" alt="your image">
            </div>
            <!-- Progress Bar -->
            <div x-show="isUploading" style="position: absolute; bottom: -20px; left: 0; width: 110px;">
                <progress max="100" x-bind:value="progress" style="width: 100%;"></progress>
            </div>
        </label>
        @if(!empty($drawing_images_path))
            @foreach($drawing_images_path as $path)
                <input type="hidden" name="drawing_images[]" value="{{ $path }}">
            @endforeach
        @endif
        @if(!empty($drawingImageUpload))
            @foreach($drawingImageUpload as $key => $image)
                @if($image['type'] == 'image/png' || $image['type'] == 'image/jpg' || $image['type'] == 'image/jpeg')
                    <div class="wrapper-drawing-image-upload">
                        <div>
                            <img src="{{ $image['imageData'] }}" alt="drawing-image">
                        </div>
                        <span class="close-icon" wire:click="deleteDrawingImage({{ $key }})">&times;</span>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
    @error('drawingImages.*') <span class="error">{{ $message }}</span> @enderror
</div>

<style>
    .drawing-image {
        width: 100%;
        display: grid;
        grid-row-gap: 20px;
        grid-column-gap: 20px;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .drawing-image label {
        position: relative;
        width: 110px;
        height: 110px;
        float: left;
        /*overflow: hidden;*/
        cursor: pointer;
    }
    .drawing-image label img {
        position: absolute;
        left: -100%;
        right: -100%;
        top: -100%;
        bottom: -100%;
        margin: auto;
        max-height: 100%;
        max-width: 100%;
        width: auto;
        height: auto;
        cursor: pointer;
    }
    .drawing-image input[type=file] {
        position: relative;
        z-index: 1;
        width: 110px;
        height: 110px;
        float: left;
        opacity: 0;
        cursor: pointer;
    }
    .wrapper-drawing-image-upload {
        width: 110px;
        height: 110px;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        position: relative;
    }
    .wrapper-drawing-image-upload div {
        width: 100%;
        height: 100%;
        padding-bottom: calc(100% * 110 / 110);
        position: absolute;
    }
    .wrapper-drawing-image-upload div img {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        object-fit: cover;
        object-position: center;
        border-radius: 4px;
    }

    .wrapper-drawing-image-upload .close-icon {
        position: absolute;
        top: -10px;
        right: -10px;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #e9ecef;
        cursor: pointer;
    }
</style>

<script>
    window.livewire.on('drawingChoosen', function () {
        let inputFile = document.getElementById('drawingImage');
        let files = inputFile.files;
        for(let i=0; i < files.length ; i++) {
            let reader = new FileReader();
            reader.onloadend = function () {
                window.livewire.emit('drawingUpload', {
                    imageData: reader.result,
                    type: files[i].type
                })
            }
            reader.readAsDataURL(files[i])
        }
    })
</script>
