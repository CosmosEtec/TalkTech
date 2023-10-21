const scrollableDiv = document.getElementById("scrollableDiv");

scrollableDiv.addEventListener("wheel", (event) => {
  event.preventDefault();
  const delta = event.deltaY;
  scrollableDiv.scrollTop += delta;
});

scrollableDiv.addEventListener("keydown", (event) => {
  if (event.key === "ArrowUp") {
    scrollableDiv.scrollTop -= 10; // Ajuste a quantidade desejada
  } else if (event.key === "ArrowDown") {
    scrollableDiv.scrollTop += 10; // Ajuste a quantidade desejada
  }
});