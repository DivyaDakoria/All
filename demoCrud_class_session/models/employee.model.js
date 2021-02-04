const mongoose = require('mongoose')

let employeeSchema = new mongoose.Schema({

    fullName:{
        type:String
    },
    email:{
        type:String
    },
    mobile:{
        type:String
    },
    city:{
        type:String
    },
    deptID:{
        type:mongoose.Schema.Types.ObjectId,
        ref:'Department'
    }

})

mongoose.model('Employee',employeeSchema)