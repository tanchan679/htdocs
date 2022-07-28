var mongoose = require('mongoose');

var productSchema = mongoose.Schema({
    root_id: {
        type: String,
        default: 'No Name'
    },
    topic: {
        type: String,
        default: 'No Type'
    },
    data: {
        type: String,
        default: 'No Type'
    },
    create_at: {
        type: String,
        default: 'No Type'
    },
    __v: {
        type: String,
        default: 'No Type'
    }
});

module.exports = mongoose.model( 'history', productSchema, 'history');