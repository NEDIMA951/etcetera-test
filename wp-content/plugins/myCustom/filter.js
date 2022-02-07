
$ = jQuery;
var mafs = $("#my-ajax-filter-search");
var mafsForm = mafs.find("form");

mafsForm.submit(function (e) {
  e.preventDefault();

  console.log("form submitted");

  if ($("#search").length) {
    if (mafsForm.find("#search").val().length !== 0) {
      var search = mafsForm.find("#search").val();
    }
  }
  if ($("#house_name").length) {
    if (mafsForm.find("#house_name").val().length !== 0) {
      var house_name = mafsForm.find("#house_name").val();
    }
  }
  if ($("#place_coordinate").length) {
    if (mafsForm.find("#place_coordinate").val().length !== 0) {
      var place_coordinate = mafsForm.find("#place_coordinate").val();
    }
  }
  if ($("#number_floors").length) {
    if (mafsForm.find("#number_floors").val().length !== 0) {
      var number_floors = mafsForm.find("#number_floors").val();
    }
  }
  if ($("#building_type").length) {
    if (mafsForm.find("#building_type").val().length !== 0) {
      var building_type = mafsForm.find("#building_type").val();
    }
  }
  if ($("#ecology").length) {
    if (mafsForm.find("#ecology").val().length !== 0) {
      var ecology = mafsForm.find("#ecology").val();
    }
  }
  if ($("#house_image").length) {
    if (mafsForm.find("#house_image").val().length !== 0) {
      var house_image = mafsForm.find("#house_image").val();
    }
  }
  if ($("#square").length) {
    if (mafsForm.find("#square").val().length !== 0) {
      var square = mafsForm.find("#square").val();
    }
  }
  if ($("#number_rooms").length) {
    if (mafsForm.find("#number_rooms").val().length !== 0) {
      var number_rooms = mafsForm.find("#number_rooms").val();
    }
  }
  if ($("#balcony").length) {
    if (mafsForm.find("#balcony").val().length !== 0) {
      var balcony = mafsForm.find("#balcony").val();
    }
  }
  if ($("#bathroom").length) {
    if (mafsForm.find("#bathroom").val().length !== 0) {
      var bathroom = mafsForm.find("#bathroom").val();
    }
  }
  if ($("#room_image").length) {
    if (mafsForm.find("#room_image").val().length !== 0) {
      var room_image = mafsForm.find("#room_image").val();
    }
  }

  var data = {
    action: "my_ajax_filter_search",
    search: search,
    house_name: house_name,
    place_coordinate: place_coordinate,
    number_floors: number_floors,
    building_type: building_type,
    ecology: ecology,
    house_image: house_image,
    square: square,
    number_rooms: number_rooms,
    balcony: balcony,
    bathroom: bathroom,
    room_image: room_image,
  };

  $.ajax({
    url: ajax_url,
    data: data,
    success: function (response) {
      console.log("all perfect");
	  $( '#ajax_filter_search_results' ).html( response );
      $("#ajax_filter_search_results").empty();
      if (response) {
        for (var i = 0; i < response.length; i++) {
          var html = "<li id='property-" + response[i].id + "' class='shadow p-3 mb-5 bg-body rounded row'>";
		  html += "	<div class='post__preview-img col-md-4'>"; 
		  html += "	<a href='" + response[i].permalink + "' title='" + response[i].title + "'>";
		  html += "	<picture>"; 
		  html += "		<img src='" + response[i].house_image['url'] + "' alt='" + response[i].title + "' />";
		  html += "	</picture>"; 
		  html += "	</a>";
          html += "	</div>";
          html += "	<div class='post__preview-content col-md-8'>";
		  html += "		<a href='" + response[i].permalink + "' title='" + response[i].title + "'>";
          html += "			<h3>" + response[i].title + "</h3>";
		  html += "		</a>";
		  html += "	<div class='descr'>";
          html += "		<p class='badge rounded-pill bg-light text-dark'><span>Название Дома :</span> " + response[i].house_name + "</p>";
          html += "		<p class='badge rounded-pill bg-light text-dark'><span>Координаты Местонахождения :</span> " + response[i].place_coordinate + "</p>";
          html += "		<p class='badge rounded-pill bg-light text-dark'><span>Количество Этажей :</span> " + response[i].number_floors + "</p>";
          html += "		<p class='badge rounded-pill bg-light text-dark'><span>Тип Строения :</span> " + response[i].building_type + "</p>";
          html += "		<p class='badge rounded-pill bg-light text-dark'><span>Экологичность :</span> " + response[i].ecology + "</p>";
          html += "		<hr><h4>Помещение/Квартира</h4>";
          html += "		<p class='badge rounded-pill bg-light text-dark'><span>Площадь :</span> " + response[i].square + "</p>";
          html += "		<p class='badge rounded-pill bg-light text-dark'><span>Количество комнат :</span> " + response[i].number_rooms + "</p>";
          html += "		<p class='badge rounded-pill bg-light text-dark'><span>Балкон :</span> " + response[i].balcony['label'] + "</p>";
          html += "		<p class='badge rounded-pill bg-light text-dark'><span>Санузел :</span> " + response[i].bathroom['label'] + "</p>";
			
          html += "	</div>";
          html += "	</div>";
          html += "</li>";
          $("#ajax_filter_search_results").append(html);
        }
      } else {
        var html =
          "<li class='no-result callout-info'>Подходящие записи не найдены. Попробуйте другой фильтр для поиска</li>";
        $("#ajax_filter_search_results").append(html);
      }
    },
  });
});


