<?php

namespace mehrbod1gamer;

use pocketmine\entity\Human;
use pocketmine\entity\Skin;
use pocketmine\level\Level;
use pocketmine\nbt\tag\ByteArrayTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\StringTag;

class head extends Human
{
    public const Geometry = '{"geometry.player_head":{"texturewidth":64,"textureheight":64,"bones":[{"name":"head","pivot":[0,24,0],"cubes":[{"origin":[-4,0,-4],"size":[8,8,8],"uv":[0,0]}]}]}}';

    public $width = 0.5, $height = 0.6;

    protected function initEntity() : void{
        $this->setMaxHealth(20);
        $this->setSkin($this->getSkin());
        parent::initEntity();
    }

    public function onDeath(): void
    {
        $this->setHealth(20);
        parent::onDeath();
    }

    public function __construct(Level $level, CompoundTag $nbt)
    {
        parent::__construct($level, $nbt);
    }

    public function setSkin(Skin $skin) : void{
        parent::setSkin(new Skin($skin->getSkinId(), $skin->getSkinData(), '', 'geometry.player_head', self::Geometry));
    }
}
