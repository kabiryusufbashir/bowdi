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
let dept = document.querySelector('#dept')
let addDeptForm = document.querySelector('#addDeptForm')
let closeModalDept = document.querySelector('#closeModalDept')

    // dept Navigation 
    deptNav.addEventListener('click', ()=>{
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
let rank = document.querySelector('#rank')
let addRankForm = document.querySelector('#addRankForm')
let closeModalRank = document.querySelector('#closeModalRank')

    // Rank Navigation 
    rankNav.addEventListener('click', ()=>{
        rank.classList.remove('hidden')
        addRankForm.classList.remove('hidden')
    })

    // Close Modal 
    closeModalRank.addEventListener('click', ()=>{
        rank.classList.add('hidden')
    })
//end of dept

//Staff Module
let staffNav = document.querySelector('#staffNav')
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

    // Staff Navigation 
    staffNav.addEventListener('click', ()=>{
        staff.classList.remove('hidden')
        addStaffForm.classList.remove('hidden')
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
