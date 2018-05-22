var xmlhttp = new XMLHttpRequest();

window.onload = function () {
    createEventListener();
    console.log("ijij");
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            result = this.responseText;
            // console.log(result);

        }
    };
    xmlhttp.open("GET", "/tasks/todos", true);
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
        if (e.target && e.target.className == 'edit_btn') {
            enable(e.target);
        }
        if (e.target && e.target.className == 'save') {
            edit_element(e.target);
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
    xmlhttp.open("DELETE", "/tasks/delete/" + id, true);
    xmlhttp.send();
}

function check_task(id) {
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            result = this.responseText;
            console.log(result);
            location.reload(true);

        }
    };
    console.log("ijij39934");
    xmlhttp.open("PUT", "/tasks/check/" + id, true);
    xmlhttp.send();
}

function enable(div) {
    console.log(div.parentElement);
    var li = div.parentElement;
    var n = li.children.length;
    for (i = 0; i < n; i++) {
        if (li.children[i].classList == 'edit') {
            li.children[i].style.display = "block";
        }
    }
}

function add_element() {
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            result = this.responseText;
            console.log(result);
            location.reload(true);

        }
    };
    
    var title = document.getElementById("title").value;
    var description = document.getElementById("description").value;
    var val = "title="+title+"&description="+description;
    console.log(title,description,val);
    xmlhttp.open("POST", "/tasks/insert", true);
    xmlhttp.setRequestHeader("")
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xmlhttp.send(val);
}

function edit_element(div) {
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            result = this.responseText;
            console.log(result);
            location.reload(true);

        }
    };
    var edit = div.parentElement;
    console.log(edit);
    var title = edit.children[0].value;

    var description = edit.children[1].value;
    var id = edit.children[2].value;
    var val = "title="+title+"&description="+description+"&user_id="+id;
    console.log(val);
    xmlhttp.open("POST", "/tasks/edit", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xmlhttp.send(val);
}