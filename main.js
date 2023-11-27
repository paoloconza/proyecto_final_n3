let profileBtn = document.querySelector('#profileBtn');

profileBtn.onclick = function() {

  let profileDiv = document.querySelector('#profileDiv');
  showHide(profileDiv);
}

function showHide(element) {
  if(element.classList.contains('hidden')){
    element.classList.remove('hidden');

  } else {
    element.classList.add('hidden');
  }
}

// Show Hide sidebar
let sidebarBtn = document.querySelector('#sidebarBtn');
sidebarBtn.onclick = function() {

  let sidebar = document.querySelector('aside');

  if(sidebar.classList.contains('sm:block')) {
    sidebar.classList.replace('sm:block', 'sm:hidden');

  } else {
    sidebar.classList.replace('sm:hidden', 'sm:block');
  }
}

// -----------
