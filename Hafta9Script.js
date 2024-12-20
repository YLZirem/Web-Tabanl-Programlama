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

// 10 farklı resimden rastgele 3 tanesini seçip üstte göster
function displayRandomImages() {
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

  // Rastgele 3 farklı resim seç
  const randomImages = [];
  while (randomImages.length < 3) {
    const randomIndex = Math.floor(Math.random() * images.length);
    const randomImage = images[randomIndex];
    if (!randomImages.includes(randomImage)) {
      randomImages.push(randomImage);
    }
  }

  // Rastgele resimleri ekrana yerleştir
  const randomImagesContainer = document.getElementById("random-images-container");
  randomImagesContainer.innerHTML = ""; // Önceki resimleri temizle
  randomImages.forEach(image => {
    const imgElement = document.createElement("img");
    imgElement.src = image;
    imgElement.alt = "Random Image";
    randomImagesContainer.appendChild(imgElement);
  });
}

// Sayfa yüklendiğinde işlemleri başlat
window.onload = () => {
  setRandomBackground();
  displayRandomImages();
};
