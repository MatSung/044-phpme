<!-- require_once 'vendor/autoload.php';

use App\Workable\{Driver, Pilot};

$student = new \App\Student('petras', 23, 'A1', 200);
$driver = new Driver('rokas', 37, 2000, 'B');
$driverV2 = new Driver('rokas', 37, 2500, 'A', 5);
$pilot = new Pilot('tomas', 25, 3500);

// var_dump($student, $driver, $driverV2, $pilot);

// printf("driver salary %f \n", $driver->getSalaryBonus());
// printf("driver 2 salary %f \n", $driverV2->getSalaryBonus());
// printf("pilot salary %f \n", $pilot->getSalaryBonus());
// 
foreach ([$student, $driver, $driverV2, $pilot] as $person) {
	echo $person->greetings() . "\n";
} -->
<?php

require_once 'vendor/autoload.php';

use App\FormBuilder;

$form = new FormBuilder();
echo $form->open('index.php', 'POST');
// <form action="index.php" method="POST">
echo $form->label('some-id','some-label-title');
// <label for="some-id">
echo $form->input('text', 'Enter value', '');
echo $form->input('password', 'Enter password', '');
echo $form->password('Enter password');
echo $form->textarea('Enter text');
echo $form->submit('go');
echo $form->close();
// </form>