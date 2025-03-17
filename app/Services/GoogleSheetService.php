<?php
namespace App\Services;
use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;


class GoogleSheetService
{
    protected $client;
    protected $service;
    protected $spreadsheetId;

    public function __construct()
    {
        $this->spreadsheetId = env('GOOGLE_SHEET_ID');

        $this->client = new Client();
        $this->client->setAuthConfig(storage_path('app/google-sheets.json'));
        $this->client->setScopes(Sheets::SPREADSHEETS);



        $this->service = new Sheets($this->client);
    }

    public function appendData($data, $range = 'Sheet1!A1')
    {
        $body = new Sheets\ValueRange([
            'values' => $data
        ]);

        $params = ['valueInputOption' => 'RAW'];

        return $this->service->spreadsheets_values->append(
            $this->spreadsheetId,
            $range,
            $body,
            $params
        );
    }
}
?>
