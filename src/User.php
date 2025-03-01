<?php

namespace Abstract\User;

// Интерфейс абстракции User. Используются внешним (пользовательским, вызывающим) кодом.
// public
function makeUser(string $name, string $birthday): array
{
    return [
        'name' => $name,
        'birthday' => $birthday
    ];
}

function getAge(array $user): int
{
    return calculateAge($user['birthday']);
}

function isAdult(array $user): bool
{
    return getAge($user) >= 18;
}

// Внутренний метод. Не является частью интерфейса абстракции User.
// private
function calculateAge(string $birthday): int
{
    $secondsInYear = 31556926;
    return floor((time() - strtotime($birthday)) / $secondsInYear);
}
