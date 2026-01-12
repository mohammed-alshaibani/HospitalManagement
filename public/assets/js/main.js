// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");
let hovered = document.querySelector(".hovered");
list.forEach((item) => item.addEventListener("mouseover", activeLink));
list.forEach((item) => item.addEventListener("mouseout", disActiveLink));
let html = document.querySelector("html");

function disActiveLink() {
    list.forEach((item) => item.classList.remove("hovered"));
    hovered.classList.add("hovered");
}

function activeLink() {
    list.forEach((item) => item.classList.remove("hovered"));
    this.classList.add("hovered");
}

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");
let user = document.querySelector(".user");

if (html.getAttribute("dir") == "rtl") {
    main.style.left = "0";
    if (window.screen.width < 991) {
        main.style.right = 0;
    } else main.style.right = 300 + "px";
}
toggle.onclick = function () {
    navigation.classList.toggle("active");
    if (html.getAttribute("dir") == "rtl") {
        if (window.screen.width > 991)
            if (main.style.right == "300px") {
                main.style.right = "80px";
            } else {
                main.style.right = "300px";
            }
        else main.style.width = "100%";
        main.classList.toggle("active-rtl");
    } else {
        main.classList.toggle("active");
    }

    if (navigation.classList.contains("active")) {
        user.classList.remove("d-none");
    } else {
        user.classList.add("d-none");
    }
};

function changeLocale(locale) {
    // ajax({
    //     url: "/change-lang/" + locale,
    //     type: "GET",
    //     success: function (data) {
    //         location.reload();
    //     },
    // });

    // use fetch instead of ajax
    fetch("/change-lang/" + locale, {
        method: "GET",
    }).then((response) => {
        // location.reload();
    });
}
