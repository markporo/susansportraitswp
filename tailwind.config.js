/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',                           //ADD THIS LINE
  purge: [                               //CONFIGURE CORRECTLY
    '**/*.php',
    '*.php',
  ],
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}