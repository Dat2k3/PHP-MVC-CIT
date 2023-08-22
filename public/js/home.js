function menuBar() {
    let menuList = document.getElementsByClassName('menu-list')[0];
    if(menuList.classList.contains('d-none'))
        menuList.classList.remove('d-none')
    else
        menuList.classList.add('d-none')
}