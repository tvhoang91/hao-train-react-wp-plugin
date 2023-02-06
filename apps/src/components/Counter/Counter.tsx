import "./Counter.css"
import { useState } from "react";
import { Button, Typography } from "antd";

const { Title } = Typography

function Counter() {
  const [count, setCount] = useState(0);

  return (
    <>
      <Title level={3}>Counter</Title>
      <Button 
        className="todo-btn-counter"
        type="primary"
        onClick={() => setCount((count) => count + 1)}
      >
        count is {count}
      </Button>
    </>
  )
}

export default Counter;