//Quiz Array
const quiz = [
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

//Element Variables
const startButton = document.querySelector('#start_button');
const displayDiv = document.querySelector('#display_div');
const timeP = document.querySelector('#timer');

//Quiz Misc Variables
let questionCount = 0;
let score = 0;
let isQuizStarted = false;

//Stopwatch Misc Variables
let intervalId = null;
let startTime = 0;
let elapsedTime = 0;


//Starting Listener Logic
startButton.addEventListener('click', startQuiz);

//Quiz Logic
function startQuiz() {
    isQuizStarted = true;
    startWatch();
    displayQuiz(quiz[questionCount]);
}

function displayQuiz(problem) {
    if (!isQuizStarted) return;
    if (questionCount > quiz.length - 1) {
        displayScore();
        return;
    }

    startButton.style.display = 'none';
    displayDiv.innerHTML = '';

    const fieldset = document.createElement('fieldset');
    fieldset.classList.add('border', 'border-[#61a0ff]', "flex", "flex-col", "justify-center", "items-center", "lg:w-[30rem]");

    const legend = document.createElement('legend');
    legend.classList.add('lg:font-bold', 'lg:text-md', '2xl:text-base');
    legend.textContent = `Question ${questionCount + 1}`;

    const h1 = document.createElement('h1');
    h1.classList.add("text-[#003f9e]", "underline", "cursor-pointer", "font-bold", "text-center", "text-lg");
    h1.textContent = problem['question'];

    const optionsDiv = document.createElement('div');
    optionsDiv.classList.add("grid", "grid-cols-2", "gap-1", "my-1");

    problem.options.forEach((option, index) => {
        const optionDivsInput = document.createElement('input');
        optionDivsInput.name = 'option';
        optionDivsInput.type = 'radio';
        optionDivsInput.value = index;

        const optionLabel = document.createElement('label');
        optionLabel.textContent = option;

        optionsDiv.append(optionDivsInput, optionLabel);
    });

    const errorMessage = document.createElement('p');
    errorMessage.classList.add('font-bold', 'text-red-500');
    errorMessage.id = 'error_message';

    const buttonsDiv = document.createElement('div');

    const resetButton = document.createElement('button');
    resetButton.textContent = 'Reset';
    resetButton.classList.add('border', 'border-blue-500', 'p-1', 'mt-2', 'hover:bg-blue-300', 'cursor-pointer', 'mr-2', 'mb-2');
    resetButton.onclick = resetQuiz;

    const nextButton = document.createElement('button');
    nextButton.textContent = questionCount === quiz.length - 1 ? 'Finish' : 'Next';
    nextButton.classList.add('border', 'border-blue-500', 'p-1', 'mt-2', 'hover:bg-blue-300', 'cursor-pointer');
    nextButton.onclick = nextQuestion;

    buttonsDiv.append(resetButton, nextButton);

    fieldset.append(legend, h1, optionsDiv, errorMessage, buttonsDiv);
    displayDiv.appendChild(fieldset);
}

function nextQuestion() {
    if (questionCount === quiz.length - 1) {
        if(checkProblem()) return;
        displayScore();
        return;
    }

    if(checkProblem()) return;

    questionCount++;
    displayQuiz(quiz[questionCount]);
}

function checkProblem() {
    const radios = document.querySelectorAll("input[name='option']");
    const errorMessage = document.querySelector('#error_message');

    if (!Array.from(radios).some(radio => radio.checked)) {
        errorMessage.textContent = 'answer cannot be blank';
        return true;
    }

    errorMessage.textContent = '';

    Array.from(radios).forEach(radio => {
        if (radio.checked) {
            if (quiz[questionCount]['answer'] === parseInt(radio.value)) {
                score++;
            }
        }
    });
}

function resetQuiz() {
    resetTimer();
    questionCount = 0;
    score = 0;
    displayDiv.innerHTML = '';
    startButton.style.display = 'block';
}

function displayScore() {
    stopTimer();
    displayDiv.innerHTML = '';

    const scoreDisplay = document.createElement('p');
    scoreDisplay.textContent = `score: ${score}`;
    scoreDisplay.classList.add('font-bold', 'text-blue-500', 'text-2xl')

    const timeDisplay = document.createElement('p');
    timeDisplay.textContent = `ur time: ${calculateTime(elapsedTime)}`;
    timeDisplay.classList.add('font-bold', 'text-xs')

    const restartButton = document.createElement('button');
    restartButton.textContent = 'Reset Quiz';
    restartButton.classList.add('border', 'border-blue-500', 'p-1', 'mt-2', 'hover:bg-blue-300', 'cursor-pointer');
    restartButton.onclick = resetQuiz;

    displayDiv.append(scoreDisplay, timeDisplay);
    displayDiv.appendChild(restartButton);

    sendResultsToBackEnd().catch(error => console.error('Error sending results:', error));
}

//Stopwatch Logic
function startWatch() {
    timeP.style.display = 'block';
    timeP.style.color = 'black';

    startTime = Date.now() - elapsedTime;
    intervalId = setInterval(() => {
        elapsedTime = Date.now() - startTime;
        timeP.textContent = calculateTime(elapsedTime);
    }, 10);


}

function calculateTime(time){
    const minutes = Math.floor((time / (1000 * 60)) % 60);
    const seconds = Math.floor((time / 1000) % 60);
    const milliseconds = Math.floor((time % 1000) / 10);

    return `${timeFormatter(minutes)}:${timeFormatter(seconds)}:${timeFormatter(milliseconds)}`;
}

function timeFormatter(time) {
    return time.toString().padStart(2, '0');
}

function stopTimer() {
    clearInterval(intervalId);
    timeP.style.color = 'red';
}

function resetTimer() {
    timeP.style.display = 'none';
    stopTimer();
    elapsedTime = 0;
}

//Backend Logic

function sendResultsToBackEnd() {
    const result = new URLSearchParams({
        score: score,
        elapsedTime: calculateTime(elapsedTime)
    });

    return fetch('/quiz-multiple', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: result.toString()
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.text();
        })
        .then(data => {
            console.log('Results successfully sent to backend:', data);
        })
        .catch(error => {
            console.error('Error sending results:', error);
            throw error;
        });
}