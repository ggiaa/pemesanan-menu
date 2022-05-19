module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'primary' : '#457b9d',
        'secondary' : '#a8dadc',
        'accent' : '#e63946'
      },
      backgroundImage: {
        'cover' : "url('/image/cover.png')" 
      }
    },
  },
  plugins: [],
}
