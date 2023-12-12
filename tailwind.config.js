import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */

export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                xxs: ["0.625rem", { lineHeight: "1rem" }],
            },
            maxWidth: {
                custom: "68.5rem",
            },
            boxShadow: {
                card: "4px 4px 15px 0 rgba(36, 37, 38, 0.08)",
                dialog: "3px 4px 15px 0 rgba(36, 37, 38, 0.22)",
            },
            spacing: {
                38: "9.5rem",
                44: "11rem",
                70: "17.5rem",
                76: "19rem",
                175: "43.75rem",
                104: "26rem",
                175: "43.75rem",
            },
            colors: {
                black: "#212529",
                white: "#ffffff",
                transparent: "transparent",
                current: "currentColor",
                rosewater: "#f5e0dc",
                flamingo: "#f2cdcd",
                pink: "#f5c2e7",
                mauve: "#cba6f7",
                red: "#f38ba8",
                maroon: "#eba0ac",
                peach: "#fab387",
                green: "#a6e3a1",
                yellow: "#f9e2af",
                teal: "#94e2d5",
                sky: "#89dceb",
                sapphire: "#74c7ec",
                blue: "#89b4fa",
                lavender: "#b4befe",
                text: "#cdd6f4",
                subtext1: "#bac2de",
                subtext0: "#a6adc8",
                overlay2: "#9399b2",
                overlay1: "#7f849c",
                overlay0: "#6c7086",
                surface2: "#585b70",
                surface1: "#45475a",
                surface0: "#313244",
                base: "#1e1e2e ",
                mantle: "#181825 ",
                crust: "#11111b",
            },
            margin: {
                6: "1.5rem",
                22: "5.5rem",
            },
        },
    },

    plugins: [forms],
};
