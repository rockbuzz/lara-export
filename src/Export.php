<?php

namespace Rockbuzz\LaraExport;

class Export
{
    const CSV = 'Csv';
    const XLSX = 'Xlsx';
    const XLS = 'Xls';
    const ODS = 'Ods';
    const HTML = 'Html';

    protected $spreadsheet;

    public function __construct()
    {
        $this->spreadsheet = \yidas\phpSpreadsheet\Helper::newSpreadsheet();
    }

    public function header(array $header = [])
    {
        $this->spreadsheet->addRow($header);

        return $this;
    }

    public function data(array $data = [])
    {
        foreach($data as $item) {
            $this->spreadsheet->addRow($item);
        }

        return $this;
    }

    public function output(string $filename='excel', string $format=self::CSV)
    {
        $this->spreadsheet->output($filename, $format);
    }

    public function save(string $filename='excel', string $format=self::CSV)
    {
        $this->spreadsheet->save($filename, $format);
    }

}
