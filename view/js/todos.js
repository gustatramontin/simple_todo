
document.querySelector('body').addEventListener('keypress', todo.enter_func)

class Todo {
    constructor() {

        this.enter_func = e => {
            const input = document.querySelector('.add_todo__input')
        
            if (e.key === 'Enter' && input.value.trim() != '' ) {
                addToDo()
            }
        }

        this.todos = document.querySelector('.todos')
        this.allTodos = document.querySelectorAll('.todos__todo')


    }
    
    addToDo() {
    
        const input = document.querySelector('.add_todo__input')
    
        if (input.value.trim() != '') {
            const text = document.querySelector('.add_todo__input')

            this.todos.innerHTML += `
            <div class="todos__todo"><input type="checkbox" onclick="removeToDo(this)">
            <span class="todo__text">${text.value.trim()}</span>
            <span class="todo__configs configs__edit">✏️</span>
            </div>
            <div>`
            this.addCookie(text.value.trim())
            text.value = ''
    
            // Animation
            const this_element = this.allTodos[this.allTodos.length-1]
    
            this_element.classList.add('visible')
        }
    
    }
    
    editTodo(element) {
        const text_element = element.parentNode.querySelector('.todo__text')
    
        const text = text_element.innerText
    
        text_element.innerHTML = `<input type="text" value="${text}">`
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
                this.todos.removeChild(element.parentNode)
            }, 1010)
        }
    }
    
    appear_and_disappear_animation() {
        this.allTodos.forEach(todo => todo.classList.add('visible'))
    
    }

}

const todo = new Todo()