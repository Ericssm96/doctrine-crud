<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . "/../vendor/autoload.php";
$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $students */
$students = $studentRepository->findAll();

foreach ($students as $student):
    echo "Id: $student->id\nNome: $student->name" . PHP_EOL;

    if($student->phones()->count() > 0):
        echo "Telefones: " . PHP_EOL;
        echo implode(', ', $student->phones()->map(fn (Phone $phone) => $phone->number)->toArray()) . PHP_EOL; //alternativamente poderíamos tratar como um array e fazer um foreach comum
        //mas como é um objeto do tipo "Collection", é mais prático usar o método map atribuído a ele (que faz o mapeamento do array da mesma forma do array_map.
    endif;
    if($student->courses()->count()>0):
        echo "Cursos: " . PHP_EOL;
        echo implode(', ', $student->courses()->map(fn (Course $course) => $course->name)->toArray()) . PHP_EOL, PHP_EOL;
    endif;

    /*foreach ($student->phones() as $phone):
        echo $phone->number . PHP_EOL; essa é a outra alternativa citada
    endforeach;*/
endforeach;