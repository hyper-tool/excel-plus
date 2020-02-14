<?php

namespace App\Services;

use App\Imports\ExcelImports;
use App\Presenters\ExcelPresenter;
use App\Repositories\ExcelRepository;

/**
 * Class ExcelService
 *
 * @package App\Services
 */
class ExcelService extends Service
{
    /**
     * @var ExcelRepository
     */
    protected $repository;

    /**
     * @var
     */
    private $request_data;

    /**
     * ExcelService constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->repository = new ExcelRepository();
    }

    public function getMergeArray($merge_array = [])
    {
        $excels_path = resource_path('excels/merges');
        $excel_files = scandir($excels_path);
        foreach ($excel_files as $excel_file) {
            $excel_file_path = $excels_path . '/' . $excel_file;
            if (is_file($excel_file_path)) {
                $array = (new ExcelImports)->toArray($excel_file_path)[0];
                foreach ($array as $key => $value) {
                    $merge_array[] = $value;
                }
            }
        }
        return $merge_array;
    }


}
