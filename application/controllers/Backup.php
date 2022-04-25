<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Backup extends CI_Controller
{

    //Construtor
    public function __construct()
    {

        parent::__construct();

        //Load do Model
        $this->load->model('acessos_model');
        $this->load->model('web_model');
    }



    public function gerarsql()
    {
        $this->load->dbutil();
        $prefs = array(
            'format' => 'zip',
            'filename' => 'backup_' . date('d-m-Y') . '.sql'
        );


        $backup = $this->dbutil->backup($prefs);

        $this->load->helper('file');
        write_file('backups/mysql/backup.zip', $backup);

        $this->load->helper('download');
        force_download('backup.zip', $backup);
    }

    public function planilhacliente()
    {

        //Farfetch'Data
        $gerarPlanilhaCliente = $this->acessos_model->gerarPlanilhaClientev1();


        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="backupclientes.xlsx"');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nome Cliente');
        $sheet->setCellValue('C1', 'Tipo de Acesso');
        $sheet->setCellValue('D1', 'Login');
        $sheet->setCellValue('E1', 'Senha');
        $sheet->setCellValue('F1', 'Informação Adicional');


        $sn = 2;

        foreach ($gerarPlanilhaCliente as $planclient) {
            $sheet->setCellValue('A' . $sn, $planclient->id);
            $sheet->setCellValue('B' . $sn, $planclient->nome_cliente);
            $sheet->setCellValue('C' . $sn, $planclient->tipo_acesso);
            $sheet->setCellValue('D' . $sn, $planclient->login);
            $sheet->setCellValue('E' . $sn, $this->encrypt->decode($planclient->senha));
            $sheet->setCellValue('F' . $sn, $planclient->adicional);
            $sn++;
        }


        $writer = new Xlsx($spreadsheet);
        $writer->save("./backups/clientes/backupcliente.xlsx");
    }


    public function planilhaweb()
    {

        //Farfetch'Data
        $gerarPlanilhaWeb = $this->web_model->gerarPlanilhaWebv1();


        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="backupweb.xlsx"');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nome Cliente');
        $sheet->setCellValue('C1', 'Tipo de Acesso');
        $sheet->setCellValue('D1', 'Login');
        $sheet->setCellValue('E1', 'Senha');
        $sheet->setCellValue('F1', 'Informação Adicional');


        $malandrao = 2;

        foreach ($gerarPlanilhaWeb as $planweb) {
            $sheet->setCellValue('A' . $malandrao, $planweb->id);
            $sheet->setCellValue('B' . $malandrao, $planweb->nome_cliente);
            $sheet->setCellValue('C' . $malandrao, $planweb->tipo_acesso);
            $sheet->setCellValue('D' . $malandrao, $planweb->login);
            $sheet->setCellValue('E' . $malandrao, $this->encrypt->decode($planweb->senha));
            $sheet->setCellValue('F' . $malandrao, $planweb->adicional);
            $malandrao++;
        }


        $writer = new Xlsx($spreadsheet);
        $writer->save("./backups/web/backupweb.xlsx");
    }
}
