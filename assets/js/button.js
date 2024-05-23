function toggleDropdown() {
  var dropdownMenu = document.getElementById("dropdown-menu");
  dropdownMenu.classList.toggle("show");
}

// Fermer le menu déroulant si l'utilisateur clique en dehors de celui-ci
window.onclick = function(event) {
  if (!event.target.matches('.dropdown-btn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
