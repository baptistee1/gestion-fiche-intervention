
const elems = document.querySelectorAll('form');

elems.forEach((elem, index) => {
    index = index + 1
    console.log(document.getElementById('typeInter' + index).value);
    console.log(document.getElementById('typeInter' + index))

    for (i = 0; i < 5; i++) {
        if (document.getElementById('voie' + i + 'ref' + index).value == "none") {

            document.getElementById('voie' + i + 'ref' + index).style.display = 'none';
        }



    }

})



