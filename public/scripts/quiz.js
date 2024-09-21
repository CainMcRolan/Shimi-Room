//Quiz Array
import {multipleChoice, identify} from "./quiz-data.js";

const quiz = checkPage() === 'multiple' ? multipleChoice : identify;

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

//initiate Application
const initiateStopWatch = new StopWatch();
const initiateQuiz = new Quiz();

//Starting Listener Logic
startButton.addEventListener('click', initiateQuiz.startQuiz);

//Quiz Logic
function Quiz() {
    function startQuiz() {
        isQuizStarted = true;
        initiateStopWatch.startWatch();
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

        const generateFields = new GenerateAnswerFields();
        const optionsDiv = checkPage() === 'multiple' ? generateFields.multipleChoice(problem) : generateFields.identify();

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
            if (checkProblem()) return;
            displayScore();
            return;
        }

        if (checkProblem()) return;

        questionCount++;
        displayQuiz(quiz[questionCount]);
    }

    function checkProblem() {
        const errorMessage = document.querySelector('#error_message');
        if (checkPage() === 'multiple') {
            const radios = document.querySelectorAll("input[name='option']");
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
        } else {
            let answer = document.querySelector('#answer').value;
            console.log(answer);
            answer = answer.trim().toLowerCase();

            if (answer.length < 3) {
                errorMessage.textContent = 'answer cannot be blank';
                return true;
            }

            errorMessage.textContent = '';

            if (quiz[questionCount]['answer'] === answer) {
                score++;
            }
        }
    }

    function resetQuiz() {
        initiateStopWatch.resetTimer();
        questionCount = 0;
        score = 0;
        displayDiv.innerHTML = '';
        startButton.style.display = 'block';
    }

    function displayScore() {
        initiateStopWatch.stopTimer();
        displayDiv.innerHTML = '';

        const scoreDisplay = document.createElement('p');
        scoreDisplay.textContent = `score: ${score}`;
        scoreDisplay.classList.add('font-bold', 'text-blue-500', 'text-2xl')

        const timeDisplay = document.createElement('p');
        timeDisplay.textContent = `ur time: ${initiateStopWatch.calculateTime(elapsedTime)}`;
        timeDisplay.classList.add('font-bold', 'text-xs')

        const restartButton = document.createElement('button');
        restartButton.textContent = 'Reset Quiz';
        restartButton.classList.add('border', 'border-blue-500', 'p-1', 'mt-2', 'hover:bg-blue-300', 'cursor-pointer');
        restartButton.onclick = resetQuiz;

        displayDiv.append(scoreDisplay, timeDisplay);
        displayDiv.appendChild(restartButton);

        sendResultsToBackEnd().catch(error => console.error('Error sending results:', error));
    }

    return {
        startQuiz
    }
}

function GenerateAnswerFields() {
    function multipleChoice(problem) {
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

        return optionsDiv;
    }

    function identify() {
        const input = document.createElement('input');
        input.name = 'answer';
        input.id = 'answer';
        input.type = 'txt';
        input.classList.add('border', 'border-[#61a0ff]', 'mt-2', 'p-1', 'text-center', 'lg:w-3/4');
        input.placeholder = 'Answer';

        return input;
    }

    return {
        multipleChoice,
        identify,
    }
}

function checkPage() {
    const currentPage = window.location.pathname;

    if (currentPage === '/quiz-multiple'){
        return 'multiple';
    } else if (currentPage === '/quiz-identify') {
        return 'identify';
    }
}

//Stopwatch Logic
function StopWatch() {
    function startWatch() {
        timeP.style.display = 'block';
        timeP.style.color = 'black';

        startTime = Date.now() - elapsedTime;
        intervalId = setInterval(() => {
            elapsedTime = Date.now() - startTime;
            timeP.textContent = calculateTime(elapsedTime);
        }, 10);


    }

    function calculateTime(time) {
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

    return {
        startWatch,
        stopTimer,
        resetTimer,
        calculateTime,
    }
}

//Backend Logic
function sendResultsToBackEnd() {
    const result = new URLSearchParams({
        score: score,
        elapsedTime: initiateStopWatch.calculateTime(elapsedTime)
    });

    const currentPath = window.location.pathname;
    console.log(currentPath);

    return fetch(`${currentPath}/create`, {
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

