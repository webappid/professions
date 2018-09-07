<?php
namespace WebAppId\Profession\Seeds;

use Illuminate\Database\Seeder;
use WebAppId\Profession\Models\Profession;

class ProfessionSeeder extends Seeder
{
    public function run()
    {
        $csvToArray = new CsvtoArray;
        $file = __DIR__ . '/../resources/csv/profession.csv';
        $header = array('name', 'description');
        $data = $csvToArray->csvToArray($file, $header);
        $collection = collect($data);
        $profession = new Profession;

        foreach ($collection as $chunk) {
            $chunk["code"] = str_replace(' ', '-', strtolower($chunk["name"]));
            $professionData = $profession->getProfession($chunk["code"]);
            if ($professionData == null) {
                $profession->addProfession((object) $chunk);
            }
        }

    }
}
