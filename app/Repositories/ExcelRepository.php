<?php

namespace App\Repositories;

use App\Models\Excel;

/**
 * Class ExcelRepository
 *
 * @package App\Presenters
 */
class ExcelRepository extends Repository
{
    /**
     * @var int
     */
    public $per_page = 10;

    /**
     * if this model associate other models need ->with('')
     *
     * @param array $data
     *
     * @return mixed
     */
    public function getList(array $data = [])
    {
        $Excel = new Excel();
        if (!empty($data)) {
            $Excel = $this->assemblyWhere($Excel, $data);
        }
        return $Excel->orderBy('id')->Paginate($this->per_page);
    }

    /**
     * @param $id
     *
     * @return Excel|Excel[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find($id)
    {
        return Excel::find($id);
    }

    public function create(array $save)
    {
        return Excel::create($save);
    }

    /**
     * @param array $save
     *
     * @return Excel|\Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreate(array $save)
    {
        $attributes = [];
        if (isset($save['id'])) {
            $attributes['id'] = $save['id'];
        }
        if (isset($save['updated_at'])) {
            $attributes['updated_at'] = $save['updated_at'];
        }
        return Excel::updateOrCreate($attributes, $save);
    }

    /**
     * @param array $save
     *
     * @return Excel|\Illuminate\Database\Eloquent\Model
     */
    public function update(array $save, $id)
    {
        $attributes['updated_at'] = $save['updated_at'];
        return Excel::find($id)->update($attributes, $save);
    }

    /**
     * @param int $id
     *
     * @return int
     */
    public function destroy(int $id)
    {
        return Excel::destroy($id);
    }

}
