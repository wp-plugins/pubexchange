(function(d, s, id) {
  var js, pjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id; js.async = true;
  js.src = "//cdn.pubexchange.com/modules/partner/{{PUBLICATION_ID}}";
  pjs.parentNode.insertBefore(js, pjs);
}(document, "script", "pubexchange-jssdk"));