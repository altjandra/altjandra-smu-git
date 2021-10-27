function select (link) {
    const item = link.parentNode
    const nav = item.parentNode
    const index = Array.prototype.indexOf.call(nav.children, item)
    const items = nav.querySelectorAll('.foxnav-item')
    const indicator = nav.querySelector('.foxnav-indicator')
    
    indicator.style.setProperty('--index', index + 1)
    items.forEach(item => item.classList.remove('active'))
    item.classList.add('active')
  }
  const items = document.querySelectorAll('.item-link')
  const randomItem = items[Math.round(Math.random() * (items.length - 1))]
  
  select(randomItem)

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
} 