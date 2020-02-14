<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExport;
use App\Imports\ExcelImports;
use App\Formatters\ExcelFormatter;
use App\Transformers\ExcelTransformer;
use App\Services\ExcelService;
use Exception;
use Maatwebsite\Excel\Facades\Excel;


/**
 * Class ExcelController
 *
 * @package App\Http\Controllers
 */
class ExcelController extends Controller
{
    /**
     * @var ExcelService
     */
    protected $service;
    /**
     * ExcelFormatter
     *
     * @var ExcelFormatter
     */
    private $formatter;
    /**
     * @var ExcelTransformer
     */
    private $transformer;

    /**
     * @var bool
     */
    private $enable_filter = true;

    /**
     * ExcelController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new ExcelService();
        if ($this->enable_filter) {
            $this->formatter = new ExcelFormatter();
            $this->transformer = new ExcelTransformer();
        }
    }

    public function mergeFiles()
    {
        $merge_array = $this->service->getMergeArray();
        $export = new ExcelExport($merge_array);
        return Excel::download($export, 'ExcelExport.xlsx');
    }

    public function readColor()
    {

    }

    public function export()
    {
        $excel_name = 'excel.xls';
        return Excel::download(new ExcelExport, $excel_name);
    }
}
