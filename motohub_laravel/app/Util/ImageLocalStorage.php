<?php
namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        try {
            $fileName = $this->generateName() . '.' . $request->file('image')->getClientOriginalExtension();
            if ($request->hasFile('image')) {
                Storage::disk('public')->put(
                    $fileName,
                    file_get_contents($request->file('image')->getRealPath())
                );
            }
            return $fileName;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function generateName(): string
    {
        $cleanedEmail = preg_replace('/[^A-Za-z0-9\-]/', '_', auth()->user()->email);
        $name = $cleanedEmail . '_' . time();
        return $name;
    }
}
