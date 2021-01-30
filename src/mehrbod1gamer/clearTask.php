<?php

namespace mehrbod1gamer;

use pocketmine\entity\Entity;
use pocketmine\scheduler\Task;
use pocketmine\utils\TextFormat as T;

class clearTask extends Task
{
    public $time = 30;
    public $name;
    public $head;
    public $plugin;

    public function __construct(Entity $head, string $name,main $plugin)
    {
        $this->plugin = $plugin;
        $this->name = $name;
        $this->head = $head;
    }

    public function onRun(int $currentTick)
    {
        $this->time--;
        $this->head->setNameTag(T::GREEN . "In Head " . T::LIGHT_PURPLE . "$this->name " .T::GREEN . "Ast\n" . T::GOLD . "In Head Hazf Mishavad Dar :\n" . T::RED . $this->time);
        $this->head->setNameTagVisible(true);
        $this->head->spawnToAll();
        if ($this->time == 0){
            $this->head->close();
            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
        }
    }
}
