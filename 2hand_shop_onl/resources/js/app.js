import "./bootstrap";

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const btnUser = $(".btn-user");
const dropdownMenu = $("#dropdown");

const toggleDropdown = function () {
    dropdownMenu.classList.toggle("show");
};

btnUser.addEventListener("click", function (e) {
    e.stopPropagation();
    toggleDropdown();
});

document.documentElement.addEventListener("click", function () {
    if (dropdownMenu.classList.contains("show")) {
        toggleDropdown();
    }
});
