var menu_btn = document.getElementById('menu_btn');
var menu_list = document.getElementById('menu_list');
var close_menu = document.getElementById('close_menu');
var aside = document.getElementById('aside');
var dashboard= document.getElementById('dashboard');
var screenWidth = window.innerWidth;
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

if(screenWidth < 580){
    menu_list.style.display='none';
    menu_btn.style.display='block';
    close_menu.style.display='none';
    aside.style.width='100px';
    dashboard.style.width='calc(100% - 100px)';

    menu_btn.addEventListener('click',function(){
        menu_list.style.display='block';
        menu_btn.style.display='none';
        close_menu.style.display='block';
        aside.style.width='40%';
        aside.style.zIndex='10';
        dashboard.style.width='60%';
        dashboard.style.zIndex='1';
    });

    close_menu.addEventListener('click',function(){
        menu_list.style.display='none';
        menu_btn.style.display='block';
        close_menu.style.display='none';
        aside.style.width='100px';
        dashboard.style.width='calc(100% - 100px)';
    });
}

if(screenWidth < 500){

    menu_list.style.display='none';
    menu_btn.style.display='block';
    close_menu.style.display='none';
    aside.style.width='100px';
    dashboard.style.width='calc(100% - 100px)';

    menu_btn.addEventListener('click',function(){
        menu_list.style.display='block';
        menu_btn.style.display='none';
        close_menu.style.display='block';
        aside.style.width='150px';
        aside.style.zIndex='10';
        dashboard.style.width='calc(100% - 150px)';
        dashboard.style.zIndex='1';
    });

    close_menu.addEventListener('click',function(){
        menu_list.style.display='none';
        menu_btn.style.display='block';
        close_menu.style.display='none';
        aside.style.width='70px';
        dashboard.style.width='calc(100% - 70px)';
    });
}

if(screenWidth < 375){
    menu_list.style.display='none';
    menu_btn.style.display='block';
    close_menu.style.display='none';
    aside.style.width='70px';
    dashboard.style.display='calc(100% - 70px)';

    menu_btn.addEventListener('click',function(){
        menu_list.style.display='block';
        menu_btn.style.display='none';
        close_menu.style.display='block';
        aside.style.width='100%';
        aside.style.zIndex='10';
        dashboard.style.display='none';
        dashboard.style.zIndex='1';
    });

    close_menu.addEventListener('click',function(){
        menu_list.style.display='none';
        menu_btn.style.display='block';
        close_menu.style.display='none';
        aside.style.width='70px';
        dashboard.style.display='block';
        dashboard.style.width='calc(100% - 70px)';
    });
}

if(screenWidth < 300){
    menu_list.style.display='none';
    menu_btn.style.display='block';
    close_menu.style.display='none';
    aside.style.width='50px';
    dashboard.style.width='calc(100% - 50px)';

    menu_btn.addEventListener('click',function(){
        menu_list.style.display='block';
        menu_btn.style.display='none';
        close_menu.style.display='block';
        aside.style.width='100%';
        aside.style.zIndex='10';
        dashboard.style.display='none';
        dashboard.style.zIndex='1';
    });

    close_menu.addEventListener('click',function(){
        menu_list.style.display='none';
        menu_btn.style.display='block';
        close_menu.style.display='none';
        aside.style.width='50px';
        dashboard.style.display='block';
        dashboard.style.width='calc(100% - 50px)';
    });
}
