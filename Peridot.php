<?php

use Evenement\EventEmitterInterface;
use Peridot\Plugin\Watcher\WatcherPlugin;

return function(EventEmitterInterface $emitter) {
    $watcher = new \Peridot\Plugin\Watcher\WatcherPlugin($emitter);
    $watcher->track(__DIR__.'/src');
}
?>