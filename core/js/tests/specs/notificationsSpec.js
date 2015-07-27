/**
 * @author Clark Tomlinson  <clark@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 */

describe('Notifications base tests', function() {

    describe('Notifications', function () {
        beforeEach(function () {
            notificationMock = sinon.mock(OC.Notification);
        });
        afterEach(function () {
            // verify that all expectations are met
            notificationMock.verify();
            // restore mocked methods
            notificationMock.restore();
            // clean up the global variable
            delete notificationMock;
        });
        it('Should show a plain text notification', function () {
            // one is shown ...
            notificationMock.expects('show').once().withExactArgs('My notification test');
            // ... but not the HTML one
            notificationMock.expects('showHtml').never();

            OC.Notification.showTemporary('My notification test');

            // verification is done in afterEach
        });
        it('Should show a HTML notification', function () {
            // no plain is shown ...
            notificationMock.expects('show').never();
            // ... but one HTML notification
            notificationMock.expects('showHtml').once().withExactArgs('<a>My notification test</a>');

            OC.Notification.showTemporary('<a>My notification test</a>', {isHTML: true});

            // verification is done in afterEach
        });
        it('Should hide previous notification and hide itself after 7 seconds', function () {
            var clock = sinon.useFakeTimers();

            // previous notifications get hidden
            notificationMock.expects('hide').once();

            OC.Notification.showTemporary('');

            // verify the first call
            notificationMock.verify();

            // expect it a second time
            notificationMock.expects('hide').once();

            // travel in time +7000 milliseconds
            clock.tick(7000);

            // verification is done in afterEach
        });
        it('Should hide itself after a given time', function () {
            var clock = sinon.useFakeTimers();

            // previous notifications get hidden
            notificationMock.expects('hide').once();

            OC.Notification.showTemporary('', {timeout: 10});

            // verify the first call
            notificationMock.verify();

            // expect to not be called after 9 seconds
            notificationMock.expects('hide').never();

            // travel in time +9 seconds
            clock.tick(9000);
            // verify this
            notificationMock.verify();

            // expect the second call one second later
            notificationMock.expects('hide').once();
            // travel in time +1 seconds
            clock.tick(1000);

            // verification is done in afterEach
        });
        it('Should not hide itself after a given time if a timeout of 0 is defined', function () {
            var clock = sinon.useFakeTimers();

            // previous notifications get hidden
            notificationMock.expects('hide').once();

            OC.Notification.showTemporary('', {timeout: 0});

            // verify the first call
            notificationMock.verify();

            // expect to not be called after 1000 seconds
            notificationMock.expects('hide').never();

            // travel in time +1000 seconds
            clock.tick(1000000);

            // verification is done in afterEach
        });
    });
});
