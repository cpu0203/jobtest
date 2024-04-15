<script>
    window.onload = () => {
        const box = document.querySelector('.atributs_container')
        const addButton = document.querySelector('.add_attribute')
        let delButton = null


        const deleteHandler = () => {
            delButtons = document.querySelectorAll('.trash_icon')

            delButtons.forEach(delButton => {
                delButton.addEventListener('click', e => {
                    e.target.parentElement.remove()
                })
            })
        }

        const attributBox = document.querySelector('.attribut_box')
        if(attributBox !== null) deleteHandler()

        const plusBlock = `<div class="attribut_box">
            <div class="attribut_box_inner">
                <label for="plus_name">Название</label>
                <input type="text" name="plus_name[]" id="plus_name">
            </div>
            <div class="attribut_box_inner">
                <label for="plus_value">Значение</label>
                <input type="value" name="plus_value[]" id="plus_value">
            </div>
            <img src="{{ asset('img/trash-icon.svg') }}" class="trash_icon">
            </div>`

        let a = 0

        addButton.addEventListener('click', e => {
            e.preventDefault()
            a += 1
            box.innerHTML += plusBlock

            deleteHandler()
        })
    }
</script>
