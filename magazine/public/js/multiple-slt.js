var x = []
var y = []
var opt_value;
var element1 = 0

function multipleTag(value){
    
    opt_value =  document.getElementById('tag');
    
    var opt_text =  opt_value.children[opt_value.selectedIndex];
    
    var texto = opt_text.textContent;
    
    x.push('<a id="' + opt_value.value + '" class="btn btn-primary" onclick="removeBtn(this)">' + texto + '<strong style="font-weight: bold;">&nbsp;&nbsp;&nbsp;x </strong></a>');
    var unique_x = x.filter(function(el, i) {
        return x.indexOf(el) === i;
    });

    y.push('<input type="hidden" name="tag[]" value="' + opt_value.value + '"></input>');
    var unique_y = y.filter(function(el, i) {
        return y.indexOf(el) === i;
    });

    x_without_comma = unique_x.join(' ')
    
    element1 = document.getElementById("tags-select");
    
    element1.innerHTML = x_without_comma;

    y_without_comma = unique_y.join(' ')

    var element2 = document.getElementById("inp_tag");
    
    element2.innerHTML = y_without_comma;
    
}


function removeBtn(obj){
    var tag = document.getElementById(obj.id)
    
    var element3 = document.getElementById("tags-select");
    var w = x_without_comma.replace(tag, '')
    console.log(w)
}