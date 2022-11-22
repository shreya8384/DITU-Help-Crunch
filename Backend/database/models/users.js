const dbName = "dituHelpCrunch";
const collectionName = "users";
const mongo = require("../client");

async function saveUser(username, password, email) {
  if (!username || !password || !email) {
    throw new Error("Parameters Missing! Cannot Save to Database");
  }
  let client;
  try {
    client = await mongo.connect();
    let db = await client.db(dbName).collection(collectionName);
    let startTime = Date.now();
    await db.insertOne({
      username,
      password,
      email,
    });
    let endTime = Date.now();
    console.log(
      `Time Taken to insert into users collection ${endTime - startTime}ms`
    );
  } catch (e) {
    throw new Error("Failed to Insert into Database");
  }
}

async function loginUser(email) {
  if (!email) {
    throw new Error("Parameters Missing! Cannot Save to Database");
  }
  let client;
  try {
    client = await mongo.connect();
    let db = await client.db(dbName).collection(collectionName);
    let startTime = Date.now();
    const res = await db.findOne({
      email
    });
    let endTime = Date.now();
    console.log(
      `Time Taken to find user in users collection ${endTime - startTime}ms`
    );
    return res;
  } catch (e) {
    throw new Error("Failed to Insert into Database");
  }
}

module.exports = {
  saveUser,
  loginUser,
};
