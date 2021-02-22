// document .on
$(document).on('click', '.anotherone', function() {
    $("#talker").html('<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>');
    $("#talker").load('create.php', function(){});
});

// document.onload functions
$(document).ready(function() {
    $(window).load(function() {

        // bot
        $("#listener").focus();

          //var safety = setTimeout(function(){writeme('yes, you really have to type "help"<br>› this is a command line joke<br>› and yes, i also make videos')}, 4000);

        $.savedshit = {write: false};
        $("#listener").keyup(function() {
            //clearTimeout(safety);
            var read = $("#listener").val().toLowerCase();
            if (read.match(/(help)/)) {writeme('contact ... email adress<br>› check ... my facebook<br>› tech ... i can do<br>› refs ... i worked for<br>› ic ... tax identification num<br>› draw ... visualy generates geometric equation<br>› awesome ... will make you awesome');} else /* › gear ... tools i recommend for photography<br> */ /* <br>›<br>› help ... always gets you back here */
            if (read.match(/(contact|email|mail|write)/)) {writeme('oliver.stasa@gmail.com');} else
            if (read.match(/(horse|lookatmyhorse)/)) {writeme('it´s amazing');} else
            if (read.match(/(hello|hi|what)/)) {writeme('hello!<br>›<br>› type help for command list');} else
            if (read.match(/(ico|ic|legal)/)) {writeme('0888 3793');} else
            if (read.match(/(tech)/)) {writeme('fullstack, frontend, backend, coding, architecture, ux, ui<br>› PHP, Doctrine ORM, MySQL, JS, jQ, ajax, CSS, HTML<br>› GIT, w/ VScode or Atom<br>› server setup, ISP, linux<br>› paygates<br>›<br>› dop, 1st ac, 2nd ac, grader<br>› ARRI, RED, BM, SONY, AATON, Bolex, DSLRs, Atomos, Ronin, etc.<br>› <br>› Adobe, DaVinci Resolve<br>›<br>› Hotline Miami (A+)');} else
            if (read.match(/(draw)/)) {loadme('draw');} else
            if (read.match(/(look)/)) {loadme('look');} else
            if (read.match(/(awesome)/)) {loadme('awesome');} else
            if (read.match(/(video)/)) {loadme('video');} else
            if (read.match(/(refs)/)) {writeme('WEB — w/ Petr Chalupa — StaCha.dev — w/ Alina Matějová<br>› gizmo-lab.com, cerna-skrinka.cz, siaspasse.com, famufest.cz, alesfiala.com, migrace.phil.muni.cz, …<br>›<br>› FILM — PHOTO & VIDEO — TECHNICIAN<br>› IBM, FAMU, ČT, 13ka, Radim Procházka, Redlooks, author films...<br>› Kino ART, TIC Brno, Obligod, Ji-hlava, Anifilm, Žižkovská noc, trailers, music clips, making-of, reports, …');} else
            if (read.match(/(exit|dir|cd)/)) {writeme('have you played "memory of broken dimension"?<br>› if not, you should!<br>› do not forget to come back here - to dive');} else
            if (read.match(/(dive|remote|voidscan)/)) {writeme('ok, so you played MOBD!<br>› ...................<br>› remote<br>› ...................<br>› voidscan<br>› ...................<br>› ...................<br>› ...................<br>› diving now'); setTimeout(function(){$("#plate").addClass('shake');}, 1000); $("#plate").delay(2000).slideUp(5000, function(){$("#plate").removeClass('shake'); writeme(''); $("#plate").delay(2000).slideDown(500, function(){writeme('system safety preformed reset<br>› continue with HELP command');});});} else
            if (read.match(/(check|fb)/)) {writeme('facebook.com/oliver.stasa');} else
            if (read.match(/(bubi)/)) {writeme('miluji bubínka');} else
            if (read.match(/(kokot)/)) {writeme('megadebil hovno');}
        });

        // if (read.match(/(refs)/)) {writeme('mostly work with Petr Chalupa and Alina Matějová<br>›<br>› Aleš Fiala<br>› Famufest ´18<br>› Sias Passé<br>› High edition<br>› Martin Konvička, Fox Territory<br>› TIC Brno, kino ART, Brněnská 16, Open House Brno<br>› Hitpoint, eSuba<br>› Redlooks PRODUCTION, Tvision, Barandov, Petra Pechánková, Filmondo, Radim Procházka prod.<br>› Ji-hlava, Anifilm<br>› Fresh Labels, Redbull, Jägermeister<br>› Gamer Pie, Putovní foťák, Steam decider<br>› mm cité, Scheaffler, Starobrno<br>› Boby-centrum, Plesy Brno, Jump Park, Wannado, Fléda<br>› nadace EMIL, TEDx Brno, ELSA law assoc., Bird and Bird, FEG tourist assoc., Wilfried Martens Centre<br>› Majáles (official), Studentský majáles, Utubering<br>› Masarykova univerzita, FF MU, Migrace a menšiny, PRF MU, FSS MU, ECIP, MJUNI<br>› ZZahora, Lahvisz+Cerevatov, Vietnamské bagety, Stará Pekárna, Po lidech a strojích, OLD KIDS, ...<br>');}

        // bot writer
        function writeme(text){
          var windowSize = {w: $(window).width(),
                            h: $(window).height()};
           if (!$.savedshit.write) {
           $.savedshit.write = true;
           if ($("#talker").html() != '› '+text) {
             $("#talker").html('› ');
             var i = 0; var textr = text.split("");
             $(textr).each(function(index){
                var inlet = textr[i];
                  if (inlet == "<") {
                    var nextpos = textr.indexOf(">", i);
                    var tag = inlet;
                    for (j=i+1; j<=nextpos; j++) {
                       tag = tag+textr[j];
                    }
                    inlet = tag;
                    i = j-1;
                  }
                setTimeout(function(){
                  $("#talker").append(inlet);
                  if (windowSize.w < windowSize.h) {
                    window.scrollTo(0,document.body.scrollHeight);
                  }
                }, i*5);
                i++;
             });
           }
           setTimeout(function(){
            $.savedshit.write = false;
            $("#listener").val("");
           }, i*5);
           }
        }

        // draw for console
        function loadme(type) {
          if (type == "draw" && $("#talker").html().substring(0, 9) != '<creator>') {
            $("#talker").slideUp(100, function(){
               $("#talker").css({opacity: 0});
               $("#talker").load('create.php', function(){
                  $("creator").css({display: "block"});
                  $("#talker").slideDown(100, function(){
                      $("#talker").animate({opacity: 1}, 500);
                      $("#listener").val("");
                  });
               });
            });
          } else if (type == "awesome" && $("#talker").html().substring(0, 13) != '› please hold') {
             writeme('please hold<br>› you\'re about to become awesome...');
               var width = screen.width;
               var height = screen.height;
               var w = 500;
               var h = 300;
               var left = ((width / 2) - (w / 2));
               var top = ((height / 2) - (h / 2));
             setTimeout(function(){
               $("#listener").val("");
               window.open("https://www.oliverstasa.cz/awesomer/", "Awesomer", 'scrollbars=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
             }, 1000);
          } else if (type == 'video' && $("#talker").html().substring(0, 10) != '<videator>') {
            writeme('no it doesn\'t work like this');
          } else if (type == 'look' && $("#talker").html().substring(0, 10) != '<looooook>') {
            writeme('no it doesn\'t work yet');
            /*
            $("#talker").slideUp(100, function(){
               $("#talker").css({opacity: 0});
               $("#talker").load('look.php', function(){
                  $("#talker").slideDown(100, function(){
                      $("#talker").animate({opacity: 1}, 500);
                      $("#listener").val("");

                      var video = document.getElementById('video');
                      if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                          navigator.mediaDevices.getUserMedia({video: true}).then(function(stream) {
                              video.srcObject = stream;
                              video.play();
                          });

                          var canvas = document.getElementById('canvas');
                          var context = canvas.getContext('2d');
                          context.drawImage(video, 0, 0, 640, 480);
                      }

                  });
               });
            });
          */
          }
        }

  });
});
