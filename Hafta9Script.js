// Rastgele bir renk oluştur ve body'nin arka planını ayarla
function setRandomBackground() {
  const randomColor = `#${Math.floor(Math.random() * 16777215).toString(16)}`;
  document.body.style.backgroundColor = randomColor;
}

// Resimlerin göster/gizle fonksiyonu
function toggleImage(imageId) {
  const img = document.getElementById(imageId);
  img.style.display = img.style.display === "none" ? "block" : "none";
}

// 10 farklı resimden rastgele birini seç ve bir elementte görüntüle
function displayRandomImage() {
  const images = [
    "1.jpg",
    "2.jpg",
    "3.jpg",
    "4.jpg",
    "5.jpg",
    "6.jpg",
    "7.jpg",
    "8.jpg",
    "9.jpg",
    "0.jpg"
  ];

  const randomIndex = Math.floor(Math.random() * images.length);
  const randomImage = images[randomIndex];

  // Rastgele resmi bir img etiketi ile ekrana yerleştir
  const randomImageElement = document.createElement("img");
  randomImageElement.src = randomImage;
  randomImageElement.alt = "Rastgele";
  randomImageElement.classList.add("image");

  document.body.appendChild(randomImageElement);
}

// Sayfa yüklendiğinde işlemleri başlat
window.onload = () => {
  setRandomBackground();
  displayRandomImage();
};
