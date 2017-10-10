jQuery(function ($) {
  $(".spell-block i").click(function() {
    $(this).parent().toggleClass("readied");
    if ($(this).parent().hasClass("readied")) {
      $(this).parent().find(".off").hide();
      $(this).parent().find(".on").show();
    } else {
      $(this).parent().find(".on").hide();
      $(this).parent().find(".off").show();
    }
  });
});

jQuery(function ($) {
  $("#clear-spells").click(function() {
    $(".spell-block").removeClass("readied");
    $(".spell-block").find(".on").hide();
    $(".spell-block").find(".off").show();
    $(".spell-levels [type=checkbox]").prop('checked', false);
  });
});

jQuery(function ($) {
  $(".buttons .add").click(function() {
    $(".readout .current").text(Number($(".readout .current").text())+Number($(".buttons input").val()));
  });

	$(".buttons .sub").click(function() {
    $(".readout .current").text(Math.max(Number($(".readout .current").text())-Number($(".buttons input").val()), 0));
  });

	$(".health .full").click(function() {
    $(".readout .current").text( Number($(".readout .max").text()) );
  });
});
