function removeUser(enrolledID,courseID) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', "Includes/removeuser.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                //alert('SEnrollment successful!');
                getUsers(courseID);
                // Optionally, you can redirect the user or perform other actions here
            } else {
                alert('Error during enrollment: ' + xhr.responseText);
            }
        }
    };

    var data = 'enrolledID=' + encodeURIComponent(enrolledID);
    xhr.send(data);


}

function getUsers(courseID) {
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Optionally, you can redirect the user or perform other actions here
                var dom = new DOMParser().parseFromString(xhr.responseText, 'text/html')
                document.getElementById("usersTable").innerHTML = (dom.getElementById('newUsers').innerHTML)
            } else {
                alert('Error during enrollment: ' + xhr.responseText);
            }
        }
    };
    xhr.open('POST', "Includes/getUsers.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'courseID=' + encodeURIComponent(courseID);
    xhr.send(data);
}

function updateGrade(grade, enrolledID)
{
    const xhr = new XMLHttpRequest();
    xhr.open('POST', "Includes/updategrade.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Optionally, you can redirect the user or perform other actions here
            } else {
                alert('Error grade update error: ' + xhr.responseText);
            }
        }
    };
    
    var data = 'enrolledID=' + encodeURIComponent(enrolledID) + '&grade=' + encodeURIComponent(grade);
    xhr.send(data);
}