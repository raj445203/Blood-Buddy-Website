// Add your JavaScript logic here if needed

// Example: Form validation or dynamic population of dropdowns
document.addEventListener('DOMContentLoaded', function() {
    // Example code here
});
// Add your JavaScript logic here if needed

// Example: Form validation or dynamic population of dropdowns
document.addEventListener('DOMContentLoaded', function() {
    // Example code here
});



document.addEventListener('DOMContentLoaded', () => {
    const donors = JSON.parse(localStorage.getItem('donors')) || {
        "A+": [],
        "A-": [],
        "B+": [],
        "B-": [],
        "O+": [],
        "O-": [],
        "AB+": [],
        "AB-": []
    };

    const donorForm = document.getElementById('donor-form');
    if (donorForm) {
        donorForm.addEventListener('submit1', (event) => {
            event.preventDefault();
            const donor = {
                fname: donorForm.firstName.value,
                mname:donorForm.middleName.value,
                lname:donorForm.lastName.value,
                age: donorForm.age.value,
                Dob:donorForm.dob.value,
                bloodgroup: donorForm.bloodGroup.value,
                gender: donorForm.gender.value,
                mobile: donorForm.mobile.value,
                phone: donorForm.phone.value,
                email: donorForm.email.value,
                address_1: donorForm.addressLine1.value,
                address_2: donorForm.addressLine2.value,
                address_3: donorForm.addressLine3.value,
                id: donorForm.idProof.value,
                district: donorForm.district.value,
                pincode: donorForm.pinCode.value,
                preferredContact: donorForm.preferredContact.value,
                special_Instruction: donorForm.night.value,
                special_Instruction: donorForm.officeHours.value,
                special_Instruction: donorForm.manualTiming.value,
                special_Instruction: donorForm.otherInstruction.value,   
                Have_You_Donated_Previously: donorForm.yes.value,  
                Have_You_Donated_Previously: donorForm.no.value,    
                haemoGlobinCount: donorForm.haemoglobinCount.value,
                weight: donorForm.weight.value,
                blood_center: donorForm.bloodCenter.value,   
            };
            const bloodType = donorForm['bloodGroup'].value;
            donors[bloodType].push(donor);
            localStorage.setItem('donors', JSON.stringify(donors));
            alert('Donor registered successfully!');
            donorForm.reset();
        });
    }

    const receiverForm = document.getElementById('receiver-form');
    if (receiverForm) {
        receiverForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const searchBloodType = receiverForm['search-blood-type'].value;
            const results = donors[searchBloodType];
            displayResults(results);
        });
    }

    function displayResults(results) {
        const resultsDiv = document.getElementById('results');
        resultsDiv.innerHTML = '';
        if (results.length === 0) {
            resultsDiv.innerHTML = '<p>No donors found.</p>';
        } else {
            const ul = document.createElement('ul');
            results.forEach(donor => {
                const li = document.createElement('li');
                li.textContent = `Name: ${donor.name}, Contact: ${donor.contact}, Email: ${donor.email}, Location: ${donor.city}, ${donor.state}`;
                ul.appendChild(li);
            });
            resultsDiv.appendChild(ul);
        }
    }
    
});
