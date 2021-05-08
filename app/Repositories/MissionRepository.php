<?php


namespace App\Repositories;


use App\Models\Mission;

class MissionRepository
{
    protected $mission;

    public function __construct(Mission $mission)
    {
        $this->mission = $mission;
    }


    /**
     * 待辦事項是否存在
     * 
     * @param string $missionText
     * 
     * @return bool
     */
    public function isMissionExist(string $missionText)
    {
        return $this->mission->where('mission', $missionText)->exists();

    }

    /**
     * 建立待辦事項
     * 
     * @param string $missionText 代辦事項文字
     */
    public function createMission(string $missionText)
    {
        $this->mission->create([
            'mission'=> $missionText
        ]);
    }

    /**
     * 取得全部待辦事項
     * 
     * @return Mission[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getMissions()
    {
        return $this->mission->all();
    }

    /**
     * 刪除待辦事項
     * @param int $missionKey
     */
    public function deleteMission(int $missionKey)
    {
        
        $this->mission->destroy($missionKey);
    }

    /**
     * 完成待辦事項
     * 
     * @param int $missionKey
     */
    public function missionComplete(int $missionKey)
    {
        $this->mission
            ->find($missionKey)
            ->update([
                'status' => 'true'
            ]);
    }
}
