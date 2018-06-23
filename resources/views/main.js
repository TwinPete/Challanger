

// Source der Bilder für die jeweiligen Posts

var pics = ["pic-1.jpg", "pic-2.jpg", "pic-3.jpg", "pic-4.jpg", "pic-5.jpg", "pic-6.jpg", "pic-1.jpg", "pic-2.jpg", "pic-3.jpg", "pic-4.jpg", "pic-5.jpg", "pic-6.jpg"];

var counter_3 = 0;

var counter_2 = 0;




// Beim Laden der Seiten wird folgende Funktion aufgerufen, die entsprechend der jeweiligen Bildschirmgröße die Posts anordnet

document.addEventListener("DOMContentLoaded", function(event){

    // Abfragen, welche Größe der Bildschirm hat, um die entsprechende Funktion aufzurufen

    var window = document.documentElement.clientWidth;
    // alert(window);

    if(window >= 1150){
        load_lines(3);
    }
    if(window <= 1150 && window > 773){
        load_lines(2);
    }

    if(window <= 773){
        
        load_lines(1);
        // alert("jetzt");
    }

});

// Abfragen für Verkleinerungen des Bildschirms

window.addEventListener("resize", function(event){
    var window = document.documentElement.clientWidth;
    var resize;
        if(window >= 1150){
            // document.getElementById("line-1").innerHTML +=  "";
            // document.getElementById("line-2").innerHTML +=  "";
            // load_lines(3);
        resize = setTimeout(function(){
            location.reload();
        }, 500);
        }
        if(window <= 1150){
            // document.getElementById("line-1").innerHTML +=  "";
            // document.getElementById("line-2").innerHTML +=  "";
            // load_lines(2);
        resize = setTimeout(function(){
            location.reload();
            }, 500);
        }
});


// Ladefunktionen für die Posts

function load_lines(lines){
    for(var i = 1; i <= lines; i++){
        if(counter_3 > (pics.length - 1 )){
            return;
        }
        if(i == 0){
            i = 1;
        }
        document.getElementById("line-" + i).innerHTML +=  "<div class='post'>" +
                "<img class='main_img' src='" + pics[counter_3]  + "'alt='No Pic found'>" +
                "<div class='content'>" +
                    "<div class='user'>" +
                        "<img src='user.jpg' alt='No Pic found' />" +
                        "<p>TwinPete93</p>" +
                        "<l>09.09.2019</l>" +
                    "</div>" +
                    "<h1>Ich bin verzaubert!</h1>" +
                    "<p class='posttext'>Heute hab ich wieder einmal ein großartiges Abenteuer erlebt, bei dem ichn etliche" +
                        "neue Erfahrungen machen durfte. Ich kann nicht in Worten ausdrücken was ich alles erlebt habe." +
                        "Deswegen zeige ich euch einfach die Bilder die ich nebenbei gemacht habe." +
                    "</p" +
                "</div>" +
            "</div>";
        counter_3++;
        console.log(counter_3 + ". Runde");
        if(i == lines){
            i = 0;
        }
    }
    
    
}