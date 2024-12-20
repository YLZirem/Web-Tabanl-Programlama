// JSON verisini burada tanımlayabiliriz ya da dışarıdan alabiliriz
const questions = [];

// Soruları JSON dosyasından alıyoruz
fetch('questions.json')
    .then(response => response.json())
    .then(data => {
        // JSON verisi alındığında soruları ekleyelim
        questions.push(...data);
        generateQuestions();
    })
    .catch(error => {
        console.error("JSON dosyası alınamadı:", error);
    });

// Soruları dinamik olarak formda oluşturuyoruz
function generateQuestions() {
    const quizForm = document.getElementById("quizForm");

    questions.forEach((q, index) => {
        const questionContainer = document.createElement("div");
        questionContainer.classList.add("question-container");

        const questionTitle = document.createElement("p");
        questionTitle.innerText = `${index + 1}. ${q.question}`;
        questionContainer.appendChild(questionTitle);

        q.options.forEach((option) => {
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
}

// Test sonuçlarını hesaplayıp gösteren fonksiyon
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
