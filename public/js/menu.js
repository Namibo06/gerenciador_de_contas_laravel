var menu_btn = document.getElementById('menu_btn');
var menu_list = document.getElementById('menu_list');
var close_menu = document.getElementById('close_menu');
var aside = document.getElementById('aside');
var dashboard= document.getElementById('dashboard');
menu_btn.style.display='none';

menu_btn.addEventListener('click',function(){
    menu_list.style.display='block';
    menu_btn.style.display='none';
    close_menu.style.display='block';
    aside.style.width='250px';
    dashboard.style.width='calc(100% - 250px)';
});

close_menu.addEventListener('click',function(){
    menu_list.style.display='none';
    menu_btn.style.display='block';
    close_menu.style.display='none';
    aside.style.width='100px';
    dashboard.style.width='calc(100% - 100px)';
});
