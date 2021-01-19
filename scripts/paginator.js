// $(document).ready(function(){
//     $("a.page-link").click(function(){
//         $.ajax({
//             type: get,
//             url: this.href,
//             data: {page: $(this).innerHTML},
//             success: function(result) {
//                 $("#content").html(result);
//             }
//         });
//     });
// });
//
// $("a.page-link").click(function () {
//     $.get("home.php",
//         {page: this.innerHTML },
//         function (data, status) {
//         $("#content").html(data);
//         // alert(status);
//     })
// })

$(document).ready(function () {
    $("a.page-link").each(function () {
        $(this).click(function(e){
            let page = window.location.hash;
            let page_no = page.split('=')[1];
            console.log(page_no);

            //     // e.preventDefault();
            //    $.ajax({
            //     type: get,
            //     url: $(this).href,
            //     data: {page: $(this).html()},
            //     success: function(result) {
            //         $("#content").html(result);
            //     }
            // });
        });
    })
})
// $(document).ready(function () {
//     $("a.page-link").each(function () {
//
//     })
// })