let current, future, past;
let pagination_link = $("#pages li a").not("#pages #prev a,#pages #next a");
let previous = $("#pages #prev a");
let next = $("#pages #next a");
let pages = $(".page-link").length - 2;

$(document).ready(function () {
    init();

    next.href = "home.php?page=" + future
    previous.href = "home.php?page=" + past

    function refresh() {
        future = current + 1;
        past = current - 1;
        if (past === 0) {
            $("#prev").addClass("disabled");
        } else if (past > 0) {
            $("#prev").removeClass("disabled");
        }

        if (future > pages) {
            $("#next").addClass("disabled");
        } else if (future <= pages ) {
            $("#next").removeClass("disabled");
        }

    }

    function back_n_forth(e){
        e.preventDefault();
        $("#content").load(this.href + ' #content>*');
        current = parseInt(this.href.split("=")[1])
        refresh();
        next.href = "home.php?page=" + future
        previous.href = "home.php?page=" + past
    }
    previous.click(back_n_forth);
    next.click(back_n_forth);

    pagination_link.click(function (e) {
        e.preventDefault();
        current = parseInt(this.innerHTML)
        refresh();
        previous.href = "home.php?page=" + past
        next.href = "home.php?page=" + future
        $("#content").load(this.href + ' #content>*');

    })

    // next.click(function (e) {
    //     e.preventDefault();
    //         current = parseInt(this.href.split("=")[1])
    //
    //         refresh();
    //         console.log(this)
    //         next.href = "home.php?page=" + future
    //         previous.href = "home.php?page=" + past
    //         $("#content").load(this.href + ' #content>*');
    // })
    //
    // previous.click(function (e) {
    //     e.preventDefault();
    //     current = parseInt(this.href.split("=")[1])
    //     refresh();
    //     console.log(this)
    //     next.href = "home.php?page=" + future
    //     previous.href = "home.php?page=" + past
    //     $("#content").load(this.href + ' #content>*');
    // })
    function init() {
        current = 1;
        future = current + 1;
        past = current - 1;
    }


})

