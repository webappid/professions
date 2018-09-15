<?php
namespace WebAppId\Profession\Tests\Unit\Models;

use WebAppId\Profession\Models\ProfessionCategory;
use WebAppId\Profession\Tests\TestCase;

class ProfesionCategoryTest extends TestCase
{
    private $professionCategory;

    public function setUp()
    {   
        $this->professionCategory = new ProfessionCategory();
        parent::setUp();
    }

    public function testGetAll(){
        $professionCategoryData = $this->professionCategory->getAllProfessionCategory();
        if(count($professionCategoryData)>0){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    
}
