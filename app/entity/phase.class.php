<?php
namespace entity;
class Phase
{
    
    private $uuid;
    private $battle_id;
    private $player_id;
    private $description;
    
    public function getUuid()
    {
        return $this->uuid;
    }
    
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }
    
    public function getBattle_id()
    {
        return $this->battle_id;
    }
    
    public function setBattle_id($battle_id)
    {
        $this->battle_id = $battle_id;
    }
    
    public function getPlayer_id()
    {
        return $this->player_id;
    }
    
    public function setPlayer_id($player_id)
    {
        $this->player_id = $player_id;
    }
    
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }
}