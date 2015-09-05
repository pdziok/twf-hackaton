$(function () {

    var startTime = new Date();
    var tries = 0;
    var isFinishEarlier = 0;

    function increaseTry() {
        tries++;
    }

    function checkIsFinished() {
        return $('.game-card[data-is-guessed="0"][data-is-ok="1"]').length == 0;
    }

    function calculateGameTime(startTime) {
        // later record end time
        var endTime = new Date();

        // time difference in ms
        var timeDiff = endTime - startTime;

        // strip the ms
        timeDiff /= 1000;

        // get seconds (Original had 'round' which incorrectly counts 0:28, 0:29, 1:30 ... 1:59, 1:0)
        var seconds = Math.round(timeDiff % 60);

        return seconds;
    }

    function finishGame(startTime) {
        var gameTime = calculateGameTime(startTime);
        redirectToSummary(gameTime);
    }

    function redirectToSummary(gameTime) {
        var redirectUrl = '';
        redirectUrl += window.location.protocol + '//' + window.location.hostname + '/summary';
        redirectUrl += '?gameTime=' + gameTime;
        redirectUrl += '?tries=' + tries;
        redirectUrl += '?isFinishEarlier=' + isFinishEarlier;
        window.location.href = redirectUrl;
    }


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
        var $isGuessed = $card.data('is-guessed');
        var $isOk = parseInt($card.data('is-ok'));
        var $imgOk = './img/ok.jpg';
        var $imgWrong = './img/wrong.jpg';

        increaseTry();
        if (!isGuessed()) {
            if ($isOk) {
                flipOk();
            } else {
                flipWrong();
            }
        }

        function flipOk() {
            setBackImage($imgOk);
            $card.flip(true, function () {
                setTimeout(function () {
                    $card.flip(false, function () {
                        setGuessed();
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

        function setGuessed() {
            $card.attr('data-is-guessed', '1');
            $card.find('.front').fadeTo("slow", 0.1);

            if (checkIsFinished()) {
                finishGame(startTime);
            }
        }

        function isGuessed() {
            return $isGuessed == 'is-guessed';
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
