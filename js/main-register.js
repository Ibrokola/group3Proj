// Assingment 7, Focus and Form Validation

let regForm = document.registerForm;
let fullName = regForm.fullName;
let address1 = regForm.address1;
let address2 = regForm.address2;
let city = regForm.city;
let province = regForm.province;
let postCode = regForm.postCode;

let submitBtn = regForm.regBtn;
let resetBtn = submitBtn.nextElementSibling;

let regEx = new RegExp('/^[A-Z]\d[A-Z] ?\d[A-Z]\d$/');

let inputErr = document.getElementsByClassName('validate');
let inputEls = document.getElementsByClassName('focus');

// console.log(inputErr);

let arraySubs = Array.from(inputErr);
let arrayInputs = Array.from(inputEls);

// console.log(arrayInputs);

// console.log(arrayErrs);


arraySubs.forEach((arraySub) => {
    
    // console.log(arraySub.nextElementSibling.nextElementSibling);

    submitBtn.addEventListener('click', (e) => {
        let nonDisp = arraySub.nextElementSibling.nextElementSibling;
        nonDisp.className = 'validation';

        let subVal = arraySub.value;
        let postVal = postCode.value;

        if (!subVal){
            e.preventDefault();
            nonDisp.className = 'validation-error';
        }

        if ((subVal === postVal) && (regEx.test(subVal))) {
            e.preventDefault();
            nonDisp.className = 'validation-error';
        }

        if ((subVal || (subVal === postVal)) && (regEx.test(subVal) == true)){
            subValidated();
            regForm.reset();
        }

    });

});


function subValidated(){
    let confirmSub = confirm('Are you sure you want to proceed?')

    if (confirmSub === true) {
        // e.prevenDefault()
        regForm.submit();
        
    } else {
        console.log(confirmSub);
        return false;
    }    
}

// Prevents validation from working, will need a little extra codes to pass them
// into each other

// submitBtn.addEventListener('click', (e) => {

//     let confirmSub = confirm('Are you sure you want to proceed?')

//     if (confirmSub === true) {
//         // e.prevenDefault()
//         regForm.submit();
        
//     } else {
//         console.log(confirmSub);
//         return false;
//     }
// })

arrayInputs.forEach((arrInp) => {

    // console.log(arrInp.nextElementSibling);

    // console.log(arrInp);

    arrInp.addEventListener('focus', (e) => {
        let current = e.currentTarget;

        let focusMsg = current.nextElementSibling;

        focusMsg.className = 'focus-display';

    });

    arrInp.addEventListener('blur', (e) => {
        let current = e.currentTarget;
    
        let removeMsg = current.nextElementSibling;
    
        removeMsg.className = 'focus-feedback';
    });
})

/* Retired, too Repetitive, Above is drier. */

// fullName.addEventListener('focus', (e) => {
//     let current = e.currentTarget;

//     // console.log(current.nextElementSibling);

//     let focusMsg = current.nextElementSibling;

//     focusMsg.className='focus-display';

// })

// fullName.addEventListener('blur', (e) => {
//     let current = e.currentTarget;

//     let removeMsg = current.nextElementSibling;

//     removeMsg.className = 'focus-feedback';
// })

// address1.addEventListener('focus', (e) => {
//     let current = e.currentTarget;

//     // console.log(current.nextElementSibling);

//     let focusMsg = current.nextElementSibling;

//     focusMsg.className='focus-display';

// })

// address1.addEventListener('blur', (e) => {
//     let current = e.currentTarget;

//     let removeMsg = current.nextElementSibling;

//     removeMsg.className = 'focus-feedback';
// })

// address2.addEventListener('focus', (e) => {
//     let current = e.currentTarget;

//     // console.log(current.nextElementSibling);

//     let focusMsg = current.nextElementSibling;

//     focusMsg.className='focus-display';

// })

// address2.addEventListener('blur', (e) => {
//     let current = e.currentTarget;

//     let removeMsg = current.nextElementSibling;

//     removeMsg.className = 'focus-feedback';
// })

// city.addEventListener('focus', (e) => {
//     let current = e.currentTarget;

//     // console.log(current.nextElementSibling);

//     let focusMsg = current.nextElementSibling;

//     focusMsg.className='focus-display';

// })

// city.addEventListener('blur', (e) => {
//     let current = e.currentTarget;

//     let removeMsg = current.nextElementSibling;

//     removeMsg.className = 'focus-feedback';
// })

// province.addEventListener('focus', (e) => {
//     let current = e.currentTarget;

//     // console.log(current.nextElementSibling);

//     let focusMsg = current.nextElementSibling;

//     focusMsg.className='focus-display';

// })

// province.addEventListener('blur', (e) => {
//     let current = e.currentTarget;

//     let removeMsg = current.nextElementSibling;

//     removeMsg.className = 'focus-feedback';
// })

// postCode.addEventListener('focus', (e) => {
//     let current = e.currentTarget;

//     // console.log(current.nextElementSibling);

//     let focusMsg = current.nextElementSibling;

//     focusMsg.className='focus-display';

// })

// postCode.addEventListener('blur', (e) => {
//     let current = e.currentTarget;

//     let removeMsg = current.nextElementSibling;

//     removeMsg.className = 'focus-feedback';
// })

// console.log(fullName);
// console.log(address1);
// console.log(address2);
// console.log(city);
// console.log(province);
// console.log(postCode)

// console.log(regForm);


// Assignment 5, Dialog/Modal Pop
// let regForm = document.registerForm; moved to the top
// let submitBtn = regForm.regBtn; moved to the top
// let resetBtn = submitBtn.nextElementSibling; moved to the top

// submitBtn.addEventListener('click', (e) => {

//     let confirmSub = confirm('Are you sure you want to proceed?')

//     if (confirmSub === true) {
//         // e.prevenDefault()
//         regForm.submit();
//     } else {
//         console.log(confirmSub);
//         return false;
//     }
// })

resetBtn.addEventListener('click', (e) => {

    let confirmRes = confirm('Are you sure you want to reset this form?')

    if (confirmRes == true) {
        // e.preventDefault()
        regForm.reset();
    } else {
        // console.log(confirmRes);
        return false;
    }

})