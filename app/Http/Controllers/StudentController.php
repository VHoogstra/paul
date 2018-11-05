<?php

namespace App\Http\Controllers;

use App\Student;
use App\Settings;
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

        $year = Settings::getPhotoYear();
        $directories = Storage::directories('/public/images/');
        $directoriesLength = count($directories);
        for ($i = 0; $i < $directoriesLength; $i++) {
            $directories[$i] = str_replace('public/images/', ' ', $directories[$i]);
        }

        $error = '';

        //$year = DB::table('settings')->where('name', 'photoYear')->first()->value;
        return view('student.photo', compact('year', 'directories', 'error'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studentCount = Student::all()->count();
        return view('student.create', compact('studentCount'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function store(Request $request)
    {
        //https://phpspreadsheet.readthedocs.io/en/develop/search.html?q=date

        $destination = '/public/tmp/';
        $file = Input::file('file');

        $returnDateType = \PhpOffice\PhpSpreadsheet\Calculation\Functions::RETURNDATE_PHP_OBJECT;
        \PhpOffice\PhpSpreadsheet\Calculation\Functions::setReturnDateType($returnDateType);
        $inputFileName = $file;

        /**
         * Load $inputFileName to a Spreadsheet Object
         **/
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
        if ($A !== 'stamnr') {
            $error[] = 'colom A1 is niet gelijk aan Stamnr';
        }
        if ($B !== 'klas') {
            $error[] = 'colom B1 is niet gelijk aan klas';
        }
        if ($C !== 'roepnaam') {
            $error[] = 'colom C1 is niet gelijk aan roepnaam';
        }
        if ($D !== 'tussenv') {
            $error[] = 'colom D1 is niet gelijk aan tussenv)';
        }
        if ($E !== 'achternaam') {
            $error[] = 'colom E1 is niet gelijk aan achternaam';
        }
        if ($F !== 'woonplaats') {
            $error[] = 'colom F1 is niet gelijk aan woonplaats';
        }
        if ($G !== 'adres') {
            $error[] = 'colom G1 is niet gelijk aan adres';
        }
        if ($H !== 'telefoon') {
            $error[] = 'colom H1 is niet gelijk aan telefoon';
        }
        if ($I !== 'geboortedatum') {
            $error[] = 'colom I1 is niet gelijk aan geboortedatum';
        }

        if (count($error) !== 0) {
            return redirect::back()->with('error', $error);
        }

        $worksheet = $spreadsheet->getActiveSheet();
        $p = 0;
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false); // This loops through all cells,
            //    even if a cell value is not set.
            // By default, only cells that have a value
            //    set will be iterated.
            $i = 1;
            if ($p !== 0) {
                $duplicate = false;
                foreach ($cellIterator as $cell) {
                    if ($cell->getValue()) {
                        switch ($i) {
                            case 1:
                                if (Student::where('stamnr', $cell->getValue())->count() === 1) {
                                    $duplicate = true;
                                } else {
                                    $student = new Student;
                                    $student->stamnr = $cell->getValue();
                                };

                                break;
                            case 2:
                                if (!$duplicate) {
                                    $student->class = $cell->getValue();
                                }
                                break;
                            case 3:
                                if (!$duplicate) {
                                    $student->first_name = $cell->getValue();
                                }
                                break;
                            case 4:
                                if (!$duplicate) {
                                    $student->middle_name = $cell->getValue();
                                }
                                break;
                            case 5:
                                if (!$duplicate) {
                                    $student->last_name = $cell->getValue();
                                }
                                break;
                            case 6:
                                if (!$duplicate) {
                                    $student->town = $cell->getValue();
                                }
                                break;
                            case 7:
                                if (!$duplicate) {
                                    $student->adres = $cell->getValue();
                                }
                                break;
                            case 8:
                                if (!$duplicate) {
                                    $student->phone_number = $cell->getValue();
                                }
                                break;
                            case 9:
                                if (!$duplicate) {
                                    $student->birth_date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($cell->getValue())->format('Y-m-d');
                                    try {
                                        $student->save();
                                    } catch (\Illuminate\Database\QueryException $ex) {
                                        array_push($error, $ex->errorInfo[2]);
                                        return redirect::back()->with('error', $error);
                                    }
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::truncate();
        return redirect::back();
    }

    public function storePhotoYear(Request $request)
    {
        $yearmulti = $request->input('yearmulti');
        $year = $request->input('year');
        if ($yearmulti === null) {
            if ($year === null) {
                $error = 'no thingy thing';
            } else {
                Settings::updateYear($year);
                $error = 'succes ';
            }
        } else {
            if ($yearmulti === null) {
                $error = 'no thingy thing';
            } else {
                Settings::updateYear($yearmulti);
                $error = 'succes ';
            }
        }

        $year = Settings::getPhotoYear();
        $directories = Storage::directories('/public/images/');
        $directoriesLength = count($directories);
        for ($i = 0; $i < $directoriesLength; $i++) {
            $directories[$i] = str_replace('public/images/', '', $directories[$i]);
        }
        return view('student.photo', compact('year', 'directories', 'error'));


        ///settings::updateYear(6);
    }

    public function storePhoto(Request $request):void
    {
        $year = Settings::getPhotoYear();
        $destination = '/public/images/' . $year;
        $file = Input::file('file');
        Storage::putFileAs($destination, $file, $file->getClientOriginalName());
    }
}
