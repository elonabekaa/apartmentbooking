const sideMenu = document.querySelector("aside");
const menuBtn = document.getElementById("menu-btn");
const closeBtn = document.getElementById("close-btn");

const darkMode = document.querySelector(".dark-mode");

menuBtn.addEventListener("click", () => {
  sideMenu.style.display = "block";
});

closeBtn.addEventListener("click", () => {
  sideMenu.style.display = "none";
});

// Kontrollo nëse dark mode është aktiv kur faqja ngarkohet
if (localStorage.getItem("dark-mode") === "enabled") {
  document.body.classList.add("dark-mode-variables");
  darkMode.querySelector("span:nth-child(1)").classList.add("active");
  darkMode.querySelector("span:nth-child(2)").classList.remove("active");
}

// Event për aktivizimin/deaktivizimin e dark mode dhe ruajtjen në localStorage
darkMode.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode-variables");

  // Kontrollo nëse dark mode është aktiv pas toggling dhe ruaje gjendjen
  if (document.body.classList.contains("dark-mode-variables")) {
    localStorage.setItem("dark-mode", "enabled");
  } else {
    localStorage.setItem("dark-mode", "disabled");
  }

  // Ndrysho ikonat sipas dark mode
  darkMode.querySelector("span:nth-child(1)").classList.toggle("active");
  darkMode.querySelector("span:nth-child(2)").classList.toggle("active");
});
