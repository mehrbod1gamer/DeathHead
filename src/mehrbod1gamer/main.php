<?php

namespace mehrbod1gamer;

use pocketmine\entity\Entity;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\nbt\tag\ByteArrayTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as T;

class main extends PluginBase implements Listener
{
    public $loots = [];

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onDeath(PlayerDeathEvent $event)
    {
        $killed = $event->getPlayer();
        $nbt = Entity::createBaseNBT($killed->asPosition()->add(0.5, 1, 0.5), null, $killed->getYaw());
        $nbt->setTag(new CompoundTag('Skin', [
            new StringTag('Name', $killed->getName()),
            new ByteArrayTag('Data', $killed->getSkin()->getSkinData())
        ]));
        $entity = new head($killed->getLevel(), $nbt);
        $name = $killed->getName();
        $entity->setNameTag(T::GREEN . "In Head " . T::LIGHT_PURPLE . "$name " .T::GREEN . "Ast\n" . T::GOLD . "In Head Hazf Mishavad Dar :\n" . T::RED . "30");
        $entity->setNameTagVisible(true);
        $entity->spawnToAll();
        $this->getScheduler()->scheduleRepeatingTask(new clearTask($entity, $name,$this),20);
    }
}
