/**
 * The used webpack configuration, loading default settings and adjusting configuration along the way.
 */

const webpack = require('webpack')
const path = require('path')
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
    'window.jQuery': 'jquery',
}))

config.plugins.push(new webpack.ProvidePlugin({
    _: 'lodash',
}))

// Force Bootstrap to pick up on Tether
config.plugins.push(new webpack.ProvidePlugin({
    tether: 'tether',
    Tether: 'tether',
    'window.Tether': 'tether',
}))

config.resolve.alias = {
    // Force all modules to use the same jquery version
    // See https://github.com/Eonasdan/bootstrap-datetimepicker/issues/1319#issuecomment-208339466
    'jquery': path.resolve(process.cwd(), 'node_modules/jquery/src/jquery'),
}

module.exports = config