/*
hello
prepare yourself
for trivial functions :D
and a identifier! :D
*/



/*
import grabber, my old friend
*/
// import './grabber.js';



/*
on content load or popstate (browser navig)
*/
$(window).on('load popstate', function(){

    // adress from bar
    var url = window.location.pathname;
    url = url.substr(1);

    // set url
    if (url && url != 'stop') {

        setTimeout(function(){
            newUrl(url);
            $('#terminal').val(url).trigger('keyup');
        }, 2000);

    }  
  
});



/*
craft new url
*/
function newUrl(url) {

    // craft new url adress
    var newUrl = location.protocol+'//'+location.host+'/'+url,
        docTitle = 'Oliver Staša /'+url;

    // set tab title
    document.title = docTitle;
    // set url in adress bar
    window.history.pushState("object or array", docTitle, newUrl);

}



/*
search for written content
*/
$(document).on('keyup', '#terminal', function(e){

    var search = $(this).val().toLowerCase(),
        key = e.keyCode || e.which;

    // if enter or arrow down
    if ($('#terminal').is(':focus') && $('#whisp').is(':visible') && $('.whisp').length && (key == 13 || key == 40)) {
        
        // prevent default action
        e.preventDefault();
        // put top whip value to terminal and run it
        $('#terminal').val($('.whisp').first().attr('str')).trigger('keyup');

    // if not duplicite search
    } else if (window.query != search || search == '') {

        // set checker for same input
        window.query = search;
        // chane the checker to prevent lag in a while
        setTimeout(function(){
            window.query = 'Kája Nováková 4ever';
        }, 500);

        // show loading of results
        $('#whisp').html('<span class="wait"><span>.</span><span>.</span><span>.</span></span>');

        // get the search results
        $.post('../php/console.php', {str: search}, function(res){

            try {

                var obj = JSON.parse(res);
                //console.log(res);

                // preload obrazku
                if (obj.error) {

                    console.log('[Error] '+obj.error, res);

                } else if (obj.match == 1) {

                    $('#whisp').hide();

                    // set url
                    if (search != 'stop') {
                        newUrl(search);
                    }
                    
                    // write down result (important)
                    write(obj.res, search);

                    // call for action (important)
                    content(obj.action);

                } else if (obj.match == 2) {

                    whisp(obj.res);

                } else {

                    var whisper = '',
                        lim = 5;
                    $(obj.res).each(function(i, el) {
                        if (i < lim) {
                            whisper += '<div class="whisp" str="'+el+'">› '+el+'</div>';
                        } else if (i == lim) {
                            whisper += '...';
                        }
                    });
                    whisp(whisper);

                }

            } catch (e) {

                console.log(e, res);

            }

        });

    }

});



/*
write to log
*/
function write(str, comand) {

    //if ($('.cmd').last().attr('cmd') != comand) {

        var i = 0,
            step = 10,
            log = $('#log');
        
        // pass the comand
        if (comand != false) {
            log.append('<div class="log cmd" cmd="'+comand+'">› '+comand+'</div>');
        }
        if (comand == 'awesome') {
            step = 50;
        }
        // remove comand from terminal
        $('#terminal').val(''); //.blur();

        // start writing for each element in array
        $(str).each(function(is){

            // create row
            setTimeout(function(){
                log.append('<div class="log" pos="'+is+comand+'"></div>');
            }, i*step);
            
            // turn str to array
            var text = str[is],
                limit = text.length,
                char = true,
                ix = 0;
            
            // write out the str  by char
            while (ix <= limit) {

                    let line = text.slice(0, ix++);
                    char = text.slice(ix-1, ix);

                    if (char == "<") {
                        
                        var tagEnd = text.indexOf('>', ix)+1;
                        line = text.slice(0, tagEnd);
                        ix = tagEnd;

                    }

                    setTimeout(function(){

                        $('.log[pos="'+is+comand+'"]').last().html('<span>›</span> '+line);
                        log.scrollTop($('#log')[0].scrollHeight);

                    }, i*step);

                    i++;

            }

        });

    //}

}



/*
write to whisper
*/
function whisp(str) {


    var whisp = $('#whisp');

    whisp.html(str);

    if (!whisp.is(':visible')) {
        whisp.show();
    }

}



/*
hide whispers on blur
*/
$(document).on('click', function(e){
    
    if (!$(e.target).hasClass('whisp') && $(e.target).attr('id') != 'terminal') {
        $('#whisp').hide();
    }

});



/*
show whispers on focus
*/
$(document).on('focus', '#terminal', function(){
    
    $(this).trigger('keyup');

});



/*
enter whisper on click
*/
$(document).on('click', '.whisp', function(){
    
    var whisp = $(this),
        str = whisp.attr('str');

    $('#terminal').val(str).trigger('keyup');

});


/*
on load
*/
$(window).on('load', function(){

    write(['Touch the terminal and pick a command, or:', 'Enter [help] for full command list.'], 'start');

});


/*
camera list = change source
*/
$(document).on('change', '.camList', function(){
    alert('a');
});


/*
content switch
*/
function content(content) {

    // stop webcaming
    stopWebcam();
    // remove all plugins
    $('.plugin').remove();



    switch (content) {



        case 'webcam':
        
            // add script if not exist
            if (!$('#webcam').length) {

                window.webcamRuns = true;

                // load webcam module + load speach modul
                if (!$('script[src="./js/webcam.js"]').length) {
                    $('head').append('<script type="text/javascript" src="./js/webcam.js"></script>');
                    $('head').append('<script type="text/javascript" src="./js/talkify.js"></script>');
                }

                $('#content').append('<div id="webcam" class="plugin"></div><div class="button stop plugin">[quit]</div><!--<div class="plugin"><select class="camList"></select></div>-->');
                
                // vars
                var win = {'h': $(window).height(),
                           'w': $(window).width()},
                    wDim = {'vh': win.h/100,
                            'vw': win.w/100},
                    camSize = {'h': win.h/16*9-6*wDim.vh,
                                'w': win.w/2-6*wDim.vh};

                if (!window.facingCam) {
                    if (win.h > win.w) {
                        window.facingCam = 'environment';
                        window.facingCam = 1;
                    } else {
                        window.facingCam = 'user';
                        window.facingCam = 0;
                    }
                }

                window.webcamTests = 0;

                // if phone = diferent dimensions
                if (win.h > win.w) {
                    camSize = {'h': win.h/2.5-6*wDim.vh, 'w': win.w-6*wDim.vh};
                }

                // get cameras
                var cam = new Array(),
                    d = 0;

                    
                navigator.mediaDevices.enumerateDevices().then(function(devices) {
                    devices.forEach(function(device) {
                        if (device.kind === "videoinput") {
                            cam[d]= device.deviceId;
                            console.log(cam[d]);
                            //$('.camList').append('<option name="'+d+'">'+device.label+'</option>');
                            d++;
                        }
                    });
                });

                var useCamera = cam[cam.length-1];

                // start the webcam
                Webcam.set({
                    width: camSize.w,
                    height: camSize.h,
                    image_format: 'jpeg',
                    jpeg_quality: 90,
                    sourceId: useCamera
                    // constraints: {facingMode: {exact: window.facingCam}}
                });
                Webcam.attach('#webcam');

                // set deepai api key
                deepai.setApiKey('c8e2a097-f03c-40d6-a24f-8151064685d1');

                // start the talkify
                talkify.config.remoteService.host = 'https://talkify.net';
                talkify.config.remoteService.apiKey = 'c083a1e5-aa7e-4cb1-8952-dd89a7c20263'; // 46b32f4e-6b73-40ee-8ae1-4a17cb1b18f6 ?
                talkify.config.ui.audioControls = {enabled: false};

                    // hide the head and show the webcam
                    $('#face').hide()
                    $('#webcam').show();
                            
                    // on error = no camera
                    Webcam.on('error', function(err) {
                        
                        if (!window.webcamErr) {

                            window.webcamErr = true;

                            // tells you you have no camera... thx
                            setTimeout(function(){

                                write(['[!] <i>Your device has no "'+window.facingCam+'" camera, which is requied in order for this function to see.</i>'], 'error');
                                console.log(err);
                                
                                // hard stop
                                setTimeout(function(){
                                    hardStop();
                                    window.webcamErr = false;
                                }, 1000);

                            }, 1000);

                        }

                    });
                           
                    // on live = camera is running
                    Webcam.on('live', function() {

                        if (!window.webcamIdentify) {
                        window.webcamIdentify = true;

                            write(['Running.'], false);

                            // hard stop safety after time
                            window.identifySafety = setTimeout(function(){
                                write(['[!] <i>5 minutes?! Really?</i>'], 'error → suspicious');
                                    setTimeout(function(){
                                        hardStop();
                                    }, 1000);
                            }, 1000*60*5);

                            // start taking pics
                            window.identify = setInterval(function i(){

                                Webcam.snap(function(data) {

                                    Webcam.upload(data, './php/upload.php', function(e, url) {
                                        
                                        if (url != 'error') {
                                            
                                            (async function() {
                                                var resp = await deepai.callStandardApi('neuraltalk', {
                                                    image: 'https://oliverstasa.cz/data/webcam/'+url,
                                                });
                                                
                                                window.webcamIdentify = false;

                                                var output = resp.output.substr(0, resp.output.length-1),
                                                    talk = new talkify.TtsPlayer();

                                                if ($('.cmd').last().attr('cmd') == 'identify') {
                                                    write(['<i>'+output+'</i>'], false);
                                                    talk.playText(output);
                                                }

                                            })();

                                        }

                                    });

                                });

                                return i;

                            }(), 4000);

                        }

                    });

            } else {

                write(['[App already running, so...]'], false);

            }

        break;



        case 'draw':

            $.post('../php/draw.php', function(res){

                if (!$('#draw').length) {

                    $('#content').append('<div id="draw" class="plugin"></div><div class="button anotherDraw plugin">[another one]</div>');
                    
                    // hade the head and show the webcam
                    $('#face').hide()
                    $('#draw').show();

                }

                try {
                    
                    var obj = JSON.parse(res);

                    write([obj.name], false);
                    $('#draw').html(obj.body);
                
                } catch (e) {

                    console.log(e, res);

                }

            });

        break;


        
        case 'noexit':

            //model.scale = '2 2 2';
            //model.orientation = '0deg 0deg 0deg';
            window.close();

        break;



        default:

            // show the head again
            if ($('#face').is(':hidden')) {
                $('.plugin').remove();
                $('#face').show();
            }

        break;

    }



}



/*
safety to stop webcam
*/
$(window).on('blur', function(){

    if ($('#webcam').length) {
        hardStop();
    }

});



/*
stop webcam
*/
function stopWebcam() {

    if (window.webcamRuns) {
        clearInterval(window.identify);
        clearTimeout(window.identifySafety);
        Webcam.reset();
        window.webcamRuns = false;
    }

}



/*
hard stop everything
*/
function hardStop() {
    $('#terminal').val('stop').trigger('keyup');
}



/*
quit webcam
*/
$(document).on('touch click', '.stop', function(){
    hardStop();
});



/*
another draw
*/
$(document).on('touch click', '.anotherDraw', function(){
    $('#terminal').val('draw').trigger('keyup');
});



/*
keyboard shortcuts
*/
$(document).on('keydown', function(e){

    var key = e.keyCode || e.which;

    // switch key
    switch(key) {

        // esc
        case 27:
            if ($('.cmd').last().attr('cmd') != 'stop' && !$('#terminal').is(':focus')) {
                hardStop();
                e.preventDefault();
            }
        break;

        // f1
        case 112:
            $('#terminal').val('help').trigger('keyup');
            e.preventDefault();
        break;

    }
        
});
        