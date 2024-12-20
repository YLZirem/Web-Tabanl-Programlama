const canvas = document.getElementById("myCanvas");
const ctx = canvas.getContext("2d");

const rows = 10;  // Satır sayısı
const cols = 10;  // Sütun sayısı
const squareSize = 50;  // Her bir karenin boyutu

// Rastgele renk üretmek için bir fonksiyon
function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

// 10x10 kareyi çizmek için döngü
for (let row = 0; row < rows; row++) {
    for (let col = 0; col < cols; col++) {
        const x = col * squareSize;  // X konumu
        const y = row * squareSize;  // Y konumu
        
        // Rastgele renk al
        const color = getRandomColor();
        
        // Kareyi çiz
        ctx.fillStyle = color;
        ctx.fillRect(x, y, squareSize, squareSize);
    }
}
