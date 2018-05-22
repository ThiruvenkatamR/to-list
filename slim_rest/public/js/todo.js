var element = document.getElementById("list");
element.addEventListener("click", function (e) {
    if (e.target && e.target.className == 'edit_btn') {
        enable(e.target);
    }

});

function enable(div) {
    console.log(div.parentElement);
    var li = div.parentElement;
    var n =  li.children.length;
    for(i=0;i<n;i++)
    {
        if(li.children[i].classList == 'edit')
        {
            li.children[i].style.display = "block";
        }
    }
}