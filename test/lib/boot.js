var child_process = require("child_process"),
    Settings      = require("./settings");

Settings.setModeAndLoad(process.env.PROJECT_MODE || "test");

module.exports = {
    loadFixture: function(cb) {

        var sql = 
        "mysql -u"+Settings.getValue("db", "user")+" "+
        "-h"+Settings.getValue("db", "host")+" "+
        "-p"+Settings.getValue("db", "pass")+" "+
        "--database="+Settings.getValue("db", "dbname")+" "+
        "--port="+Settings.getValue("db", "port", "3306")+" "+
        "< "+__dirname+"/../../tests/fixtures/salon_populated.sql";

        child_process.exec(sql, cb);
    },

    Settings: Settings,

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
