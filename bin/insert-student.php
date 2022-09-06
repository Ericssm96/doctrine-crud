<?php

use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . "/../vendor/autoload.php";
$entityManager = EntityManagerCreator::createEntityManager();


$phone = new Phone("(63)99781-2134");
$phone2 = new Phone("(63)99247-0000");

$student = new Student("Dio Brando");
$student->addPhone($phone);
$student->addPhone($phone2);

$entityManager->persist($student);
$entityManager->flush();