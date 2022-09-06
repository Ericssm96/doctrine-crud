<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . "/../vendor/autoload.php";
$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $students */
$students = $studentRepository->findAll();

foreach ($students as $student):
    echo "Id: $student->id\nNome: $student->name" . PHP_EOL;
    echo "Telefones: " . PHP_EOL;

    foreach ($student->phones() as $phone):
        echo $phone->number . PHP_EOL;
    endforeach;
endforeach;