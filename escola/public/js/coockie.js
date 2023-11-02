const bt_acepto = document.getElementById('bt_acepto');
const bt_rechazar = document.getElementById('bt_rechazar');
const coockie = document.getElementById('coockie');
const color = document.getElementById('color');
const filtro = document.getElementById('filtro');
const css = document.getElementById('css');
const createCookie = 'createCookie';
const cookiecolor = 'color';
function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    return decodeURI(dc.substring(begin + prefix.length, end));
} 
if(getCookie(createCookie) == null){
    coockie.addEventListener('click', (e) => {
        if(e.target.id == 'bt_acepto'){
            coockie.style.display = 'none';
            filtro.style.display = 'none';
            color.style.display = 'block';
            document.cookie = "createCookie=true; expires='3600'";
            document.cookie = "color="+color.value+";";
        }else if(e.target.id == 'bt_rechazar'){
            coockie.style.display = 'none';
            filtro.style.display = 'none';
            document.cookie = "createCookie=false; expires='3600'";
        }
    });
}else{
    coockie.style.display = 'none';
    filtro.style.display = 'none';
    if(getCookie(cookiecolor) != null){
        color.style.display = 'block';
    }
}

color.addEventListener('change', (e) => {
    if(e.target.value == 'white'){
        document.cookie = "color="+e.target.value+";";
    }else{
        document.cookie = "color="+e.target.value+";";
    }
    if(getCookie("color")=="black"){
        css.href = '/public/css/styleOscuro.css';
    }else{
        css.href = '/public/css/styleBlanco.css';
    }
}); 