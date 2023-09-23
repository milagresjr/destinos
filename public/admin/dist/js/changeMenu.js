const addActiveClass = (itemMenu) => {

    var list = document.querySelectorAll('.item-menu');

    list.forEach(item => {

      (item.classList.contains(itemMenu)) ? item.classList.add('active') : item.classList.remove('active');

    });

}