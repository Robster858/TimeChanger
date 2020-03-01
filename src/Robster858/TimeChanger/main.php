<?php

namespace Robster858\TimeChanger;

use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class main extends PluginBase implements Listener {

  public function onEnable() {
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info("TimeChanger enabled!");
  }

  public function onDisable() {
    $this->getLogger()->info("TimeChanger disabled!");
  }

public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
    switch($cmd->getName()) {
      case "day":
        if ($sender->hasPermission("time.cmd")) {
          $sender->getLevel()->setTime(6000);
          $sender->sendMessage("§aYou have successfully set the time to day.");
          return true;
        } else {
          $sender->sendMessage("§cYou do not have permission to use this command.");
          return true;
        }

      break;

      case "night":
        if ($sender->hasPermission("time.cmd")) {
            $sender->getLevel()->setTime(16000);
            $sender->sendMessage("§aYou have successfully set the time to night.");
            return true;
          } else {
            $sender->sendMessage("§cYou do not have permission to use this command.");
            break;
        }
      }
    }
  }
