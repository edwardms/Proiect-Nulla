
/* declaram variabilele ce se ocupa de zonele de text si de butoane */
let zonaJucator = document.getElementById('zona-jucator');
let zonaScorJucator = document.getElementById('zona-scor-jucator');
let zonaDealer = document.getElementById('zona-dealer');
let zonaScorDealer = document.getElementById('zona-scor-dealer');
let zonaScorFinal= document.getElementById('zona-final-joc');
let butonNewgame = document.getElementById('buton-newgame');
let butonDeal = document.getElementById('buton-deal');
let butonStay = document.getElementById('buton-stay');

let preJoc = document.getElementById('mesaj-pre-joc');
let butonDa = document.getElementById('buton-da');
let butonNu = document.getElementById('buton-nu');

/* aceasta functie este apelata de fiecare data cand pagina este (re)incarcata */
function inainteDeJoc() {
    displayZoneJoc(butonNewgame, 'none');
    preJoc.style.marginTop = '100px';
    butonDa.style.marginTop = '100px';
    butonNu.style.marginTop = '100px';
    displayZoneJoc(zonaJucator, 'none');
    displayZoneJoc(zonaScorJucator, 'none');
    displayZoneJoc(zonaDealer, 'none');
    displayZoneJoc(zonaScorDealer, 'none');
    displayZoneJoc(zonaScorFinal, 'none');
    displayZoneJoc(butonDeal, 'none');
    displayZoneJoc(butonStay, 'none');
}

/* aceasta functie este apelata dupa confirmarea mesajului pre-joc */
function primulJoc() {
    displayZoneJoc(preJoc, 'none');
    displayZoneJoc(butonDa, 'none');
    displayZoneJoc(butonNu, 'none');
    displayZoneJoc(zonaJucator, 'none');
    displayZoneJoc(zonaScorJucator, 'none');
    displayZoneJoc(zonaDealer, 'none');
    displayZoneJoc(zonaScorDealer, 'none');
    displayZoneJoc(zonaScorFinal, 'none');
    displayZoneJoc(butonDeal, 'none');
    displayZoneJoc(butonStay, 'none');
    displayZoneJoc(butonNewgame, 'block');
    butonNewgame.style.margin = '100px auto';
}

function displayZoneJoc(id, displayType) {
    id.style.display = displayType;
}
inainteDeJoc();
butonDa.addEventListener('click', function() {    
    primulJoc();
});

butonNu.addEventListener('click', function() {
    primulJoc();
});

/* declarare variabile */
let castigaJucator = false;
let castigaDealer = false;
let pachetCarti = [];
let cartiJucator = [];
let cartiDealer = [];
/* incepem un joc nou atunci cand apasam butonul New Game */

let cartiSimbol = ['Inima Rosie', 'Inima Neagra', 'Caro', 'Trefla'];
let cartiNume = ['Popa', 'Dama', 'Juvete', 'Zece', 'Noua', 'Opt', 'Sapte', 'Sase', 
                 'Cinci', 'Patru', 'Trei', 'Doi', 'As'];

function incepeJoc() {
    displayZoneJoc(zonaJucator, 'block');
    displayZoneJoc(zonaScorJucator, 'block');
    displayZoneJoc(zonaDealer, 'block');
    displayZoneJoc(zonaScorDealer, 'block');
    displayZoneJoc(zonaScorFinal, 'none');
    displayZoneJoc(butonDeal, 'inline');
    displayZoneJoc(butonStay, 'inline');
    displayZoneJoc(butonNewgame, 'none');

    castigaJucator = false;
    castigaDealer = false;

    pachetCarti = creeazaPachet();
    amestecaPachet(pachetCarti);

    cartiJucator = [];
    cartiDealer = [];
    cartiJucator = [oferaCarte(pachetCarti), oferaCarte(pachetCarti)];
    cartiDealer = [oferaCarte(pachetCarti), oferaCarte(pachetCarti)];

    arataZona(zonaJucator, cartiJucator, 'JUCATOR:');
    arataZona(zonaDealer, cartiDealer, 'DEALER:');

    afiseazaScor(zonaScorJucator, cartiJucator, 'Scor Jucator:');
    afiseazaScor(zonaScorDealer, cartiDealer, 'Scor Dealer:');

    if (blackjack(cartiDealer)) {
        displayZoneJoc(butonDeal, 'none');
        displayZoneJoc(butonStay, 'none');
        displayZoneJoc(butonNewgame, 'inline');
        zonaScorDealer.innerText = 'Scor Dealer: 21';        
        displayZoneJoc(zonaScorFinal, 'block');
        zonaScorFinal.innerText = 'FINAL JOC:\n' + 'BLACKJACK' + '\nDealerul a castigat! :(';
    } if (blackjack(cartiJucator)) {        
        displayZoneJoc(butonDeal, 'none');
        displayZoneJoc(butonStay, 'none');
        displayZoneJoc(butonNewgame, 'inline');
        zonaScorJucator.innerText = 'Scor Jucator: 21';
        if (!blackjack(cartiDealer)) {                 
            displayZoneJoc(zonaScorFinal, 'block');
            zonaScorFinal.innerText = 'FINAL JOC:\n'+ 'BLACKJACK' + '\nUhuuu! Ai castigat! :)';
        }        
    }

}

/* functie ce verifica daca avem blackjack */
/* As + Zece, Juvete, Dama, Popa = Blackjack */
function blackjack(carti) {
    let black = 0;
    let jack = 0;
    if (carti[0].nume == ('Popa' || 'Dama' || 'Juvete' || 'Zece')) {
        black = 1;
    }
    if (carti[1].nume == ('Popa' || 'Dama' || 'Juvete' || 'Zece')) {
        jack = 1;
    }
    if ((black == 1 && carti[1].nume == 'As') || (carti[0].nume == 'As' && jack == 1)) {
        return true;
    }
    return false;
}

/* functii butoane newgame, stay, deal  */
butonNewgame.addEventListener('click', function() {
    incepeJoc();
    jocTerminat();
    joc();
});

butonDeal.addEventListener('click', function() {
    cartiJucator.push(oferaCarte(pachetCarti));
    arataZona(zonaJucator, cartiJucator, 'JUCATOR:');
    afiseazaScor(zonaScorJucator, cartiJucator, 'Scor Jucator:');
    jocTerminat();
    joc();
});

butonStay.addEventListener('click', function() {
    cartiDealer.push(oferaCarte(pachetCarti));
    arataZona(zonaDealer, cartiDealer, 'DEALER:');
    afiseazaScor(zonaScorDealer, cartiDealer, 'Scor Dealer:');
    jocTerminat();
    joc();
});

/* cream pachetul de carti */
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
    return pachet;    
}

/* amestecam pachetul de carti */
function amestecaPachet(pachet) {    
    for (let i = 0; i < pachet.length; i++) {
        let aleatoriu = Math.trunc(Math.random() * 52);
        let temp = pachet[i];
        pachet[i] = pachet[aleatoriu];
        pachet[aleatoriu] = temp;
    }
}

/* dam carti jucatorului si dealerului */
function oferaCarte(pachet) {
    return (pachet.shift());
}

/* functie tiparit carte */
function carteToString(carte) {
    return (carte.nume + ' de ' + carte.simbol);
}

/* tiparim cartile jucatorului si ale dealerului */
function arataZona(zona, carti, numeInitial) {
    zona.innerText = numeInitial;
    for (let i = 0; i < carti.length; i++) {
        zona.innerText += '\n' + carteToString(carti[i]);
    }    
}

/* puncte carti */
function puncteCarti(pachet) {
    switch (pachet.nume) {
        case 'Popa':
        case 'Dama':
        case 'Juvete':
        case 'Zece':
            return 10;
            break;
        case 'Noua':
            return 9;
            break;
        case 'Opt':
            return 8;
            break;
        case 'Sapte':
            return 7;
            break;
        case 'Sase':
            return 6;
            break;
        case 'Cinci':
            return 5;
            break;
        case 'Patru':
            return 4;
            break;
        case 'Trei':
            return 3;
            break;
        case 'Doi':
            return 2;
            break;
        case 'As':
            return 1;
            break;
    }
}

/* calculam scorul */
function calculeazaScor(carti) {    
    let scor = 0;
    for (let i = 0; i < carti.length; i++) {
        scor += puncteCarti(carti[i]);
    }
    return scor;
}

function afiseazaScor(zona, carte, numeZona) {
    zona.innerText = numeZona + ' ' + calculeazaScor(carte);
}

/* game over */
/* CJ = carti jucator; CD = carti dealer */
/* CJ = 21, CD = 21 => D win */
/* CJ = 21, CD != 21 => J win */
/* CJ != 21, CD = 21 => D win */
/* CJ < 21, CD > 21 => J win */
function jocTerminat() {
    let scorJucator = calculeazaScor(cartiJucator);
    let scorDealer = calculeazaScor(cartiDealer);
    console.log(scorJucator);
    console.log(scorDealer);
    if ((scorJucator == 21 && scorDealer == 21) || (scorJucator < 21 && scorDealer == 21) ||
        (scorJucator > 21 && scorDealer < 21)) {
            castigaDealer = true;
    } else if ((scorJucator == 21 && scorDealer < 21 ) || (scorJucator == 21 || scorDealer > 21) ||
               (scorJucator > 21 && scorDealer < 21)) {
            castigaJucator = true;
    }
}

function joc() {
    if (castigaJucator) {
        displayZoneJoc(butonDeal, 'none');
        displayZoneJoc(butonStay, 'none');
        displayZoneJoc(butonNewgame, 'inline');        
        displayZoneJoc(zonaScorFinal, 'block');
        zonaScorFinal.innerText = 'FINAL JOC:\n'+ 'Uhuuu! Ai castigat! :)';
    } else if (castigaDealer) {
        displayZoneJoc(butonDeal, 'none');
        displayZoneJoc(butonStay, 'none');
        displayZoneJoc(butonNewgame, 'inline');        
        displayZoneJoc(zonaScorFinal, 'block');
        zonaScorFinal.innerText = 'FINAL JOC:\n' + 'Dealerul a castigat! :(';
    }
}
