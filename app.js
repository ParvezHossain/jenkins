const http = require("http");
const server = http.createServer();

const gets = [];
const posts = [];

server.on("request", (req, res) => {
  console.log("First call");
  console.log("info about gets[]", gets.length);
  if (req.method === "GET") {
    console.log("Second call");
    gets.forEach((e) => {
      console.log("get the info about function", e);
      console.log("Third call");
      e(req, res);
    });
  }
});

/* server.on("request", (req, res) => {
  console.log("First call");
  if (req.method === "POST") {
    posts.forEach((e) => {
      e(req, res);
    });
  }
}); */

server.get = (f) => {
  console.log("Hiiii");
  gets.push(f);
};

server.get((req, res) => {
  if (req.url === "/") {
    console.log("The requested url is ", req.url);
    res.end("Hello 1");
  }
  if (req.url === "/get") {
    console.log("The requested url is ", req.url);
    res.end("Hello get");
  }
});

console.log("Server", server.get);

server.listen(3000);
