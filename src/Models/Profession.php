<?php
namespace WebAppId\Profession\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Profession extends Model
{
    protected $table = 'professions';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['id', 'code', 'name', 'description'];

    /**
     * Add Profession
     *
     * @param Request $request
     * @return boolean/object
     */
    public function addProfession($request)
    {

        try {
            $profession = new self();
            $profession->code = $request->code;
            $profession->name = $request->name;
            $profession->description = $request->description;
            $profession->save();
            return $profession;
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
    public function updateProfessionByCode($request, $code)
    {
        $professionData = $this->getProfession($code);
        return $this->updateProfession($professionData, $request);
    }

    /**
     * Update Profession By Id
     *
     * @param Request $request
     * @param Integer $id
     * @return Profession
     */
    public function updateProfessionById($request, $id)
    {
        $professionData = $this->getProfessionById($id);
        return $this->updateProfession($professionData, $request);
    }

    /**
     * Update Profession
     *
     * @param Profession $professionData
     * @param Request $request
     * @return Profession
     */
    private function updateProfession($professionData, $request){
        if ($professionData != null) {
            $professionData->code = $request->code;
            $professionData->name = $request->name;
            $professionData->description = $request->description;
            $professionData->save();
            return $professionData;
        }
        return false;
    }

    /**
     * Get Profession By Code
     *
     * @param String $code
     * @return List Of Profession
     */
    public function getProfession($code)
    {
        return $this->where('code', $code)->first();
    }

    /**
     * Get Profession By Id
     *
     * @param String $code
     * @return List Of Profession
     */
    public function getProfessionById($id)
    {
        return $this->where('id', $id)->first();
    }

    /**
     * getAllProfession
     *
     * @return List Of Profession
     */
    public function getAllProfession()
    {
        return $this->get();
    }

    /**
     * Delete profession by code
     *
     * @param String $code
     * @return boolean
     */
    public function deleteProfessionBy($code)
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
