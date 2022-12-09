const iconParent = document.querySelector(".iconParent");
const icon = document.querySelector(".icon");
const sidebar = document.querySelector("#sidebar");
const activeElement = document.querySelector(".active");
const content = document.querySelector(".content");

iconParent.addEventListener("click", () => {
  icon.classList.toggle("fa-angles-left");
  icon.classList.toggle("fa-angles-right");
  sidebar.classList.toggle("activeSidebar");
  activeElement.classList.toggle("hide");
  content.classList.toggle("content-expanded");
});
