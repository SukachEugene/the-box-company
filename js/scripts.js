

function menuSwitch() {
  console.log('test')

  let links = document.getElementById('main-nav-links');
  let openButton = document.getElementById('open-main-nav');
  let closeButton = document.getElementById('close-main-nav');


  if (links.className === 'show') {
    links.className = 'hide';
    openButton.className = 'show';
    closeButton.className = 'hide';
  } else {
    links.className = 'show';
    openButton.className = 'hide';
    closeButton.className = 'show';
  }

}

window.onload = addEventListeners;

function addEventListeners() {
  document.getElementById('main-nav-links').addEventListener('click', menuSwitch, false);
  document.getElementById('open-main-nav').addEventListener('click', menuSwitch, false);
  document.getElementById('close-main-nav').addEventListener('click', menuSwitch, false);

  let slideFilters = document.getElementsByClassName('filter-name');

  for (i = 0; i < slideFilters.length; i++) {
    slideFilters[i].addEventListener('click', stylingSlideFilters, false);
  }

  document.getElementById('form-one-selector').addEventListener('change', selectPlaceholderStyling, false);;

}


function stylingSlideFilters() {

  if (this.classList.contains("filter-name")) {

    if (this.classList.contains("active")) {
      this.classList.remove('active');
      this.querySelector('.active').classList.remove('active');

    } else {
      elements = document.querySelectorAll('.active');
      elements.forEach((element) => {
        element.classList.remove('active');
      });

      this.classList.add('active');
    }
  }
}


function selectPlaceholderStyling() {
  let selector = document.getElementById('form-one-selector');
  selector.style.color = "black";
}


// document.ready = defeatNumberofElementsByClass('section-five-article');

// function defeatNumberofElementsByClass(className) {
//   let elements = document.getElementsByClassName(className);
//   console.log(elements.length)
//   return elements.length;
// }




// ---------- Animation -------------

document.addEventListener('DOMContentLoaded', function () {
  let elements = document.getElementsByClassName('section-five-article');

  createFirstElementAnimationOfGoals();
  let animation = setInterval(function () {
    createAnimationOfGoals();
  }, 1000);


  let container = document.getElementsByClassName('section-five-goals-container');

  container[0].addEventListener('mouseover', function () {
    clearInterval(animation);
  })

  container[0].addEventListener('mouseout', function () {
    animation = setInterval(function () {
      createAnimationOfGoals();
    }, 1000);
  });

});


function createFirstElementAnimationOfGoals() {
  let elements = document.getElementsByClassName('section-five-article');
  elements[0].classList.add("animation-style");
}

function createAnimationOfGoals() {
  let elements = document.getElementsByClassName('section-five-article');
  let currentPosition

  let flag = false;

  for (i = 0; i < elements.length; i++) {
    if (elements[i].classList.contains("animation-style")) {
      currentPosition = i;
      flag = true;
    }
  }

  if (flag) {
    elements[currentPosition].classList.remove("animation-style");

    let nextPosition = currentPosition + 1;

    if (nextPosition == elements.length) {
      nextPosition = 0;
    }

    elements[nextPosition].classList.add("animation-style");
  }

}
