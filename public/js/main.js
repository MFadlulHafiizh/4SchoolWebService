$("#btn-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$("#lantai").on("change", function() {

    if ($("#lantai").val() == "2") {
        $(".map-1").toggle("lantai-act");
        $(".map-2").toggle("lantai-act");
    } else {
        $(".map-1").toggle("lantai-act");
        $(".map-2").toggle("lantai-act");
    }

});

$("#btn-navigasi").on("click", function() {
    let ruangAwal = $("#navigasi-awal").val();
    let ruangTujuan = $("#navigasi-tujuan").val();

    $(".img-maps").attr("src", "img/navigasi/" + ruangAwal + " - " + ruangTujuan + ".png");
});