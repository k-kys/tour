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
                'title' => __('An error has occurred!'),
                'msg' => __('Save failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }

    public function updateSlider($sliderId, $title, $image, $content)
    {
        try {
            $slider = $this->find($sliderId);
            $slider->title = $title;
            if ($image) {
                $slider->image_path = $image;
            }
            $slider->content = $content;
            $slider->updated_at = now();
            $slider->save();

            return [
                'msg' => __('Update successfully.'),
                'stt' => self::TYPE_SUCCESS,
            ];
        } catch (\Throwable $th) {
            // throw $th;
            return [
                'msg' => __('Update failed.'),
                'stt' => self::TYPE_ERROR,
            ];
        }
    }
}
