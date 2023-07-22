/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./front/*.php", "./back/*.php"],
  theme: {
    extend: {},
  },
  plugins: [
    // ...
    require('@tailwindcss/forms'),
  ],
}

