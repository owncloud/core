/**
 * Copyright (c) 2019 Felix Heidecke <felixheidecke@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/** @namespace */

var OCE = {

    _queue : [],

    /**
     * Trigger callbacks corresponding to events
     *
     * @param {String} event event name
     * @param {Object} payload data to be used in the callback
     *
     */
	emit : function (event, payload) {
        var self = this;
        payload = payload || {}

        let listeners = _.where(this._queue, {
            event : event
        })

        _.each(listeners, function(listener) {
            listener.callback(payload)

            console.log('%cOCE.emit', self._style('emit'), '🏃‍♂️', event)

            if (listener.once)
                self.off(event, listener.callback.name)
        })
	},
    
    /**
     * Add eventlistener
     *
     * @param {String} event event name
     * @param {Object} callback function to be run on emit. Expects a function name
     * @param {Boolean} once remove listener after emit
     *
     */
    on: function(event, callback, once) {
        once = once || false;

        if (callback.name.length === 0) {
            console.error('OCE error:', '❌', 'No name for callback supplied.')
            return
        }

        else if (!!_.findWhere(this._queue, { event : event, name : callback.name })) {
            console.warn('OCE warning:', '😵', callback.name + ' already exists for ' + event + '.')
            return
        }

        console.log('%cOCE.on', this._style('on'), event, callback.name)

        this._queue.push({
            event    : event,
            name     : callback.name,
            callback : callback,
            once     : once
        })
    },

    /**
     * Remove eventlistener
     *
     * @param {String} event event name
     * @param {Object} callback function to be removed
     *
     */
    off: function(event, name) {
        console.log('%cOCE.off', this._style('off'), event, name)

        this._queue = _.reject(this._queue, {
            event: event,
            name : name
        })
    },

    _style: function(type) {
        var style = ['padding: 0 5px']

        switch (type) {
            case 'emit':
                style.push('background: yellow')
                break;

            case 'on':
                style.push('background: lime')
                break;

            case 'off':
                style.push('background: crimson', 'color: white')
                break;

            default:
                style.push('background: gray')
                break;
        }

        return style.join(';')
    },

    eventList() {
        return this._queue
    }
};