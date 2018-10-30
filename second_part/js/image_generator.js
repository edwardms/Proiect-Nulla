console.log("image_generator.js script loaded");

let poza_1 = document.getElementById('imagine_1');
let poza_2 = document.getElementById('imagine_2');
let poza_3 = document.getElementById('imagine_3');
let butonRandom = document.getElementById('buton_random');

butonRandom.addEventListener('click', function() {
    let randomNo1 = Math.trunc(Math.random() * 999);
    let randomNo2 = Math.trunc(Math.random() * 999);
    let randomNo3 = Math.trunc(Math.random() * 999);
    poza_1.src = "https://picsum.photos/200/300." + randomNo1 + "/?random";
    poza_2.src = "https://picsum.photos/200/300." + randomNo2 + "/?random";
    poza_3.src = "https://picsum.photos/200/300." + randomNo3 + "/?random";
    console.log("Poze schimbate, numere aleatorii  " + randomNo1 + ", " + randomNo2 + 
                ", " + randomNo3);
});
