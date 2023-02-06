import "./Counter.css"
import { useState } from "react";

function Counter() {
  const [count, setCount] = useState(0);

  return (
    <>
      <h1>Counter</h1>
      <button 
        className="todo-btn-counter"
        onClick={() => setCount((count) => count + 1)}
        >
        count is {count}
      </button>
    </>
  )
}

export default Counter;