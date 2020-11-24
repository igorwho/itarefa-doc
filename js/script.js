
function open_topic(topic_file, evt) {
    const app = document.querySelector('zero-md');
    app.setAttribute('src', topic_file);
    app.render();

    var all = document.getElementsByClassName('active');
    for (i = 0; i < all.length; i++) {
        all[i].classList.remove('active');
    }

    if (evt) {
        evt.target.classList.add('active');
    }
}

var prev = "";
function search(evt) {
    if (prev === evt.target.value) return;
    
    let str = evt.target.value;
    prev = str;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            prepare_menu(JSON.parse(this.responseText)['topics']);
        }
    };
    xhttp.open("POST", "search.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("query=" + str);
}

function prepare_menu (obj) {
    var out = "";
    var i = 0;
    for (temp in obj) {
        var atv = '';
        if (document.querySelector('zero-md').src == "source/" + obj[i].file) {
            atv = 'active';
        }
        out += '<a  href="#'+ obj[i].topic + '" data-file="' + obj[i].file + '" class="list-group-item list-group-item-action ' + atv + '" onclick=\'open_topic("source/' + obj[i].file + '", event)\'>' 
                + obj[i].topic + '</a>';
        i ++;
    }
    document.getElementsByClassName('list-group')[0].innerHTML = out;
}


if (location.href.indexOf("#") > 0) {
    var anchor = "";
    anchor = decodeURI(location.href.split("#")[1]).replace(/[^\w\s]/gi, '');
    var all = document.getElementsByClassName("list-group-item");
    for (i = 0; i < all.length; i++) {
        if (all[i].innerText.replace(/[^\w\s]/gi, '') == anchor) {
            all[i].classList.add('active');
            all[i].onclick();
            break;
        }
    }
}