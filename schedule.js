// Function to update the timetable with dynamic data
function updateTimetable(lessonsData, container, ref) {
    const daysOfWeek = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
    const colours = [
        "#8bbba2",
        "#b488df",
        "#f77650",
        "#f2b699",
        "#b15a59",
        "#d0b7e8",
        "#f5ceb4",
        "#8b5a59",
    ];

    const divs = [];
    const coursesToColour = {};
    const edges = new Set();
    const courses = new Set();

    daysOfWeek.forEach((day, index) => {
        divs.push({
            "className": "day-header",
            "data": day,
            "row": 1,
            "col": index + 2,
            "row1": 2,
            "col1": index + 3,
        });
    });

    const timeSlots = [
        '08:00:00', '09:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00'
    ];

    timeSlots.forEach((time, i) => {
        divs.push({"className": "time", "data": time, "row": i + 2, "col": 1, "row1": i + 3, "col1": 2});
        edges.add(time);
    });

    daysOfWeek.forEach((day, dayIndex) => {
        let i = dayIndex + 2; // Adjusted to start from column 2
        let lessonsForDay = lessonsData[dayIndex] || [];
        console.log(`Day: ${day}, Column: ${i}, Lessons: ${lessonsForDay.length}`);

        lessonsForDay.forEach((item) => {
            edges.add(item.startTime);
            courses.add(item.courseID.toString());
        });
    });

    edgesArray = Array.from(edges).sort((a, b) => new Date('1970/01/01 ' + a) - new Date('1970/01/01 ' + b));
    coursesArray = Array.from(courses);

    coursesArray.forEach((course, i) => {
        coursesToColour[course] = colours[i];
    });

    daysOfWeek.forEach((day, dayIndex) => {
        let i = dayIndex + 2; // Adjusted to start from column 2
        let lessonsForDay = lessonsData[dayIndex] || [];
        console.log(`Day: ${day}, Column: ${i}, Lessons: ${lessonsForDay.length}`);
        
        lessonsForDay.forEach((item) => {
            let temprow1 = edgesArray.indexOf(item.startTime);
            let temprow2 = temprow1 + item.lessonTimeMin / 60;
    
            // Only add grid items if the row is greater than 2 (i.e., not in the header row)
            if (temprow1 + 2 > 2) {
                divs.push({
                    "className": "grid-item",
                    "data": item.name,
                    // Adjust the starting column to reflect the correct position
                    "row": temprow1 + 2,
                    "col": i + 1,
                    "row1": temprow2 + 2,
                    "col1": i + 1,
                    "backgroundColor": coursesToColour[item.courseID.toString()]
                });
            }
        });
    });

    container.innerHTML = '';

    divs.forEach((div) => {
        const divElement = document.createElement('div');
        divElement.className = div.className;

        // Update the grid area for day headers to start from the second column
        if (div.className === 'day-header') {
            divElement.style.gridArea = `${div.row}/${div.col + 1}/${div.row1}/${div.col1 + 1}`;
        } else {
            divElement.style.gridArea = `${div.row}/${div.col}/${div.row1}/${div.col1}`;
        }

        divElement.style.backgroundColor = div.backgroundColor;
        divElement.textContent = div.data;

        // Adjust z-index for grid items in the header
        if (div.className === 'grid-item' && div.row <= 2) {
            divElement.classList.add('header'); // Add a class to identify grid items in the header
        }

        container.appendChild(divElement);
    });

    document.documentElement.style.setProperty('--lineWidth', ref.offsetWidth - 60 + 'px');
    ref.style.gridTemplateRows = `25px repeat(${timeSlots.length + 1},1fr)`;
}

fetchData();

function fetchData() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            try {
                var lessonsData = JSON.parse(xhr.responseText);
                console.log(lessonsData);
                updateTimetable(lessonsData, document.querySelector('.container-grid'), document.querySelector('.container-main'));
            } catch (error) {
                console.error('Error parsing JSON:', error);
            }
            
        }
    };

    xhr.open("GET", "schema.php", true);
    xhr.send();
}
