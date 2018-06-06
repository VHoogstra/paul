<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

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
        $studentCount = student::all()->count();
        return view('student.create', compact('studentCount'));
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
        $I = strtolower($spreadsheet->getActiveSheet()->getCell('I1')->getValue());
        //check for errors. are all the headers correct? send error message
        $error = [];
        if ($A != 'stamnr') {
            array_push($error, "colom A1 is niet gelijk aan Stamnr");
        }
        if ($B != 'klas') {
            array_push($error, "colom B1 is niet gelijk aan klas");
        }
        if ($C != 'roepnaam') {
            array_push($error, "colom C1 is niet gelijk aan roepnaam");
        }
        if ($D != 'tussenv') {
            array_push($error, "colom D1 is niet gelijk aan tussenv)");
        }
        if ($E != 'achternaam') {
            array_push($error, "colom E1 is niet gelijk aan achternaam");
        }
        if ($F != 'woonplaats') {
            array_push($error, "colom F1 is niet gelijk aan woonplaats");
        }
        if ($G != 'adres') {
            array_push($error, "colom I1 is niet gelijk aan adres");
        }
        if ($H != 'telefoon') {
            array_push($error, "colom G1 is niet gelijk aan telefoon");
        }
        if ($I != 'geboortedatum') {
            array_push($error, "colom H1 is niet gelijk aan geboortedatum");
        }

        if (count($error) != 0) {
            return redirect::back()->with('error', $error);
        }

        $worksheet = $spreadsheet->getActiveSheet();
        $p = 0;
        foreach ($worksheet->getRowIterator() as $row) {

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
            //    even if a cell value is not set.
            // By default, only cells that have a value
            //    set will be iterated.
            $i = 1;
            if ($p != 0) {
                foreach ($cellIterator as $cell) {
                    if ($cell->getValue()) {
                        switch ($i) {
                            case 1:
                                $student = new student;
                                $student->stamnr = $cell->getValue();
                                break;
                            case 2:
                                $student->class = $cell->getValue();
                                break;
                            case 3:
                                $student->first_name = $cell->getValue();
                                break;
                            case 4:
                                $student->middle_name = $cell->getValue();
                                break;
                            case 5:
                                $student->last_name = $cell->getValue();
                                break;
                            case 6:
                                $student->town = $cell->getValue();
                                break;
                            case 7:
                                $student->adres = $cell->getValue();
                                break;
                            case 8:
                                $student->phone_number = $cell->getValue();
                                break;
                            case 9:
                                $student->birth_date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($cell->getValue())->format('Y-m-d');
                                try {
                                    $student->save();
                                } catch (\Illuminate\Database\QueryException $ex) {
                                    array_push($error, $ex->errorInfo[2]);
                                    return redirect::back()->with('error', $error);
                                }
                                break;
                        }
                    }
                    $i++;
                }
            }
            $p++;
        }
        return redirect::back()->with('succes', 'successvol geupload ');
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
        student::truncate();
        return redirect::back();
    }
}
