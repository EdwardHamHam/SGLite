<?php

namespace SGPro;



use pocketmine\plugin\PluginBase;
use pocketmine\utils\textformat;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\player\PlayerChatEvent;

class SGPro extends PluginBase implements Listener{
    
    
        
    
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    switch($command->getname()){
        
        case "sg":
        $map1status = "nr";
        $map2status = "nr";
        $map3status = "nr";
        $map4status = "nr";
        $map5status = "nr";
        
        $map1 = $this->getConfig()->get("name1");
        $map2 = $this->getConfig()->get("name2");
        $map3 = $this->getConfig()->get("name3");
        $map4 = $this->getConfig()->get("name4");
        $map5 = $this->getConfig()->get("name5");
        
        $a = array(
            "getstatus" => $map1status,
        );
        $b = array(
            "getstatus" => $map2status,
        );
        $c = array(
            "getstatus" => $map3status,
        );
        $d = array(
            "getstatus" => $map4status,
        );
        $e = array(
            "getstatus" => $map5status,
        );
        
        if (!isset($args[0])){
            // when client just performs /sg
            
            $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]"." Please enter into a match "
                    . "using /sg join.");
            return true;
        }
        
        if ($args[0] === "join"){
            // when client performs /sg join <match>
            
            //defines all global array so that later functions can access array.
            global $a;
            global $b;
            global $c;
            global $d;
            global $e;
            
            if (!isset($args[1])){
                
                $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]"." /sg join ".$map1);
                $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]"." /sg join ".$map2);
                $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]"." /sg join ".$map3);
                $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]"." /sg join ".$map4);
                $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]"." /sg join ".$map5);
                return true;
            }
            
            if ($args[1] === $map1){
                
                $player = $sender->getName();
                //sends all variable information into the datafolder.
                
                
                
                
                
                $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]". " Transporting to map ".$map1);
                
                //sets player into map list.
                \array_push($a, $player);
                
                if(Server::getInstance()->loadLevel($map1) != false){
                        
                    $sender->getPlayer()->teleport(Server::getInstance()->getLevelByName($map1)->getSafeSpawn());
                    
                    
                    
                    $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]".
                            " Please enter command /match1 register"
                            . " to register into the match.");
                    
                    include($this->getDataFolder()."/"."/required/"."match1.php");
                    
                    $str = fopen("match1pro.txt","w");
                    
                    $message = "nr";
                    
                    \fwrite($str, $message);
                    
                    
                    foreach($a as $player){
                        $player = $this->getServer()->getPlayer($player);
                        $mapname = $this->getConfig()->get("name1");
                        if($sender instanceof Player){
                            $sender->sendMessage("Map 1 - '".TEXTFORMAT::BLUE.$mapname.TEXTFORMAT::WHITE.
                                    "'");
                        }
                    }
                    return true;
                }
                else{
                    //map doesn't exist, so tells the player there's an error.
                    $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]"."This"
                            . " match is non-existant. Please check for errors.");
                }
                
            if ($args[1] === "map2"){
                //gets player name and returns as $player
                $player = $sender->getName();
                //send player confirmation.
                $player->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]". " Transport to map ".$map2);
                
                //sets player into map list.
                array_push($b, $player);
                
                if(Server::getInstance()->loadLevel($map2) != false){
                        
                    $event->getPlayer()->teleport(Server::getInstance()->getLevelByName($map2)->getSafeSpawn());

                    return true;
                }
                else{
                    $player->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]". " That map is currently unavailable.");
                    return true;
                }
            }
            if ($args[1] === "map3"){
                //gets player name and returns as $player
                $player = $sender->getName();
                //send player confirmation.
                $player->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]". " Transport to map ".$map3);
                
                //sets player into map list.
                array_push($c, $player);
                
                if(Server::getInstance()->loadLevel($map3) != false){
                        
                    $event->getPlayer()->teleport(Server::getInstance()->getLevelByName($map3)->getSafeSpawn());

                    return true;
                }
                else{
                    $player->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]". " That map is currently unavailable.");
                    return true;
                }
            }
            if ($args[1] === "map4"){
                //gets player name and returns as $player
                $player = $sender->getName();
                //send player confirmation.
                $player->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]". " Transport to map ".$map4);
                
                //sets player into map list.
                array_push($d, $player);
                
                if(Server::getInstance()->loadLevel($map4) != false){
                        
                    $event->getPlayer()->teleport(Server::getInstance()->getLevelByName($map4)->getSafeSpawn());
                    include('SGPro/tasks/match1.php');
                    return true;
                }
                else{
                    $player->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]". " That map is currently unavailable.");
                    return true;
                }
            }
            if ($args[1] === "map5"){
                //gets player name and returns as $player
                $player = $sender->getName();
                //send player confirmation.
                $player->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]". " Transport to map ".$map5);
                
                //sets player into map list.
                array_push($e, $player);
                
                if(Server::getInstance()->loadLevel($map5) != false){
                        
                    $event->getPlayer()->teleport(Server::getInstance()->getLevelByName($map5)->getSafeSpawn());

                    return true;
                }
                else{
                    $player->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]". " That map is currently unavailable.");
                    return true;
                }
            }
        }
            
        
    }
        case "match1":
            
            if (!isset($args[0])){
                $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]".
                        "That is not valid.");
            }
            
            if ($args[0] === "register"){
                
                $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]".
                    " You have been registered into the match.");
                $status = file_get_contents("match1pro.txt");
                if ($status === "nr"){
                    $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]".
                            " This round is not ready yet. Please hold on.");
                    return true;
                }
                elseif ($status === "sr"){
                    $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]".
                            " This round is halfway until showdown!");
                    return true;
                }
                elseif ($status === "r"){
                    $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]".
                            " This round is about to go underway!");
                    return true;
                }
                
                foreach($a as $player){
                    
                        $player = $this->getServer()->getPlayer($player);
                        
                        $server = $sender->getName();
                        $mapname = $this->getConfig()->get("name1");
                        if($sender instanceof Player){
                            $sender->sendMessage("[".TEXTFORMAT::RED."SGLite".TEXTFORMAT::WHITE."]".
                                    " New player ".TEXTFORMAT::RED.$server.
                                    " has joined the match.");
                        }
                    }
            }
            
            return true;
            
                
            
}
}
}
