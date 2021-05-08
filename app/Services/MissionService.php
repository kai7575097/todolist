<?php


namespace App\Services;


use App\Repositories\MissionRepository;

class MissionService
{
    protected $missionRepository;

    public function __construct(MissionRepository $missionRepository)
    {
        $this->missionRepository = $missionRepository;
    }

    /**
     * 新增待辦事項
     *
     * @param string $mission
     */
    public function createMission(string $mission)
    {
        if ($this->missionRepository->isMissionExist($mission) !== true) {
            $this->missionRepository->createMission($mission);
        }
    }

    /**
     * 取得全部待辦事項
     *
     * @return \App\Mission[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getMissions()
    {
        return $this->missionRepository->getMissions();
    }

    /**
     * 刪除待辦事項
     *
     * @param int $missionKey
     */
    public function deleteMission(int $missionKey)
    {
        $this->missionRepository->deleteMission($missionKey);
    }

    /**
     *完成待辦事項
     *
     * @param int $missionKey
     */
    public function missionComplete(int $missionKey)
    {
        $this->missionRepository->missionComplete($missionKey);
    }
}
