/**
 * @author Clark Tomlinson  <clark@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 */
describe('Plugins base tests', function() {

    describe('Plugins', function () {
        var plugin;

        beforeEach(function () {
            plugin = {
                name: 'Some name',
                attach: function (obj) {
                    obj.attached = true;
                },

                detach: function (obj) {
                    obj.attached = false;
                }
            };
            OC.Plugins.register('OC.Test.SomeName', plugin);
        });
        it('attach plugin to object', function () {
            var obj = {something: true};
            OC.Plugins.attach('OC.Test.SomeName', obj);
            expect(obj.attached).toEqual(true);
            OC.Plugins.detach('OC.Test.SomeName', obj);
            expect(obj.attached).toEqual(false);
        });
        it('only call handler for target name', function () {
            var obj = {something: true};
            OC.Plugins.attach('OC.Test.SomeOtherName', obj);
            expect(obj.attached).not.toBeDefined();
            OC.Plugins.detach('OC.Test.SomeOtherName', obj);
            expect(obj.attached).not.toBeDefined();
        });
    });
});
