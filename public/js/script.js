const navToggle = document.getElementById('navToggle'),
      navContent = document.getElementById('navContent');

navToggle.addEventListener('click', () => {
  if (navContent.classList.contains('hidden')) {
    navContent.classList.remove('hidden');
  } else {
    navContent.classList.add('hidden');
  }
});