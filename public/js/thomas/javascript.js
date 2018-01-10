// TO DO : mettre en variable les parametres et éviter les répétitions
// if possible remettre en JS et pas en JQuery

$(function(){
    //LOADING.....
    $("#parent").addClass("load");

    //FUNCTION HOME
    $("#pierre").mouseenter(function(){
      $("#ensemble").animate({
        opacity: 0
      },0, function() {
        // Callback
        $("#light1").animate({
          opacity: 1
        }, 0)
      });
    });

    $("#pierre").mouseleave(function(){
      $("#ensemble").animate({
        opacity: 1
      },0, function() {
        // Callback
        $("#light1").animate({
          opacity: 0
        }, 0)
      });
    });


    //FUNCTION HISTOIRE
    $("#catalogue").mouseenter(function(){
      $("#ensemble").animate({
        opacity: 0
      },0, function() {
        // Callback
        $("#light2").animate({
          opacity: 1
        }, 0)
      });
    });

    $("#catalogue").mouseleave(function(){
      $("#ensemble").animate({
        opacity: 1
      },0, function() {
        // Callback
        $("#light2").animate({
          opacity: 0
        }, 0)
      });
    });


    ///FUNCTION ADDRESS
    $("#histoire").mouseenter(function(){
      $("#ensemble").animate({
        opacity: 0
      },0, function() {
        // Callback
        $("#light3").animate({
          opacity: 1
        }, 0)
      });
    });

    $("#histoire").mouseleave(function(){
      $("#ensemble").animate({
        opacity: 1
      },0, function() {
        // Callback
        $("#light3").animate({
          opacity: 0
        }, 0)
      });
    });


    /// function philosph
    $("#philo").mouseenter(function(){
      $("#ensemble").animate({
        opacity: 0
      },0, function() {
        // Callback
        $("#light2").animate({
          opacity: 1
        }, 0)
      });
    });

    $("#philo").mouseleave(function(){
      $("#ensemble").animate({
        opacity: 1
      },0, function() {
        // Callback
        $("#light2").animate({
          opacity: 0
        }, 0)
      });
    });


    ///FUNCTION CONTACT
    $("#contact").mouseenter(function(){
      $("#ensemble").animate({
        opacity: 0
      },0, function() {
        // Callback
        $("#light4").animate({
          opacity: 1
        }, 0)
      });
    });

    $("#contact").mouseleave(function(){
      $("#ensemble").animate({
        opacity: 1
      },0, function() {
        // Callback
        $("#light4").animate({
          opacity: 0
        }, 0)
      });
    });
  /// END




 /// ANIMATION DES CADRES

    $("#pierre").mouseenter(function(){
      $("#pierrephoto").addClass("wobble");
      $("#pierretext").animate({
        opacity: 1
      });
    });
      
    $("#pierre").mouseleave(function(){
      $("#pierrephoto").removeClass("wobble");
      $("#pierretext").animate({
        opacity:0
      });        
    });


    $("#contact").mouseenter(function(){
      $("#telephone").addClass("phonecall");
      $("#contacttext").animate({
        opacity:1
      }); 
    });

    $("#contact").mouseleave(function(){
      $("#telephone").removeClass("phonecall");
      $("#contacttext").animate({
        opacity:0
      });  
    });


    $("#catalogue").mouseenter(function(){
      $("#label").addClass("wobble");
        $("#prodtext").animate({
          opacity:1
        }); 
      });

    $("#catalogue").mouseleave(function(){
      $("#label").removeClass("wobble");
      $("#prodtext").animate({
        opacity:0
      });  
    });


    $("#philo").mouseenter(function(){
      $("#savoirfaire").addClass("wobble");
      $("#philostext").animate({
        opacity:1
      }); 
    });

    $("#philo").mouseleave(function(){
      $("#savoirfaire").removeClass("wobble");
      $("#philostext").animate({
        opacity:0
      });  
    });


    $("#histoire").mouseenter(function(){
      $("#adress-boutiques").addClass("wobble");
      $("#boutitext").animate({
        opacity:1
      }); 
    });

    $("#histoire").mouseleave(function(){
      $("#adress-boutiques").removeClass("wobble");
      $("#boutitext").animate({
        opacity:0
      });  
    });


    $("#actu").mouseenter(function(){
      $(".clock").addClass("wobble");
      $("#actutext").animate({
        opacity:1
      }); 
    });

    $("#actu").mouseleave(function(){
      $(".clock").removeClass("wobble");
      $("#actutext").animate({
        opacity:0
      });  
    });




/// CLOCK

  var oClockAnalog = {
    aSecond:         [],
    dtDate:          new Date(),
    iCurrSecond:     -1,
    iHourRotation:   -1,
    iMinuteRotation: -1,
    iStepSize:       10,
    iTimerAnimate:   setInterval("oClockAnalog.fAnimate()", 20),
    iTimerUpdate:    setInterval("oClockAnalog.fUpdate()", 1000),

    fAnimate:       function() {
        if (this.aSecond.length > 0) {
            this.fRotate("analogsecond", this.aSecond[0]);
            this.aSecond = this.aSecond.slice(1);
        }
    },
    fGetHour:     function() {
        var iHours = this.dtDate.getHours();
        if (iHours > 11) {
            iHours -= 12;
        }
        return Math.round((this.dtDate.getHours() * 30) + (this.dtDate.getMinutes() / 2) + (this.dtDate.getSeconds() / 120));
    },
    fGetMinute:     function() {
        return Math.round((this.dtDate.getMinutes() * 6) + (this.dtDate.getSeconds() / 10));
    },
    fInit:          function() {
        this.iHourRotation = this.fGetHour();
        this.fRotate("analoghour", this.iHourRotation);

        this.iMinuteRotation = this.fGetMinute();
        this.fRotate("analogminute", this.iMinuteRotation);

        this.iCurrSecond = this.dtDate.getSeconds();
        this.fRotate("analogsecond", (6 * this.iCurrSecond));
    },
    fRotate:        function(sID, iDeg) {
        var sCSS = ("rotate(" + iDeg + "deg)");
        $("#" + sID).css({ '-moz-transform': sCSS, '-o-transform': sCSS, '-webkit-transform': sCSS });
    },
    fStepSize:     function(iTo, iFrom) {
        var iAnimDiff = (iFrom - iTo);
        if (iAnimDiff > 0) {
            iAnimDiff -= 360;
        }
        return iAnimDiff / this.iStepSize;
    },
    fUpdate:        function() {
        // update time
        this.dtDate = new Date();

        // hours
        var iTemp = this.fGetHour();
        if (this.iHourRotation != iTemp) {
            this.iHourRotation = iTemp;
            this.fRotate("analoghour", iTemp);
        }

        // minutes
        iTemp = this.fGetMinute();
        if (this.iMinuteRotation != iTemp) {
            this.iMinuteRotation = iTemp;
            this.fRotate("analogminute", iTemp);
        }

        // seconds
        // if (this.iCurrSecond != this.dtDate.getSeconds()) {
        //     var iRotateFrom = (6 * this.iCurrSecond);
        //     this.iCurrSecond = this.dtDate.getSeconds();
        //     var iRotateTo = (6 * this.iCurrSecond);

        //     // push steps into array
        //     var iDiff = this.fStepSize(iRotateTo, iRotateFrom);
        //     for (var i = 0; i < this.iStepSize; i++) {
        //         iRotateFrom -= iDiff;
        //         this.aSecond.push(Math.round(iRotateFrom));
        //     }
        // }
    }
  };







});