$(".btn-search").click(function () {
  $("#box-search").toggleClass("show");
  $("#box-search-input").change(function () {
    var keyword = $(this).val().toLowerCase();
    $(".box-search-item").removeClass("show");
    if (keyword.length > 1) {
      $.post(
        "/search",
        {
          keyword,
        },
        function (data) {
          $(".box-search-item").empty();
          $.each(JSON.parse(data), function (i, item) {
            $(".box-search-item").addClass("show");
            $(".box-search-item").append(`<li class="dropdown-item">
                      <a class="text-decoration-none text-dark" href="${item.permalink}">${item.title}</a>
                      <span class="d-block small text-muted">#${item.category}</span>
                      </li>`);
          });
        }
      );
    }
  });
});
