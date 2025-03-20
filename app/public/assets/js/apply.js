const popupElement = document.querySelector('.popup')
const messageElement = document.querySelector('.message')

// Popup open en sluit event listeners
document.querySelector('.apply-btn').addEventListener('click', () => {
    popupElement.classList.add('show')
})
document.querySelector('.close').addEventListener('click', () => {
    popupElement.classList.remove('show')
})

// Lengte van de motivatie bijhouden en tonen
function motivationLength() {
    const len = document.querySelector('#motivation').value.length
    const max = document.querySelector('#motivation').maxLength
    document.querySelector('.motivation-length').textContent = len + " / " + max
}

motivationLength()
document.querySelector('#motivation').addEventListener('keypress', motivationLength)

// Formulier verzenden
document.forms.application.addEventListener('submit', (e) => {
    e.preventDefault()
    messageElement.textContent = 'Bezig met versturen...'

    const url = e.currentTarget.action;
    const body = new FormData(e.currentTarget);

    fetch(url, {
        body,
        method: 'POST',
    })
        .then(response => response.json())
        .then(response => {
            console.log(response)
            if (!response.ok) {
                throw new Error(response.message)
            }

            messageElement.textContent = 'Verzonden! Bedankt voor je sollicitatie.'
        })
        .catch((error) => {
            console.error(error);
            messageElement.textContent = 'Er is iets fout gegaan. Probeer het later opnieuw.\n\nFoutmelding: ' + error.message
        })
})
