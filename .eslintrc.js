// http://eslint.org/docs/user-guide/configuring

module.exports = {
    root: true,
    parser: "babel-eslint",
    parserOptions: {
        sourceType: "module"
    },
    env: {
        browser: true
    },
    // https://github.com/standard/standard/blob/master/docs/RULES-en.md
    extends: "prettier",
    // required to lint *.vue files
    plugins: ["html", "prettier"],
    // add your custom rules here
    rules: {
        "prettier/prettier": "error"
    }
};
