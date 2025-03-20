<?php

namespace EnderLab\Zigbee2mqttBundle\Command;

use App\System\Infrastructure\Symfony\Command\AbstractPluginManagerCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Exception;

#[AsCommand(
    name: 'zigbee2mqtt:installer',
    description: 'Install zigbee2mqtt bundle',
)]
class Zigbee2mqttInstallerCommand extends AbstractPluginManagerCommand
{
    /**
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $reference = $this->parameters->get('zigbee2mqtt_reference');
        $io = new SymfonyStyle($input, $output);
        $io->info('Start zigbee2mqtt installation');

        $this->startInstall(function() {
            $this->checkPluginRequirement($this->parameters->get('plugin_requirements'));
            $this->registerPlugin('Zigbee2mqtt', [], '1.0.0');
            $this->registerContainer(
                [realpath(__DIR__.'/../../config/docker/compose.zigbee.yaml')],
                realpath(__DIR__.'/../../config/docker/config')
            );
            $this->registerSupervisor(realpath(__DIR__.'/../../config/supervisor'));
        }, $reference, $input, $output);

        $io->success('Zigbee2mqtt is now installed');
        return Command::SUCCESS;
    }


}
