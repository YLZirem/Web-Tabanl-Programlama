// Duyuru penceresinin otomatik kapanması
setTimeout(function() {
    document.getElementById('announcement').style.opacity = 0;
    document.getElementById('announcement').style.visibility = 'hidden';
}, 5000);

function closeAnnouncement() {
    document.getElementById('announcement').style.opacity = 0;
    document.getElementById('announcement').style.visibility = 'hidden';
}

// Soruları JavaScript ile ekliyoruz
const questions = [
    {
        question: "JavaScript hangi tip dilidir?",
        options: ["A. Kompile edilen", "B. Yorumlanan", "C. Derleyici gerektirir"],
        correct: "B. Yorumlanan"
    },
    // Diğer sorular burada...
];

const quizForm = document.getElementById("quizForm");

// Soruları dinamik olarak formda oluşturuyoruz
questions.forEach((q, index) => {
    const questionContainer = document.createElement("div");
    questionContainer.classList.add("question-container");

    const questionTitle = document.createElement("p");
    questionTitle.innerText = `${index + 1}. ${q.question}`;
    questionContainer.appendChild(questionTitle);

    q.options.forEach((option, optionIndex) => {
        const optionLabel = document.createElement("label");
        const optionInput = document.createElement("input");
        optionInput.type = "radio";
        optionInput.name = `q${index + 1}`;
        optionInput.value = option;

        optionLabel.appendChild(optionInput);
        optionLabel.appendChild(document.createTextNode(option));

        questionContainer.appendChild(optionLabel);
        questionContainer.appendChild(document.createElement("br"));
    });

    quizForm.appendChild(questionContainer);
});

// Test sonuçlarını gösteren fonksiyon
function submitQuiz() {
    let score = 0;
    questions.forEach((q, index) => {
        const selectedOption = document.querySelector(`input[name="q${index + 1}"]:checked`);
        if (selectedOption && selectedOption.value === q.correct) {
            score++;
        }
    });

    alert(`Test tamamlandı! Puanınız: ${score} / ${questions.length}`);
}
