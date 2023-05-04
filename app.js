const form = document.getElementById('formulario')
const usuario = document.getElementById('validationCustom01')
const correo = document.getElementById('validationCustom02')
const mensaje = document.getElementById('validationCustom03')
const boton = document.getElementById('boton')

form.addEventListener('submit', (e) => {
    e.preventDefault()
    e.stopPropagation()

    const data = new FormData(form)
    // validacion del usuario
    if( !data.get('usuario').trim() ){
        campoError(usuario)
        return
    } else {
        campoValido(usuario)
    }

    if( !data.get('correo').trim() ){
        campoError(correo)
        return
    } else {
        campoValido(correo)
    }

    if( !data.get('mensaje').trim() ){
        campoError(mensaje)
        return
    } else {
        campoValido(mensaje)
    }

    fetch('formulario.php', {
        method: 'POST',
        body: data
    }).then((res) => res.json())
    .then((datos) => {
            console.log('@@@ Datos => ', datos)
       })
    //console.log('@@@ data => ', data)
})

const campoError = (campo) => {
    campo.classList.add('is-invalid')
    campo.classList.remove('is-valid')
}

const campoValido = (campo) => {
    campo.classList.add('is-valid')
    campo.classList.remove('is-invalid')
}
