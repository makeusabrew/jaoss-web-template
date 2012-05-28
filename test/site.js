var boot   = require("./lib/boot");
var Zombie = require("zombie");
var assert = require("assert");
Zombie.site = boot.Settings.getValue("site", "base_href");

describe("Basic site tests", function() {
    describe("When viewing the home page", function() {

        var browser = null;
        before(function(done) {
            browser = new Zombie();
            browser.visit("/", done);
        })

        it("should show the correct copy", function() {
            assert.equal(browser.text("p:first"), "Hello world!");
        });
    });
});
