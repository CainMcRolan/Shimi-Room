<?php
return [
    [
        'question' => 'Which PHP function is used to serialize an object for storage?',
        'options' => [
            'A' => 'json_encode()',
            'B' => 'serialize()',
            'C' => 'var_export()',
            'D' => 'str_split()'
        ],
        'correct_option' => 'B'
    ],
    [
        'question' => 'What is the output of the following code: echo (int)"123abc";',
        'options' => [
            'A' => '123',
            'B' => '0',
            'C' => 'Error',
            'D' => '123abc'
        ],
        'correct_option' => 'A'
    ],
    [
        'question' => 'Which PHP extension is used for interacting with MySQL databases in modern PHP applications?',
        'options' => [
            'A' => 'mysql',
            'B' => 'mysqli',
            'C' => 'PDO',
            'D' => 'sqlite'
        ],
        'correct_option' => 'C'
    ],
    [
        'question' => 'What is the purpose of the "yield" keyword in PHP?',
        'options' => [
            'A' => 'To define a constant',
            'B' => 'To create a generator function',
            'C' => 'To handle exceptions',
            'D' => 'To implement interfaces'
        ],
        'correct_option' => 'B'
    ],
    [
        'question' => 'Which PHP magic method is called when unserializing an object?',
        'options' => [
            'A' => '__construct()',
            'B' => '__destruct()',
            'C' => '__wakeup()',
            'D' => '__sleep()'
        ],
        'correct_option' => 'C'
    ],
    [
        'question' => 'What is the difference between "==" and "===" in PHP?',
        'options' => [
            'A' => 'No difference',
            'B' => '"===" checks for equality and type, while "==" only checks for equality',
            'C' => '"==" checks for equality and type, while "===" only checks for equality',
            'D' => '"===" is used for assignment, while "==" is used for comparison'
        ],
        'correct_option' => 'B'
    ],
    [
        'question' => 'Which PHP function is used to prevent SQL injection?',
        'options' => [
            'A' => 'mysqli_real_escape_string()',
            'B' => 'addslashes()',
            'C' => 'htmlspecialchars()',
            'D' => 'strip_tags()'
        ],
        'correct_option' => 'A'
    ],
    [
        'question' => 'What is the purpose of the "final" keyword when used with a class in PHP?',
        'options' => [
            'A' => 'To make the class abstract',
            'B' => 'To prevent the class from being instantiated',
            'C' => 'To prevent the class from being inherited',
            'D' => 'To make the class implement an interface'
        ],
        'correct_option' => 'C'
    ],
    [
        'question' => 'Which of the following is NOT a valid PHP array function?',
        'options' => [
            'A' => 'array_map()',
            'B' => 'array_reduce()',
            'C' => 'array_filter()',
            'D' => 'array_loop()'
        ],
        'correct_option' => 'D'
    ],
    [
        'question' => 'What is the output of the following code: echo 5 <=> 10;',
        'options' => [
            'A' => '0',
            'B' => '-1',
            'C' => '1',
            'D' => 'Error'
        ],
        'correct_option' => 'B'
    ]
];