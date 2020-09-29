module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: {
    enabled: false, //toggle
    content: ['./*.php', './model/*.php', './view/*.php', './controller/*.php'],
  },
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [],
};
