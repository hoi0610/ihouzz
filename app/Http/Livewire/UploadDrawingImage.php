<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadDrawingImage extends Component
{
    use WithFileUploads;
    public $drawingImages;
    public $drawing_images_path=[];
    public $drawingImageUpload=[];

    protected $listeners = [
        'drawingUpload'
    ];

    public function drawingUpload($imageData) {
        if($imageData['type'] == 'image/png' || $imageData['type'] == 'image/jpg' || $imageData['type'] == 'image/jpeg') {
            array_push($this->drawingImageUpload, $imageData);
        }
    }

    public function updatedDrawingImages() {
        $this->validate(
            [
                'drawingImages.*' => 'image|max:1024'
            ],
            [
                'drawingImages.*.image' => 'Bản vẽ phải có định dạng là hình ảnh',
                'drawingImages.*.max' => 'Bản vẽ tải lên có dung lượng tối đa cho phép là 1Mb',
            ]
        );
        if(!is_null($this->drawingImages) && !empty($this->drawingImages)) {
            foreach ($this->drawingImages as $image) {
                if($image->getMimeType() == 'image/png' || $image->getMimeType() == 'image/jpg' || $image->getMimeType() == 'image/jpeg') {
                    array_push($this->drawing_images_path, $image->getRealPath());
                }
            }
        }
    }

    public function deleteDrawingImage($index) {
        unset($this->drawingImageUpload[$index]);
        unset($this->drawing_images_path[$index]);
        $this->drawing_images_path = collect($this->drawing_images_path)->values()->all();
        $this->drawingImageUpload = collect($this->drawingImageUpload)->values()->all();
    }

    public function render()
    {
        return view('livewire.upload-drawing-image');
    }
}
