<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EntryModel;
use CodeIgniter\HTTP\ResponseInterface;
use DateTime;
use IntlDateFormatter;

class Dashboard extends BaseController
{

    private $entryModel;

    public function __construct()
    {
        $this->entryModel = new EntryModel();
    }

    public function index()
    {
        $currentDateTime = date('Y-m-d H:i:s');

        $entries = $this->entryModel
            ->where('created_at >=', date('Y-m-d 00:00:00', strtotime($currentDateTime)))
            ->where('created_at <=', date('Y-m-d 23:59:59', strtotime($currentDateTime)))
            ->findAll();

        return view('home', ['entries' => $entries]);
    }

    public function history()
    {
        $currentDateTime = date('Y-m-d H:i:s');

        $entries = $this->entryModel->orderBy('created_at', "desc")->paginate(10);

        $data = [
            'entries' => $entries,
            'pager' => $this->entryModel->pager
        ];

        return view('history', $data);
    }

    public function report()
    {

        // Calcular a soma dos valores para o mês atual
        $monthSum1 = $this->entryModel->selectSum('value')
            ->where('created_at >=', date('Y-m-01 00:00:00'))
            ->where('created_at <=', date('Y-m-t 23:59:59'))
            ->where('deleted_at IS NULL')
            ->get()->getRow()->value ?? 0;

        $monthSum2 = $this->entryModel->selectSum('value')
            ->where('created_at >=', date('Y-m-01 00:00:00', strtotime('first day of last month')))
            ->where('created_at <=', date('Y-m-t 23:59:59', strtotime('last day of last month')))
            ->where('deleted_at IS NULL')
            ->get()->getRow()->value ?? 0;

        $monthSum3 = $this->entryModel->selectSum('value')
            ->where('created_at >=', date('Y-m-01 00:00:00', strtotime('first day of -2 months')))
            ->where('created_at <=', date('Y-m-t 23:59:59', strtotime('last day of -2 months')))
            ->where('deleted_at IS NULL')
            ->get()->getRow()->value ?? 0;

        $data['monthSum1'] = $monthSum1;
        $data['monthSum2'] = $monthSum2;
        $data['monthSum3'] = $monthSum3;
        $data['months'] = $this->getMonths();

        return view('report', $data);
    }

    private function getMonths()
    {
        // Criar um objeto DateTime para o mês atual
        $mesAtual = new DateTime();
        $mesAtual->setDate($mesAtual->format('Y'), $mesAtual->format('n'), 1); // Definir o primeiro dia do mês
        $mesAtualNome = $mesAtual->format('F'); // Nome do mês em inglês

        // Criar um objeto DateTime para o penúltimo mês
        $mesPenultimo = new DateTime('first day of -1 month');
        $mesPenultimoNome = $mesPenultimo->format('F'); // Nome do mês em inglês

        // Criar um objeto DateTime para o antepenúltimo mês
        $mesAntepenultimo = new DateTime('first day of -2 month');
        $mesAntepenultimoNome = $mesAntepenultimo->format('F'); // Nome do mês em inglês

        // Converter os nomes dos meses para português
        $intlFormatter = new IntlDateFormatter('pt_BR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        $mesAtualNomePt = $intlFormatter->format($mesAtual);
        $mesPenultimoNomePt = $intlFormatter->format($mesPenultimo);
        $mesAntepenultimoNomePt = $intlFormatter->format($mesAntepenultimo);

        return [
            'mesAtual' => $mesAtualNomePt,
            'mesPenultimo' => $mesPenultimoNomePt,
            'mesAntepenultimo' => $mesAntepenultimoNomePt
        ];
    }
}
