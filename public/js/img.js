document.querySelector('#image').addEventListener('change',(event)=>{
    const file = event.target.files[0]

    if (!file) return

    const reader = new FileReader()
    reader.onload = (event)=>{
        document.querySelector('#img').src = event.target.result
    }
    reader.readAsDataURL(file)
})