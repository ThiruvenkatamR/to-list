var xmlhttp = new XMLHttpRequest();

window.onload = function () {
    createEventListener();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            result = this.responseText;
            // console.log(result);
            result = JSON.parse(result);
            for (i = 0; i < result.length; i++) {
                // console.log(result[i]);
                if (result[i][3] == 0)
                    create(result[i][0], result[i][1], result[i][1], "undone")
                if (result[i][3] == 1)
                    create(result[i][0], result[i][1], result[i][2], "done")

            }
        }
    };
    xmlhttp.open("GET", "http://localhost/rest_todo/php_scripts/todo_control.php", true);
    xmlhttp.send();
}

function createEventListener(element) {
    var element = document.getElementById("list");
    element.addEventListener("click", function (e) {
        if (e.target && e.target.className == 'remove') {
            remove_task(e.target.value);
            // console.log(e.target.value);
        }
        if (e.target && e.target.className == 'check') {
            check_task(e.target.value);
        }
    });
}

function remove_task(id) {
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            result = this.responseText;
            location.reload(true);
        }
    };
    xmlhttp.open("DELETE", "http://localhost/rest_todo/php_scripts/todo_control.php?id=" + id, true);
    xmlhttp.send();
}

function check_task(id) {
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            result = this.responseText;
            // console.log(result);
            location.reload(true);
        }
    };
    xmlhttp.open("PUT", "http://localhost/rest_todo/php_scripts/todo_control.php?id=" + id, true);
    xmlhttp.send();
}

function add() {
    var title = document.getElementById("title").value;
    var description = document.getElementById("description").value;
    var pat = /^[A-Za-z]+$/;
    var title_match = pat.test(title);
    var descr_match = pat.test(description);

    if (title.length == 0 || description.length == 0) {
        input_check(title,description)
    } else if (pat.test(title) && pat.test(description)) {
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                result = this.responseText;
                location.reload(true);
                // console.log(result);
            }
        };
        xmlhttp.open("POST", "../php_scripts/todo_control.php?title=" + title + "&description=" + description, true);
        xmlhttp.send();
    }

}

function create(id, title, description, task) {
    // console.log("cokok");
    var element = document.getElementById('list');
    var fragment = document.createDocumentFragment();
    var li = document.createElement("li");
    var checker = document.createElement("span");
    checker.value = id;
    checker.classList.add("check");
    checker.textContent = "\u2714";
    // checker.onclick = doneR;
    // debugger;
    li.appendChild(checker);
    var titleElement = document.createElement("span");
    titleElement.classList.add("dropdown");
    titleElement.textContent = title;
    if (task == "done") {
        titleElement.classList.add("line");
    }
    var descriptionElement = document.createElement("span");
    descriptionElement.classList.add("dropdown-content");
    descriptionElement.textContent = description;
    titleElement.appendChild(descriptionElement);
    li.appendChild(titleElement);
    var remove = document.createElement("span");
    remove.value = id;
    remove.classList.add("remove");
    remove.textContent = "X";
    // remove.onclick = removeElement;
    li.appendChild(remove);
    fragment.appendChild(li);
    document.getElementById("title").value = "";
    document.getElementById("description").value = "";
    element.appendChild(fragment);
}

function mycheck_1(str) {
    document.getElementById("error1").style.display = "block";
    if (/^[A-Za-z]+$/.test(str)) {
        document.getElementById("error1").innerHTML = "accept";
    } else {
        document.getElementById("error1").innerHTML = "enter only text";
        document.getElementById("error1").style.color = "red";
    }
}
function mycheck_2(str) {
    document.getElementById("error2").style.display = "block";
    if (/^[A-Za-z]+$/.test(str)) {
        document.getElementById("error2").innerHTML = "accept";
    } else {
        document.getElementById("error2").innerHTML = "enter only text";
        document.getElementById("error2").style.color = "red";
    }
}
function input_check(title,description)
{
    if (title.length == 0 && description.length > 0) {
        document.getElementById("error2").style.color = "";
        document.getElementById("error2").innerHTML = "Accepted";
        document.getElementById("error1").style.color = "red";
        document.getElementById("error1").innerHTML = "Text cannot be empty";
    } else if (title.length > 0 && description.length == 0) {
        document.getElementById("error1").style.color = "";
        document.getElementById("error1").innerHTML = "Accepted";
        document.getElementById("error2").style.color = "red";
        document.getElementById("error2").placeholder = "Text cannot be empty";
    } else {
        document.getElementById("error2").style.color = "red";
        document.getElementById("error2").innerHTML = "Text cannot be empty";
        document.getElementById("error1").style.color = "red";
        document.getElementById("error1").innerHTML = "Text cannot be empty";
    }
}