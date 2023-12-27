elems.forEach((elem, index) => {

    index = index + 1
    console.log(document.getElementById('typeInter' + index).value);
    console.log(document.getElementById('typeInter' + index))


    if (document.getElementById('typeInter' + index).value == 'Accident') {
        for (i = 0; i < 3; i++) {
            console.log(document.getElementById('precisionAccident' + i))
            document.getElementById('precisionAccident' + i + 'voie' + index).style.display = 'block';
        }

    }
    if (document.getElementById('typeInter' + index).value == 'Animaux') {
        for (i = 0; i < 2; i++) {
            console.log(document.getElementById('precisionAnimaux' + i))
            document.getElementById('precisionAnimaux' + i + 'voie' + index).style.display = 'block';
        }

    }
    if (document.getElementById('typeInter' + index).value == 'Bouchon') {
        for (i = 0; i < 3; i++) {
            console.log(document.getElementById('precisionBouchon' + i))
            document.getElementById('precisionBouchon' + i + 'voie' + index).style.display = 'block';
        }

    }
    if (document.getElementById('typeInter' + index).value == 'Intempéries') {
        for (i = 0; i < 5; i++) {
            console.log(document.getElementById('precisionIntemp' + i))
            document.getElementById('precisionIntemp' + i + 'voie' + index).style.display = 'block';
        }

    }
    if (document.getElementById('typeInter' + index).value == 'Obstacles mobiles ou fixes') {
        for (i = 0; i < 7; i++) {
            console.log(document.getElementById('precisionObstacle' + i))
            document.getElementById('precisionObstacle' + i + 'voie' + index).style.display = 'block';
        }

    }
    if (document.getElementById('typeInter' + index).value == 'Balisage') {
        for (i = 0; i < 2; i++) {
            console.log(document.getElementById('precisionBalisage' + i))
            document.getElementById('precisionBalisage' + i + 'voie' + index).style.display = 'block';
        }

    }
    if (document.getElementById('typeInter' + index).value == 'Chaussée') {
        for (i = 0; i < 3; i++) {
            console.log(document.getElementById('precisionChaussée' + i))
            document.getElementById('precisionChaussée' + i + 'voie' + index).style.display = 'block';
        }

    }





})