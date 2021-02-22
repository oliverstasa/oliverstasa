/*
hello
prepare yourself
for trivial functions :D
*/



/*
search for written content
*/
$(document).on('keyup', '#terminal', function(e){

    var search = $(this).val();

    if (window.query != search || search == '') {

        // set checker for same input
        window.query = search;
        // chane the checker to prevent lag in a while
        setTimeout(function(){
            window.query = 'miluji svou Káju';
        }, 1000);

        // show loading of results
        $('#whisp').html('<span class="wait"><span>.</span><span>.</span><span>.</span></span>');

        // get the search results
        $.post('/1/php/console.php', {str: search}, function(res){

            try {

                var obj = JSON.parse(res);
                console.log(res);

                // preload obrazku
                if (obj.error) {

                    console.log('[Error] '+obj.error, res);

                } else if (obj.match == 1) {

                    $('#whisp').hide();
                    write(obj.res, search);

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

        if (comand == 'awesome') {
            step = Math.floor(Math.random()*50)+10;
        }
        
        // pass the comand
        log.append('<div class="log cmd" cmd="'+comand+'">›› '+comand+'</div>');
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

                        $('.log[pos="'+is+comand+'"]').last().html('› '+line);
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

    //write(['Loading terminal...', '0% .................... 100%', 'Ready.', 'Type [help] for command list.'], 'start');
    write(['Touch the terminal and pick a command, or:', 'Enter [help] for full command list.'], 'start');

});