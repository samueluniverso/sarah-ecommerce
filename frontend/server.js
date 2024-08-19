var http = require('http');

var app = http.createServer(
    function(req, res) {
        res.writeHead(200, {'Content-Type': 'application/json'} );
        res.end(JSON.stringify( {'message': 'Hello World!'} ));
    }
);
app.listen(3000);