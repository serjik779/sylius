<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class UpdatePriceCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('shop:update:price')
            ->setDescription('Update price.')
            ->setHelp('This command allows you to update price for some shop...')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Update Price',
            '============',
            '',
        ]);

        $product = $this->getContainer()->get('update.product');
        $product->updateProduct();

        $output->writeln('Whoa!');

        $output->write('You are about to ');
        $output->write('update a price.');
    }
}