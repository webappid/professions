<?php
namespace WebAppId\Profession\Seeds;

use Illuminate\Database\Seeder;
use WebAppId\Profession\Models\ProfessionCategory;

class ProfessionCategorySeeder extends Seeder
{
    public function run()
    {
        $csvToArray = new CsvtoArray;
        $file = __DIR__ . '/../resources/csv/profession_categories.csv';
        $header = array('id','name');
        $data = $csvToArray->csvToArray($file, $header);
        $collection = collect($data);
        $professionCategory = new ProfessionCategory;

        foreach ($collection as $chunk) {
            $chunk["code"] = strtolower(str_replace(' ', '-', strtolower(str_replace('/','-',$chunk["name"]))));
            $professionCategoryData = $professionCategory->getProfessionCategoryById($chunk["id"]);
            if ($professionCategoryData == null) {
                $professionCategory->addProfessionCategory((object) $chunk);
            }
        }

    }
}
