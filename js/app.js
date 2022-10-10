async function onSubmitGenerate(event){

    event.preventDefault();

    // On récupère les données du formulaire grâce à la classe FormData
    const formData = new FormData(generateForm);
    console.log(formData);
    
    const options = {
        method: 'POST',
        body: formData
    };

    const url = 'ajax.php';
    const response = await fetch(url, options); //la méthode fetch retourne une promesse
    const newAvatar = await response.text();
    //console.log(newAvatar);

    // Remplacement du code SVG de l'avatar... sur la page... (le placer dans une <div> avec une classe)
    let avatar = document.getElementById('avatarsvg');
    avatar.innerHTML = newAvatar;

    // ... mais aussi dans les champs cachés des autres formulaires
    document.querySelectorAll('[name="svg"]').forEach(field => {
        field.value = newAvatar;
    });

    // et on remplace aussi les champs 'size' et 'color' du formulaire d'enregistrement
    document.querySelector('#formSave [name="size"]').value = formData.get('size');
    document.querySelector('#formSave [name="color"]').value = formData.get('color');
}

async function onSubmitSave(event){
    
    event.preventDefault();

    const formData = new FormData(saveForm);

    const options = {
        method: 'POST',
        body: formData
    };

    fetch('ajax.php', options);

}

const generateForm = document.querySelector('.GenerateForm');
generateForm.addEventListener('submit', onSubmitGenerate);

const saveForm = document.querySelector('.saveForm');
saveForm.addEventListener('submit', onSubmitSave);
