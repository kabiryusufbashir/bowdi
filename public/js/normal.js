// Toggle button 
let menu = document.querySelector('#menu');
let nav = document.querySelector('#nav');

menu.addEventListener('click', ()=>{
    if(nav.classList.contains('hidden')){
        nav.classList.remove('hidden');
    }else{
        nav.classList.add('hidden');
    }
});

//Leave Module
let staffNav = document.querySelector('#staffNav')
let newLeaveRequest = document.querySelector('#newLeaveRequest')
let leave = document.querySelector('#leave')
let addLeaveForm = document.querySelector('#addLeaveForm')
let closeModalLeave = document.querySelector('#closeModalLeave')
    //Staff Nav
    staffNav.addEventListener('click', ()=>{
        if(staffBody.classList.contains('hidden')){
            staffBody.classList.remove('hidden')
        }else{
            staffBody.classList.add('hidden')
        }
    })
    // Leave Request 
    newLeaveRequest.addEventListener('click', ()=>{
        leave.classList.remove('hidden')
        addLeaveForm.classList.remove('hidden')
    })

    closeModalLeave.addEventListener('click', ()=>{
        leave.classList.add('hidden')
    })

//End of Staff Request

// Report Module 
let reportNav = document.querySelector('#reportNav')
let reportBody = document.querySelector('#reportBody')
let newReport = document.querySelector('#newReport')
let report = document.querySelector('#report')
let addReportForm = document.querySelector('#addReportForm')
let closeModalReport = document.querySelector('#closeModalReport')
    
    //Report Nav
    reportNav.addEventListener('click', ()=>{
        if(reportBody.classList.contains('hidden')){
            reportBody.classList.remove('hidden')
        }else{
            reportBody.classList.add('hidden')
        }
    })

    //New Report 
    newReport.addEventListener('click', ()=>{
        report.classList.remove('hidden')
        addReportForm.classList.remove('hidden')
    })

    // Close Modal 
    closeModalReport.addEventListener('click', ()=>{
        report.classList.add('hidden')
    })
    
//End of Report

//Profile Module
let profileNav = document.querySelector('#profileNav')
let profile = document.querySelector('#profile')
let profileForm = document.querySelector('#profileForm')
let closeModalProfile = document.querySelector('#closeModalProfile')

    // Profile Navigation 
    profileNav.addEventListener('click', ()=>{
        profile.classList.remove('hidden')
        profileForm.classList.remove('hidden')
    })

    // Close Modal 
    closeModalProfile.addEventListener('click', ()=>{
        profile.classList.add('hidden')
    })
