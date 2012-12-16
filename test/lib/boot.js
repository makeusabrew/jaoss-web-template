var child_process = require("child_process"),
    Settings      = require("./settings"),
    Zombie        = require("zombie");

Settings.setModeAndLoad(process.env.PROJECT_MODE || "test");

Zombie.site = Settings.getValue("site", "base_href");

module.exports = {
    loadFixture: function(fixture, cb) {

        var sql = 
        "mysql -u"+Settings.getValue("db", "user")+" "+
        "-h"+Settings.getValue("db", "host")+" "+
        "-p"+Settings.getValue("db", "pass")+" "+
        "--database="+Settings.getValue("db", "dbname")+" "+
        "--port="+Settings.getValue("db", "port", "3306")+" "+
        "< "+__dirname+"/../../tests/fixtures/"+fixture+".sql";

        child_process.exec(sql, cb);
    },

    Settings: Settings,

    Zombie: Zombie,

    base_href: Zombie.site,

    host: Zombie.site.match(/^https?:\/\/(.+)\/$/)[1],

    authIfNecessary: function(browser) {
        if (Settings.getValue("site", "basic_auth")) {
            return browser.authenticate().basic(
                Settings.getValue("site", "basic_user"),
                Settings.getValue("site", "basic_pass")
            );
        }
        return browser;
    }

};
