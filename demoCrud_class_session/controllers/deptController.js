const express = require('express')
const route = express.Router();
const mongoose = require('mongoose')
const Department = mongoose.model('Department')

route.get('/',(req,res)=>{
    Department.find((err,data)=>{
        if(!err){
            res.render('../views/department/index',{depts:data})
        }
    })
})

route.post('/insertDept',(req,res)=>{

    let dept = new Department({

        _id:mongoose.Types.ObjectId(),
        deptName:req.body.txtDeptName
    })

    dept.save((err,data)=>{
        if(!err){
            console.log("Department inserted")
        }
        else{console.log("Error occus!"+err)}

        res.redirect('/department')
    })

})


route.get('/deleteDept',(req,res)=>{
    Department.findByIdAndDelete({_id:req.query.id},(err,data)=>{
        if(!err)
        {
            console.log("Record Deleted");
        }
        else
        {
            console.log("Error!"+err);
        }

        res.redirect("/department")
    })
})

route.get('/update',(req,res)=>{
    Department.findById({_id:req.query.id},(err,data)=>{
        if(!err){
            res.render('../views/department/update',{dept:data})
        }
        else{console.log("Error! "+err)}
    })
})


route.post('/updateDept',(req,res)=>{

    Department.findByIdAndUpdate({_id:req.body.hdnDeptID},{deptName:req.body.txtDeptName},(err,data)=>{
        if(!err){
            res.redirect('/department')
        }
        else
        {
            console.log("Error!"+err)
        }
    })

})
module.exports = route
