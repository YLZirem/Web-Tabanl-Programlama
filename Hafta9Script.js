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

// Rastgele bir resmi seç ve ekrana yerleştir
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

  const randomImageContainer = document.getElementById("random-image-container");
  randomImageContainer.innerHTML = `<img src="${randomImage}" alt="Random Image">`;
}

// Sayfa yüklendiğinde işlemleri başlat
window.onload = () => {
  setRandomBackground();
  displayRandomImage();
};
