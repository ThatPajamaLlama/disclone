const message = "Go back home"

function ShowArrow(link){
    link.innerHTML = "<i class='fa fa-long-arrow-left' aria-hidden='true'></i> " + message;
}

function HideArrow(link){
    link.innerHTML = message;
}