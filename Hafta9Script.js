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
    "image1.jpg",
    "image2.jpg",
    "image3.jpg",
    "image4.jpg",
    "image5.jpg",
    "image6.jpg",
    "image7.jpg",
    "image8.jpg",
    "image9.jpg",
    "image10.jpg"
  ];

  const randomIndex = Math.floor(Math.random() * images.length);
  const randomImage = images[randomIndex];

  // Rastgele resmi bir img etiketi ile ekrana yerleştir
  const randomImageElement = document.createElement("img");
  randomImageElement.src = randomImage;
  randomImageElement.alt = "Random Image";
  randomImageElement.classList.add("image");

  document.body.appendChild(randomImageElement);
}

// Sayfa yüklendiğinde işlemleri başlat
window.onload = () => {
  setRandomBackground();
  displayRandomImage();
};
