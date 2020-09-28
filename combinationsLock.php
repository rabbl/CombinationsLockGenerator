#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use App\Model\CombinationFilter\ContainsOneOrMoreFilter;
use App\Model\CombinationFilter\NotContainsFilter;
use App\Model\CombinationFilter\StartsWithFilter;
use App\Model\CombinationGenerator\NumberCombinationGenerator;
use App\Model\LockCombinationGenerator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\SingleCommandApplication;

(new SingleCommandApplication())
    ->setName('My Super Command') // Optional
    ->setVersion('1.0.0') // Optional
    ->addArgument('digits', InputArgument::REQUIRED, 'The number of digits.')
    ->setCode(function (InputInterface $input, OutputInterface $output) {
        $digits = $input->getArgument('digits');
        $output->writeln(sprintf("Generating Combinations with %s digits.", $digits));

        $lcg = LockCombinationGenerator::create($digits, new NumberCombinationGenerator());
        $lcg->applyFilter(NotContainsFilter::create('4'));
        $lcg->applyFilter(ContainsOneOrMoreFilter::create('5'));
        $lcg->applyFilter(ContainsOneOrMoreFilter::create('6'));
        $lcg->applyFilter(StartsWithFilter::create(['1', '3', '5', '7', '9']));

        foreach ($lcg->strItems() as $item) {
            $output->writeln($item);
        }
    })
    ->run();
