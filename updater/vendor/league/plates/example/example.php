<?php

include '../vendor/autoload.php';

// Create new Plates instance
$templates = new League\Plates\Engine('templates');

// Preassign data to the layout
$templates->addData(['company' => 'The Company Name'], 'layout');

// Render a template
echo $templates->render('profile', ['name' => 'Jonathan']);
