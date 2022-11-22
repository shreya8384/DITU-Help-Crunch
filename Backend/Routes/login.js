const Router = require("express").Router();
const cryptoJs = require("crypto-js");
const mongo = require("../database/index");
const jwt = require("jsonwebtoken");

module.exports = Router
.post("/signup", signupUser)
.post("/login", loginUser)

async function loginUser(req, res) {
  let routeName = "POST users/login";
  let { password, email } = req.body;
  if (!email || !password) {
    throw new Error("Missing Parameter Error");
  }

  try {
    const userCheck = await mongo.users.loginUser(email);
    if(!userCheck){
        throw new Error("User does not Exist")
    }
    const deHashPass = cryptoJs.AES.decrypt(
      userCheck.password,
      process.env["PASS_KEY"]
    ); //decrypting password got from the document
    const finPass = deHashPass.toString(cryptoJs.enc.Utf8);
    if (password === finPass) {
      const accessToken = jwt.sign(
        {
          id: userCheck.username,
          role: "ditu-HC-User",
        },
        process.env["JWT_SECRET_KEY"],
        { expiresIn: 24 * 3 * 60 * 60 }
      );
      res.status(200).send({
        Message: "Login success",
        accessToken,
      });
    } else {
      res.status(404).send({
        Message: "Wrong Credentials",
      });
    }
  } catch (e) {
    throw new Error(e, routeName);
  }
}

async function signupUser(req, res) {
  let routeName = "POST users/signup";
  let { username, password, email } = req.body;
  if (!username || !password || !email) {
    throw new Error("Missing Parameter Error");
  }
  password = cryptoJs.AES.encrypt(password, process.env["PASS_KEY"]).toString();
  try {
    await mongo.users.saveUser(username, password, email);
    res.status(200).send({
      Message: "SignUp success",
    });
  } catch (e) {
    throw new Error(e, routeName);
  }
}
