jQuery(document).ready(function($) {


    // "use strict";

    // Page loading animation

    $("#preloader").animate({
        'opacity': '0'
    }, 600, function() {
        setTimeout(function() {
            $("#preloader").css("visibility", "hidden").fadeOut();
        }, 300);
    });


    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        var box = $('.header-text').height();
        var header = $('header').height();

        if (scroll >= box - header) {
            $("header").addClass("background-header");
        } else {
            $("header").removeClass("background-header");
        }
    });

});

var msgFromAdminStatus = 0;


function signoutCustomer() {

    // alert("ok");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                // msgFromAdminStatus = 3;
                window.location = "page.php?x=0";
            }
        }
    }

    r.open("GET", "signoutprocess.php", true);
    r.send();

}



function Alert() {
    alert("Please Login as a Customer First..");
}




function pageNavigator(x) {
    var div0 = document.getElementById("div0")
    var div1 = document.getElementById("div1");
    var div2 = document.getElementById("div2");
    var div3 = document.getElementById("div3");
    var div4 = document.getElementById("div4");
    var div5 = document.getElementById("div5");
    var div6 = document.getElementById("div6");
    var div7 = document.getElementById("div7");
    var div8 = document.getElementById("div8");
    var title = document.getElementById("title");


    if (x == 0) {
        msgFromAdminStatus = 2;
        div0.removeAttribute("hidden");
        title.innerHTML = "Online Shop | Home";
        div1.setAttribute("hidden", "hidden");
        div2.setAttribute("hidden", "hidden");
        div3.setAttribute("hidden", "hidden");
        div4.setAttribute("hidden", "hidden");
        div5.setAttribute("hidden", "hidden");
        div6.setAttribute("hidden", "hidden");
        div7.setAttribute("hidden", "hidden");
        div8.setAttribute("hidden", "hidden");


        history.pushState("", document.title, "http://localhost/finalproject/page.php");




    } else if (x == 1) {
        msgFromAdminStatus = 2;
        div1.removeAttribute("hidden");
        title.innerHTML = "Online Shop | Products";
        div0.setAttribute("hidden", "hidden");
        div2.setAttribute("hidden", "hidden");
        div3.setAttribute("hidden", "hidden");
        div4.setAttribute("hidden", "hidden");
        div5.setAttribute("hidden", "hidden");
        div6.setAttribute("hidden", "hidden");
        div7.setAttribute("hidden", "hidden");
        div8.setAttribute("hidden", "hidden");


        history.pushState("", document.title, "http://localhost/finalproject/page.php");

    } else if (x == 2) {

        msgFromAdminStatus = 2;
        div2.removeAttribute("hidden");
        title.innerHTML = "Online Shop | About Us";
        div0.setAttribute("hidden", "hidden");
        div1.setAttribute("hidden", "hidden");
        div3.setAttribute("hidden", "hidden");
        div4.setAttribute("hidden", "hidden");
        div5.setAttribute("hidden", "hidden");
        div6.setAttribute("hidden", "hidden");
        div7.setAttribute("hidden", "hidden");
        div8.setAttribute("hidden", "hidden");


        history.pushState("", document.title, "http://localhost/finalproject/page.php");
    } else if (x == 4) {

        msgFromAdminStatus = 2;
        div4.removeAttribute("hidden");
        title.innerHTML = "eShop | User Profile";
        div0.setAttribute("hidden", "hidden");
        div1.setAttribute("hidden", "hidden");
        div2.setAttribute("hidden", "hidden");
        div3.setAttribute("hidden", "hidden");
        div5.setAttribute("hidden", "hidden");
        div6.setAttribute("hidden", "hidden");
        div7.setAttribute("hidden", "hidden");
        div8.setAttribute("hidden", "hidden");
        history.pushState("", document.title, "http://localhost/finalproject/page.php");


    } else if (x == 5) {

        msgFromAdminStatus = 2;
        div5.removeAttribute("hidden");
        title.innerHTML = "Online Shop | User Watch List";
        div0.setAttribute("hidden", "hidden");
        div1.setAttribute("hidden", "hidden");
        div2.setAttribute("hidden", "hidden");
        div3.setAttribute("hidden", "hidden");
        div4.setAttribute("hidden", "hidden");
        div6.setAttribute("hidden", "hidden");
        div7.setAttribute("hidden", "hidden");
        div8.setAttribute("hidden", "hidden");

        history.pushState("", document.title, "http://localhost/finalproject/page.php");
    } else if (x == 6) {

        msgFromAdminStatus = 2;
        div6.removeAttribute("hidden");
        title.innerHTML = "Online Shop | User Purchase History";
        div0.setAttribute("hidden", "hidden");
        div1.setAttribute("hidden", "hidden");
        div2.setAttribute("hidden", "hidden");
        div3.setAttribute("hidden", "hidden");
        div4.setAttribute("hidden", "hidden");
        div5.setAttribute("hidden", "hidden");
        div7.setAttribute("hidden", "hidden");
        div8.setAttribute("hidden", "hidden");
        history.pushState("", document.title, "http://localhost/finalproject/page.php");

    } else if (x == 7) {
        msgFromAdminStatus = 1;
        div7.removeAttribute("hidden");
        title.innerHTML = "Online Shop | User Messege";
        div0.setAttribute("hidden", "hidden");
        div1.setAttribute("hidden", "hidden");
        div2.setAttribute("hidden", "hidden");
        div3.setAttribute("hidden", "hidden");
        div4.setAttribute("hidden", "hidden");
        div5.setAttribute("hidden", "hidden");
        div6.setAttribute("hidden", "hidden");
        div8.setAttribute("hidden", "hidden");
        history.pushState("", document.title, "http://localhost/finalproject/page.php");

    } else if (x == 8) {
        msgFromAdminStatus = 2;
        redirectCart();
        div8.removeAttribute("hidden");
        title.innerHTML = "Online Shop | User Cart";
        div0.setAttribute("hidden", "hidden");
        div1.setAttribute("hidden", "hidden");
        div2.setAttribute("hidden", "hidden");
        div3.setAttribute("hidden", "hidden");
        div4.setAttribute("hidden", "hidden");
        div5.setAttribute("hidden", "hidden");
        div6.setAttribute("hidden", "hidden");
        div7.setAttribute("hidden", "hidden");

        history.pushState("http://localhost/finalproject/page.php");

    }

}


function redirectFuction() {
    window.location = "index.php";
}


function pageNavigatorA(x) {
    var div00 = document.getElementById("div00")
    var div01 = document.getElementById("div01");
    var div02 = document.getElementById("div02");
    var div03 = document.getElementById("div03");

    var title0 = document.getElementById("title");


    if (x == 0) {
        document.getElementById("msgview").innerHTML = "";
        div00.removeAttribute("hidden");
        div01.setAttribute("hidden", "hidden");
        div02.setAttribute("hidden", "hidden");
        div03.setAttribute("hidden", "hidden");
        title0.innerHTML = "Online Shop | Products";
        history.pushState("http://localhost/finalproject/adminPanel.php");

    } else if (x == 1) {
        document.getElementById("msgview").innerHTML = "";
        div01.removeAttribute("hidden");
        div00.setAttribute("hidden", "hidden");
        div02.setAttribute("hidden", "hidden");
        div03.setAttribute("hidden", "hidden");
        title0.innerHTML = "Online Shop | Add Product";
        history.pushState("http://localhost/finalproject/adminPanel.php");

    } else if (x == 2) {
        document.getElementById("msgview").innerHTML = "";
        div02.removeAttribute("hidden");
        div00.setAttribute("hidden", "hidden");
        div01.setAttribute("hidden", "hidden");
        div03.setAttribute("hidden", "hidden");
        title0.innerHTML = "Online Shop | Selling Histrory";
        history.pushState("http://localhost/finalproject/adminPanel.php");


    } else if (x == 3) {
        document.getElementById("msgview").innerHTML = "";
        div03.removeAttribute("hidden");
        div00.setAttribute("hidden", "hidden");
        div01.setAttribute("hidden", "hidden");
        div02.setAttribute("hidden", "hidden");
        title0.innerHTML = "Online Shop | My Profile";
        history.pushState("http://localhost/finalproject/adminPanel.php");

    } else if (x == 4) {
        resetMsgPanel();
        div04.removeAttribute("hidden");
        div00.setAttribute("hidden", "hidden");
        div01.setAttribute("hidden", "hidden");
        div02.setAttribute("hidden", "hidden");
        div03.setAttribute("hidden", "hidden");
        title0.innerHTML = "Online Shop | Message";

        history.pushState("http://localhost/finalproject/adminPanel.php");



    }

}


function resetMsgPanel() {


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("msgview").innerHTML = t;
        }
    }

    r.open("GET", "adminMsgResetProcess.php", true);
    r.send();

}


function msgSend() {
    // alert("ok");

    msgbox1 = document.getElementById("msgbox1");
    //alert($user);
    // alert(msgbox1.value);


    var r = new XMLHttpRequest();

    var form = new FormData();
    form.append("msg", msgbox1.value);

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            // alert(t);

            if (text == "Success") {
                // window.location = "page.php?x=7";

                loadMsg();



            } else {

                alert(text);

            }
        }

    }

    r.open("POST", "msgProcess.php", true);
    r.send(form);

}



function clickMsg(name) {


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;

            // alert(t);

            document.getElementById("msgview").innerHTML = t;

        }

    }


    r.open("GET", "messageAdmin.php?x=" + name, true);
    r.send();

}


function msgSend1(name) {

    // alert("ok" + name);

    var msg = document.getElementById("msgbox1");

    var f = new FormData();
    f.append("msg", msg.value);
    f.append("name", name);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {


                loadMsg();


                clickMsg(name);

            } else {

                alert(t);
            }

        }

    }

    r.open("POST", "adminMsgProcess.php", true);
    r.send(f);

}


function loadMsg() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;

            document.getElementById("msgbox1").value = "";
            document.getElementById("msgboxuser").innerHTML = t;



        }

    }

    r.open("GET", "messageLoading.php", true);
    r.send();


}


function redirectCart() {
    // alert("ok");
    // pageNavigator(8);
    cartBuyingUpdate();

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("cartBox").innerHTML = t;

        }

    }
    r.open("GET", "cartLoad.php", true);
    r.send();

}

function addToCart(id) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Added to Cart");

                // pageNavigator(8);
                redirectToProduct();
            } else {

                alert(t);
                pageNavigator(8);
            }
        }
    }

    r.open("GET", "addToCartProcess.php?id=" + id, true);
    r.send();

}




function deleteFromCart(id) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var txt = r.responseText;
            if (txt == "success") {
                alert("Product removed from the cart.");
                redirectCart();
            } else {
                alert(txt);
            }

        }
    }

    r.open("GET", "removeCartProcess.php?id=" + id, true);
    r.send();

}

function redirectToProduct() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;

            document.getElementById("customerProductView").innerHTML = t;

        }

    }

    r.open("GET", "customerProductViewReload.php", true);
    r.send();

}

function addToWatchlist(id) {
    // alert(id);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "added") {

                document.getElementById("heart" + id).style.color = "red";
                // window.location.reload();
                redirectToProduct();


            } else if (t == "removed") {

                document.getElementById("heart" + id).style.color = "white";
                // window.location.reload();
                redirectToProduct();

            } else {
                alert(t);
            }




        }
    }

    r.open("GET", "addToWatchlistProcess.php?id=" + id, true);
    r.send();
}



function removeFromWatchlist(id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;

            if (text == "success") {
                window.location.reload();
            } else {
                alert(text);
            }

        }
    }

    request.open("GET", "removeWatchlistProcess.php?id=" + id, true);
    request.send();

}


function redirectProduct() {

    // alert("ok");
    pageNavigator(1);


}

function addToWatchlistSingleView(id) {

    // alert(id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;

            alert(t);

            window.location.reload();

        }

    }

    r.open("GET", "changeWatchListSingleView.php?id=" + id, true);
    r.send();

}


function removeFromWatchList(id) {

    // alert(id);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var t = r.responseText;
            alert("Removed Successfully");

            document.getElementById("watchListBox").innerHTML = t;



        }
    }
    r.open("GET", 'watchListRemoveProcess.php?id=' + id, true);
    r.send();


}

function watchListReload() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;

            document.getElementById("watchListBox").innerHTML = t;

        }

    }

    r.open("GET", "watchListReload.php", true);
    r.send();

}






function viewProductAll(id) {
    // alert(id);

    window.location = "ProductAll.php?id=" + id;


}

function redirectToHome() {

    window.location = "page.php";

}


var model;

function addModelOrBrand(x) {

    // alert("ok");

    if (x == 0) {
        document.getElementById("outputName").innerHTML = "Add New Model";
    } else {
        document.getElementById("outputName").innerHTML = "Add New Brand";

    }


    model = new bootstrap.Modal(document.getElementById("modelForBrand"));
    model.show();

}


function closemodel() {
    document.getElementById("gavename").innerHTML = "";
    model.hide();

}


function SaveModel() {

    var text = document.getElementById("gavename");
    var where = document.getElementById("outputName").textContent;

    // alert(text.value);

    var word;
    // alert(where);

    var f = new FormData();
    f.append("name", text.value);

    if (where == "Add New Model") {

        word = "model";

        f.append("word", word);
    } else if (where == "Add New Brand") {
        word = "brand";

        f.append("word", word);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;


            if (t == "success") {

                alert("The Name Successfully Added");
                closemodel();

                // window.location.reload();
                // pageNavigatorA(1);
                reloadAddProduct();


            } else {

                alert(t);
            }


        }

    }

    r.open("POST", "addModelOrBrandProcess.php", true);
    r.send(f);
}

function reloadAddProduct() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var t = r.responseText;

            document.getElementById("addproductbox").innerHTML = t;
        }
    }

    r.open("GET", "addproductreload.php", true);
    r.send();


}


function cartBuyingUpdate() {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("cartBuyBox").innerHTML = t;
        }

    }

    r.open("GET", "cartBuyingUpdateLoader.php", true);
    r.send(0);

}


function qtyIncrement(actualqty, id, idNo, cartTotal) {
    for (var i = 1; i <= cartTotal; i++) {
        // alert(idNo);
        if (i == idNo) {
            // alert(i);
            var qty = document.getElementById("qtyforbuying" + idNo);
        }
    }
    // var qty = document.getElementById("qtyforbuying2");

    // alert(idNo);
    if (qty.value < actualqty) {
        var newValue = parseInt(qty.value) + 1;
        qty.value = newValue.toString();

        var f = new FormData();
        f.append("pid", id);
        f.append("qty", newValue);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var t = r.responseText;
                document.getElementById("priceBox" + idNo).innerHTML = t;
            }
        }
        r.open("POST", "qtyIncreamentProcess.php", true);
        r.send(f);
    } else {
        alert("Max quantity of the store related to that product");
    }
}

function qtyDecrement(id, idNo, cartTotal) {
    for (var i = 1; i <= cartTotal; i++) {
        if (i == idNo) {
            var qty = document.getElementById("qtyforbuying" + idNo);
        }
    }
    if (qty.value > 1) {
        var newValue = parseInt(qty.value) - 1;
        qty.value = newValue.toString();
        var f = new FormData();
        f.append("pid", id);
        f.append("qty", newValue);
        var r = new XMLHttpRequest();
        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var t = r.responseText;
                document.getElementById("priceBox" + idNo).innerHTML = t;
            }
        }
        r.open("POST", "qtyDecreamentProcess.php", true);
        r.send(f);
    } else {
        alert("Minimum number of quantity");
    }
}

function reloadPrice(id, no, idNo) {
    // alert(x);
    var price = document.getElementById("totalPrice");
    var text = price.innerHTML;
    var intPrice = parseInt(text.slice(3, -3));

    var y = document.getElementById("priceBox" + idNo);
    var t = y.innerHTML;

    var f = new FormData();
    f.append("id", id);
    f.append("price", intPrice);
    f.append("x", no);
    f.append("y", t);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            // alert(t);
            price.innerHTML = t;
        }
    }
    r.open("POST", "cartTotalPriceProcess.php", true);
    r.send(f);
}

function msgNotificationCustomer() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {

                var msgLabel = document.getElementById("msgLabel");
                msgLabel.style.border = "6px solid red";
                msgLabel.style.borderRadius = "100%";

            }
        }
    }
    r.open("GET", "notificationProcess.php", true);
    r.send();
}

function msgNotificationClean() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {

                var msgLabel = document.getElementById("msgLabel");
                msgLabel.style.border = "none";

            }
        }
    }
    r.open("GET", "notificationCleanProcess.php", true);
    r.send();
}


function adminNotification() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {

                var msgLabel = document.getElementById("msgLabelAdmin");
                msgLabel.style.border = "6px solid red";
                msgLabel.style.borderRadius = "100%";

            }
        }
    }
    r.open("GET", "adminNotificationProcess.php", true);
    r.send();
}

function adminNotificationClean() {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {

                var msgLabel = document.getElementById("msgLabelAdmin");
                msgLabel.style.border = "none";


            }
        }
    }
    r.open("GET", "adminNotificationClean.php", true);
    r.send();
}

function setBuyingTotal() {
    var total = document.getElementById("totalBuyingPrice");

    document.getElementById("totalPriceLabel").innerHTML = "Rs " + total.innerHTML + ".00";

}

function changePrice() {
    setInterval(setBuyingTotal, 500);
}



function reloadPuchaseHistory() {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("buyingHistoryBox").innerHTML = t;

        }
    }
    r.open("GET", "puchaseHistoryLoad.php", true);
    r.send();
}


function adminSearch() {

    var word = document.getElementById("adminProductSearch").value;
    var category = document.getElementById("adminSearchCategory");
    var c = category.options[category.selectedIndex].text;
    var f = new FormData();
    f.append("id", word);
    f.append("c", c);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("sort").innerHTML = t;

        }
    }
    r.open("POST", "adminProductSearchProcess.php", true);
    r.send(f);

}




function searchBuyingCustomer() {


    var date = document.getElementById("selectDate");
    var d = date.value;

    var f = new FormData();
    f.append("d", d);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("buyingHistoryBox").innerHTML = t;

        }
    }
    r.open("POST", "purchasingSearchProcess.php", true);
    r.send(f);
}

function searchBuying() {

    var date = document.getElementById("selectDate");
    var d = date.value;

    var f = new FormData();
    f.append("d", d);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("buyingBox").innerHTML = t;

        }
    }
    r.open("POST", "buyingSearchProcess.php", true);
    r.send(f);
}

function serachButton() {
    var text = document.getElementById("searchText");
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("searchText").value = "";
            document.getElementById("searchBox").innerHTML = t;

        }
    }

    r.open("GET", "searchingProcess.php?text=" + text.value, true);
    r.send();
}

function loadHomePage() {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("searchBox").innerHTML = t;

        }
    }
    r.open("POST", "homePageReload.php", true);
    r.send();

}


function cartBuying(x) {

    var price = document.getElementById("totalPrice").innerText;
    var rightPrice = price.slice(3, -3);

    var f = new FormData();
    f.append("count", x);
    for (var i = 1; i <= x; i++) {
        var pid = document.getElementById("productId" + i).innerHTML;
        var qty = document.getElementById("qtyforbuying" + i).value;
        f.append("pid" + i, pid);
        f.append("qty" + i, qty);

    }

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            // if (t == "Success") {
            window.location = "checkOut.php?price=" + rightPrice + "&id=" + t;
            // }
        }
    }

    r.open("POST", "checkOutProcess.php", true);
    r.send(f);
}

function loadCustmerHome() {
    alert("ok");
    // window.location = "page.php";
}


function buyingPageReload() {
    // alert("ok");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            document.getElementById("buyingBox").innerHTML = t;

        }
    }

    r.open("GET", "buyingPageReload.php", true);
    r.send();

}