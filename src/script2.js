function validate() {



    var z = document.getElementById("mail").value;
    var n = z.indexOf(".");
    var m = z.indexOf("@")
    if (n == -1 || m == -1) {
        document.getElementById("vmail").className = "erw";
        document.getElementById("vmail").innerHTML = "❌Include @ and . in email section";
        return false;
    }
    if (m >= n) {
        document.getElementById("vmail").className = "erw";
        document.getElementById("vmail").innerHTML = "❌Include @ before . in email section";
        return false;
    }
    else {
        document.getElementById("vmail").className = "erc";
        document.getElementById("vmail").innerHTML = "✔condition is statisfied";
    }
    var nam = document.getElementById("name").value;
    for (var i = 0; i < nam.length; i++) {

        var temp = nam.charAt(i);
        if (temp.toUpperCase() == temp.toLowerCase()) {
            document.getElementById("vname").className = "erw";
            document.getElementById("vname").innerHTML = "❌Name should only contain alphabets";
            return false;
        }
        else {
            document.getElementById("vname").className = "erc";
            document.getElementById("vname").innerHTML = "✔condition is statisfied";
        }
    }
    if (nam.length < 3) {
        document.getElementById("vname").className = "erw";
        document.getElementById("vname").innerHTML = "❌Enter a valid name of  minimum 3 characters";
        return false;
    }
    else {
        document.getElementById("vname").className = "erc";
        document.getElementById("vname").innerHTML = "✔condition is statisfied";
    }

    var pass = document.getElementById("password").value;
    if (pass.length < 7 || pass.length > 12) {
        document.getElementById("vpass").className = "erw";
        document.getElementById("vpass").innerHTML = "❌Password length should be between 7 and 12";
        return false;
    }
    else {
        document.getElementById("vpass").className = "erc";
        document.getElementById("vpass").innerHTML = "✔condition is statisfied";
    }

}