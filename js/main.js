/* 
    Created on : Apr 9, 2023, 5:51:35 PM
    Author     : Mohammad Hadi Behgam
    Email      : h.behgam@gmail.com
    Tel        : 09379874085
*/
const elementClicked2 = document.querySelector("#shoppingCartIcon");
const elementYouWantToShow = document.querySelector("#shoppingCartInput");
const searchInput = document.querySelector("#search-input");
if (elementClicked2) {
  elementClicked2.addEventListener("click", () => {
    elementYouWantToShow.classList.toggle("formShow");
    searchInput.style.display = searchInput.style.display == "block" ? "none" : "block";
  });
}

const whoToBuy = document.querySelector("#whoToBuy");
const whoToBuyMain = document.querySelector("#whoToBuyMain");
const whoToBuyDetails = document.querySelector(".whoToBuyDetails");
if (whoToBuyMain) {
  whoToBuyMain.addEventListener("click", () => {
    whoToBuyMain.childNodes[1].classList.toggle("pBlack");
    whoToBuy.classList.toggle("whoToBuy2");
    whoToBuyMain.classList.toggle("whoToBuyMain2");
    whoToBuyDetails.classList.toggle("block");
    console.log(whoToBuy);
  });
}

function topSwiper() {
  var swiper = new Swiper(".mySwiper", {
    spaceBetween: 10,
    centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      slideToClickedSlide: true,
    },
  });
}
topSwiper();

function secondSlider() {
  var swiper = new Swiper(".mySwiper2", {
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
}
secondSlider();

window.addEventListener("load", function () {
  function workSlider() {
    var swiper = new Swiper(".workSlider", {
      centeredSlides: true,
      slidesPerView: 5,
      spaceBetween: 180,
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
    });
  }
  workSlider();
});

const incrementButton = document.querySelector("#increment");
const decrementButton = document.querySelector("#decrement");
const quantityInput = document.querySelector(".qty");

if (incrementButton && decrementButton) {
  incrementButton.addEventListener("click", () => {
    quantityInput.value = parseInt(quantityInput.value) + 1;
  });
  decrementButton.addEventListener("click", () => {
    quantityInput.value = parseInt(quantityInput.value) - 1;
  });
}

const menuIcon = document.querySelector("#menuIcon");
const mainMenu = document.querySelector("#menu-main-menu");
const body = document.querySelector("body");
const menuButton = document.getElementById("menu-button");
if (menuIcon) {
  menuIcon.addEventListener("click", (e) => {
    mainMenu.classList.toggle("block");
    mainMenu.classList.toggle("active");
    body.style.overflowY = body.style.overflowY == "hidden" ? "" : "hidden";
    menuButton.classList.toggle("active");
  });
}

const sidebarClose = document.getElementById("ts-sidebar-close");
const shopSidebar = document.querySelector(".ts-shop-sidebar");
if (sidebarClose) {
  sidebarClose.addEventListener("click", () => {
    shopSidebar.style.display = "none";
  });
}

function GetElementDistance(obj) {
  var div = document.getElementById(obj);
  var bottomLen = div.getBoundingClientRect().bottom;
  return bottomLen;
}
window.addEventListener("load", function () {
  if (window.innerWidth < 900) {
    mainMenu.style.top = GetElementDistance("bottom") + "px";
  }
});

if (window.innerWidth > 1200) {
  var startProductBarPos = -1;
  var startProductBarPos2 = -1;
  var bar = document.getElementById("navigation");
  const productTop = document.querySelector(".productTop");
  const relatedPost = document.querySelector(".related");
  const left = findPosX(bar);
  window.onscroll = function () {
    if (startProductBarPos < 0) startProductBarPos = findPosY(bar);
    if (startProductBarPos2 < 0) startProductBarPos2 = findPosY(relatedPost);
    if (pageYOffset > startProductBarPos) {
      bar.classList.add("fixed_navbar");
      bar.style.left = left + "px";
      productTop.style.justifyContent = "unset";
    }
    if (pageYOffset < startProductBarPos) {
      bar.classList.remove("fixed_navbar");
      bar.style.left = "unset";
      productTop.style.justifyContent = "space-between";
    }
    if (pageYOffset > startProductBarPos2 - 400) {
      bar.classList.remove("fixed_navbar");
      bar.style.left = "unset";
      productTop.style.justifyContent = "space-between";
    }
  };

  function findPosY(obj) {
    var curtop = 0;
    if (typeof obj.offsetParent != "undefined" && obj.offsetParent) {
      while (obj.offsetParent) {
        curtop += obj.offsetTop;
        obj = obj.offsetParent;
      }
      curtop += obj.offsetTop;
    } else if (obj.y) curtop += obj.y;
    return curtop;
  }
  function findPosX(obj) {
    var curleft = 0;
    if (obj.offsetParent) {
      while (obj.offsetParent) {
        curleft += obj.offsetLeft;
        obj = obj.offsetParent;
      }
    } else if (obj.x) curleft += obj.x;
    return curleft;
  }
}
