const iconParent = document.querySelector(".iconParent");
const icon = document.querySelector(".icon");
const sidebar = document.querySelector("#sidebar");
const activeElement = document.querySelector(".active");
const content = document.querySelector(".content");

iconParent.addEventListener("click", () => {
  icon.classList.toggle("fa-angles-left");
  icon.classList.toggle("fa-angles-right");
  activeElement.classList.toggle("hide");
  content.classList.toggle("content-expanded");
  sidebar.classList.toggle("activeSidebar");
});

if (document.documentElement.clientWidth <= 768) {
  sidebar.classList.remove("activeSidebar");
  activeElement.classList.add("hide");
  content.classList.toggle("content-expanded");
}
