/**
 * The used webpack configuration, loading default settings and adjusting configuration along the way.
 */

const webpack = require('webpack')
const _ = require('lodash')

// Our base webpack configuration file
const config = require('./vendor/nwidart/laravel-modules/scripts/webpack.config')

/* Exclude non-JS modules from being used in vendors.js */

// TODO: find a way to exclude default Bootstrap Glyphicons font
const excludedVendors = [
    'font-awesome',
]

config.entry.vendors = _.pullAll(config.entry.vendors, excludedVendors);

/* Provide global support for vendor libraries */

config.plugins.push(new webpack.ProvidePlugin({
    $: 'jquery',
    jQuery: 'jquery',
}))

config.plugins.push(new webpack.ProvidePlugin({
    _: 'lodash',
}))

module.exports = config