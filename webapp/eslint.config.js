'use strict';

const neostandard = require('neostandard');

module.exports = [
  {
    ignores: [
      'node_modules/**',
      'vendor/**',
      'web/assets/**',
      'resource/**/*.js',
      'resource/**/*.min.js',
    ],
  },
  ...neostandard({
    semi: true,
    ts: true,
    globals: ['browser', 'jquery'],
  }),
];
