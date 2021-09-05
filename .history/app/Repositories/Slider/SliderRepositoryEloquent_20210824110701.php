<?php

namespace App\Repositories\Slider;

use App\Models\Slider;
use App\Repositories\RepositoryEloquent;

class SliderRepositoryEloquent extends RepositoryEloquent implements SliderRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Slider::class;
    }

    public function storeSlider($request, $image)
    {
        try {
            $slider = new Slider();
            $slider->admin_id = 1;
            $slider->title = $request->title;
            $slider->content = $request->content;
            if ($image) {
                $slider->image_path = $image;
            }
            $slider->save();

            return [
                'title' => __('Done!'),
                'msg' => __('Save successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Exception $e) {
            //throw $th;
            return [
                'title' => __('Failed!'),
                'msg' => __('Save failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }
}
