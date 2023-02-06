import "./Counter.css"
import { useState } from "react";

function Counter() {
  const [count, setCount] = useState(0);

  return (
    <button 
      className="todo-btn-counter"
      onClick={() => setCount((count) => count + 1)}
    >
      count is {count}
    </button>
  )
}

export default Counter;