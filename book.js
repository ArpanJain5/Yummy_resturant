function validateForm() {
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var date = document.getElementById("date").value;
    var time = document.getElementById("time").value;

    if (name == null || name == "") {
        alert("Name Can't be empty");
        return false;
    }

    if (!phone.match(/^\d+/)) {
        alert("Please only enter numeric characters only")
    } else if (phone.length < 10) {
        alert("Password length must be atleast 10 characters");
        return false;
    }

    if (date == null || date == "") {
        alert("Date Can't be empty");
        return false;
    }

    if (time == null || time == "") {
        alert("Time Name Can't be empty");
        return false;
    }
}