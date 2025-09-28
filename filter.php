<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        B2B Medical Website
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com">
    </script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
    <header class="bg-blue-600 text-white text-center py-4">
        <h1 class="text-2xl font-bold">
            B2B Medical Supplies
        </h1>
    </header>
    <div class="container mx-auto p-4">
        <div class="filter-box bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-bold mb-4">
                Filter Companies
            </h2>
            <label class="block mb-2" for="company-name">
                Company Name
            </label>
            <input class="w-full p-2 border border-gray-300 rounded mb-4" id="company-name" placeholder="Enter company name" type="text" />
            <label class="block mb-2" for="location">
                Location
            </label>
            <input class="w-full p-2 border border-gray-300 rounded mb-4" id="location" placeholder="Enter location" type="text" />
            <label class="block mb-2" for="specialty">
                Specialty
            </label>
            <select class="w-full p-2 border border-gray-300 rounded mb-4" id="specialty">
                <option value="">
                    Select specialty
                </option>
                <option value="cardiology">
                    Cardiology
                </option>
                <option value="neurology">
                    Neurology
                </option>
                <option value="orthopedics">
                    Orthopedics
                </option>
                <option value="pediatrics">
                    Pediatrics
                </option>
                <option value="radiology">
                    Radiology
                </option>
            </select>
            <label class="block mb-2" for="rating">
                Rating
            </label>
            <select class="w-full p-2 border border-gray-300 rounded mb-4" id="rating">
                <option value="">
                    Select rating
                </option>
                <option value="5">
                    5 Stars
                </option>
                <option value="4">
                    4 Stars
                </option>
                <option value="3">
                    3 Stars
                </option>
                <option value="2">
                    2 Stars
                </option>
                <option value="1">
                    1 Star
                </option>
            </select>
            <button class="bg-blue-600 text-white px-4 py-2 rounded" onclick="filterCompanies()">
                Filter
            </button>
        </div>
        <div class="company-list grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="company-list">
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="New York" data-name="MedTech Solutions" data-rating="5" data-specialty="cardiology">
                <img alt="Image of a modern medical facility with advanced equipment" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/pSVTJxEymY5fDCjnWqKZ9jcNIxdho51zLLdqXiNX4JZOHYfTA.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    MedTech Solutions
                </h3>
                <p class="mb-1">
                    Location: New York, USA
                </p>
                <p class="mb-1">
                    Specialty: Cardiology
                </p>
                <p>
                    Rating: 5 Stars
                </p>
            </div>
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="Los Angeles" data-name="HealthCare Innovators" data-rating="4" data-specialty="neurology">
                <img alt="Image of a medical team in a hospital setting" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/tpCYB8MYf8QJOS9Nikhq42emWVYKeqePRjFXtPqfeWOEoDsfJA.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    HealthCare Innovators
                </h3>
                <p class="mb-1">
                    Location: Los Angeles, USA
                </p>
                <p class="mb-1">
                    Specialty: Neurology
                </p>
                <p>
                    Rating: 4 Stars
                </p>
            </div>
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="Chicago" data-name="OrthoMed Inc." data-rating="5" data-specialty="orthopedics">
                <img alt="Image of a medical laboratory with various equipment" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/7uebSYs9jxXuWaMESzudieu303I54jfU6XlrxpDcfeqS0B2fE.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    OrthoMed Inc.
                </h3>
                <p class="mb-1">
                    Location: Chicago, USA
                </p>
                <p class="mb-1">
                    Specialty: Orthopedics
                </p>
                <p>
                    Rating: 5 Stars
                </p>
            </div>
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="Houston" data-name="Pediatrics Plus" data-rating="4" data-specialty="pediatrics">
                <img alt="Image of a pediatric clinic with colorful decor" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/GmMz4xcTawo1GxWfLmwruH29fKyl0SEoLsABbe6FzHYTcg9nA.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    Pediatrics Plus
                </h3>
                <p class="mb-1">
                    Location: Houston, USA
                </p>
                <p class="mb-1">
                    Specialty: Pediatrics
                </p>
                <p>
                    Rating: 4 Stars
                </p>
            </div>
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="Miami" data-name="Radiology Experts" data-rating="3" data-specialty="radiology">
                <img alt="Image of a radiology department with imaging equipment" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/sBuCoKJjEJYaCZfa8rDXfw7fBPYA7ex5utIrHKYDA6iY5A7PB.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    Radiology Experts
                </h3>
                <p class="mb-1">
                    Location: Miami, USA
                </p>
                <p class="mb-1">
                    Specialty: Radiology
                </p>
                <p>
                    Rating: 3 Stars
                </p>
            </div>
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="San Francisco" data-name="Global MedTech" data-rating="5" data-specialty="cardiology">
                <img alt="Image of a medical conference with professionals discussing" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/FTfiWfNrcurAikuyjiKkqcDzaTIdKXHpEUSKiKszDK2TOwenA.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    Global MedTech
                </h3>
                <p class="mb-1">
                    Location: San Francisco, USA
                </p>
                <p class="mb-1">
                    Specialty: Cardiology
                </p>
                <p>
                    Rating: 5 Stars
                </p>
            </div>
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="Boston" data-name="NeuroHealth Solutions" data-rating="4" data-specialty="neurology">
                <img alt="Image of a modern medical office with a friendly staff" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/EUi4npidUrJnH1KeKVKV2tSlXpm2YNEUSL3HBTJpIgrFHYfTA.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    NeuroHealth Solutions
                </h3>
                <p class="mb-1">
                    Location: Boston, USA
                </p>
                <p class="mb-1">
                    Specialty: Neurology
                </p>
                <p>
                    Rating: 4 Stars
                </p>
            </div>
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="Seattle" data-name="OrthoCare Technologies" data-rating="5" data-specialty="orthopedics">
                <img alt="Image of a medical research lab with scientists working" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/5xz2KIezAUQGFqG3gbZtgwnqoZqyy2yIP16xcm5wEFfecg9nA.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    OrthoCare Technologies
                </h3>
                <p class="mb-1">
                    Location: Seattle, USA
                </p>
                <p class="mb-1">
                    Specialty: Orthopedics
                </p>
                <p>
                    Rating: 5 Stars
                </p>
            </div>
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="Denver" data-name="Kids Health Network" data-rating="4" data-specialty="pediatrics">
                <img alt="Image of a pediatric hospital with child-friendly environment" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/PhGZTDXl1WofWSAPxsJvhT3ue83j9gQf3w0bPs7bkfSW5A7PB.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    Kids Health Network
                </h3>
                <p class="mb-1">
                    Location: Denver, USA
                </p>
                <p class="mb-1">
                    Specialty: Pediatrics
                </p>
                <p>
                    Rating: 4 Stars
                </p>
            </div>
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="Atlanta" data-name="Imaging Solutions" data-rating="3" data-specialty="radiology">
                <img alt="Image of a radiology clinic with advanced imaging technology" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/wPhbYxJHViKKJ9W7kqZ2UoRWZyp6weFcKLTz7DDvdbJNHYfTA.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    Imaging Solutions
                </h3>
                <p class="mb-1">
                    Location: Atlanta, USA
                </p>
                <p class="mb-1">
                    Specialty: Radiology
                </p>
                <p>
                    Rating: 3 Stars
                </p>
            </div>
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="Dallas" data-name="HeartCare Innovations" data-rating="5" data-specialty="cardiology">
                <img alt="Image of a medical team in a cardiology department" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/buV7kFAONmbmGltnKdZDYytf1esx8O6o5pis5BXSyS1HOwenA.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    HeartCare Innovations
                </h3>
                <p class="mb-1">
                    Location: Dallas, USA
                </p>
                <p class="mb-1">
                    Specialty: Cardiology
                </p>
                <p>
                    Rating: 5 Stars
                </p>
            </div>
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="Philadelphia" data-name="Brain Health Associates" data-rating="4" data-specialty="neurology">
                <img alt="Image of a neurology clinic with advanced diagnostic tools" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/xO4QJskBJ2IqBtwIZ9g3pigwZa5J2GbDbfub4wfD7vJPOwenA.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    Brain Health Associates
                </h3>
                <p class="mb-1">
                    Location: Philadelphia, USA
                </p>
                <p class="mb-1">
                    Specialty: Neurology
                </p>
                <p>
                    Rating: 4 Stars
                </p>
            </div>
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="Phoenix" data-name="JointCare Solutions" data-rating="5" data-specialty="orthopedics">
                <img alt="Image of an orthopedic clinic with rehabilitation equipment" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/xMxL5mgSh5qHJRBlcSp1VjUaAFYVpQuW31bqCyDgMVLmDsfJA.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    JointCare Solutions
                </h3>
                <p class="mb-1">
                    Location: Phoenix, USA
                </p>
                <p class="mb-1">
                    Specialty: Orthopedics
                </p>
                <p>
                    Rating: 5 Stars
                </p>
            </div>
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="San Antonio" data-name="Child Health Services" data-rating="4" data-specialty="pediatrics">
                <img alt="Image of a pediatric clinic with a welcoming environment" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/uSlEipC36FoVFZQY4fmmerHrJWT7YhBiXAsggJ5PJXCROwenA.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    Child Health Services
                </h3>
                <p class="mb-1">
                    Location: San Antonio, USA
                </p>
                <p class="mb-1">
                    Specialty: Pediatrics
                </p>
                <p>
                    Rating: 4 Stars
                </p>
            </div>
            <div class="company-item bg-white p-6 rounded-lg shadow-md" data-location="San Diego" data-name="Advanced Imaging Center" data-rating="3" data-specialty="radiology">
                <img alt="Image of a radiology department with MRI and CT scan machines" class="w-full h-40 object-cover rounded mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/G7p8OjBIe1VRYaJemHeenMmHpfKeyz8JnY0vS3hkLzNQjDsfJA.jpg" width="300" />
                <h3 class="text-lg font-bold mb-2">
                    Advanced Imaging Center
                </h3>
                <p class="mb-1">
                    Location: San Diego, USA
                </p>
                <p class="mb-1">
                    Specialty: Radiology
                </p>
                <p>
                    Rating: 3 Stars
                </p>
            </div>
        </div>
    </div>
    <script>
        function filterCompanies() {
            const name = document.getElementById('company-name').value.toLowerCase();
            const location = document.getElementById('location').value.toLowerCase();
            const specialty = document.getElementById('specialty').value.toLowerCase();
            const rating = document.getElementById('rating').value;

            const companies = document.querySelectorAll('.company-item');

            companies.forEach(company => {
                const companyName = company.getAttribute('data-name').toLowerCase();
                const companyLocation = company.getAttribute('data-location').toLowerCase();
                const companySpecialty = company.getAttribute('data-specialty').toLowerCase();
                const companyRating = company.getAttribute('data-rating');

                if (
                    (name === '' || companyName.includes(name)) &&
                    (location === '' || companyLocation.includes(location)) &&
                    (specialty === '' || companySpecialty === specialty) &&
                    (rating === '' || companyRating === rating)
                ) {
                    company.style.display = 'block';
                } else {
                    company.style.display = 'none';
                }
            });
        }
    </script>
</body>

</html>





<html>

<head>
    <title>
        Trusted by Enterprises
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .trusted-section {
            padding: 20px;
        }

        .trusted-text {
            font-size: 18px;
            color: #1a1a1a;
            margin-bottom: 20px;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: nowrap;
            gap: 40px;
            background-color: white;
        }

        .logo-container img {
            max-height: 70px;
        }

   </style>

</head>

<body>
    <div class="trusted-section">
        <div class="trusted-text">
            Trusted by 1000+ enterprises and 7 lakhs+ MSMEs for hiring
        </div>
        <marquee behavior="scroll" direction="left" scrollamount="5">
            <div class="logo-container">
                <img alt="Bajaj logo" height="100" src="Company/profilePic/logo1.png" width="100" />
                <img alt="Allianz logo" height="100" src="Company/profilePic/logo2.png" width="100" />
                <img alt="Flipkart logo" height="100" src="Company/profilePic/logo3.png" width="100" />
                <img alt="BigBasket logo" height="100" src="Company/profilePic/logo4.png" width="100" />
                <img alt="HDFC Bank logo" height="100" src="Company/profilePic/logo5.png" width="100" />
                <img alt="Swiggy logo" height="100" src="Company/profilePic/logo6.png" width="100" />
                <img alt="Uber logo" height="100" src="Company/profilePic/logo7.png" width="100" />
                <img alt="Swiggy logo" height="100" src="Company/profilePic/logo8.png" width="100" />
                <img alt="Uber logo" height="100" src="Company/profilePic/logo9.png" width="100" />
                <img alt="Swiggy logo" height="100" src="Company/profilePic/logo10.png" width="100" />
            </div>
        </marquee>
    </div>
</body>

</html>