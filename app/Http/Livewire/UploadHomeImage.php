<?php

namespace App\Http\Livewire;

use Faker\Provider\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadHomeImage extends Component
{
    use WithFileUploads;
    public $homeImages;
    public $home_images_path=[];
    public $imageUpload=[];

    protected $listeners = [
        'fileUpload'
    ];


    public function fileUpload($imageData) {
        if($imageData['type'] == 'image/png' || $imageData['type'] == 'image/jpg' || $imageData['type'] == 'image/jpeg') {
            array_push($this->imageUpload, $imageData);
        }
    }

    public function updatedHomeImages() {
        $this->validate(
            [
                'homeImages.*' => 'image|max:1024'
            ],
            [
                'homeImages.*.image' => 'Hình ảnh nhà phải có định dạng là hình ảnh',
                'homeImages.*.max' => 'Hình ảnh nhà tải lên có dung lượng tối đa cho phép là 1Mb'
            ]
        );
        if(!is_null($this->homeImages) && !empty($this->homeImages)) {
            foreach ($this->homeImages as $image) {
                if($image->getMimeType() == 'image/png' || $image->getMimeType() == 'image/jpg' || $image->getMimeType() == 'image/jpeg') {
                    array_push($this->home_images_path, $image->getRealPath());
                }
            }
        }
    }

    public function deleteHomeImage($index) {
        unset($this->imageUpload[$index]);
        unset($this->home_images_path[$index]);
        $this->home_images_path = collect($this->home_images_path)->values()->all();
        $this->imageUpload = collect($this->imageUpload)->values()->all();
    }
    public function render()
    {
        return view('livewire.upload-home-image');
    }
}
