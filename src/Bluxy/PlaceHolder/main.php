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
declare(strict_types = 1);
namespace Bluxy\PlaceHolder;
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
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\entity\Entity;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\entity\ {
    Effect, EffectInstance
};
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerChatEvent;
use Bluxy\PlaceHolder\Check;

class main extends PluginBase implements Listener {
    public $config;
    public function onEnable() {
        $this->getServer()->GetPluginManager()->registerEvents($this, $this);
        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->saveResource("swearwords.yml");
        $this->saveResource("unicodes.yml");
        $this->config = $this->getConfig(); //todo: might change this ti just   this-getconfig
        $this->saveDefaultConfig();
    }
    public function onDisable():
        void {
            @mkdir($this->getDataFolder());
            $this->saveResource("config.yml");
            $this->config = $this->getConfig();
            $this->saveDefaultConfig();
        }
    
   function astrpos($haystack, $needle) {
    if(!is_array($needle)) $needle = array($needle);
    foreach((array) $needle as $query) {
        if(stripos($haystack, $query) !== false) return true;
    }
    return false;
    
   }
    
        public function onChat(PlayerChatEvent $e) {
            $p = $e->getPlayer();
            $msg = $e->getMessage();
            $find1 = $this->config->get("find1");
            $find2 = $this->config->get("find2");
            $find3 = $this->config->get("find3");
            $find4 = $this->config->get("find4");
            $find5 = $this->config->get("find5");
            $find6 = $this->config->get("find6");
            $find7 = $this->config->get("find7");
            $find8 = $this->config->get("find8");
            $find9 = $this->config->get("find9");
            $find10 = $this->config->get("find10");
            $find11 = $this->config->get("find11");
            $find12 = $this->config->get("find12");
            $find13 = $this->config->get("find13");
            $find14 = $this->config->get("find14");
            $find15 = $this->config->get("find15");
            $replace1 = $this->config->get("replace1");
            $replace2 = $this->config->get("replace2");
            $replace3 = $this->config->get("replace3");
            $replace4 = $this->config->get("replace4");
            $replace5 = $this->config->get("replace5");
            $replace6 = $this->config->get("replace6");
            $replace7 = $this->config->get("replace7");
            $replace8 = $this->config->get("replace8");
            $replace9 = $this->config->get("replace9");
            $replace10 = $this->config->get("replace10");
            $replace11 = $this->config->get("replace11");
            $replace12 = $this->config->get("replace12");
            $replace13 = $this->config->get("replace13");
            $replace14 = $this->config->get("replace14");
            $replace15 = $this->config->get("replace15");
            $findarray = array($find1, $find2, $find3, $find4, $find5, $find6, $find7, $find8, $find9, $find10, $find11, $find12, $find13, $find14, $find15);
            $replacearray = array($replace1, $replace2, $replace3, $replace4, $replace5, $replace6, $replace7, $replace8, $replace9, $replace10, $replace11, $replace12, $replace13, $replace14, $replace15);
            $msgedit = str_ireplace($findarray, $replacearray, $e->getMessage());
            $e->setMessage($msgedit);
            //ads check
            $ads = [".leet.cc", ".net", ".com", ".us", ".co", ".co.uk", ".ddns", ".ddns.net", ".cf", ".me", ".cc", ".ru", ".eu", ".tk", ".gq", ".ga", ".ml", ".org", ".1", ".2", ".3", ".4", ".5", ".6", ".7", ".8", ".9", "my server"];
            if ($this->config->get("AntiAdertising") == "true") {
                if (astrpos($msg, $ads)) {
                    $p->sendMessage($this->config->get("NoAdsMsg"));
                    $e->setCancelled();
                    return;
                }
            }
            //no swears
            $swears = (new Config($this->getDataFolder() . "swearwords.yml"))->getAll()["swearwords"];
            $check = new Check($this);
            if ($this->config->get("AntiSwearing") == "true") {
                if ($check->hasProfanity($msg)) {
                    $p->sendMessage($this->config->get("NoswearsMsg"));
                    $e->setCancelled();
                    return;
                }
            }
            //no unicodes
            $unis = (new Config($this->getDataFolder() . "unicodes.yml"))->getAll()["unicodes"];
            if ($this->config->get("AntiUnicodes") == "true") {
                if (astrpos($msg, $unis)) {
                    $p->sendMessage($this->config->get("NoUnicodesMsg"));
                    $e->setCancelled();
                    return;
                }
            }
            //anti spam
            //mute chat
            //muteplayer
            //neplugin: anti raid
            
        }
    }
    
