/**
 * Change le flex-direction en column au chargement de la page si l'appareil st un smartphone ou tablette
 * Si non le flex-direction en row
 */
var xhr;
function init() {
    var width = $(window).width();
    if (width <= 480) {
        $(".d-flex").addClass("flex-column");
        $(".card").css("width", "100%")
    } else if (480 <= width && width <= 900) {
        $(".d-flex").removeClass("flex-column");
        $(".card").css("width", "50%");
    } else {
        $(".d-flex").removeClass("flex-column");
        $(".card").css("width", "32%");
    }
}

function tabs(){
    //grabs the hash tag from the url
    var hash = window.location.hash;
    //checks whether or not the hash tag is set
    if (hash != "") {
        if (hash == "#reparer") {
            $('#nav-reparation').addClass('active');
            $('#nav-reparation').addClass('show');
            $('#nav-reparation-tab').addClass('active');
            $('#nav-achat').removeClass('active');
            $('#nav-achat').removeClass('show');
            $('#nav-achat-tab').removeClass('active');

            $("#header-nav .navbar-nav").find(".active").removeClass("active");
            $(".nav-item:nth-of-type(4)").addClass("active");


        } else {
            $('#nav-achat').addClass('active');
            $('#nav-achat').addClass('show');
            $('#nav-achat-tab').addClass('active');
            $('#nav-reparation').removeClass('active');
            $('#nav-reparation').removeClass('show');
            $('#nav-reparation-tab').removeClass('active');
            $("#header-nav .navbar-nav").find(".active").removeClass("active");
            $(".nav-item:nth-of-type(3)").addClass("active");

        }
    }
}

function ajax_filter(filter_url) {
    $('.contains').remove();
    $('.loader').addClass('d-flex justify-content-center m-5');
    xhr = new XMLHttpRequest();
    xhr.open('GET', '/filter?' + filter_url, true);
    xhr.send();
    xhr.addEventListener('readystatechange', function () {
        if (xhr.readyState == xhr.DONE && xhr.status == 200) {
            $('.annonces').remove();
            $('.container').append(this.responseText);
            init();
        }
    });
}

function create_c_filter(key, s_filter) {
    var div = document.createElement('div');
    div.setAttribute('class', 'btn btn-outline-primary mr-2 select-filter');
    var i = document.createElement('i');
    div.setAttribute('id', key);
    if (key == "price_from") {
        div.textContent = "De : " + s_filter + " €";
    } else if (key == "price_to") {
        div.textContent = "À : " + s_filter + " €";
    } else {
        div.textContent = s_filter;
    }
    i.setAttribute('class', 'fas fa-times pl-3 pr-2');
    div.appendChild(i);
    $('#filter').append(div);

}

function js_filter() {
    $('#filter').empty();
    let url = window.location.search;
    let searchParams = new URLSearchParams(url);
    if (searchParams.has('search')) {
        filter.search = searchParams.get('search');
    }
    for (const key in filter) {
        if (filter[key] != null) {
            if (key == "price_to" || key == "price_from") {
                create_c_filter(key, filter[key]);
            }
        }
    }
    if (filter.state.length > 0) {
        filter.state.forEach(e => {
            create_c_filter('state.' + e, e);
        });
    }
    if (filter.brand.length > 0) {
        filter.brand.forEach(e => {
            create_c_filter('brand.' + e, e);
        })
    }
    ajax_filter(decodeURIComponent($.param(filter)));
}
var filter = {
    "price_from": null,
    "price_to": null,
    "search": null,
    "brand": [],
    "state": []
};
$(document).ready(function () {


    
    
    


    window.onhashchange = function () {
        window.location.reload();
    }
    /**
     * Change le flex-direction en column si l'appareil st un smartphone ou tablette
     * Si non le flex-direction est en row
     */
    $(window).on('resize', function () {
        var width = $(window).width();
        if (width <= 480) {
            $(".d-flex").addClass("flex-column");
            $(".card").css("width", "100%")
        } else if (480 <= width && width <= 900) {
            $(".d-flex").removeClass("flex-column");
            $(".card").css("width", "50%");
        } else {
            $(".d-flex").removeClass("flex-column");
            $(".card").css("width", "30%");
        }
    });
    //Fonction qui gère le click sur les onglets
    init();
    tabs();

    /**
     * Filter
     */
    $('#price_from_input,#price_to_input').on("focusout", function () {
        if ($('#price_to_input').val() !== "") {
            if(xhr){
                xhr.abort();
                xhr = null;
            }
            filter.price_to = $('#price_to_input').val();
            js_filter();
        }
        if ($('#price_from_input').val() !== "") {
            if(xhr){
                xhr.abort();
                xhr = null;
            }
            filter.price_from = $('#price_from_input').val();
            js_filter();
        }

    });
    $('#state').change(function () {
        if(xhr){
            xhr.abort();
            xhr = null;
        }
        filter.state.push(this.value);
        js_filter();

    });
    $('#brand').change(function () {
        if(xhr){
            xhr.abort();
            xhr = null;
        }
        filter.brand.push(this.value);
        js_filter();
    });


    $(document).on('click', '.select-filter', function () {
        let select_id = $(this).attr('id');
        $("#" + select_id).remove();
        if (select_id == "price_from") {
            filter.price_from = null;
            $('#price_from_input').val(null);
        }
        if (select_id == "price_to") {
            filter.price_to = null;
            $('#price_to_input').val(null);
        }
        if (select_id.includes('brand')) {
            var pos = filter.brand.indexOf(select_id.split('.')[1]);
            filter.brand.splice(pos, 1);
        }
        if (select_id.includes('state')) {
            var pos = filter.state.indexOf(select_id.split('.')[1]);
            filter.state.splice(pos, 1);
        }
        js_filter();

    });
    

});
