import react from "@vitejs/plugin-react";
import "dotenv/config";

/**
 * @type {import('vite').UserConfig}
 */
export default {
    define: {
        "process.env.SHOPIFY_API_KEY": JSON.stringify(process.env.SHOPIFY_API_KEY),
        "process.env.NODE_ENV": JSON.stringify(process.env.NODE_ENV),
    },
    //plugins: [react()],
    plugins: [
        process.env.NODE_ENV !== `production` ? react({
            jsxRuntime: `classic`,
        }) : react(),
    ],
};