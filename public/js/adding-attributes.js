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


  const plusBlock = `<div class="attribut_box">
              <div class="attribut_box_inner">
                <label for="plus_name">Название</label>
                <input type="text" name="plus_name" id="plus_name">
              </div>
              <div class="attribut_box_inner">
                <label for="value">Значение</label>
                <input type="value" name="value" id="value">
              </div>
              <img src="{{asset('img/trash-icon.svg')}}" class="trash_icon">
            </div>`


  addButton.addEventListener('click', e => {
    e.preventDefault()
    box.innerHTML += plusBlock

    // delButtons = document.querySelectorAll('.trash_icon')

    // delButtons.forEach(delButton => {
    //   delButton.addEventListener('click', e => {
    //     e.target.parentElement.remove()
    //   })
    // })

    deleteHandler()

  })
}


