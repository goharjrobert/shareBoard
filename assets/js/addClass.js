var pages = ['home', 'shares', 'login', 'register'];

function switchClass(className) {
    //alert(className);
    var element;
    for(var i = 0; i < pages.length; i++){
        element = document.getElementById(pages[i]);
        if(element.classList.contains('active')) {
            element.classList.remove("active");
        }
        console.log(pages[i] + ' ' + className);
        if(className === pages[i]){
            element = document.getElementById(className);
            element.classList.add("active");
        }
    }
}