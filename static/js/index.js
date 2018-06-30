/**
 * Created by sjh on 2018/6/29.
 */
$(function(){
    // $.ajax({ url: "test.html", context: document.body, success: function(){
    //     $(this).addClass("done");
    // }});
});
//addActiveClass
function addActiveClass(element){
    $(element).addClass('active');
}
//removeActiveClass
function removeActiveClass(element){
    $(element).removeClass('active');
}

