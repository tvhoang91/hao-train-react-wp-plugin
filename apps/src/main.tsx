import React from "react";
import ReactDOM from "react-dom/client";
import App from "./App";

document.addEventListener("DOMContentLoaded", function () {
  ReactDOM.createRoot(document.getElementById("njt-app") as HTMLElement).render(
    <React.StrictMode>
      <App />
    </React.StrictMode>
  );
});
