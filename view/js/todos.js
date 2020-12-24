class Todo {
    
    addToDo() {
    
        const input = document.querySelector('.add_todo__input')
    
        if (input.value.trim() != '') {
            const text = document.querySelector('.add_todo__input')

            const todos = document.querySelector('.todos')

            todos.innerHTML += `
            <div class="todos__todo"><input type="checkbox" onclick="removeToDo(this)">
            <span class="todo__text">${text.value.trim()}</span>
            <span class="todo__configs configs__edit">✏️</span>
            </div>
            <div>`
            this.addCookie(text.value.trim())
            text.value = ''
    
            // Animation
            const allTodos = document.querySelectorAll('.todos__todo')
            const this_element = allTodos[allTodos.length-1]
    
            this_element.classList.add('visible')
        }
    
    }
    
    editTodo(element) {
        const text_element = element.parentNode.querySelector('.todo__text')
    
        element.classList.add('unvisible')

        const text = text_element.innerText
    
        text_element.innerHTML = `<input type="text" value="${text}">
        <span class="text__check-btn-for-edit" onclick="todo.finishEdit(this)">
        ✔️</span>`
    }
    
    finishEdit(element) {
        const text_element = element.parentNode
        
        const input = text_element.querySelector('input')

        text_element.innerHTML = input.value

        const todo = text_element.parentNode

        const edit_btn = todo.querySelector('.unvisible')

        edit_btn.classList.remove('unvisible')
    }   
    
    
    addCookie(text) {
        fetch(`ajax.php?do=addTodo&val=${text}`)
    }
    
    removeToDo(element) {
        if ( element.checked == true ) {
                
            element.parentNode.classList.remove('visible')
    
            let text = element.parentNode.querySelector('.todo__text').innerText
    
            fetch(`ajax.php?do=removeTodo&val=${text}`).
            then(text => text.text()).
            then(text => console.log(text))
            
            setTimeout(() => {
                const todos = document.querySelector('.todos')

                todos.removeChild(element.parentNode)
            }, 1010)
        }
    }
    
    appear_and_disappear_animation() {
        const allTodos = document.querySelectorAll('.todos__todo')

        allTodos.forEach(todo => todo.classList.add('visible'))
    
    }

}

const todo = new Todo()

document.querySelector('body').addEventListener('keypress', e => {
    const input = document.querySelector('.add_todo__input')

    if (e.key === 'Enter' && input.value.trim() != '' ) {
        todo.addToDo()
    }
})