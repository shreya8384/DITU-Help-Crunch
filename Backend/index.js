require("dotenv").config();
const path = require('path');
const express = require("express");
var bodyparser = require('body-parser');
const hbs = require("hbs");
const mongo=require("./database/client");

const MDB = require("./database/client");
const port = process.env["PORT"] || 3000;
const app = express();
app.use(express.urlencoded({ extended: true }))
app.use(express.json())
const userRouter = require("./Routes/login");


const static_path = path.join(__dirname, "./frontend");
const template_path = path.join(__dirname, "./frontend/templates/views");
const partials_path = path.join(__dirname, "./frontend/templates/partials");


app.use(express.static(static_path));
app.set("view engine", "hbs");
app.set("views", template_path);
hbs.registerPartials(partials_path);


app.use("/users", userRouter);

app.get("/", async (req, res) => {
  res.render("login");
});



app.get("/register", (req, res) => {
  res.render("register");
});

app.get("/login",(req,res) =>{
  res.render("login");
});
//new user crud
app.post("/users/register", async (req, res) => {
  console.log(req.body,"<================")
  const {   username, password,email} = req.body;
  try {
      //const password =req.body.password;
      const saveUser =new saveUser(username,email,password);
      const saved= await saveUser.save();
      //const registered = await registerUser.save();
      res.status(201).render("http://localhost/DITU-HELP-CRUNCH/");

  }
  catch (e) {
      res.status(400).send(e);
  }
});

//login validation
app.post("/login", async (req, res) => {
  try {
      const email = req.body.email;
      const password = req.body.password;

      const useremail = await Register.findOne({email:email});
      if(useremail.password == password){
          res.status(201).render("index");
      }
      else {
          res.send("invalid login details");
      }


  }
  catch (e) {
      res.status(400).send("invalid credentials");
  }
})

app.listen(port, async() => {
  await mongo.connect();
  console.log(`server is running at port no ${port}`);
});