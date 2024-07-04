jQuery(document).on("change", ".resource_type_filter, .resource_topic_filter", function (e) {
   triggerResourceSearch();
});

function triggerResourceSearch($resourceTypeFilter = null, $resourceTopicFilter = null) {
   jQuery(".no-found").remove();
   var resourceTypeFilter = jQuery(".resource_type_filter").val();
   var resourceTopicFilter = jQuery(".resource_topic_filter").val();

   $("html, body").animate({ scrollTop: jQuery("#showResources").offset().top - 300, }, 100);

   jQuery.ajax({
      type: "POST",
      url: localize_data.ajaxurl,
      data: {
         action: "resource_pagination",
         resourceTypeFilter: resourceTypeFilter,
         resourceTopicFilter: resourceTopicFilter,
      },
      beforeSend: function () {
         jQuery(".resource-no-found, .ajax-remove-reosurceBlocks__cards").remove();
         jQuery(".ajax-loader").css("display", "block");
         jQuery(".ajax-loader").fadeIn(500);
      },
      success: function (response) {
         setTimeout(function () {
            response = JSON.parse(response);
            jQuery("#showResources").html(response.resourceHtml);
         }, 500);
      },
   });
}