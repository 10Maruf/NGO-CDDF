<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('application')) {
    function application()
    {
        return DB::table('applications')->first();
    }
}

if (!function_exists('compress_and_save_image')) {
    /**
     * Compress and save an uploaded image file so its size is under 500 KB (or $maxSizeBytes).
     *
     * @param \Illuminate\Http\UploadedFile|string $file
     * @param string $destinationPath Target directory path
     * @param string $fileName Target file name
     * @param int $maxSizeBytes Maximum size in bytes (default 512000 = 500 KB)
     * @return string Target file name
     */
    function compress_and_save_image($file, string $destinationPath, string $fileName, int $maxSizeBytes = 512000): string
    {

    if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0755, true);
    }

    // Dynamically increase memory limit for image processing
    @ini_set('memory_limit', '512M');

    $targetFullPath = rtrim($destinationPath, '/\\') . DIRECTORY_SEPARATOR . $fileName;


    // Save temporary or original file to target location
    if ($file instanceof \Illuminate\Http\UploadedFile) {
        $file->move($destinationPath, $fileName);
    } else if (is_string($file) && file_exists($file) && realpath($file) !== realpath($targetFullPath)) {
        copy($file, $targetFullPath);
    }

    if (!file_exists($targetFullPath)) {
        return $fileName;
    }

    // If GD extension is not available, we return the saved file as-is
    if (!extension_loaded('gd')) {
        return $fileName;
    }

    $fileSize = filesize($targetFullPath);
    $imageInfo = @getimagesize($targetFullPath);

    if (!$imageInfo) {
        return $fileName;
    }

    $mime = $imageInfo['mime'] ?? '';
    $width = $imageInfo[0] ?? 0;
    $height = $imageInfo[1] ?? 0;

    // If file is already under target max size and dimensions are within reasonable limit (<= 1920px), return
    if ($fileSize <= $maxSizeBytes && $width <= 1920 && $height <= 1920) {
        return $fileName;
    }

    // Create GD image resource from file
    $srcImage = null;
    switch ($mime) {
        case 'image/jpeg':
        case 'image/jpg':
            $srcImage = @imagecreatefromjpeg($targetFullPath);
            break;
        case 'image/png':
            $srcImage = @imagecreatefrompng($targetFullPath);
            break;
        case 'image/webp':
            $srcImage = @imagecreatefromwebp($targetFullPath);
            break;
        case 'image/gif':
            $srcImage = @imagecreatefromgif($targetFullPath);
            break;
        default:
            $fileData = @file_get_contents($targetFullPath);
            if ($fileData) {
                $srcImage = @imagecreatefromstring($fileData);
            }
            break;
    }

    if (!$srcImage) {
        return $fileName;
    }

    // Resize image if max dimension exceeds 1920px
    $maxDimension = 1920;
    if ($width > $maxDimension || $height > $maxDimension) {
        if ($width >= $height) {
            $newWidth = $maxDimension;
            $newHeight = (int) round(($height / $width) * $maxDimension);
        } else {
            $newHeight = $maxDimension;
            $newWidth = (int) round(($width / $height) * $maxDimension);
        }

        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

        if ($mime === 'image/png' || $mime === 'image/webp') {
            imagealphablending($resizedImage, false);
            imagesavealpha($resizedImage, true);
            $transparent = imagecolorallocatealpha($resizedImage, 255, 255, 255, 127);
            imagefilledrectangle($resizedImage, 0, 0, $newWidth, $newHeight, $transparent);
        }

        imagecopyresampled($resizedImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        imagedestroy($srcImage);
        $srcImage = $resizedImage;
        $width = $newWidth;
        $height = $newHeight;
    }

    // Iteratively compress image until file size <= $maxSizeBytes
    $quality = 85;
    $tempPath = $targetFullPath . '.tmp';

    do {
        if ($mime === 'image/png') {
            $pngQuality = (int) round((100 - $quality) / 10);
            if ($pngQuality > 9) $pngQuality = 9;
            if ($pngQuality < 0) $pngQuality = 0;
            imagepng($srcImage, $tempPath, $pngQuality);
        } elseif ($mime === 'image/webp') {
            imagewebp($srcImage, $tempPath, $quality);
        } else {
            imagejpeg($srcImage, $tempPath, $quality);
        }

        $currentSize = file_exists($tempPath) ? filesize($tempPath) : $fileSize;

        if ($currentSize <= $maxSizeBytes || $quality <= 20) {
            // If PNG remains larger than maxSizeBytes even at high compression, convert scale or reduce dimensions
            if ($currentSize > $maxSizeBytes && $width > 600) {
                $scaleFactor = 0.8;
                $newWidth = (int) round($width * $scaleFactor);
                $newHeight = (int) round($height * $scaleFactor);
                $scaledImage = imagecreatetruecolor($newWidth, $newHeight);

                if ($mime === 'image/png' || $mime === 'image/webp') {
                    imagealphablending($scaledImage, false);
                    imagesavealpha($scaledImage, true);
                    $transparent = imagecolorallocatealpha($scaledImage, 255, 255, 255, 127);
                    imagefilledrectangle($scaledImage, 0, 0, $newWidth, $newHeight, $transparent);
                }

                imagecopyresampled($scaledImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                imagedestroy($srcImage);
                $srcImage = $scaledImage;
                $width = $newWidth;
                $height = $newHeight;
                $quality = 75;
            } else {
                break;
            }
        } else {
            $quality -= 10;
        }
    } while ($quality >= 10);

    imagedestroy($srcImage);

    if (file_exists($tempPath)) {
        if (filesize($tempPath) <= $maxSizeBytes || filesize($tempPath) < filesize($targetFullPath)) {
            @unlink($targetFullPath);
            rename($tempPath, $targetFullPath);
        } else {
            @unlink($tempPath);
        }
    }

    return $fileName;
}
}










