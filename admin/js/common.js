// Remplace toutes les occurences d'une chaine
function replaceAll(str, search, repl) {
  while (str.indexOf(search) != -1) {
    str = str.replace(search, repl);
  }
  return str;
}

// Remplace les caractères accentués
function noAccent(str) {
  var norm = new Array(
    "À",
    "Á",
    "Â",
    "Ã",
    "Ä",
    "Å",
    "Æ",
    "Ç",
    "È",
    "É",
    "Ê",
    "Ë",
    "Ì",
    "Í",
    "Î",
    "Ï",
    "Ð",
    "Ñ",
    "Ò",
    "Ó",
    "Ô",
    "Õ",
    "Ö",
    "Ø",
    "Ù",
    "Ú",
    "Û",
    "Ü",
    "Ý",
    "Þ",
    "ß",
    "à",
    "á",
    "â",
    "ã",
    "ä",
    "å",
    "æ",
    "ç",
    "è",
    "é",
    "ê",
    "ë",
    "ì",
    "í",
    "î",
    "ï",
    "ð",
    "ñ",
    "ò",
    "ó",
    "ô",
    "õ",
    "ö",
    "ø",
    "ù",
    "ú",
    "û",
    "ü",
    "ý",
    "ý",
    "þ",
    "ÿ"
  );

  var spec = new Array(
    "A",
    "A",
    "A",
    "A",
    "A",
    "A",
    "A",
    "C",
    "E",
    "E",
    "E",
    "E",
    "I",
    "I",
    "I",
    "I",
    "D",
    "N",
    "O",
    "O",
    "O",
    "0",
    "OE",
    "O",
    "U",
    "U",
    "U",
    "U",
    "Y",
    "b",
    "s",
    "a",
    "a",
    "a",
    "a",
    "a",
    "a",
    "a",
    "c",
    "e",
    "e",
    "e",
    "e",
    "i",
    "i",
    "i",
    "i",
    "d",
    "n",
    "o",
    "o",
    "o",
    "o",
    "oe",
    "o",
    "u",
    "u",
    "u",
    "u",
    "y",
    "y",
    "b",
    "y"
  );

  for (var i = 0; i < spec.length; i++) {
    str = replaceAll(str, norm[i], spec[i]);
  }
  return str;
}

// Formate un mot, par exemple un nom avec une majuscule au début et le reste en minuscul
function name_format(word) {
  firstLetter = word.substring(0, 1).toUpperCase();
  if (word.search("-") == -1) {
    lereste = word.substring(1, word.length).toLowerCase();
  } else {
    lereste =
      getTextBetween(word, 1, word.search("-")).toLowerCase() +
      getTextBetween(word, word.search("-") + 1, word.length)
        .substring(0, 1)
        .toUpperCase() +
      getTextBetween(word, word.search("-") + 1, word.length)
        .substring(1, word.length)
        .toLowerCase();
  }
  return firstLetter + lereste;
}
// Test l'adresse email et renvoye true ou false
function check_mail(email) {
  var new_string = new String(email);
  return !!new_string.match(
    "^[-_.0-9a-zA-Z]{1,}@[-_.0-9a-zA-Z]{1,}[.][0-9a-zA-Z]{2,}$"
  );
}

// --- Gestion des cookies -------------------------------------
function set_cookie(nom, contenu, jours) {
  var expireDate = new Date();
  expireDate.setTime(expireDate.getTime() + jours * 24 * 3600 * 1000);
  document.cookie =
    nom + "=" + escape(contenu) + ";expires=" + expireDate.toGMTString();
}
function unset_cookie(nom) {
  set_cookie(nom, "", -1);
}
function get_cookie(nom) {
  var deb, fin;
  deb = document.cookie.indexOf(nom + "=");
  if (deb >= 0) {
    deb += nom.length + 1;
    fin = document.cookie.indexOf(";", deb);
    if (fin < 0) fin = document.cookie.length;
    return unescape(document.cookie.substring(deb, fin));
  }
  return "";
}

// -------------------------------------------------------------
