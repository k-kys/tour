<?php

namespace App\Repositories\Tour\Image;

use App\Models\TourImage;
use App\Repositories\RepositoryEloquent;

class TourImageRepositoryEloquent extends RepositoryEloquent implements TourImageRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\TourImage::class;
    }

    public function getImageTour($tourId)
    {
        return $this->_model->where('tour_id', $tourId)->get();
    }

    public function store($request)
    {
        try {
            $path = $this->uploadImage($request->hasFile('image'), $request->file('image'), $request->tour_id . '/');
            dd($path);
            TourImage::create([
                'tour_id' => $request->tour_id,
                'image_path' => $path,
            ]);

            return [
                'title' => __('Done!'),
                'msg' => __('Add successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Exception $e) {
            return [
                'title' => __('An error has occurred!'),
                'msg' => __('Add failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }
}
