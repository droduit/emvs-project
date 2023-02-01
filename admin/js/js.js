function theaterOpen(title, content, slctArea) {
  $(".notify").hide("fast");
  $(".cadre .contenu").css("max-height", "84%");
  $("#theater, .cadre").fadeIn("slow");
  $(".cadre .title").html(title);
  if (title == "") {
    $(".cadre .title").remove();
  }
  $(".cadre .contenu").html(content);
  if (slctArea) {
    setTimeout(function () {
      $(".cadre .selectedArea").fadeIn("slow");
      $(".cadre").animate({ left: "45%" }, 500);
    }, 800);
  } else {
    $(".cadre .selectedArea").css("display", "none");
  }
  $("body").css("overflow", "hidden");
}
function closeTheater() {
  $("#theater, .cadre").fadeOut("slow");
  $("body").css("overflow", "auto");
}

// --- Fonction qui nous donne un texte contenu entre deux marqueurs ---
// Les marqueurs peuvent etre de type string et numérique combinés.
function getTextBetween(subject, firstMark, lastMark) {
  /*
	1. subject : 	La chaine dans laquel on cherche
	2. firstMark : 	Le marqueur de début
	3. lastMark : 	Le marqueur de fin
	*/
  var firstIdx, lastIdx, text;

  subject = subject.toString();

  if (typeof firstMark == "number") {
    firstIdx = firstMark;
  } else {
    firstIdx = parseInt(subject.search(firstMark) + firstMark.length);
  }

  if (typeof lastMark == "number") {
    lastIdx = lastMark;
  } else {
    if (typeof firstMark == "number") {
      lastIdx = subject.search(lastMark);
    } else {
      lastIdx =
        subject.search(lastMark) -
        (parseInt(subject.search(firstMark)) + firstMark.length);
    }
  }

  text = subject.substr(firstIdx, lastIdx);

  return text;
}

function notify(text) {
  if ($(".notify .content .item").size() == 2) {
    $(".notify .content .item:last-child").remove();
  }
  $(".notify").slideDown("slow");
  $(".notify").animate({ bottom: "0" }, 450);
  $(".notify .content").prepend('<div class="item">' + text + "</div>");
  setTimeout(function () {
    $(".notify").trigger("mouseleave");
  }, 3600);
  setTimeout(function () {
    $(".notify").fadeOut("slow");
  }, 4000);
}

$(document).ready(function () {
  $(".table").wrap('<div class="table-wrap" />');
  $(".table tr:even").addClass("even");

  $(".ie #userbar").corner("top 5px");
  $(".ie .titlebar").corner("top 5px");
  $(".ie .block_cont").corner("bottom 5px");
  $(".ie .error, .ie .warning, .ie .success, .ie .information").corner("5px");

  $("body").append(
    '<div id="window"><div class="title">Titre</div><div class="closeWindow" onclick="closeWindow();">X</div><div class="container"></div></div>' +
      '<div id="theater"></div>' +
      '<div class="cadre">' +
      '<div class="title"></div>' +
      '<div class="contenu"></div>' +
      '<div class="data"><input type="hidden" id="checkedStu" style="width:400px" value="" /></div>' +
      '<div class="selectedArea"></div>' +
      "</div>" +
      '<div class="notify">' +
      '<div class="expand"></div>' +
      '<div class="title"></div>' +
      '<div class="content"></div>' +
      "</div>"
  );

  $("#window").draggable({ cancel: ".container" });

  $(".notify").live("mouseover", function () {
    $(".notify").animate({ bottom: "0" }, 450);
  });
  $(".notify").live("mouseleave", function () {
    $(".notify").animate({ bottom: "-74px" }, 450);
  });

  $(".pseudo-select").hover(
    function () {
      $(".contenant").fadeIn("fast");
    },
    function () {
      $(".contenant").fadeOut("fast");
    }
  );

  $(".contenant .li").click(function () {
    $(".declench").html($(this).html());
    $("#select").val($(this).attr("option"));
    $(".contenant").slideUp("fast");
  });

  $("#theater").click(function () {
    closeTheater();
  });

  // Pour le gestionnaire d'importation de fichier, pour la fenetre de suppression
  $(".delFile").live("click", function () {
    var url = "";
    var type = "";
    var element = "";

    if ($(this).parent().find(".wrapwrap").size() > 0) {
      url = $(this).parent().find(".wrapwrap").attr("url");
      type = "img";
      element = $(this).parent();
    } else {
      url = $(this).parent().attr("url");
      type = "doc";
      element = $(this).parent();
    }

    $("#dialog-file-confirm").dialog({
      resizable: false,
      height: 150,
      modal: false,
      buttons: {
        Confirmer: function () {
          $(this).dialog("close");
          $.post(
            "includes/imageLoader/del.php",
            { filename: url, filetype: type },
            function (respons) {
              if (respons == "true") {
                $(element).effect("explode", "fast");
              } else {
                alert("Erreur lors de l'execution de la requete");
              }
            }
          );
        },
        Annuler: function () {
          $(this).dialog("close");
        },
      },
    });
  });

  $(".expandImages").click(function () {
    if ($(".images").size() > 0) {
      html =
        '<div style="width:635px; margin:auto" class="resize">' +
        $(".images").html() +
        "</div>";
      theaterOpen("", html, false);
      $(".cadre .contenu").css("max-height", "96.1%");
    }
  });

  // Pour cacher les messages d'alertes vert jaunes rouges...
  $(".hide_btn").live("click", function () {
    $(this).parent().fadeOut("medium");
    $(".tipsy").fadeOut("fast");
  });
  setTimeout(function () {
    $(".hide_btn").trigger("click");
  }, 8000);

  // Icones
  $(".stat").hover(
    function () {
      $(this).animate({ opacity: 0.75 }, 400);
    },
    function () {
      $(this).animate({ opacity: 1 }, 400);
    }
  );
  $(".stat").tipsy({ gravity: "n", fade: true });
});
