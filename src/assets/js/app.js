import { logo, banner } from "./images";
import colors from "./colors";

const container = document.getElementById("container");
const bcg = document.getElementById("background_color");
const component = document.getElementById("components_color");
const components = document.querySelectorAll(".component");

document.addEventListener("DOMContentLoaded", function() {
  console.log("app.sj");
});

colors.forEach(color => {
  // create a cell
  const cell = document.createElement("div");
  const option = document.createElement("option");
  const option1 = option.cloneNode();

  cell.textContent = `
        ${color.category}
        ${color.name}
    `;
  cell.classList.add("cell");
  cell.style.backgroundColor = `#${color.hex}`;
  container.appendChild(cell);

  option.value = `#${color.hex}`;
  option.textContent = `
        ${color.category}
        ${color.name}
    `;

  bcg.appendChild(option);
  option1.textContent = `
        ${color.category}
        ${color.name}
    `;
  component.appendChild(option1);
});

function changeBackgroundColor() {
  document.body.style.backgroundColor = this.value;
}
function changeComponentsColor(argument) {
  components.forEach(
    component => (component.style.backgroundColor = this.value)
  );
}

bcg.addEventListener("change", changeBackgroundColor);
component.addEventListener("change", changeComponentsColor);
