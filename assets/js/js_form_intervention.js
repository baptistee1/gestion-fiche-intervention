document.getElementById('supp0').hidden = 'true';

for (i = 5; i > 0; i--) {
    document.getElementById('voie' + i).style.display = 'none';
}

function showVoie(a) {
    var x = document.getElementById("voie" + a);
    console.log(document.getElementById("voie" + a).value);
    if (x.value !== 'none') {
        a = a + 1;
        document.getElementById("voie" + a).style.display = 'block';
    } else {
        x.style.display = 'none';
        document.getElementById("choix" + a).selected = 'true';
    }
}


function resetPrecision(precision) {
    for (i = 0; i < 5; i++) {
        document.getElementById('precision' + precision + i).style.display = 'none';


    }

}


function discoverIntervention() {
    if (document.getElementById('type').value == "Accident") {
        document.getElementById("choixAccident0").selected = 'true';
        document.getElementById('precisionAccident0').style.display = 'block';
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionAnimaux' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionBouchon' + i).style.display = 'none';
        }
        for (i = 0; i < 5; i++) {
            document.getElementById('precisionIntemp' + i).style.display = 'none';
        }
        for (i = 0; i < 7; i++) {
            document.getElementById('precisionObstacle' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionBalisage' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionChaussee' + i).style.display = 'none';
        }



    } else if (document.getElementById('type').value == "Animaux") {
        document.getElementById("choixAnimaux0").selected = 'true';
        document.getElementById('precisionAnimaux0').style.display = 'block';
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionAccident' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionBouchon' + i).style.display = 'none';
        }
        for (i = 0; i < 5; i++) {
            document.getElementById('precisionIntemp' + i).style.display = 'none';
        }
        for (i = 0; i < 7; i++) {
            document.getElementById('precisionObstacle' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionBalisage' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionChaussee' + i).style.display = 'none';
        }


    } else if (document.getElementById('type').value == "Bouchon") {
        document.getElementById("choixBouchon0").selected = 'true';
        document.getElementById('precisionBouchon0').style.display = 'block';
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionAccident' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionAnimaux' + i).style.display = 'none';
        }
        for (i = 0; i < 5; i++) {
            document.getElementById('precisionIntemp' + i).style.display = 'none';
        }
        for (i = 0; i < 7; i++) {
            document.getElementById('precisionObstacle' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionBalisage' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionChaussee' + i).style.display = 'none';
        }

    } else if (document.getElementById('type').value == "Intempéries") {
        document.getElementById("choixIntemp0").selected = 'true';
        document.getElementById('precisionIntemp0').style.display = 'block';
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionAccident' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionAnimaux' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionBouchon' + i).style.display = 'none';
        }
        for (i = 0; i < 7; i++) {
            document.getElementById('precisionObstacle' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionBalisage' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionChaussee' + i).style.display = 'none';
        }

    } else if (document.getElementById('type').value == "Obstacle mobile ou fixe") {
        document.getElementById("choixObstacle0").selected = 'true';
        document.getElementById('precisionObstacle0').style.display = 'block';
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionAccident' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionAnimaux' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionBouchon' + i).style.display = 'none';
        }
        for (i = 0; i < 5; i++) {
            document.getElementById('precisionIntemp' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionBalisage' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionChaussee' + i).style.display = 'none';
        }


    } else if (document.getElementById('type').value == "Balisage") {
        document.getElementById("choixBalisage0").selected = 'true';
        document.getElementById('precisionBalisage0').style.display = 'block';
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionAccident' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionAnimaux' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionBouchon' + i).style.display = 'none';
        }
        for (i = 0; i < 5; i++) {
            document.getElementById('precisionIntemp' + i).style.display = 'none';
        }
        for (i = 0; i < 7; i++) {
            document.getElementById('precisionObstacle' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionChaussee' + i).style.display = 'none';
        }


    } else if (document.getElementById('type').value == "Chaussée") {
        document.getElementById("choixChaussee0").selected = 'true';
        document.getElementById('precisionChaussee0').style.display = 'block';
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionAccident' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionAnimaux' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionBouchon' + i).style.display = 'none';
        }
        for (i = 0; i < 5; i++) {
            document.getElementById('precisionIntemp' + i).style.display = 'none';
        }
        for (i = 0; i < 7; i++) {
            document.getElementById('precisionObstacle' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionBalisage' + i).style.display = 'none';
        }
    } else if (document.getElementById('type').value == "Véhicule en panne") {

        for (i = 0; i < 3; i++) {
            document.getElementById('precisionAccident' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionAnimaux' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionBouchon' + i).style.display = 'none';
        }
        for (i = 0; i < 5; i++) {
            document.getElementById('precisionIntemp' + i).style.display = 'none';
        }
        for (i = 0; i < 7; i++) {
            document.getElementById('precisionObstacle' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionBalisage' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionChaussee' + i).style.display = 'none';
        }

    } else if (document.getElementById('type').value == "Autre") {

        for (i = 0; i < 3; i++) {
            document.getElementById('precisionAccident' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionAnimaux' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionBouchon' + i).style.display = 'none';
        }
        for (i = 0; i < 5; i++) {
            document.getElementById('precisionIntemp' + i).style.display = 'none';
        }
        for (i = 0; i < 7; i++) {
            document.getElementById('precisionObstacle' + i).style.display = 'none';
        }
        for (i = 0; i < 2; i++) {
            document.getElementById('precisionBalisage' + i).style.display = 'none';
        }
        for (i = 0; i < 3; i++) {
            document.getElementById('precisionChaussee' + i).style.display = 'none';
        }
    }
}


function showAccident(a) {
    var x = document.getElementById("precisionAccident" + a);
    console.log(document.getElementById("precisionAccident" + a).value);
    if (x.value !== 'none') {
        a = a + 1;
        document.getElementById("precisionAccident" + a).style.display = 'block';
    } else {
        x.style.display = 'none';
        document.getElementById("choixAccident" + a).selected = 'true';
    }

}


function showAnimaux(a) {
    var x = document.getElementById("precisionAnimaux" + a);
    console.log(document.getElementById("precisionAnimaux" + a).value);
    if (x.value !== 'none') {
        a = a + 1;
        document.getElementById("precisionAnimaux" + a).style.display = 'block';
    } else {
        x.style.display = 'none';
        document.getElementById("choixAnimaux" + a).selected = 'true';
    }

}


function showBouchon(a) {
    var x = document.getElementById("precisionBouchon" + a);
    console.log(document.getElementById("precisionBouchon" + a).value);
    if (x.value !== 'none') {
        a = a + 1;
        document.getElementById("precisionBouchon" + a).style.display = 'block';
    } else {
        x.style.display = 'none';
        document.getElementById("choixBouchon" + a).selected = 'true';
    }

}


function showIntemp(a) {
    var x = document.getElementById("precisionIntemp" + a);
    console.log(document.getElementById("precisionIntemp" + a).value);
    if (x.value !== 'none') {
        a = a + 1;
        document.getElementById("precisionIntemp" + a).style.display = 'block';
    } else {
        x.style.display = 'none';
        document.getElementById("choixIntemp" + a).selected = 'true';
    }

}


function showObstacle(a) {
    var x = document.getElementById("precisionObstacle" + a);
    console.log(document.getElementById("precisionObstacle" + a).value);
    if (x.value !== 'none') {
        a = a + 1;
        document.getElementById("precisionObstacle" + a).style.display = 'block';
    } else {
        x.style.display = 'none';
        document.getElementById("choixObstacle" + a).selected = 'true';
    }

}


function showBalisage(a) {
    var x = document.getElementById("precisionBalisage" + a);
    console.log(document.getElementById("precisionBalisage" + a).value);
    if (x.value !== 'none') {
        a = a + 1;
        document.getElementById("precisionBalisage" + a).style.display = 'block';
    } else {
        x.style.display = 'none';
        document.getElementById("choixBalisage" + a).selected = 'true';
    }

}


function showChaussee(a) {
    var x = document.getElementById("precisionChaussee" + a);
    console.log(document.getElementById("precisionChaussee" + a).value);
    if (x.value !== 'none') {
        a = a + 1;
        document.getElementById("precisionChaussee" + a).style.display = 'block';
    } else {
        x.style.display = 'none';
        document.getElementById("choixChaussee" + a).selected = 'true';
    }

}



