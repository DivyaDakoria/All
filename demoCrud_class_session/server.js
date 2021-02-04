require('./models/db') 
const express = require('express')
const app = express()
const deptController = require('./controllers/deptController')
const employeeController = require('./controllers/employeeController')

app.set("view engine","ejs")
app.set("views","./views")

app.use(express.urlencoded({extended:false}))
app.use('/department',deptController)
app.use('/employee',employeeController)

app.listen(3000,()=>{
    console.log("App is running on port number 3000")
})


