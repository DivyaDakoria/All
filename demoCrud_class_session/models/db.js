const mongoose = require('mongoose')

mongoose.connect("mongodb://localhost:27017/EmployeeDB",{useNewUrlParser:true},(err)=>{
    if(!err){console.log("Connection with mongo is established...")}
    else{console.log("Error occur!... "+err)}
})

require('../models/department.model')
require('../models/employee.model')