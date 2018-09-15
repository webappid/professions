<?php
namespace WebAppId\Profession\Tests\Unit\Models;

use WebAppId\Profession\Models\Profession;
use WebAppId\Profession\Tests\TestCase;

class ProfesionTest extends TestCase
{
    private $profession;

    public function setUp()
    {   
        $this->profession = new Profession();
        parent::setUp();
    }

    public function testGetAll(){
        $professionData = $this->profession->getAllProfession();
    
        if(count($professionData)>0){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    
}
