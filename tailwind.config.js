/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.html",
    "./*.html",
    "./case-studies/*.html",
    "./assets/js/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        trendz: {
          ink: '#17151F',
          purple: '#5C55A2',
          lilac: '#8B85CF',
          pink: '#D52D91',
          paper: '#F7F7F9',
          muted: '#6F6B78',
          line: '#E8E7EC',
          deep: '#1E1C38',
          darkink: '#11101E',
          softpaper: '#F7F7FB'
        }
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
        heading: ['"Plus Jakarta Sans"', 'sans-serif'],
        display: ['Syne', '"Space Grotesk"', 'sans-serif'],
        mono: ['"DM Mono"', 'monospace'],
        body: ['Inter', 'Manrope', 'sans-serif'],
        grotesk: ['"Space Grotesk"', 'sans-serif'],
        manrope: ['Manrope', 'sans-serif']
      }
    }
  },
  plugins: []
};
