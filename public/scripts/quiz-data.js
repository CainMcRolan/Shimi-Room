export const multipleChoice = [
    {
        "question": "Which PHP function is used to serialize an object for storage?",
        "options": ["json_encode()", "serialize()", "var_export()", "str_split()"],
        "answer": 1
    },
    {
        "question": "What is the output of the following code: echo (int)\"123abc\";",
        "options": ["123", "0", "Error", "123abc"],
        "answer": 1
    },
    {
        "question": "Which PHP extension is used for interacting with MySQL databases in modern PHP applications?",
        "options": ["mysql", "mysqli", "PDO", "sqlite"],
        "answer": 2
    },
    {
        "question": "What is the purpose of the \"yield\" keyword in PHP?",
        "options": ["To define a constant", "To create a generator function", "To handle exceptions", "To implement interfaces"],
        "answer": 1
    },
    {
        "question": "Which PHP magic method is called when unserializing an object?",
        "options": ["__construct()", "__destruct()", "__wakeup()", "__sleep()"],
        "answer": 2
    },
    {
        "question": "What is the difference between \"==\" and \"===\" in PHP?",
        "options": ["No difference", "\"===\" checks for equality and type, while \"==\" only checks for equality", "\"==\" checks for equality and type, while \"===\" only checks for equality", "\"===\" is used for assignment, while \"==\" is used for comparison"],
        "answer": 1
    },
    {
        "question": "Which PHP function is used to prevent SQL injection?",
        "options": ["mysqli_real_escape_string()", "addslashes()", "htmlspecialchars()", "strip_tags()"],
        "answer": 0
    },
    {
        "question": "What is the purpose of the \"final\" keyword when used with a class in PHP?",
        "options": ["To make the class abstract", "To prevent the class from being instantiated", "To prevent the class from being inherited", "To make the class implement an interface"],
        "answer": 2
    },
    {
        "question": "Which of the following is NOT a valid PHP array function?",
        "options": ["array_map()", "array_reduce()", "array_filter()", "array_loop()"],
        "answer": 3
    },
    {
        "question": "What is the output of the following code: echo 5 <=> 10;",
        "options": ["0", "-1", "1", "Error"],
        "answer": 1
    }
];

export const identify = [
    {
        question: 'The command to start a Laravel development server is ________.',
        answer: 'serve'
    },
    {
        question: 'Laravel’s default database is ________.',
        answer: 'mysql'
    },
    {
        question: 'The file used to define Laravel routes is ________.',
        answer: 'web.php'
    },
    {
        question: 'Laravel’s templating engine is called ________.',
        answer: 'blade'
    },
    {
        question: 'The function used to hash passwords in Laravel is ________.',
        answer: 'bcrypt'
    },
    {
        question: 'Laravel’s command-line interface is called ________.',
        answer: 'artisan'
    },
    {
        question: 'The default queue driver in Laravel is ________.',
        answer: 'sync'
    },
    {
        question: 'The default session driver in Laravel is ________.',
        answer: 'file'
    }, {
        question: 'Laravel’s ORM is called ________.',
        answer: 'eloquent'
    },
    {
        question: 'The default Laravel cache driver is ________.',
        answer: 'file'
    }
]
