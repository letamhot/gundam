<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UploadFileService{

    //upload file
    public function uploadFile($file, $path ){
     
        $fileExt = $file->getClientOriginalExtension();
        $fileImgName = $file->getClientOriginalName();
        $fileName = Str::slug(basename($fileImgName, $fileExt), "_"). "_" . time(). "." .$fileExt;
        $folder = str_replace("//", "/", str_replace("\\", "/", $path));
        $path = $folder . $fileName;
        if(config("filesystems.default") == "s3"){
            Storage::disk("s3")->put($path, file_get_contents($file));

        }else{
            if(!Storage::disk(config("filesystems.disks.public.visibility"))->exists($folder)){               
                Storage::makeDirectory(config("filesystems.disks.public.visibility")."/" .$folder, 0777);
            }
            Storage::disk("public")->put($path, file_get_contents($file));
            
        }
        return $path;
    }

    //Delete file current, add file new
    public function deleteFile($path , $disk = 'public'){
        if(!$path) return;
        if($disk == 's3'){
            Storage::disk('s3')->delete($path);
        }else{

            Storage::disk('public')->delete($path);
        }
    }
}