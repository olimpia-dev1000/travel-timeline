/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'ultra-violet': '#4E4187',
        'bleu-de-france': '#3083DC',
        'light-yellow': '#F8FFE5',
        'keppel': '#2EBFA5',
        'custom-white': '#FBFBFB',
        'text-custom-gray': '#515151',
        'bg-custom-white': '#F7F7F7',

      },
      letterSpacing: {
        'extra-wide': '0.5em'
      },
      fontFamily: {
        montserrat: ['"Montserrat"', ...defaultTheme.fontFamily.sans]
      }
    },
  },
  plugins: [],
}

