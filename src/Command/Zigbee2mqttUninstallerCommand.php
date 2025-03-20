<?php

namespace EnderLab\Zigbee2mqttBundle\Command;

use App\System\Infrastructure\Symfony\Command\AbstractPluginManagerCommand;
use Exception;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'zigbee2mqtt:uninstaller',
    description: 'Uninstall zigbee2mqtt bundle',
)]
class Zigbee2mqttUninstallerCommand extends AbstractPluginManagerCommand
{
    protected function configure(): void
    {
    }

    /**
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $reference = $this->parameters->get('zigbee2mqtt_reference');
        $this->startUninstall(function () {
            // @todo test
        }, $reference, $input, $output);

        return Command::SUCCESS;
    }


}
