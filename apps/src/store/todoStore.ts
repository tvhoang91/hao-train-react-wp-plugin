import { create } from 'zustand'
import { devtools } from 'zustand/middleware'
import { immer } from 'zustand/middleware/immer'
import { getAllTodos } from '../api/todoApi'
import { TodoModel } from '../types/todo.type'

interface TodoState {
  todos: TodoModel[]

  getAllTodos: () => void
}

const useTodoStore = create<TodoState>()(
  devtools(
    immer(
      (set) => ({
        todos: [],

        getAllTodos: async () => {
          const allTodos = getAllTodos()
          set((state) => {
            state.todos = allTodos
          })
        }
      }),
    )
  )
)

export default useTodoStore