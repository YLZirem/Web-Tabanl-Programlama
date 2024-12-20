const gridContainer = document.querySelector('.grid-container');

// Create a 6x6 grid
const rows = 6;
const cols = 6;

for (let i = 0; i < rows * cols; i++) {
  const circle = document.createElement('div');
  circle.classList.add('circle');

  // Generate a color gradient
  const hue = (i / (rows * cols)) * 360;
  circle.style.borderColor = `hsl(${hue}, 100%, 50%)`;

  gridContainer.appendChild(circle);
}
