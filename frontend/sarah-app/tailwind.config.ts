import type { Config } from "tailwindcss";

export default {
  content: ["./src/**/*.{html,js,svelte,ts}"],

  theme: {
    extend: {
      colors: {
        'sarah-white': {
          DEFAULT: '#fff'
        },
        'sarah-green': {
          DEFAULT: '#325140'
        },
        'sarah-red': {
            DEFAULT: '#C70039'
          },
        'sarah-gold': {
          DEFAULT: '#D0A16F'
        }
      },
      boxShadow: {
        'custom': '0 0 40px 0 rgba(0, 0, 0, 0.3)'
      }
    }
  },

  plugins: [require("@tailwindcss/typography")]
} as Config;
