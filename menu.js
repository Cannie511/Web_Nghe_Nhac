var backBtn = 0;
  $('#contentContainer').scroll(function () {
    if ($(this).scrollTop()) {
      $('#topMenu').css('background-color', 'var(--primary-color-custom)');
      $('#topMenu').css('box-shadow', '1px 2px 5px black');
      $('#personal').css('color', 'black');
    }
    else {
      $('#topMenu').css('background-color', 'transparent');
      $('#personal').css('color', 'white');
      $('#topMenu').css('box-shadow', '0 0 0 white');
    }
  });
  $('.menu_item').click(function () {
    $('#main_play').animate({
      scrollTop: 0
    }, 400);
    return false;
  })
  $('.menu_item').click(function (event) {
    index = $(this).index();
    backBtn = index;
    $('.menu_item').removeClass('init');
    $(this).addClass('init');
    switch (index) {
      case 0:
        $('.layout.show').removeClass('show');
        $('#playlist').addClass('show');
        break;
      case 1:
        var searchinput = document.getElementById('search_input');
        searchinput.focus();
        break;
      case 2:
        $('.layout.show').removeClass('show');
        $('#myPL').addClass('show');
        break;
      case 3:
        $('.layout.show').removeClass('show');
        $('#Ranked').addClass('show');
        break;
      case 4:
        $('.layout.show').removeClass('show');
        $('#LoveIt').addClass('show');
        break;
      default:
        break;
    }
    console.log(index);
  });
  $('.menu_item').click(function (event) {
    index = $(this).index();
    backBtn = index;
    $('.menu_item').removeClass('init');
    $(this).addClass('init');
    switch (index) {
      case 0:
        $('.layout.show').removeClass('show');
        $('#playlist').addClass('show');
        break;
      case 1:
        $('.layout.show').removeClass('show');
        var searchinput = document.getElementById('search_input');
        searchinput.focus();
        break;
      case 2:
        $('.layout.show').removeClass('show');
        $('#myPL').addClass('show');
        break;
      case 3:
        $('.layout.show').removeClass('show');
        $('#Ranked').addClass('show');
        break;
      case 4:
        $('.layout.show').removeClass('show');
        $('#LoveIt').addClass('show');
        break;
      default:
        break;
    }
    console.log(index);
  });
  $('.view_item').click(function () {
    $('.layout.show').removeClass('show');
    $('#music_list').addClass('show');
  });
  $('#backTab').click(function () {
    switch (backBtn) {
      case 0:
        $('.layout.show').removeClass('show');
        $('#playlist').addClass('show');
        break;
      case 1:
        var searchinput = document.getElementById('search_input');
        searchinput.focus();
        break;
      case 2:
        $('.layout.show').removeClass('show');
        $('#myPL').addClass('show');
        break;
      case 3:
        $('.layout.show').removeClass('show');
        $('#Ranked').addClass('show');
        break;
      case 4:
        $('.layout.show').removeClass('show');
        $('#LoveIt').addClass('show');
        break;
      case 5:
        break;
      default:
        break;
    }
  });