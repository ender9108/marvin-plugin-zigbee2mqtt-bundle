<?php

namespace EnderLab\Zigbee2mqttBundle\Command;

use App\System\Infrastructure\Symfony\Command\AbstractPluginManagerCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Exception;

#[AsCommand(
    name: 'zigbee2mqtt:worker:mqtt-listener',
    description: 'Listener MQTT messages',
)]
class Zigbee2mqttWorkerMqttListenerCommand extends AbstractPluginManagerCommand
{
    protected function configure(): void
    {
        $this->addOption('--time-limit', 'f', InputOption::VALUE_OPTIONAL, 'Force restart command after X sec', 3600);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $count = 1;

        while (true) {
            echo "Coucou from Zigbee2mqttWorkerMqttListenerCommand ".$count." \n";

            if ($count === 10) {
                return Command::FAILURE;
            }

            $count++;
            sleep(2);
        }

        return Command::SUCCESS;
    }
}
