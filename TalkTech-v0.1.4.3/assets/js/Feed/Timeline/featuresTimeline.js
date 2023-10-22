import {openPost} from './readPost.js';

openPost();


$(document).ready(function() {
  var getProductHeight = $('.product.active').height();

  $('.products').css({
    height: getProductHeight
  });

  function calcProductHeight() {
    getProductHeight = $('.product.active').height();

    $('.products').css({
      height: getProductHeight
    });
  }

  function animateContentColor() {
    var getProductColor = $('.product.active').attr('product-color');

    $('body').css({
      background: getProductColor
    });

    $('.title').css({
      color: getProductColor
    });

    $('.btn').css({
      color: getProductColor
    });
  }

  var productItem = $('.product'),
    productCurrentItem = productItem.filter('.active');

  $('#next').on('click', function(e) {
    e.preventDefault();

    var nextItem = productCurrentItem.next();

    productCurrentItem.removeClass('active');

    if (nextItem.length) {

      productCurrentItem = nextItem.addClass('active');
    } else {
      productCurrentItem = productItem.first().addClass('active');
    }

    calcProductHeight();
    animateContentColor();
  });

  $('#prev').on('click', function(e) {
    e.preventDefault();

    var prevItem = productCurrentItem.prev();

    productCurrentItem.removeClass('active');

    if (prevItem.length) {
      productCurrentItem = prevItem.addClass('active');
    } else {
      productCurrentItem = productItem.last().addClass('active');
    }

    calcProductHeight();
    animateContentColor();
  });

  // Ripple
  $('[ripple]').on('click', function(e) {
    var rippleDiv = $('<div class="ripple" />'),
      rippleSize = 60,
      rippleOffset = $(this).offset(),
      rippleY = e.pageY - rippleOffset.top,
      rippleX = e.pageX - rippleOffset.left,
      ripple = $('.ripple');

    rippleDiv.css({
      top: rippleY - (rippleSize / 2),
      left: rippleX - (rippleSize / 2),
      background: $(this).attr("ripple-color")
    }).appendTo($(this));

    window.setTimeout(function() {
      rippleDiv.remove();
    }, 1900);
  });
});

// ========================== isso aqui é para ta em outro arquivo, mas deixa aqui por enquanto
document.addEventListener("DOMContentLoaded", function() {
  const elementoComScroll = document.querySelector('.container-messages-roll');

  // Função para rolar a div para o final
  function scrollToBottom() {
      elementoComScroll.scrollTop = elementoComScroll.scrollHeight - elementoComScroll.clientHeight;
  }

  // Chame a função para rolar a div para o final assim que a página estiver carregada
  scrollToBottom();
});

const dropdownButton = document.getElementById("dropdown-button");
  const dropdownList = document.getElementById("dropdown-list");

  dropdownButton.addEventListener("click", function() {
    dropdownList.style.maxHeight = dropdownList.style.maxHeight === "200px" ? "0" : "200px"; // Ajuste conforme necessário
    dropdownButton.parentNode.classList.toggle("active");
  });


