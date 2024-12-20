// JSON verisini yükle (örnek olarak JSON içeriği burada direkt kullanıldı)
const questions = [
    {
        "question": "JavaScript hangi tip dilidir?",
        "options": ["A. Kompile edilen", "B. Yorumlanan", "C. Derleyici gerektirir"],
        "correct": "B. Yorumlanan"
    },
    {
        "question": "HTML nedir?",
        "options": ["A. Web sitesi oluşturma dili", "B. Grafik düzenleme aracı", "C. Veritabanı yönetim sistemi"],
        "correct": "A. Web sitesi oluşturma dili"
    },
    {
        "question": "CSS ne işe yarar?",
        "options": ["A. Web sayfası içeriğini şekillendirme", "B. Veritabanı yönetimi", "C. Sunucu işlemleri"],
        "correct": "A. Web sayfası içeriğini şekillendirme"
    },
    {
        "question": "CSS hangi stil diline aittir?",
        "options": ["A. HTML", "B. XML", "C. HTML5"],
        "correct": "B. XML"
    },
    {
        "question": "JavaScript, hangi tür programlama dilidir?",
        "options": ["A. Makine dili", "B. Yüksek seviyeli dil", "C. Sistem dili"],
        "correct": "B. Yüksek seviyeli dil"
    },
    {
        "question": "HTML5 hangi yeni özelliği sunar?",
        "options": ["A. Video etiketleri", "B. Düğme etiketleri", "C. Yalnızca yeni renkler"],
        "correct": "A. Video etiketleri"
    },
    {
        "question": "DOM nedir?",
        "options": ["A. Veri depolama sistemi", "B. Web sayfası elemanlarına erişim sağlayan API", "C. Kod derleyici"],
        "correct": "B. Web sayfası elemanlarına erişim sağlayan API"
    },
    {
        "question": "Bootstrap nedir?",
        "options": ["A. Veritabanı yazılımı", "B. Bir JavaScript kütüphanesi", "C. CSS framework'ü"],
        "correct": "C. CSS framework'ü"
    },
    {
        "question": "Hangisi JavaScript'te değişken tanımlama anahtar kelimesidir?",
        "options": ["A. var", "B. let", "C. const"],
        "correct": "A. var"
    },
    {
        "question": "Web sayfası için arka plan resmi hangi CSS özelliği ile belirlenir?",
        "options": ["A. color", "B. background-image", "C. image-background"],
        "correct": "B. background-image"
    }
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
