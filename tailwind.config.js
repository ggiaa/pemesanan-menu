module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'primary' : '#003049',
        'secondary' : '#a8dadc',
        'accent' : '#fb8500'
      },
      backgroundImage: {
        'cover' : "url('/image/cover.png')" 
      }
    },
  },
  plugins: [],
}
