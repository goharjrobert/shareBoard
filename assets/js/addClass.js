var pages = ['home', 'shares', 'add', 'login', 'register'];

function switchClass(className) {
    //alert(className);
    var element;
    for(var i = 0; i < pages.length; i++){
        if(className == pages[i]) {
            element = document.getElementById(pages[i]);
            element.classList.remove("active");
        }
        else{
            element = document.getElementById(className);
            element.classList.add("active");
        }
    }


}