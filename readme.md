New Laravel app
Rename .env.example to .env
Config config/database.php to MySQL or SQLite
For SQLite, run touch storage/database.sqlite to create sqlite database
(optional) Create necessary Models and migrations using art make:model -m
(optional) Setup migrations as appropriate
(optional) Migrate the database
(optional) Setup fake data using factory
(optional) Create master page (main template)
pull in bootstrap via CDN or whatever
pull in browserify <script src="/js/bundle.js">
Setup vue.js inside Laravel app
Define vue.js scope with <div id="app"></div>
Setup vue.js app entry point by creating app.js
Install Elixer with npm install
Install vue.js using npm install vue --save
Open app.js and type the following
var Vue = require('vue');
 
new Vue({
 el: '#app'
});
