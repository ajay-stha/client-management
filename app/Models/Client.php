<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $csvFilePath = 'clients.csv';

    public function getAllClients()
    {
        $file = fopen($this->csvFilePath, 'r');
        $clients = [];

        while (($row = fgetcsv($file)) !== false) {
            $clients[] = [
                'name'=> $row[0],
                'gender'=> $row[1],
                'phone'=> $row[2],
                'email'=> $row[3],
                'address'=> $row[4],
                'nationality'=> $row[5],
                'dob'=> $row[6],
                'educationBackground'=> $row[7],
                'preferredModeofContact'=> $row[8],
            ];
        }

        fclose($file);

        return $clients;
    }

    public function storeClient(array $data)
    {
        $file = fopen($this->csvFilePath, 'a+');
        fputcsv($file, $data);
        fclose($file);
    }
}
