$(document).ready(function () {
    if (Boolean(document.cookie.split(';')[0].split('=')[1]) == true) {
      $(".cookie-popup").addClass("d-none");
      console.log('test');
    }
    let date = new Date();
    date.setHours(date.getHours() + 24);
    date = date.toUTCString();
    $(".accept-btn").on("click", function () {
        document.cookie = "accepted=True ; expires=" + date;
        $(".cookie-popup").addClass("d-none");
    })

    $(".close-btn").on("click", function () {
      $(".cookie-popup").addClass("d-none");
    });
    console.log(Boolean(document.cookie.split(';')[0].split('=')[1]));
  });