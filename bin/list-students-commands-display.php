<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . "/../vendor/autoload.php";
$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $students */
$students = $studentRepository->findAll();

foreach ($students as $student) {
    echo "Id: {$student->id}\nNome: {$student->name}\n\n";
}

/** @var Student $studentNo2 */
$studentNo2 = $studentRepository->find(2);
print_r($studentNo2);

$batman = $studentRepository->findBy([
    "name" => "Bruce Wayne"
]);
print_r($batman);

$senninha = $studentRepository->findOneBy([
    "name" => 'Airton Sena'
]);

print_r($studentRepository->findBy([], ['name' => 'ASC'], 2, 3));

echo $studentRepository->count([]);