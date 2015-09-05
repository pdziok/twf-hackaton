$(document).ready(function () {
    $(".game-card").flip({
        trigger: 'manual'
    });

    function relalculateCardDims() {
        var card = $(".game-card .card");
        var parent = card.parent();
        card.css('width', parseInt(new String(parent.css('width')).replace(/[^0-9]/, '')) - 20);
        card.css('height', parseInt(new String(parent.css('height')).replace(/[^0-9]/, '')) - 20);
    }

    $('.game-card-container').click(function () {
        var $card = $(this).find('.game-card');
        var $state = $card.data('state');
        var $isOk = parseInt($card.data('is-ok'));
        var $imgOk = './img/ok.jpg';
        var $imgWrong = './img/wrong.jpg';

        if (!isProcessed()) {
            if ($isOk) {
                flipOk();
            } else {
                console.log('wrong');
                flipWrong();
            }
        }

        function flipOk() {
            setBackImage($imgOk);
            $card.flip(true, function () {
                setTimeout(function () {
                    $card.flip(false, function () {
                        setProcessed();
                    });
                }, 1000);
            });
        }

        function flipWrong() {
            setBackImage($imgWrong);
            $card.flip(true, function () {
                setTimeout(function () {
                    $card.flip(false);
                }, 1000);
            });
        }

        function setProcessed() {
            $card.attr('data-state', 'processed');
            $card.find('.front').fadeTo("slow", 0.1);
        }

        function isProcessed() {
            return $state == 'processed';
        }

        function setBackImage($img) {
            $card.find('.back').css('background-image', 'url(' + $img + ')');
        }
    });
    function recalculateElementWidth() {
        var $cards = $('.cards-container');
        var cardAmount = $cards.find('.game-card').length;
        var ratio = $('body').width() / $('body').height();
        //var cardsPerRow = Math.sqrt(cardAmount) * ratio;
        var desiredNumberPerRow = Math.ceil(cardAmount / Math.max(4 * ratio, 3));
        var cardsPerRow = cardAmount / desiredNumberPerRow;
        $cards.removeClass('small-up-1 small-up-2 small-up-3 small-up-4 small-up-5 small-up-6 small-up-7 small-up-8 small-up-9  small-up-10')
        $cards.addClass('small-up-' + Math.round(cardsPerRow))
    }
    recalculateElementWidth();
    relalculateCardDims();
    $(window).resize(function() {
        recalculateElementWidth();
        relalculateCardDims();
    });

    var shake = function (e) {
        var $e = $(e);
        if (Math.random() > 0.8) {
            $e.transition({ rotate: '10deg', scale: 1.1 });
            $e.transition({ rotate: '-10deg', scale: 1.1 });
            $e.transition({ rotate: '0deg', scale: 1.0 });
        }

        setTimeout(function() {
            shake(e);
        }, Math.random() * 10000);
    };

    $('.game-card').each(function() {
        var that = this;
        setTimeout(function() {
            shake(that);
        }, Math.random() * 10000);
    });
});
