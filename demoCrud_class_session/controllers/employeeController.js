const express = require('express')
const route = express.Router();
const mongoose =require('mongoose')
const Department = mongoose.model('Department')
const Employee = mongoose.model('Employee') 


route.get('/',(req,res)=>{
    Employee.find().populate("deptID").exec().then(data => {
        res.render('../views/employee/index',{emps:data})
    })
})

route.get('/insert',(req,res)=>{
    Department.find((err,data)=>{
        if(!err){
            res.render('../views/employee/insert',{depts:data});
        }
        else{console.log("Error!"+err)}
    })
})

route.post('/insertEmp',(req,res)=>{

    let emp = new Employee(req.body);
    emp.save((err,data)=>{
        if(!err){
            res.redirect('/employee')
        }
        else
        {
            console.log("Error!"+err);
        }
    })
})

route.get('/update',(req,res)=>{
    Department.find((err,deptdata)=>{
        if(!err)
        {
            Employee.findById({_id:req.query.id},(err,empdata)=>{
                res.render('../views/employee/edit',{emp:empdata,depts:deptdata})
            })
        }
    })
})
//Example of Login to find by username and password
route.get('/findByName',(req,res)=>{
    Employee.find({city:"Surat",fullName:"Devang "},(err,data)=>{
        res.send(data)
    })
})
route.post('/editEmp',(req,res)=>{
    Employee.findByIdAndUpdate({_id:req.body._id},req.body,(err,data)=>{
        if(!err){
            res.redirect('/employee')
        }
        else
        {
            console.log("Error!"+err)
        }
    })
})
module.exports = route