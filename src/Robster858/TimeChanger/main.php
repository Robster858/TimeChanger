<?php

namespace Robster858\test;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class main extends PluginBase implements Listener {

  public function onEnable() {
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info("Test enabled!");
  }

  public function onDisable() {
    $this->getLogger()->info("Test disabled!");
  }

  public function onPlayerJoin(PlayerJoinEvent $event) {
    $event->setJoinMessage("§7(§a+§7) " . $event->getPlayer()->getName());
  }

  public function onPlayerQuit(PlayerQuitEvent $event) {
    $event->setQuitMessage("§7(§c-§7) " . $event->getPlayer()->getName());
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
