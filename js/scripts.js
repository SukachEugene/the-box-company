


// ----------- Burger menu -----------


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

  function addEventListeners(){
    document.getElementById('main-nav-links').addEventListener('click', menuSwitch, false);
    document.getElementById('open-main-nav').addEventListener('click', menuSwitch, false);
    document.getElementById('close-main-nav').addEventListener('click', menuSwitch, false);
  }
