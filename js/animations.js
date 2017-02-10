/**
 * Created by sjedynak on 2016-11-17.
 */
function AniemateSlide3() {
    //$(".slajd3 .pink-box, .slajd3 .blue-box").addClass('animate');
    $('.slajd3 .img-right').addClass("img-show-right");
    // $('.slajd3 .img-left').addClass("img-show-left");
    $('.slajd3 .img-left').animate({

        marginLeft: "0"


    }, 500);
}

function AniemateSlide5() {
    $(".slajd5 .img-left").addClass('img-show-left');
}
function AniemateSlide6() {
    $('.slajd6 .img-right-gray').addClass("img-show-right");
    $('.slajd6 .img-right-pink').addClass("img-show-right");
    $(".slajd6 .img-left").addClass('img-show-left');

    $(".grey").addClass("img-show-left");
}
function AniemateSlide7() {
    $('.slajd7 .img-right').addClass("img-show-right");
    $('.slajd7 .video1-button').click(function () {
        $('.slajd7 .video1').addClass("video1-show");
        $('.slajd7 .video1').css("right", "0");
        $('.slajd7 .video1').addClass("cross");
    });

    $('.slajd7 .video-cont').click(function () {
        $('.slajd7 .video-player').addClass("video-player-show");
        $('.slajd7 .close-video-in-full').css("display", "block");
        $('.slajd7 .video-player-show').css("display", "block");
    });
    $('.slajd7 .close-video-in-full').click(function () {
        $(".video-player").each(function () {
            this.pause()
        });
        $('.slajd7 .video-player-show').css("display", "none");
        $('.slajd7 .close-video-in-full').css("display", "none");
    });
    $('.slajd7 .close-video').click(function () {

        $('.slajd7 .video1').css("right", "-350px");
    });
}
function AnimateSlide9() {
    var time = 250;
    var $this;
    $(".slajd9 .image").each(function (index, val) {
        setTimeout(function () {
            $(val).addClass('image-show');
            console.log('fire');
        }, time);
        time += 250;
    });
    setTimeout(function () {
        $(".slajd9 .img-left").addClass('img-show-left');
    }, 2000);
}

function AnimateSlide10() {
    setTimeout(function () {
        $(".slajd10 .img-left").addClass('img-show-left');
    }, 2000);
}

function AnimateSlide14() {
    var time = 250;
    var $this;
    $(".slajd14 .image").each(function (index, val) {
        setTimeout(function () {
            $(val).addClass('image-show');
            console.log('fire');
        }, time);
        time += 250;
    });
}

function AnimateSlide201() {
    $(".slajd201 .main-cover").addClass('animate');
    setTimeout(function () {
        $('.slajd201 .blue').addClass("animate");
    }, 1600);
    //$('.slajd201 .sam').click(function (event) {
    //    var $blue = $(".slajd201 .blue");
    //    if ($blue.hasClass('animate')) {
    //        $blue.addClass('un-animate');
    //    } else {
    //        $blue.removeClass('un-animate');
    //    }
    //    $blue.toggleClass('animate');
    //});
}

function AnimateSlide203() {
    setTimeout(function () {
        // $('.slajd203 .seven-two').addClass('seven-two-show');
        $('.slajd203 .seven-two').animate({
            top: "230px",
            opacity: "1"
        }, 1500);

    }, 1000);


    if ($('.slajd203 #container').length) {
        var bar_50 = new ProgressBar.Circle(container, {
            strokeWidth: 10,
            easing: 'linear',
            duration: 800,
            color: '#d3258a',
            trailColor: '#FFF',
            trailWidth: 10,
            svgStyle: null
        });
    }


    if ($('.slajd203 #container').length) {
        setTimeout(function () {
            bar_50.animate(0.5);
        }, 2800);
        setTimeout(function () {
            $('.slajd203 .fifty-num').animate({"opacity": "1"}, 400);
        }, 3600);
    }

    $('.slajd203 .fifty').removeAttr('id');
};

function AnimateSlide204() {
    var t = 0;

    // if ($('.slajd204 .ninety-num.animated').length) {
    //     var inter_three = setInterval(function () {
    //         ++t;
    //         $('.slajd204 .ninety-num').text(t + "%");
    //         if (t == 90) {
    //             clearInterval(inter_three);
    //         }
    //     }, 8);
    // }

    $('.slajd204 .ninety-num').removeClass('animated');

    if ($('.slajd204 #container2').length) {
        var bar_90 = new ProgressBar.Circle(container2, {
            strokeWidth: 10,
            easing: 'linear',
            duration: 1400,
            color: '#d3258a',
            trailColor: '#FFF',
            trailWidth: 10,
            svgStyle: null
        });
    }


    if ($('.slajd204 #container2').length) {
        bar_90.animate(0.9);
        setTimeout(function () {
            $('.slajd204 .ninety-num').animate({"opacity": "1"}, 100);
        }, 1400);
    }
    $('.slajd204 .ninety').removeAttr('id');
};

function AnimateSlide205() {
    var s = 0;

    // if ($('.slajd205 .seventy-one-num.animated').length) {
    //     var inter_four = setInterval(function () {
    //         ++s;
    //         $('.slajd205 .seventy-one-num').text(s + "%");
    //         if (s == 71) {
    //             clearInterval(inter_four);
    //         }
    //     }, 10);
    // }

    $('.slajd205 .seventy-one-num').removeClass('animated');

    if ($('.slajd205 #container3').length) {
        var bar_71 = new ProgressBar.Circle(container3, {
            strokeWidth: 10,
            easing: 'linear',
            duration: 800,
            color: '#46c0ef',
            trailColor: '#FFF',
            trailWidth: 10,
            svgStyle: null
        });
    }


    if ($('.slajd205 #container3').length) {
        bar_71.animate(0.71);
        setTimeout(function () {
            $('.slajd205 .seventy-one-num').animate({"opacity": "1"}, 400);
        }, 800);
    }

    $('.slajd205 .seventy-one').removeAttr('id');
}

function AnimateSlide206() {
    var b = 0;

    // if ($('.slajd206 .thirty-three-num.animated').length) {
    //     var inter_four = setInterval(function () {
    //         ++b;
    //         $('.slajd206 .thirty-three-num').text(b + "%");
    //         if (b == 33) {
    //             clearInterval(inter_four);
    //         }
    //     }, 14);
    // }

    $('.slajd206 .thirty-three-num').removeClass('animated');

    if ($('.slajd206 #container4').length) {
        var bar_33 = new ProgressBar.Circle(container4, {
            strokeWidth: 9,
            easing: 'linear',
            duration: 600,
            color: '#46c0ef',
            trailColor: '#FFF',
            trailWidth: 9,
            svgStyle: null
        });
    }


    if ($('.slajd206 #container4').length) {
        bar_33.animate(0.33);
        setTimeout(function () {
            $('.slajd206 .thirty-three-num').animate({"opacity": "1"}, 400);
        }, 800);
    }

    $('.slajd206 .thirty-three').removeAttr('id');
}

function AnimateSlide207() {
    $('.fivex').addClass('animated pulse');
}

function AnimateSlide208() {
    $('.slajd208 .seven-two').addClass('animated slideInDown');

    if ($('.slajd208 #container5').length) {
        var bar_50_2 = new ProgressBar.Circle(container5, {
            strokeWidth: 9,
            easing: 'linear',
            duration: 800,
            color: '#1bb8b3',
            trailColor: '#FFF',
            trailWidth: 9,
            svgStyle: null
        });
    }


    if ($('.slajd208 #container5').length) {
        bar_50_2.animate(0.5);
        setTimeout(function () {
            $('.slajd208 .fifty-num').animate({"opacity": "1"}, 400);
        }, 800);
    }

    $('.slajd208 .fifty').removeAttr('id');
}

function functext1() {
    $('.slajd209 .text1').addClass("text1-show");
}

function functext2() {
    $('.slajd209 .text2').addClass("text2-show");
}

function functext3() {
    $('.slajd209 .text3').addClass("text3-show");
}

function AnimateSlide209() {
    setTimeout(function () {
        $('.slajd209 .img').addClass("img-show");
        $('.slajd209 .img-top').addClass("img-show-top");

        $('.slajd209 .img-right').addClass("img-right-show");
    }, 800);
    setTimeout(functext1, 1200);
    setTimeout(functext2, 2500);
    setTimeout(functext3, 3800);

}

function AnimateSlide211() {
    setTimeout(function () {
    $('.slajd211 .img-left').addClass("img-left-show");
    }, 2000);
    $('.slajd211 .text').addClass("text-show");
    setTimeout(function () {
        $('.slajd211 .text1').addClass("text1-show");
    }, 2200);
    setTimeout(function () {
        $('.slajd211 .text2').addClass("text2-show");
    }, 3200);
    setTimeout(function () {
        $('.slajd211 .text3').addClass("text3-show");
    }, 3600);
    setTimeout(function () {
        $('.slajd211 .text4').addClass("text4-show");
    }, 4600);
    $('.slajd211 .img').addClass("img-show");
    $('.slajd211 .video1-button').click(function () {
        $('.slajd211 .video1').addClass("video1-show");
        $('.slajd211 .video1').css("right", "0");
        $('.slajd211 .video1').addClass("cross");
    });

    $('.slajd211 .video-cont').click(function () {
        $('.slajd211 .video-player').addClass("video-player-show");
        $('.slajd211 .close-video-in-full').css("display", "block");
        $('.slajd211 .video-player-show').css("display", "block");
    });

    $('.slajd211 .close-video-in-full').click(function () {
        $(".video-player").each(function () {
            this.pause()
        });
        $('.slajd211 .video-player-show').css("display", "none");
        $('.slajd211 .close-video-in-full').css("display", "none");
    });

    $('.slajd211 .close-video').click(function () {
        $('.slajd211 .video1').css("right", "-350px");
    });
}

function AnimateSlide212() {
    $('.slajd212 .video1-button').click(function () {
        $('.slajd212 .video1').addClass("video1-show");
        $('.slajd212 .video1').css("right", "0");
        $('.slajd212 .video1').addClass("cross");
    });

    $('.slajd212 .video-cont').click(function () {
        $('.slajd212 .video-player').addClass("video-player-show");
        $('.slajd212 .close-video-in-full').css("display", "block");
        $('.slajd212 .video-player-show').css("display", "block");
    });

    $('.slajd212 .close-video-in-full').click(function () {
        $(".video-player").each(function () {
            this.pause()
        });
        $('.slajd212 .video-player-show').css("display", "none");
        $('.slajd212 .close-video-in-full').css("display", "none");
    });
    $('.slajd212 .close-video').click(function () {
        $('.slajd212 .video1').css("right", "-350px");
    });

    $('.slajd212 .seven-two').addClass('animated slideInDown');

    $('.slajd212 .seven-two').addClass('animated slideInDown');

    if ($('.slajd212 #container8').length) {
        console.log($('.slajd212 #container8').length);
        var bar_50_8 = new ProgressBar.Circle(container8, {
            strokeWidth: 5,
            easing: 'linear',
            duration: 1800,
            color: '#d3258a',
            trailColor: '#FFF',
            trailWidth: 5,
            svgStyle: null
        });
    }

    if ($('.slajd212 #container8').length) {
         setTimeout(function () {
        bar_50_8.animate(0.8);
         }, 3200);
        setTimeout(function () {
            $('.slajd212 .ninety-num').animate({"opacity": "1"}, 400);
        }, 5000);
    }

    $('.slajd212 .ninety').removeAttr('id');

    if ($('.slajd212 #container9').length) {
        console.log($('.slajd212 #container9').length);
        var bar_50_9 = new ProgressBar.Circle(container9, {
            strokeWidth: 5,
            easing: 'linear',
            duration: 1800,
            color: '#23ece6',
            trailColor: '#FFF',
            trailWidth: 5,
            svgStyle: null
        });
    }

    if ($('.slajd212 #container9').length) {

        setTimeout(function () {
            bar_50_9.animate(0.74);
        }, 7200);

        setTimeout(function () {
            $('.slajd212 .seventy-num').animate({"opacity": "1"}, 400);
        }, 9000);
    }

    $('.slajd212 .seventy').removeAttr('id');

    if ($('.slajd212 #container10').length) {
        console.log($('.slajd212 #container10').length);
        var bar_50_10 = new ProgressBar.Circle(container10, {
            strokeWidth: 5,
            easing: 'linear',
            duration: 1800,
            color: '#2cb7ec',
            trailColor: '#FFF',
            trailWidth: 5,
            svgStyle: null
        });
    }

    if ($('.slajd212 #container10').length) {
        setTimeout(function () {
            bar_50_10.animate(0.5);
        }, 10200);
        setTimeout(function () {
            $('.slajd212 .fifty-num').animate({"opacity": "1"}, 400);
        }, 12000);
    }

    $('.slajd212 .fifty').removeAttr('id');
}
/*
    if ($('.slajd322 #container12').length) {
        setTimeout(function () {
        bar_50_8.animate(0.8);
    }, 3200);
        setTimeout(function () {
            $('.slajd322 .ninety-num').animate({"opacity": "1"}, 400);
        }, 5000);
    }

    $('.slajd322 .ninety').removeAttr('id');

    if ($('.slajd322 #container13').length) {
        console.log($('.slajd322 #container13').length);
        var bar_50_9 = new ProgressBar.Circle(container13, {
            strokeWidth: 5,
            easing: 'linear',
            duration: 1800,
            color: '#23ece6',
            trailColor: '#FFF',
            trailWidth: 5,
            svgStyle: null
        });
    }

    if ($('.slajd322 #container13').length) {
        setTimeout(function () {
            bar_50_9.animate(0.74);
        }, 6200);

        setTimeout(function () {
            $('.slajd322 .seventy-num').animate({"opacity": "1"}, 400);
        }, 8000);
    }

    $('.slajd322 .seventy').removeAttr('id');

    if ($('.slajd322 #container14').length) {
        console.log($('.slajd322 #container14').length);
        var bar_50_10 = new ProgressBar.Circle(container14, {
            strokeWidth: 5,
            easing: 'linear',
            duration: 1800,
            color: '#2cb7ec',
            trailColor: '#FFF',
            trailWidth: 5,
            svgStyle: null
        });
    }

    if ($('.slajd322 #container14').length) {
        setTimeout(function () {
            bar_50_10.animate(0.5);
        }, 9200);
        setTimeout(function () {
            $('.slajd322 .fifty-num').animate({"opacity": "1"}, 400);
        }, 11000);
    }
    */
// function AnimateSlide212() {
//     $('.slajd212 .video1-button').click(function () {
//         $('.slajd212 .video1').addClass("video1-show");
//         $('.slajd212 .video1').css("right", "0");
//         $('.slajd212 .video1').addClass("cross");
//     });

//     $('.slajd212 .video-cont').click(function () {
//         $('.slajd212 .video-player').addClass("video-player-show");
//         $('.slajd212 .close-video-in-full').css("display", "block");
//         $('.slajd212 .video-player-show').css("display", "block");
//     });

//     $('.slajd212 .close-video-in-full').click(function () {
//         $(".video-player").each(function () {
//             this.pause()
//         });
//         $('.slajd212 .video-player-show').css("display", "none");
//         $('.slajd212 .close-video-in-full').css("display", "none");
//     });
//     $('.slajd212 .close-video').click(function () {
//         $('.slajd212 .video1').css("right", "-350px");
//     });

//     $('.slajd212 .seven-two').addClass('animated slideInDown');

//     $('.slajd212 .seven-two').addClass('animated slideInDown');

//     if ($('.slajd212 #container8').length) {
//         console.log($('.slajd212 #container8').length);
//         var bar_50_8 = new ProgressBar.Circle(container8, {
//             strokeWidth: 5,
//             easing: 'linear',
//             duration: 800,
//             color: '#d3258a',
//             trailColor: '#FFF',
//             trailWidth: 5,
//             svgStyle: null
//         });
//     }

//     if ($('.slajd212 #container8').length) {

//         bar_50_8.animate(0.8);
//         setTimeout(function () {
//             $('.slajd212 .ninety-num').animate({"opacity": "1"}, 400);
//         }, 800);
//     }

//     if ($('.slajd212 #container9').length) {

//         console.log($('.slajd212 #container9').length);
//         var bar_50_9 = new ProgressBar.Circle(container9, {
//             strokeWidth: 5,
//             easing: 'linear',
//             duration: 800,

//             color: '#23ece6',
//             trailColor: '#FFF',
//             trailWidth: 5,

//             svgStyle: null
//         });

//     }

//     if ($('.slajd212 #container9').length) {

//         setTimeout(function () {
//         bar_50_9.animate(0.74);
//     }, 1200);

//         setTimeout(function () {
//             $('.slajd212 .seventy-num').animate({"opacity": "1"}, 400);
//         }, 2000);
//     }

//     $('.slajd212 .seventy').removeAttr('id');

//     if ($('.slajd212 #container10').length) {
//         console.log($('.slajd212 #container10').length);
//         var bar_50_10 = new ProgressBar.Circle(container10, {
//             strokeWidth: 5,
//             easing: 'linear',
//             duration: 800,
//             color: '#2cb7ec',
//             trailColor: '#FFF',
//             trailWidth: 5,
//             svgStyle: null
//         });
//     }

//     if ($('.slajd212 #container10').length) {
//         setTimeout(function () {
//         bar_50_10.animate(0.5);
//     }, 2000);
//         setTimeout(function () {
//             $('.slajd212 .fifty-num').animate({"opacity": "1"}, 400);
//         }, 2600);
//     }

//     $('.slajd212 .fifty').removeAttr('id');
// }


function AnimateSlide213() {
    // InitFunc2();
    setTimeout(function () {
        $('.slajd213 .pasek').addClass("pasek-show");
    }, 1000);
}

function AnimateSlide215() {

    setTimeout(function () {
        $('.slajd215 .img1').addClass("img1-show");
    }, 200);
    setTimeout(function () {
        $('.slajd215 .img2').addClass("img2-show");
    }, 800);
    setTimeout(function () {
        $('.slajd215 .img3').addClass("img3-show");
    }, 1400);

    $('.slajd215 .video1-button').click(function () {
        $('.slajd215 .video1').addClass("video1-show");
        $('.slajd215 .video1').css("right", "0");
        $('.slajd215 .video1').addClass("cross");
    });

    $('.slajd215 .video-cont').click(function () {
        $('.slajd215 .video-player').addClass("video-player-show");
        $('.slajd215 .close-video-in-full').css("display", "block");
        $('.slajd215 .video-player-show').css("display", "block");
    });

    $('.slajd215 .close-video-in-full').click(function () {
        $(".video-player").each(function () {
            this.pause()
        });
        $('.slajd215 .video-player-show').css("display", "none");
        $('.slajd215 .close-video-in-full').css("display", "none");
    });
    $('.slajd215 .close-video').click(function () {
        $('.slajd215 .video1').css("right", "-350px");
    });

}

function AnimateSlide216() {
    $('.slajd216 .seven-two').addClass('animated slideInDown');

    if ($('.slajd216 #container7').length) {
        console.log($('.slajd216 #container7').length);
        var bar_50_7 = new ProgressBar.Circle(container7, {
            strokeWidth: 10,
            easing: 'linear',
            duration: 1600,
            color: '#46bfef',
            trailColor: '#FFF',
            trailWidth: 10,
            svgStyle: null
        });
    }

    if ($('.slajd216 #container7').length) {
        bar_50_7.animate(0.8);
        setTimeout(function () {
            $('.slajd216 .fifty-num').animate({"opacity": "1"}, 400);
        }, 1600);
    }

    $('.slajd216 .fifty').removeAttr('id');
}

function AnimateSlide218() {
    setTimeout(function () {
        $('.slajd218 .img1').addClass("img1-show");
    }, 200);
    setTimeout(function () {
        $('.slajd218 .white-text1').addClass("white-text1-show");
    }, 800);
    setTimeout(function () {
        $('.slajd218 .white-text2').addClass("white-text2-show");
    }, 1400);

}

function AnimateSlide219() {
    $('.slajd219 .seven-two').addClass('animated slideInDown');

    if ($('.slajd219 #container6').length) {
        console.log($('.slajd219 #container6').length);
        var bar_50_6 = new ProgressBar.Circle(container6, {
            strokeWidth: 10,
            easing: 'linear',
            duration: 800,
            color: '#d3258a',
            trailColor: '#FFF',
            trailWidth: 10,
            svgStyle: null
        });
    }

    if ($('.slajd219 #container6').length) {
        bar_50_6.animate(0.5);
        setTimeout(function () {
            $('.slajd219 .fifty-num').animate({"opacity": "1"}, 400);
        }, 800);
    }

    $('.slajd219 .fifty').removeAttr('id');
};

function AnimateSlide220() {

    setTimeout(function () {
        $('.slajd220 .img1').addClass("img1-show");
    }, 2200);
    setTimeout(function () {
        $('.slajd220 .img2').addClass("img2-show");
    }, 3400);

}

function AnimateSlide317() {
    setTimeout(function () {
        $('.slajd317 .img1').addClass("img1-show");
    }, 2200);
    setTimeout(function () {
        $('.slajd317 .img2').addClass("img2-show");
    }, 2800);
    setTimeout(function () {
        $('.slajd317 .img3').addClass("img3-show");
    }, 3400);

}

function AnimateSlide318() {
    setTimeout(function () {
        $('.slajd318 .block').addClass("block-show");
    }, 2200);
    setTimeout(function () {
        $('.slajd318 .numberchart1').addClass("numberchart1-show");
    }, 2800);
    setTimeout(function () {
        $('.slajd318 .block2').addClass("block2-show");
    }, 3800);
    setTimeout(function () {
        $('.slajd318 .numberchart2').addClass("numberchart2-show");
    }, 4400);
}

function AnimateSlide319() {
    $('.slajd319 .img').addClass("img-show");
    $('.slajd319 .img-top').addClass("img-show-top");
    $('.slajd319 .img-right').addClass("img-right-show");
    setTimeout(function () {
        $('.slajd319 .text1').addClass("text1-show");
    }, 1200);
    setTimeout(function () {
        $('.slajd319 .text2').addClass("text2-show");
    }, 2500);
    setTimeout(function () {
        $('.slajd319 .text3').addClass("text3-show");
    }, 3800);
}

function AnimateSlide321() {
    $('.slajd321 .video1-button').click(function () {
        $('.slajd321 .video1').addClass("video1-show");
        $('.slajd321 .video1').css("right", "0");
        $('.slajd321 .video1').addClass("cross");
    });

    $('.slajd321 .video-cont').click(function () {
        $('.slajd321 .video-player').addClass("video-player-show");
        $('.slajd321 .close-video-in-full').css("display", "block");
        $('.slajd321 .video-player-show').css("display", "block");
    });

    $('.slajd321 .close-video-in-full').click(function () {
        $(".video-player").each(function () {
            this.pause()
        });
        $('.slajd321 .video-player-show').css("display", "none");
        $('.slajd321 .close-video-in-full').css("display", "none");
    });
    $('.slajd321 .close-video').click(function () {
        $('.slajd321 .video1').css("right", "-350px");
    });
    $('.slajd321 .img').addClass("img-show");
    setTimeout(function () {
        $('.slajd321 .img-left').addClass("img-left-show");
    }, 2000);
    $('.slajd321 .text').addClass("text-show");
    setTimeout(function () {
        $('.slajd321 .text1').addClass("text1-show");
    }, 2200);
    setTimeout(function () {
        $('.slajd321 .text2').addClass("text2-show");
    }, 3200);
    setTimeout(function () {
        $('.slajd321 .text3').addClass("text3-show");
    }, 3600);
    setTimeout(function () {
        $('.slajd321 .text4').addClass("text4-show");
    }, 4600);

}


function AnimateSlide322() {
    $('.slajd322 .video1-button').click(function () {
        $('.slajd322 .video1').addClass("video1-show");
        $('.slajd322 .video1').css("right", "0");
        $('.slajd322 .video1').addClass("cross");
    });

    $('.slajd322 .video-cont').click(function () {
        $('.slajd322 .video-player').addClass("video-player-show");
        $('.slajd322 .close-video-in-full').css("display", "block");
        $('.slajd322 .video-player-show').css("display", "block");
    });

    $('.slajd322 .close-video-in-full').click(function () {
        $(".video-player").each(function () {
            this.pause()
        });
        $('.slajd322 .video-player-show').css("display", "none");
        $('.slajd322 .close-video-in-full').css("display", "none");
    });
    $('.slajd322 .close-video').click(function () {
        $('.slajd322 .video1').css("right", "-350px");
    });

    $('.slajd322 .seven-two').addClass('animated slideInDown');

    if ($('.slajd322 #container12').length) {
        console.log($('.slajd322 #container12').length);
        var bar_50_8 = new ProgressBar.Circle(container12, {
            strokeWidth: 5,
            easing: 'linear',
            duration: 1800,
            color: '#d3258a',
            trailColor: '#FFF',
            trailWidth: 5,
            svgStyle: null
        });
    }

    if ($('.slajd322 #container12').length) {
        setTimeout(function () {
        bar_50_8.animate(0.8);
    }, 3200);
        setTimeout(function () {
            $('.slajd322 .ninety-num').animate({"opacity": "1"}, 400);
        }, 5000);
    }

    $('.slajd322 .ninety').removeAttr('id');

    if ($('.slajd322 #container13').length) {
        console.log($('.slajd322 #container13').length);
        var bar_50_9 = new ProgressBar.Circle(container13, {
            strokeWidth: 5,
            easing: 'linear',
            duration: 1800,
            color: '#23ece6',
            trailColor: '#FFF',
            trailWidth: 5,
            svgStyle: null
        });
    }

    if ($('.slajd322 #container13').length) {
        setTimeout(function () {
            bar_50_9.animate(0.74);
        }, 7200);

        setTimeout(function () {
            $('.slajd322 .seventy-num').animate({"opacity": "1"}, 400);
        }, 9000);
    }

    $('.slajd322 .seventy').removeAttr('id');

    if ($('.slajd322 #container14').length) {
        console.log($('.slajd322 #container14').length);
        var bar_50_10 = new ProgressBar.Circle(container14, {
            strokeWidth: 5,
            easing: 'linear',
            duration: 1800,
            color: '#2cb7ec',
            trailColor: '#FFF',
            trailWidth: 5,
            svgStyle: null
        });
    }

    if ($('.slajd322 #container14').length) {
        setTimeout(function () {
            bar_50_10.animate(0.5);
        }, 10200);
        setTimeout(function () {
            $('.slajd322 .fifty-num').animate({"opacity": "1"}, 400);
        }, 12000);
    }

    $('.slajd322 .fifty').removeAttr('id');
}

function AniamteSlide323() {
    setTimeout(function () {
        $('.slajd323 .pasek').addClass("pasek-show");
    }, 1000);
}
