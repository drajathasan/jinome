/**
 * Look ma, it's cp -R.
 * @param {string} src  The path to the thing to copy.
 * @param {string} dest The path to the new copy.
 */
const fs = require('fs');
const path = require("path");

var copyRecursiveSync = function(src, dest) {
    var exists = fs.existsSync(src);
    var stats = exists && fs.statSync(src);
    var isDirectory = exists && stats.isDirectory();
    if (isDirectory) {
        try {
            fs.mkdirSync(dest);   
            fs.readdirSync(src).forEach(function(childItemName) {
            copyRecursiveSync(path.join(src, childItemName),
                                path.join(dest, childItemName));
            });
        } catch (error) {
            
        }
    } else {
        fs.copyFileSync(src, dest);
    }
};

module.exports = copyRecursiveSync;