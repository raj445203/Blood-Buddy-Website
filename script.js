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
        donorForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const donor = {
                name: donorForm.name.value,
                age: donorForm.age.value,
                gender: donorForm.gender.value,
                contact: donorForm.contact.value,
                email: donorForm.email.value,
                address: donorForm.address.value,
                city: donorForm.city.value,
                state: donorForm.state.value,
                zip: donorForm.zip.value,
                weight: donorForm.weight.value,
                lastDonation: donorForm['last-donation'].value,
                medical: donorForm.medical.value,
                availability: donorForm.availability.value
            };
            const bloodType = donorForm['blood-type'].value;
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
