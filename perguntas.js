const $startGameButton = document.querySelector(".start-quiz")
const $nextQuestionButton = document.querySelector(".next-question")
const $questionsContainer = document.querySelector(".questions-container")
const $questionText = document.querySelector(".question")
const $answersContainer = document.querySelector(".answers-container")
const $answers = document.querySelectorAll(".answer")

let currentQuestionIndex = 0
let totalCorrect = 0

$startGameButton.addEventListener("click", startGame)
$nextQuestionButton.addEventListener("click", displayNextQuestion)

function startGame() {
  $startGameButton.classList.add("hide")
  $questionsContainer.classList.remove("hide")
  displayNextQuestion()
}

function displayNextQuestion() {
  resetState()
  
  if (questions.length === currentQuestionIndex) {
    return finishGame()
  }

  $questionText.textContent = questions[currentQuestionIndex].question
  questions[currentQuestionIndex].answers.forEach(answer => {
    const newAsnwer = document.createElement("button")
    newAsnwer.classList.add("button", "answer")
    newAsnwer.textContent = answer.text
    if (answer.correct) {
      newAsnwer.dataset.correct = answer.correct
    }
    $answersContainer.appendChild(newAsnwer)

    newAsnwer.addEventListener("click", selectAnswer)
  })
}

function resetState() {
  while($answersContainer.firstChild) {
    $answersContainer.removeChild($answersContainer.firstChild)
  }

  document.body.removeAttribute("class")
  $nextQuestionButton.classList.add("hide")
}

function selectAnswer(event) {
  const answerClicked = event.target

  if (answerClicked.dataset.correct) {
    document.body.classList.add("correct")
    totalCorrect++
  } else {
    document.body.classList.add("incorrect") 
  }

  document.querySelectorAll(".answer").forEach(button => {
    button.disabled = true

    if (button.dataset.correct) {
      button.classList.add("correct")
    } else {
      button.classList.add("incorrect")
    }
  })
  
  $nextQuestionButton.classList.remove("hide")
  currentQuestionIndex++
}

function finishGame() {
  const totalQuestions = questions.length
  const performance = Math.floor(totalCorrect * 100 / totalQuestions)
  
  let message = ""

  switch (true) {
    case (performance >= 90):
      message = "Excelente :)"
      break
    case (performance >= 70):
      message = "Muito bom :)"
      break
    case (performance >= 50):
      message = "Bom"
      break
    default:
      message = "Pode melhorar :("
  }

  $questionsContainer.innerHTML = 
  `
    <p class="final-message">
      Você acertou ${totalCorrect} de ${totalQuestions} questões!
      <span>Resultado: ${message}</span>
    </p>
    <button 
      onclick=window.location.reload() 
      class="button"
    >
      Refazer teste
    </button>
  `
}


const questions = [
  {
    question: "Onde são construídas as fazendas verticais?",
    answers: [
      { text: "Na floresta", correct: false },
      { text: "Nas fazendas rurais", correct: false },
      { text: "Em prédios, galpões", correct: true },
      { text: "Em casas", correct: false }
    ]
  },
  {
    question: "Qual o nome da maior fazenda vertical da América latina?",
    answers: [
      { text: "Pink Farms", correct: true },
      { text: "Fazenda Cubo", correct: false },
      { text: "Red Farms", correct: false },
      { text: "Aero Farms", correct: false }
    ]
  },
  {
    question: 'Como é feita a iluminação das plantas?',
    answers: [
      { text: 'Com leds', correct: true },
      { text: 'Com a luz solar', correct: false },
      { text: 'Com Lâmpadas', correct: false },
      { text: "Nenhuma das alternativas", correct: false }
    ]
  },
  {
    question: 'Os alimentos produzidos nas fazendas verticais são considerados ôrganicos?',
    answers: [
      { text: "Verdadeiro", correct: false },
      { text: "Falso", correct: true }
    ]
  },
  {
    question: 'Em que ano foi construída a primeira fazenda vertical?',
    answers: [
      { text: '2011', correct: false },
      { text: '2012', correct: true },
      { text: '2020', correct: false },
      { text: '2014', correct: false }
    ]
  },
  {
    question: 'Em qual cidade que foi construída a primeira fazenda vertical?',
    answers: [
      { text: 'Paris', correct: false },
      { text: 'Cingapura', correct: true },
      { text: 'São Paulo', correct: false },
      { text: 'Vancouver', correct: false }
    ]
  },
  {
    question: 'É preciso lavar as plantas cultivadas nas fazendas verticais?',
    answers: [
      { text: 'Sim', correct: false },
      { text: 'Sim, de duas a três vezes', correct: false },
      { text: 'Nenhuma alternativa', correct: false },
      { text: 'Não é preciso', correct: true },
    ]
  },
]


document.addEventListener("DOMContentLoaded", function () {
    var meuBotao = document.getElementById("meuBotao");

    meuBotao.addEventListener("click", function () {
        window.location.href = "pag.html";
    });
});