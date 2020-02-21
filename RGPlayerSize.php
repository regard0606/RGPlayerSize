<?php

/**
 * @name   RGPlayerSize
 * @main   RGPlayerSize\RGPlayerSize
 * @author  Regard0606
 * @version  1.0.0
 * @api 3.0.0
 * @description Made By Regard0606
 */

namespace RGPlayerSize;


use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\Command;

class RGPlayerSize extends PluginBase implements Listener
{
	public function onEnable ()
	{
		$this->getServer()->getPluginManager()->registerEvents ($this, $this);
		$this->registerCommand('크기조절','크기 ㆍㆍㆍㆍ by 레가드');
		}
		
	public function registerCommand ($command, $description)
{

     $c = new PluginCommand ($command, $this);
     $c->setDescription ($description);

     $this->getServer()->getCommandMap()->register ($command, $c);
}

public function onCommand (CommandSender $sender, Command $command, string $label, array $args): bool
   {
   if (! $sender->isOp()) {
     $sender->sendMessage ('§l[ §e서버§f ] §r§l명령어를 실행할 권한이 없습니다.');
     return true;
}
if (!isset($args[0])){
	$sender->sendMessage('§l[ §e서버§f ] §r§l[ §e서버§f ] §r§l§a사용법 : /크기 (유저명) (크기)');
	return true;
	}
$target = $this->getServer()->getPlayer($args[0]);
if (! $target instanceof Player){
	$sender->sendMessage('§l[ §e서버§f ] §r§l존재하지 않는 플레이어입니다');
	return true;
	}
$target->setScale($args[1]);
$sender->sendMessage('§l[ §e서버§f ] 크기를 변경 완료하였습니다')
return true;
}
}