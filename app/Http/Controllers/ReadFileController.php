<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Illuminate\Support\Facades\DB;

class ReadFileController extends Controller
{
    public function readfile(){
        $inputFileType = 'Xlsx';
        $inputFileName = 'uploads/Plantilla analisis ultima version.xlsx';
        $sheetname = 'BALANCES';

        $reader = IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($inputFileName);

       // $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        //TOTAL ACTIVO 
      //  $valor = $spreadsheet->getSheetByName($sheetname)->toArray(null, true, true, true);
        $valor = $spreadsheet->getSheetByName($sheetname)->getCell('J17')->getValue();
       
       
        //TOTAL PASIVO
        $valor2 = $spreadsheet->getSheetByName($sheetname)->getCell('J17')->getCalculatedValue();
        // var_dump("total pasivo : ".$valor);
        
       
       
        return view('leido',['valor' => 3, 'valor2' => 12 ] );
       
    


        }

}
