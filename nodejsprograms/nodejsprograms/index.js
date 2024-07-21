const express = require('express'); // importing the express modules
const con = require('./config'); // requiring the connection object
const app = express(); // initialising the express named as app
const port = 3000;

app.use(express.urlencoded({ extended: "false" })); // decryption of content-type : "application/x-www-form-urlencoded"
app.use(express.json()); // converting the body request data in json content-type : "application/x-www-form-urlencoded"

app.get('/', (req, res) => {
    res.send(`hello world`);
})

app.post('/postData', (req, res) => {
    console.log(req.body);
    const data = req.body;
    var element= 0;
    for (const key in data) {
        if (Object.hasOwnProperty.call(data, key)) {
            element = data[key];
            console.log(element + " " + key)
            
        }
    }
    // const body = JSON.stringify(req.body);
    if(element<40){
        const query = `Insert into moisture_data(MoistureLevel,Pump_Status) values(${element},'on');
        `;
        con.query(query, (err, result) => {
            if (err) throw err;
            console.log(result);
        });
    }
    else{
        const query = `Insert into moisture_data(MoistureLevel,Pump_Status) values(${element},'off');
        `;
        con.query(query, (err, result) => {
            if (err) throw err;
            console.log(result);
        });
    }
   
    res.send();
})

app.listen(port, () => {
    console.log(`http://localhost:${port}`);
})