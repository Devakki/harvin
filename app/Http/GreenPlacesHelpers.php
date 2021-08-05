<?php
namespace App\Http;

use App\Models\User;
use Auth;
use Carbon\Carbon;
use Config;
use DB;
use FFMPEG;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;
use Request;
use Response;

class GreenPlacesHelpers
{   
    public static function saveUploadedImage($file, $storagePath, $fileOldName='', $isCreateThumb="1", $height=200, $width=200, $cropped_image='')
    {
        $randomStringTemplate = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = substr(str_shuffle(str_repeat($randomStringTemplate, 5)), 0, 5);

        $timestamp = Carbon::createFromFormat('U.u', microtime(true))->format("YmdHisu");
        $nameWithoutExtension = preg_replace("/[^a-zA-Z0-9]/", "", '') . '' . $timestamp;
        $nameWithoutExtension = $nameWithoutExtension.'-'.$randomString;
        $fileExtension = $file->getClientOriginalExtension();
        $name = $nameWithoutExtension. '.' . $fileExtension;
        $name = str_replace([' ', ':', '-'], "", $name);

        $deleteFileList = array();
        $thumbName = "";

        try {
            $img = Image::make($file->getRealPath())
                                ->orientate()
                                ->encode($fileExtension, 100);
                
            $media_file_upload_res = Storage::put($storagePath . $name, $img);
            if($media_file_upload_res) {
                $imageName = $name;
                if($isCreateThumb == "1") {
                    $thumbnailStoragePath = $storagePath."thumb/";
                    if ($cropped_image != "") {
                    
                        /* Resize profile picture small */
                        $image_thumb_content = Image::make($cropped_image)
                                ->resize($width, $height, function ($constraint) {
                                    $constraint->aspectRatio();
                                    $constraint->upsize();
                                })
                                ->orientate()
                                ->encode($fileExtension);                    
                        Storage::put($thumbnailStoragePath . $name, $image_thumb_content); 
                    } else{

                        $original_image_contents = Storage::get($storagePath . $name);                        
                        /* Resize profile picture small */
                        $image_thumb_content = Image::make($original_image_contents)
                                ->resize($width, $height, function ($constraint) {
                                    $constraint->aspectRatio();
                                    $constraint->upsize();
                                })
                                ->orientate()
                                ->encode($fileExtension, 100);                    
                        Storage::put($thumbnailStoragePath . $name, $image_thumb_content);
                    }
                }
                
            }

            if (!empty($fileOldName)) {
                $deleteFileList[] = $storagePath.$fileOldName;
                $deleteFileList[] = $storagePath."thumb/".$fileOldName;
            }

            if(count($deleteFileList) > 0) {
                GreenPlacesHelpers::deleteIfFileExist($deleteFileList);
            }

            $returnArray = array('name' => $imageName, "error_msg" => "");
            return $returnArray;

        } catch (Exception $e) {
            GreenPlacesHelpers::deleteIfFileExist($deleteFileList);
            $returnArray = array('name' => "", "error_msg" => $e->getMessage());
            return $returnArray;
        }
    }

    public static function saveUploadedImageS3($file, $storagePath, $fileOldName='', $isCreateThumb="1", $height=200, $width=200) {
        $randomStringTemplate = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = substr(str_shuffle(str_repeat($randomStringTemplate, 5)), 0, 5);

        $timestamp = Carbon::createFromFormat('U.u', microtime(true))->format("YmdHisu");
        $nameWithoutExtension = preg_replace("/[^a-zA-Z0-9]/", "", '') . '' . $timestamp;
        $nameWithoutExtension = $nameWithoutExtension.'-'.$randomString;
        $fileExtension = $file->getClientOriginalExtension();
        $name = $nameWithoutExtension. '.' . $fileExtension;
        $name = str_replace([' ', ':', '-'], "", $name);

        $deleteFileList = array();
        $thumbName = "";

        try {
            $img = Image::make($file->getRealPath())
                                ->orientate()
                                ->encode($fileExtension);
                
            $media_file_upload_res = Storage::disk('s3')->put($storagePath . $name, $img);
            if($media_file_upload_res) {
                $imageName = $name;
                if($isCreateThumb == "1") {
                    $original_image_contents = Storage::disk('s3')->get($storagePath . $name);
                    
                    /* Resize profile picture small */
                    $image_thumb_content = Image::make($original_image_contents)
                            ->resize($width, $height, function ($constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            })
                            ->orientate()
                            ->encode($fileExtension);
                    
                    $thumbnailStoragePath = $storagePath."thumb/";
                    Storage::disk('s3')->put($thumbnailStoragePath . $name, $image_thumb_content);
                }

                
            }

            if (!empty($fileOldName)) {
                $deleteFileList[] = $storagePath.$fileOldName;
                $deleteFileList[] = $storagePath."thumb/".$fileOldName;
            }

            if(count($deleteFileList) > 0) {
                GreenPlacesHelpers::deleteIfFileExistS3($deleteFileList);
            }

            $returnArray = array('name' => $imageName, "error_msg" => "");
            return $returnArray;

        } catch (Exception $e) {
            GreenPlacesHelpers::deleteIfFileExistS3($deleteFileList);
            $returnArray = array('name' => "", "error_msg" => $e->getMessage());
            return $returnArray;
        }
    }

    public static function deleteIfFileExist($files){
        if(is_array($files) && count($files)>0) {
            foreach ($files as $key => $path) {
                if (!empty($path) && Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
        }
        else {
            if (!empty($files) && Storage::exists($files)) {
                Storage::delete($files);
            }
        }
    }

    public static function deleteIfFileExistS3($files){
        if(is_array($files) && count($files)>0) {
            foreach ($files as $key => $path) {
                if (!empty($path) && Storage::disk('s3')->exists($path)) {
                    Storage::disk('s3')->delete($path);
                }
            }
        }
        else {
            if (!empty($files) && Storage::disk('s3')->exists($files)) {
                Storage::disk('s3')->delete($files);
            }
        }
    }
    
    public static function uploadFile($file, $storagePath, $fileOldName = '') {

        $randomStringTemplate = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = substr(str_shuffle(str_repeat($randomStringTemplate, 5)), 0, 5);

        $timestamp = Carbon::createFromFormat('U.u', microtime(true))->format("YmdHisu");
        $nameWithoutExtension = preg_replace("/[^a-zA-Z0-9]/", "", '') . '' . $timestamp;
        $nameWithoutExtension = $nameWithoutExtension.'-'.$randomString;
        $fileExtension = $file->getClientOriginalExtension();
        $name = $nameWithoutExtension. '.' . $fileExtension;
        $name = str_replace([' ', ':', '-'], "", $name);

        $deleteFileList = array();

        try {
            $returnArray = array('name' => "", "error_msg" => "Sorry something went wrong please try again");
            
            if( Storage::put($storagePath . $name,  file_get_contents($file->getRealPath())) ) {
                $returnArray = array('name' => $name, "error_msg" => "");
            }

            if (!empty($fileOldName)) {
                $deleteFileList[] = $storagePath.$fileOldName;
            }

            if(count($deleteFileList) > 0) {
                GreenPlacesHelpers::deleteIfFileExist($deleteFileList);
            }

            return $returnArray;

        } catch (Exception $e) {
            $returnArray = array('name' => "", "error_msg" => $e.getMessage());
            return $returnArray;
        }
    }
    public static function apiUserNotFoundResponse()
    {
        $statusCodes = config("greenplaces.status_codes");
        return GreenPlacesHelpers::apiJsonResponse([], $statusCodes['auth_fail'], "User not found");
    }

    public static function apiJsonResponse($responseData=[], $code='', $message = "")
    {
        $statusCodes = config("greenplaces.status_codes");
        if($code == '') {
            $code = $statusCodes['success'];
            if(count($responseData) == 0) {
                $code = $statusCodes['success_with_empty'];
            }
        }

        $data = array(
                        'message' => $message,
                        'data' => $responseData
                    );
        return Response::json($data, $code);
    }

    public static function generateUniqueFileName($fileExtension)
    {
        $randomStringTemplate = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = substr(str_shuffle(str_repeat($randomStringTemplate, 5)), 0, 5);
        $timestamp = Carbon::createFromFormat('U.u', microtime(true))->format("YmdHisu");
        $nameWithoutExtension = preg_replace("/[^a-zA-Z0-9]/", "", '') . '' . $timestamp;
        $nameWithoutExtension = $nameWithoutExtension.'-'.$randomString;                            
        $name = $nameWithoutExtension. '.' . $fileExtension;
        $name = str_replace([' ', ':', '-'], "", $name);
        return $name;
    }

    public static function apiValidationFailResponse($validator)
    {   
        $statusCodes = config("greenplacew.status_codes");
        $messages = $validator->errors();
        if (is_object($messages)) {
            $messages = $messages->toArray();
        }            
        return GreenPlacesHelpers::apiJsonResponse($messages, $statusCodes['form_validation'], "Validation Error");
    }

    public static function generateUniqueSlug($model, $stringForSlug, $id = 0, $slugColumn = "slug")
    {
        $slug = Str::slug($stringForSlug);
        
        $allSlugs = GreenPlacesHelpers::getRelatedSlugs($slug, $model, $id, $slugColumn);

        if (! $allSlugs->contains($slugColumn, $slug)){
            return $slug;
        }

        $i = 1;
        do {
            $newSlug = $slug.'-'.$i;
            $i++;
        } while ($allSlugs->contains($slugColumn, $newSlug));

        $slug = $newSlug;

        $allSlugs = GreenPlacesHelpers::getRelatedSlugs($slug, $model, $id, $slugColumn);
        if (! $allSlugs->contains($slugColumn, $slug)){
            return $slug;
        }

        return GreenPlacesHelpers::generateUniqueSlug($model, $slug, $id, $slugColumn);
    }

    public static function getRelatedSlugs($slug, $model, $id, $slugColumn)
    {
        return $model->select($slugColumn)->where($slugColumn, 'like', $slug.'%')
                                    ->where('id', '<>', $id)                                   
                                    ->get();
    }

    public static function buildTreeStructure(array $elements, $parentId = '0', $idColumnName = "id", $parentIdColumnName = "parent_comment_id") {
        $branch = array();
        if (count($elements) > 0) {
            foreach ($elements as $element) {
                if ($element[$parentIdColumnName] == $parentId) {
                    $children = self::buildTreeStructure($elements, $element[$idColumnName], $idColumnName, $parentIdColumnName);
                    if ($children) {                          
                         $element['children'] = $children;
                    }
                    $branch[] = $element;
                }
            }
        }            
        return $branch;
    }

}
