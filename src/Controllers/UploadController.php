<?php

namespace App\Controllers;

class UploadController
{
    protected $handle;

    public function __construct()
    {
        $this->handle = new \Verot\Upload\Upload($_FILES['file'], 'id_ID');
    }

    public function ImageUpload()
    {
        if ($this->handle->uploaded) {
            $this->handle->file_new_name_body = $this->RandomString();
            // $this->handle->image_resize = true;
            $this->handle->file_max_size = 2097152;
            $this->handle->allowed = array('jpg', 'jpeg', 'png');
            $this->handle->forbidden = array();
            $this->handle->process('files/', 'id_ID');
            $this->handle->dir_auto_create = true;
            // $this->handle->png_compression = 9;
            // $this->handle->jpeg_quality = 50;

            if ($this->handle->processed) {
                echo json_encode(['status' => 'success', 'message' => $this->handle->file_dst_name]);
                $this->handle->clean();
            } else {
                echo json_encode(['status' => 'error', 'message' => $this->handle->error]);
            }
        }
    }

    public function RandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
