import react from "@vitejs/plugin-react";
import path from "path";
import { defineConfig } from "vite";
import mkcert from "vite-plugin-mkcert";

const rootpath = "./src";

// https://vitejs.dev/config/
export default defineConfig({
  root: rootpath,
  plugins: [react(), mkcert()],
  build: {
    manifest: true,
    emptyOutDir: true,
    assetsDir: "",
    outDir: path.resolve("../assets", "dist"),
    rollupOptions: {
      input: {
        "main.tsx": path.resolve(__dirname, rootpath, "main.tsx"),
      },
    },
  },
  server: {
    https: true,
    cors: true,
    strictPort: true,
    port: 3000,
    hmr: {
      port: 3000,
      host: "localhost",
      // Add line if we don't use https
      // protocol: "ws",
    },
  },
});
