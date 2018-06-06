<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //https://phpspreadsheet.readthedocs.io/en/develop/search.html?q=date

        $destination = "/public/tmp/";
        $file = Input::file('file');

        $returnDateType = \PhpOffice\PhpSpreadsheet\Calculation\Functions::RETURNDATE_PHP_OBJECT;
        \PhpOffice\PhpSpreadsheet\Calculation\Functions::setReturnDateType($returnDateType);
        $inputFileName = $file;

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
        $A = strtolower($spreadsheet->getActiveSheet()->getCell('A1')->getValue());
        $B = strtolower($spreadsheet->getActiveSheet()->getCell('B1')->getValue());
        $C = strtolower($spreadsheet->getActiveSheet()->getCell('C1')->getValue());
        $D = strtolower($spreadsheet->getActiveSheet()->getCell('D1')->getValue());
        $E = strtolower($spreadsheet->getActiveSheet()->getCell('E1')->getValue());
        $F = strtolower($spreadsheet->getActiveSheet()->getCell('F1')->getValue());
        $G = strtolower($spreadsheet->getActiveSheet()->getCell('G1')->getValue());
        $H = strtolower($spreadsheet->getActiveSheet()->getCell('H1')->getValue());
        $cellValue = strtolower($spreadsheet->getActiveSheet()->getCell('A1389')->getValue());


        echo $A . " " . $B . " " . $C . " " . $D . " " . $E . " " . $F . " " . $G . " " . $H;
        //Storage::putFileAs($destination, $file, $file->getClientOriginalName());
        $worksheet = $spreadsheet->getActiveSheet();

        echo '<table>' . PHP_EOL;
        foreach ($worksheet->getRowIterator() as $row) {
            $i = 1;

            echo '<tr>' . PHP_EOL;
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
            //    even if a cell value is not set.
            // By default, only cells that have a value
            //    set will be iterated.
            foreach ($cellIterator as $cell) {
                echo '<td>' .
                    $cell->getValue();
                if ($i == 8) {
                    if (is_numeric($cell->getValue())) {

                        echo '<br> ' . \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($cell->getValue())->format('Y-m-d');;
                    } else {
                        echo 'onlytest '.$i;
                    }
                }
                echo '</td>' . PHP_EOL;

                $i++;
            }
            echo '</tr>' . PHP_EOL;
        }
        echo '</table>' . PHP_EOL;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\student $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        //
    }
}
