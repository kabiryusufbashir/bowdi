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

//dept Module
let deptNav = document.querySelector('#deptNav')
let deptBody = document.querySelector('#deptBody')
let newDept = document.querySelector('#newDept')
let dept = document.querySelector('#dept')
let addDeptForm = document.querySelector('#addDeptForm')
let closeModalDept = document.querySelector('#closeModalDept')
    
    // Dept Nav 
    deptNav.addEventListener('click', ()=>{
        if(deptBody.classList.contains('hidden')){
            deptBody.classList.remove('hidden')
        }else{
            deptBody.classList.add('hidden')
        }
    })
    // new dept 
    newDept.addEventListener('click', ()=>{
        dept.classList.remove('hidden')
        addDeptForm.classList.remove('hidden')
    })

    // Close Modal 
    closeModalDept.addEventListener('click', ()=>{
        dept.classList.add('hidden')
    })
//end of dept

//rank Module
let rankNav = document.querySelector('#rankNav')
let rankBody = document.querySelector('#rankBody')
let newRank = document.querySelector('#newRank')
let rank = document.querySelector('#rank')
let addRankForm = document.querySelector('#addRankForm')
let closeModalRank = document.querySelector('#closeModalRank')

    // Rank Navigation
    rankNav.addEventListener('click', ()=>{
        if(rankBody.classList.contains('hidden')){
            rankBody.classList.remove('hidden')
        }else{
            rankBody.classList.add('hidden')
        }
    })

    //new rank 
    newRank.addEventListener('click', ()=>{
        rank.classList.remove('hidden')
        addRankForm.classList.remove('hidden')
    })

    // Close Modal 
    closeModalRank.addEventListener('click', ()=>{
        rank.classList.add('hidden')
    })
//end of rank

//Staff Module
let staffNav = document.querySelector('#staffNav')
let newStaff = document.querySelector('#newStaff')
let staff = document.querySelector('#staff')
let employeeDetails = document.querySelector('#employeeDetails')
let nextEmployeeContactDetails = document.querySelector('#nextEmployeeContactDetails')
let employeeContactDetails = document.querySelector('#employeeContactDetails')
let prevEmployeeDetails = document.querySelector('#prevEmployeeDetails')
let nextEmployeeEmergencyContactDetails = document.querySelector('#nextEmployeeEmergencyContactDetails')
let employeeEmergencyContactDetails = document.querySelector('#employeeEmergencyContactDetails')
let prevContactDetails = document.querySelector('#prevContactDetails')
let nextEmployeeBanksDetails = document.querySelector('#nextEmployeeBanksDetails')
let employeeBankDetails = document.querySelector('#employeeBankDetails')
let prevEmergencyContactDetails = document.querySelector('#prevEmergencyContactDetails')
let nextOfficialDetails = document.querySelector('#nextOfficialDetails')
let officialDetails = document.querySelector('#officialDetails')
let prevBankDetails = document.querySelector('#prevBankDetails')
let addStaffForm = document.querySelector('#addStaffForm')
let closeModalStaff = document.querySelector('#closeModalStaff')
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

    // Add Staff 
    newStaff.addEventListener('click', ()=>{
        staff.classList.remove('hidden')
        addStaffForm.classList.remove('hidden')
    })

    // Leave Request 
    newLeaveRequest.addEventListener('click', ()=>{
        leave.classList.remove('hidden')
        addLeaveForm.classList.remove('hidden')
    })

    closeModalLeave.addEventListener('click', ()=>{
        leave.classList.add('hidden')
    })

    //Next Staff Contact Details
    nextEmployeeContactDetails.addEventListener('click', ()=>{
        employeeDetails.classList.remove('block')
        employeeDetails.classList.add('hidden')
        employeeContactDetails.classList.remove('hidden')
        employeeContactDetails.classList.add('block')
    })

    //Pre Staff Details
    prevEmployeeDetails.addEventListener('click', ()=>{
        employeeContactDetails.classList.add('hidden')
        employeeEmergencyContactDetails.classList.add('hidden')
        employeeDetails.classList.remove('hidden')
    })

    //Next Staff Emergency Contact
    nextEmployeeEmergencyContactDetails.addEventListener('click', ()=>{
        employeeDetails.classList.add('hidden')
        employeeContactDetails.classList.add('hidden')
        employeeEmergencyContactDetails.classList.remove('hidden')
    })

    // pre Contact details 
    prevContactDetails.addEventListener('click', ()=>{
        employeeEmergencyContactDetails.classList.add('hidden')
        employeeDetails.classList.add('hidden')
        employeeContactDetails.classList.remove('hidden')
    })

    // Next Bank details 
    nextEmployeeBanksDetails.addEventListener('click', ()=>{
        employeeEmergencyContactDetails.classList.add('hidden')
        employeeDetails.classList.add('hidden')
        employeeContactDetails.classList.add('hidden')
        employeeBankDetails.classList.remove('hidden')
    })

    // Prev Emergency Contact Info 
    prevEmergencyContactDetails.addEventListener('click', ()=>{
        employeeBankDetails.classList.add('hidden')
        employeeEmergencyContactDetails.classList.remove('hidden')
    })

    //Offical Details
    nextOfficialDetails.addEventListener('click', ()=>{
        employeeDetails.classList.add('hidden')
        employeeEmergencyContactDetails.classList.add('hidden')
        employeeContactDetails.classList.add('hidden')
        employeeBankDetails.classList.add('hidden')
        officialDetails.classList.remove('hidden')
    })

    // Prev Bank Details 
    prevBankDetails.addEventListener('click', ()=>{
        officialDetails.classList.add('hidden')
        employeeBankDetails.classList.remove('hidden')
    })

    // Close Modal 
    closeModalStaff.addEventListener('click', ()=>{
        staff.classList.add('hidden')
    })
//End of Staff Request

// Document Module 
let docNav = document.querySelector('#docNav')
let docBody = document.querySelector('#docBody')
let newDirectory = document.querySelector('#newDirectory')
let directory = document.querySelector('#directory')
let addDirectoryForm = document.querySelector('#addDirectoryForm')
let closeModalDirectory = document.querySelector('#closeModalDirectory')
let newDoc = document.querySelector('#newDoc')
let doc = document.querySelector('#doc')
let addDocForm = document.querySelector('#addDocForm')
let closeModalDoc = document.querySelector('#closeModalDoc')
    
    //Document Nav
    docNav.addEventListener('click', ()=>{
        if(docBody.classList.contains('hidden')){
            docBody.classList.remove('hidden')
        }else{
            docBody.classList.add('hidden')
        }
    })

    //New Directory 
    newDirectory.addEventListener('click', ()=>{
        directory.classList.remove('hidden')
        addDirectoryForm.classList.remove('hidden')
    })

    // Close Modal Directory
    closeModalDirectory.addEventListener('click', ()=>{
        directory.classList.add('hidden')
    })

    //New Document 
    newDoc.addEventListener('click', ()=>{
        doc.classList.remove('hidden')
        addDocForm.classList.remove('hidden')
    })

    // Close Modal 
    closeModalDoc.addEventListener('click', ()=>{
        doc.classList.add('hidden')
    })
    
//End of Document

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

// Blog Module 
let blogNav = document.querySelector('#blogNav')
let blogBody = document.querySelector('#blogBody')
let newBlog = document.querySelector('#newBlog')
let blog = document.querySelector('#blog')
let addBlogForm = document.querySelector('#addBlogForm')
let closeModalBlog = document.querySelector('#closeModalBlog')
    
    //Blog Nav
    blogNav.addEventListener('click', ()=>{
        if(blogBody.classList.contains('hidden')){
            blogBody.classList.remove('hidden')
        }else{
            blogBody.classList.add('hidden')
        }
    })

    //New Blog 
    newBlog.addEventListener('click', ()=>{
        blog.classList.remove('hidden')
        addBlogForm.classList.remove('hidden')
    })

    // Close Modal 
    closeModalBlog.addEventListener('click', ()=>{
        blog.classList.add('hidden')
    })

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
