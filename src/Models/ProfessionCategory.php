<?php
namespace WebAppId\Profession\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class ProfessionCategory extends Model
{
    protected $table = 'profession_categories';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['id', 'code', 'name'];

    /**
     * Add Profession
     *
     * @param Request $request
     * @return boolean/object
     */
    public function addProfessionCategory($request)
    {

        try {
            $professionCategory = new self();
            $professionCategory->id = $request->id;
            $professionCategory->code = $request->code;
            $professionCategory->name = $request->name;
            $professionCategory->save();
            return $professionCategory;
        } catch (QueryException $e) {
            report($e);
            return false;
        }
    }

    /**
     * Update Profession By Code
     *
     * @param Request $request
     * @param String $code
     * @return Object
     */
    public function updateProfessionCategoryByCode($request, $code)
    {
        $professionCategoryData = $this->getProfessionCategory($code);
        return $this->updateProfessionCategory($professionCategoryData, $request);
    }

    /**
     * Update Profession By Id
     *
     * @param Request $request
     * @param Integer $id
     * @return Profession
     */
    public function updateProfessionCategoryById($request, $id)
    {
        $professionCategoryData = $this->getProfessionCategoryById($id);
        return $this->updateProfessionCategory($professionCategoryData, $request);
    }

    /**
     * Update Profession
     *
     * @param Profession $professionCategoryData
     * @param Request $request
     * @return Profession
     */
    private function updateProfessionCategory($professionCategoryData, $request){
        if ($professionCategoryData != null) {
            $professionCategoryData->code = $request->code;
            $professionCategoryData->name = $request->name;
            $professionCategoryData->save();
            return $professionCategoryData;
        }
        return false;
    }

    /**
     * Get Profession By Code
     *
     * @param String $code
     * @return List Of Profession
     */
    public function getProfessionCategory($code)
    {
        return $this->where('code', $code)->first();
    }

    /**
     * Get Profession By Id
     *
     * @param String $code
     * @return List Of Profession
     */
    public function getProfessionCategoryById($id)
    {
        return $this->where('id', $id)->first();
    }

    /**
     * getAllProfessionCategory
     *
     * @return List Of Profession
     */
    public function getAllProfessionCategory()
    {
        return $this->get();
    }

    /**
     * Delete profession by code
     *
     * @param String $code
     * @return boolean
     */
    public function deleteProfessionCategoryBy($code)
    {
        try {
            $this->where('code', $code)->delete();
            return true;
        } catch (QueryException $e) {
            report($e);
            return false;
        }
    }

}
