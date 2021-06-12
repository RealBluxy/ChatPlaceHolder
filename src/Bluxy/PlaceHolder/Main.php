<?php


/*
* " Hey? What Are You Doing Here ? Unless You Know What You are Doing ,  You Should Probaply Close This File And Stay Safe ! "
*
*
*     
*╭━━╮╭╮
*┃╭╮┃┃┃
*┃╰╯╰┫┃╭╮╭┳╮╭┳╮╱╭╮
*┃╭━╮┃┃┃┃┃┣╋╋┫┃╱┃┃
*┃╰━╯┃╰┫╰╯┣╋╋┫╰━╯┃
*╰━━━┻━┻━━┻╯╰┻━╮╭╯
*╱╱╱╱╱╱╱╱╱╱╱╱╭━╯┃
*╱╱╱╱╱╱╱╱╱╱╱╱╰━━╯
*
*                Copyright (C) <2021>  <Bluxy>
*
*    This program is free software: you can redistribute it and/or modify
*    it under the terms of the GNU General Public License as published by
*    the Free Software Foundation, either version 3 of the License, or
*    any later version.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU General Public License for more details.
*
*    Note : If You Found Any Isuess Or Suggestions Please Contact Me On Discord : "Bluxt#4061"
*
*/

declare(strict_types=1);

namespace Bluxy;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\plugin\PluginBase as Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\scheduler\Task;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\entity\Entity;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\entity\{Effect, EffectInstance};
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\network\mcpe\protocol\ActorEventPacket;
use pocketmine\network\mcpe\protocol\EntityEventPacket;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\network\mcpe\protocol\AddActorPacket;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\nbt\tag\StringTag;
use pocketmine\network\mcpe\protocol\SetTitlePacket;

use BlockHorizons\Fireworks\entity\FireworksRocket;
use BlockHorizons\Fireworks\item\Fireworks;
use BlockHorizons\Fireworks\Loader;
use Bluxy\TitleTask as TitleTask;

class Main extends PluginBase implements Listener{

    public function onEnable(){
    
	  $this->getServer()->GetPluginManager()->registerEvents($this, $this);
        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->config = $this->getConfig();
        $this->saveDefaultConfig();
    }
   
  public function onDisable() : void{
		@mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->config = $this->getConfig();
        $this->saveDefaultConfig();
	}
  
 public function onChat(PlayerChatEvent $event) {
        $message = str_ireplace("hello", "bye", $event->getMessage());
	 $find = array($this->config->get("find1"), $this->config->get("find2"), $this->config->get("find3"), $this->config->get("find2"), $this->config->get("find4"));
	 $replace = array($this->config->get("re1"), $this->config->get("re2"), $this->config->get("re3"), $this->config->get("re2"), $this->config->get("re4"));
	 $message = str_ireplace("$find", $replace, $event->getMessage());
	 //todo: mae these more readbale
	 
        $event->setMessage($message);
}
	
 


	
	
}
