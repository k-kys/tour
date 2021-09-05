<?php

namespace App\Repositories\Tour\Plan;

use App\Models\Tour;
use App\Models\TourPlan;
use App\Repositories\RepositoryEloquent;

class TourPlanRepositoryEloquent extends RepositoryEloquent implements TourPlanRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\TourPlan::class;
    }

    public function store($request)
    {
        try {
            $data = $request->all();
            $day = $data['day'];
            foreach ($day as $key => $value) {
                TourPlan::create([
                    'tour_id' => $data['tour_id'],
                    'day' => $value,
                    'content' => $data['content'][$key],
                    'note' => $data['note'][$key],
                ]);
            }

            return [
                'title' => __('Done!'),
                'msg' => __('Save successfully.'),
                'stt' => self::STATUS_SUCCESS,
            ];
        } catch (\Exception $e) {
            return [
                'title' => __('An error has occurred!'),
                'msg' => __('Save failed.'),
                'stt' => self::STATUS_ERROR,
            ];
        }
    }

    public function getPlan($tourId)
    {
        $data = $this->_model->where('tour_id', $tourId)->get();
        $data['tour_name'] = $this->getTourName($tourId);
        dd($data);
    }

    public function getTourname($tourId)
    {
        return Tour::select('name')->where('id', $tourId)->first()->name;
    }
}
