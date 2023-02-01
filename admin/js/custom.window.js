function openWindow(url, data, taille, title) {
  // traitement de la taille, du titre....
  if (taille == "" || typeof taille == "undefined") {
    taille = 600;
  }
  $("#window").css({ width: taille + "px", "margin-left": -(taille / 2 + 10) });
  $("#window .container").css("width", taille - 23 + "px");
  $("a").css("cursor", "wait");

  if (title == "" || typeof title == "undefined") {
    titre = "";
  } else {
    titre = title;
  }
  $("#window .title").html(titre);

  setTimeout(function () {
    $("#window").fadeIn("fast");
  }, 200);

  // traitement de l'url
  wordLink = "http";
  var width = window.outerWidth / 1.5;
  var height = window.outerHeight / 1.5;
  if (url.substring(0, wordLink.length) == wordLink) {
    $("#window .container").html(
      '<iframe src="' +
        url +
        '" frameborder="0" width="100%" height="100%" scrolling="auto"></iframe>'
    );

    $("#window").animate(
      { marginLeft: -(width / 2) + "px", marginTop: "10px" },
      200
    );
    setTimeout(function () {
      $("#window .container, #window").animate(
        { width: width + "px", height: height + "px" },
        200
      );
      $("#window .container").animate(
        { width: width - 23 + "px", height: height - 18 + "px" },
        200
      );
    }, 200);
  } else {
    // Affichage de la fenetre sans contenu chargé
    $.ajax({
      type: "POST",
      url: url,
      data: data,
      success: function (html) {
        $("#window .container").html(html).fadeIn("slow");
      },
    });
  }
  $("a").css("cursor", "");
}
//***********************************************************************************************************
function loadWindow(idWindow, url, data) {
  $("#window .container").html("Chargement...").fadeIn("slow");
  $.ajax({
    type: "POST",
    url: url,
    data: data,
    success: function (html) {
      $("#window .container").html(html);
    },
  });
}
//***********************************************************************************************************
function closeWindow(no) {
  $("#window").fadeOut(250);
  setTimeout(function () {
    $("#window .container").html("");
  }, 300);
}
//***********************************************************************************************************
function loadInto(IDName, url, data) {
  $.ajax({
    type: "POST",
    url: url,
    data: data,
    success: function (html) {
      $("#" + IDName)
        .html(html)
        .fadeIn(250);
    },
  });
}

function resizeWindow(width, height) {
  if (typeof height == "undefined") {
    height = replaceAll($("#window").css("height"), "px", "");
  }

  $("#window").animate({ width: width + "px", height: height + "px" }, 100);
  $("#window .container").animate(
    { width: width - 23 + "px", height: height - 18 + "px" },
    100
  );
}
