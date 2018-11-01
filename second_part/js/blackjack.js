
/* declaram variabilele ce se ocupa de zonele de text si de butoane */
let zonaJucator = document.getElementById('zona-jucator');
let zonaScorJucator = document.getElementById('zona-scor-jucator');
let zonaDealer = document.getElementById('zona-dealer');
let zonaScorDealer = document.getElementById('zona-scor-dealer');
let zonaScorFinal= document.getElementById('zona-scor-final');
let butonNewgame = document.getElementById('buton-newgame');
let butonDeal = document.getElementById('buton-deal');
let butonStay = document.getElementById('buton-stay');

/* aceasta functie este apelata de fiecare data cand pagina este (re)incarcata */
function primulJoc() {
    displayZoneJoc(zonaJucator, 'none');
    displayZoneJoc(zonaScorJucator, 'none');
    displayZoneJoc(zonaDealer, 'none');
    displayZoneJoc(zonaScorDealer, 'none');
    displayZoneJoc(zonaScorFinal, 'none');
    displayZoneJoc(butonDeal, 'none');
    displayZoneJoc(butonStay, 'none');
    butonNewgame.style.marginTop = '100px';
    console.log("functie primulJoc()");
}

function displayZoneJoc(id, displayType) {
    id.style.display = displayType;
}

/* primulJoc(); */

/* incepem un joc nou atunci cand apasam butonul New Game */
function incepeJoc() {
    displayZoneJoc(zonaJucator, 'block');
    displayZoneJoc(zonaScorJucator, 'block');
    displayZoneJoc(zonaDealer, 'block');
    displayZoneJoc(zonaScorDealer, 'block');
    displayZoneJoc(zonaScorFinal, 'block');
    displayZoneJoc(butonDeal, 'inline');
    displayZoneJoc(butonStay, 'inline');
    displayZoneJoc(butonNewgame, 'none');
    console.log("functie incepeJoc()");
}

/* functii butoane  */
/* butonNewgame.addEventListener('click', incepeJoc); */
butonDeal.addEventListener('click', function() {
    cartiJucator.push(oferaCarte(pachetCarti));
    arataZona(zonaJucator, cartiJucator, 'JUCATOR:');
    afiseazaScor(zonaScorJucator, cartiJucator, 'Scor Jucator:');
});
butonStay.addEventListener('click', function() {
    cartiDealer.push(oferaCarte(pachetCarti));
    arataZona(zonaDealer, cartiDealer, 'DEALER:');
    afiseazaScor(zonaScorDealer, cartiDealer, 'Scor Dealer:');
});


/* declarare variabile */
let gameOver = false;

/* cream pachetul de carti */
let cartiSimbol = ['Inima Rosie', 'Inima Neagra', 'Caro', 'Trefla'];
let cartiNume = ['Popa', 'Dama', 'Juvete', 'Zece', 'Noua', 'Opt', 'Sapte', 'Sase', 
                 'Cinci', 'Patru', 'Trei', 'Doi', 'As'];

function creeazaPachet() {
    let pachet = [];
    for (let i = 0; i < cartiSimbol.length; i++) {
        for (let j = 0; j < cartiNume.length; j++) {
            let carte = {
                nume: cartiNume[j],
                simbol: cartiSimbol[i]
            };
            pachet.push(carte);
        }
    }
    console.log("functie creeazaPachet()");
    return pachet;    
}

let pachetCarti = creeazaPachet();

/* amestecam pachetul de carti */
function amestecaPachet(pachet) {    
    for (let i = 0; i < pachet.length; i++) {
        let aleatoriu = Math.trunc(Math.random() * 52);
        let temp = pachet[i];
        pachet[i] = pachet[aleatoriu];
        pachet[aleatoriu] = temp;
    }
    console.log("functie amestecaPachet()");
}

amestecaPachet(pachetCarti);

/* dam carti jucatorului si dealerului */

function oferaCarte(pachet) {
    console.log("functie oferaCarte()");
    return (pachet.shift());
}

let cartiJucator = [oferaCarte(pachetCarti), oferaCarte(pachetCarti)];
let cartiDealer = [oferaCarte(pachetCarti), oferaCarte(pachetCarti)];/* de sters */

/* functie tiparit carte */
function carteToString(carte) {
    console.log("functie carteToString()");
    return (carte.nume + ' de ' + carte.simbol);
}

/* tiparim cartile jucatorului si ale dealerului */
function arataZona(zona, carti, numeInitial) {
    console.log("functie arataZona()");
    zona.innerText = numeInitial;
    for (let i = 0; i < carti.length; i++) {
        zona.innerText += '\n' + carteToString(carti[i]);
    }
    
}

arataZona(zonaJucator, cartiJucator, 'JUCATOR:');/*  */
arataZona(zonaDealer, cartiDealer, 'DEALER:');/*  */


/* puncte carti */
function puncteCarti(pachet) {
    console.log("functie puncteCarti()");
    switch (pachet.nume) {
        case 'Popa':
        case 'Dama':
        case 'Juvete':
        case 'Zece':
            return 10;
            break;
        case 'Noua':
            return 9;
            break
        case 'Opt':
            return 8;
            break
        case 'Sapte':
            return 7;
            break
        case 'Sase':
            return 6;
            break
        case 'Cinci':
            return 5;
            break
        case 'Patru':
            return 4;
            break
        case 'Trei':
            return 3;
            break
        case 'Doi':
            return 2;
            break
        case 'As':
            return 1;
            break
    }
}

/* calculam scorul */
function calculeazaScor(carti) {    
    let scor = 0;
    for (let i = 0; i < carti.length; i++) {
        scor += puncteCarti(carti[0]);
    }
    console.log("functie calculeazaScor()");
    return scor;
}

function afiseazaScor(zona, carte, numeZona) {
    zona.innerText = numeZona + ' ' + calculeazaScor(carte);
    console.log("functie afiseazaScor()");
}

afiseazaScor(zonaScorJucator, cartiJucator, 'Scor Jucator:');/*  */
afiseazaScor(zonaScorDealer, cartiDealer, 'Scor Dealer:'); /* de sters */

/* game over */
/* CJ = carti jucator; CD = carti dealer */
/* CJ = 21, CD = 21 => D win */
/* CJ = 21, CD != 21 => J win */
/* CJ != 21, CD = 21 => D win */
/* CJ < 21, CD > 21 => J win */
/* CJ */
function jocTerminat() {
    let scorJucator = calculeazaScor(cartiJucator);
    let scorDealer = calculeazaScor(cartiDealer);
    if ((scorJucator == 21 && scorDealer == 21) || (scorJucator != 21 && scorDealer == 21) ||
        (scorJucator > 21 && scorDealer <= 21)) {
            displayZoneJoc(butonDeal, 'none');
            displayZoneJoc(butonStay, 'none');
            displayZoneJoc(butonNewgame, 'inline');
            zonaScorFinal.innerText += '\n' + 'Dealerul a castigat! :(';
            gameOver = true;
    } else if ((scorJucator == 21 && scorDealer != 21 ) || (scorJucator < 21 || scorDealer > 21)) {
        displayZoneJoc(butonDeal, 'none');
        displayZoneJoc(butonStay, 'none');
        displayZoneJoc(butonNewgame, 'inline');
        zonaScorFinal.innerText += '\n' + 'Uhuuu! Ai castigat! :(';
        gameOver = true;
    }
    console.log("functie jocTerminat()");
}


