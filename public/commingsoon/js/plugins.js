

!function(t,e){var s=e.document;t.fn.share=function(i){var r={init:function(i){this.share.settings=t.extend({},this.share.defaults,i);var r=(this.share.settings,this.share.settings.networks),o=this.share.settings.theme,a=this.share.settings.orientation,u=this.share.settings.affix,h=this.share.settings.margin,l=this.share.settings.title||t(s).attr("title"),c=this.share.settings.urlToShare||t(location).attr("href"),p="";return t.each(t(s).find('meta[name="description"]'),function(e,s){p=t(s).attr("content")}),this.each(function(){var s,i=t(this),m=i.attr("id"),d=encodeURIComponent(c),f=l.replace("|",""),g=p.substring(0,250);r.forEach(function(e){s=n.networkDefs[e].url,s=s.replace("|u|",d).replace("|t|",f).replace("|d|",g).replace("|140|",f.substring(0,130)),t("<a href='"+s+"' title='Share this page on "+e+"' class='pop share-"+o+" share-"+o+"-"+e+"'></a>").appendTo(i)}),t("#"+m+".share-"+o).css("margin",h),"horizontal"!=a?t("#"+m+" a.share-"+o).css("display","block"):t("#"+m+" a.share-"+o).css("display","inline-block"),"undefined"!=typeof u&&(i.addClass("share-affix"),-1!=u.indexOf("right")?(i.css("left","auto"),i.css("right","0px"),-1!=u.indexOf("center")&&i.css("top","40%")):-1!=u.indexOf("left center")&&i.css("top","40%"),-1!=u.indexOf("bottom")&&(i.css("bottom","0px"),i.css("top","auto"),-1!=u.indexOf("center")&&i.css("left","40%"))),t(".pop").click(function(){return e.open(t(this).attr("href"),"t","toolbar=0,resizable=1,status=0,width=640,height=528"),!1})})}},n={networkDefs:{facebook:{url:"http://www.facebook.com/share.php?u=|u|"},twitter:{url:"https://twitter.com/share?via=in1.com&text=|140|"},linkedin:{url:"http://www.linkedin.com/shareArticle?mini=true&url=|u|&title=|t|&summary=|d|&source=in1.com"},in1:{url:"http://www.in1.com/cast?u=|u|",w:"490",h:"529"},tumblr:{url:"http://www.tumblr.com/share?v=3&u=|u|"},digg:{url:"http://digg.com/submit?url=|u|&title=|t|"},googleplus:{url:"https://plusone.google.com/_/+1/confirm?hl=en&url=|u|"},reddit:{url:"http://reddit.com/submit?url=|u|"},pinterest:{url:"http://pinterest.com/pin/create/button/?url=|u|&media=&description=|d|"},posterous:{url:"http://posterous.com/share?linkto=|u|&title=|t|"},stumbleupon:{url:"http://www.stumbleupon.com/submit?url=|u|&title=|t|"},email:{url:"mailto:?subject=|t|"}}};return r[i]?r[i].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof i&&i?void t.error('Method "'+i+'" does not exist in social plugin'):r.init.apply(this,arguments)},t.fn.share.defaults={networks:["in1","facebook","twitter","linkedin"],theme:"icon",autoShow:!0,margin:"3px",orientation:"horizontal",useIn1:!0},t.fn.share.settings={}}(jQuery,window);

/**
 *  Parallax Scrolling Library
 *
 */

// appear
(function($){$.fn.appear=function(f,o){var s=$.extend({one:true},o);return this.each(function(){var t=$(this);t.appeared=false;if(!f){t.trigger('appear',s.data);return;}var w=$(window);var c=function(){if(!t.is(':visible')){t.appeared=false;return;}var a=w.scrollLeft();var b=w.scrollTop();var o=t.offset();var x=o.left;var y=o.top;if(y+t.height()>=b&&y<=b+w.height()&&x+t.width()>=a&&x<=a+w.width()){if(!t.appeared)t.trigger('appear',s.data);}else{t.appeared=false;}};var m=function(){t.appeared=true;if(s.one){w.unbind('scroll',c);var i=$.inArray(c,$.fn.appear.checks);if(i>=0)$.fn.appear.checks.splice(i,1);}f.apply(this,arguments);};if(s.one)t.one('appear',s.data,m);else t.bind('appear',s.data,m);w.scroll(c);$.fn.appear.checks.push(c);(c)();});};$.extend($.fn.appear,{checks:[],timeout:null,checkAll:function(){var l=$.fn.appear.checks.length;if(l>0)while(l--)($.fn.appear.checks[l])();},run:function(){if($.fn.appear.timeout)clearTimeout($.fn.appear.timeout);$.fn.appear.timeout=setTimeout($.fn.appear.checkAll,20);}});$.each(['append','prepend','after','before','attr','removeAttr','addClass','removeClass','toggleClass','remove','css','show','hide'],function(i,n){var u=$.fn[n];if(u){$.fn[n]=function(){var r=u.apply(this,arguments);$.fn.appear.run();return r;}}});})(jQuery);

/**
 * Single Page Nav Plugin
 * Copyright (c) 2014 Chris Wojcik <hello@chriswojcik.net>
 * Dual licensed under MIT and GPL.
 * @author Chris Wojcik
 * @version 1.2.0
 */




// count
(function($){$.fn.countTo=function(options){options=options||{};return $(this).each(function(){var settings=$.extend({},$.fn.countTo.defaults,{from:$(this).data('from'),to:$(this).data('num'),speed:$(this).data('speed'),refreshInterval:$(this).data('refresh-interval'),decimals:$(this).data('decimals')},options);var loops=Math.ceil(settings.speed/settings.refreshInterval),increment=(settings.to-settings.from)/loops;var self=this,$self=$(this),loopCount=0,value=settings.from,data=$self.data('countTo')||{};$self.data('countTo',data);if(data.interval){clearInterval(data.interval)}data.interval=setInterval(updateTimer,settings.refreshInterval);render(value);function updateTimer(){value+=increment;loopCount++;render(value);if(typeof(settings.onUpdate)=='function'){settings.onUpdate.call(self,value)}if(loopCount>=loops){$self.removeData('countTo');clearInterval(data.interval);value=settings.to;if(typeof(settings.onComplete)=='function'){settings.onComplete.call(self,value)}}}function render(value){var formattedValue=settings.formatter.call(self,value,settings);$self.text(formattedValue)}})};$.fn.countTo.defaults={from:0,to:0,speed:2500,refreshInterval:100,decimals:0,formatter:formatter,onUpdate:null,onComplete:null};function formatter(value,settings){return value.toFixed(settings.decimals)}}(jQuery));




/*********************************************************************
*  #### Twitter Post Fetcher v17.0.3 ####
*  Coded by Jason Mayes 2015. A present to all the developers out there.
*  www.jasonmayes.com
*  Please keep this disclaimer with my code if you use it. Thanks. :-)
*  Got feedback or questions, ask here:
*  http://www.jasonmayes.com/projects/twitterApi/
*  Github: https://github.com/jasonmayes/Twitter-Post-Fetcher
*  Updates will be posted to this site.
*********************************************************************/




//nice filter


(function($) {

    $.fn.niceSelect = function(method) {

        // Methods
        if (typeof method == 'string') {
            if (method == 'update') {
                this.each(function() {
                    var $select = $(this);
                    var $dropdown = $(this).next('.nice-select');
                    var open = $dropdown.hasClass('open');

                    if ($dropdown.length) {
                        $dropdown.remove();
                        create_nice_select($select);

                        if (open) {
                            $select.next().trigger('click');
                        }
                    }
                });
            } else if (method == 'destroy') {
                this.each(function() {
                    var $select = $(this);
                    var $dropdown = $(this).next('.nice-select');

                    if ($dropdown.length) {
                        $dropdown.remove();
                        $select.css('display', '');
                    }
                });
                if ($('.nice-select').length == 0) {
                    $(document).off('.nice_select');
                }
            } else {
                console.log('Method "' + method + '" does not exist.')
            }
            return this;
        }

        // Hide native select
        this.hide();

        // Create custom markup
        this.each(function() {
            var $select = $(this);

            if (!$select.next().hasClass('nice-select')) {
                create_nice_select($select);
            }
        });

        function create_nice_select($select) {
            $select.after($('<div></div>')
                .addClass('nice-select')
                .addClass($select.attr('class') || '')
                .addClass($select.attr('disabled') ? 'disabled' : '')
                .addClass($select.attr('multiple') ? 'has-multiple' : '')
                .attr('tabindex', $select.attr('disabled') ? null : '0')
                .html($select.attr('multiple') ? '<span class="multiple-options"></span><div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."/></div><ul class="list"></ul>' : '<span class="current"></span><div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."/></div><ul class="list"></ul>')
            );

            var $dropdown = $select.next();
            var $options = $select.find('option');
            if ($select.attr('multiple')) {
                var $selected = $select.find('option:selected');
                var $selected_html = '';
                $selected.each(function() {
                    $selected_option = $(this);
                    $selected_text = $selected_option.data('display') ||  $selected_option.text();
                    $selected_html += '<span class="current">' + $selected_text + '</span>';
                });
                $select_placeholder = $select.data('placeholder') || $select.attr('placeholder');
                $select_placeholder = $select_placeholder == '' ? 'Select' : $select_placeholder;
                $selected_html = $selected_html == '' ? $select_placeholder : $selected_html;
                $dropdown.find('.multiple-options').html($selected_html);
            } else {
                var $selected = $select.find('option:selected');
                $dropdown.find('.current').html($selected.data('display') ||  $selected.text());
            }


            $options.each(function(i) {
                var $option = $(this);
                var display = $option.data('display');

                $dropdown.find('ul').append($('<li></li>')
                    .attr('data-value', $option.val())
                    .attr('data-display', (display || null))
                    .addClass('option' +
                        ($option.is(':selected') ? ' selected' : '') +
                        ($option.is(':disabled') ? ' disabled' : ''))
                    .html($option.text())
                );
            });
        }

        /* Event listeners */

        // Unbind existing events in case that the plugin has been initialized before
        $(document).off('.nice_select');

        // Open/close
        $(document).on('click.nice_select', '.nice-select', function(event) {
            var $dropdown = $(this);

            $('.nice-select').not($dropdown).removeClass('open');
            $dropdown.toggleClass('open');

            if ($dropdown.hasClass('open')) {
                $dropdown.find('.option');
                $dropdown.find('.nice-select-search').val('');
                $dropdown.find('.nice-select-search').focus();
                $dropdown.find('.focus').removeClass('focus');
                $dropdown.find('.selected').addClass('focus');
                $dropdown.find('ul li').show();
            } else {
                $dropdown.focus();
            }
        });

        $(document).on('click', '.nice-select-search-box', function(event) {
            event.stopPropagation();
            return false;
        });


        // Close when clicking outside
        $(document).on('click.nice_select', function(event) {
            if ($(event.target).closest('.nice-select').length === 0) {
                $('.nice-select').removeClass('open').find('.option');
            }
        });

        // Option click
        $(document).on('click.nice_select', '.nice-select .option:not(.disabled)', function(event) {
            var $option = $(this);
            var $dropdown = $option.closest('.nice-select');
            if ($dropdown.hasClass('has-multiple')) {
                if ($option.hasClass('selected')) {
                    $option.removeClass('selected');
                } else {
                    $option.addClass('selected');
                }
                $selected_html = '';
                $selected_values = [];
                $dropdown.find('.selected').each(function() {
                    $selected_option = $(this);
                    var text = $selected_option.data('display') ||  $selected_option.text()
                    $selected_html += '<span class="current">' + text + '</span>';
                    $selected_values.push($selected_option.data('value'));
                });
                $select_placeholder = $dropdown.prev('select').data('placeholder') || $dropdown.prev('select').attr('placeholder');
                $select_placeholder = $select_placeholder == '' ? 'Select' : $select_placeholder;
                $selected_html = $selected_html == '' ? $select_placeholder : $selected_html;
                $dropdown.find('.multiple-options').html($selected_html);
                $dropdown.prev('select').val($selected_values).trigger('change');
            } else {
                $dropdown.find('.selected').removeClass('selected');
                $option.addClass('selected');
                var text = $option.data('display') || $option.text();
                $dropdown.find('.current').text(text);
                $dropdown.prev('select').val($option.data('value')).trigger('change');
            }
        });

        // Keyboard events
        $(document).on('keydown.nice_select', '.nice-select', function(event) {
            var $dropdown = $(this);
            var $focused_option = $($dropdown.find('.focus') || $dropdown.find('.list .option.selected'));

            // Space or Enter
            if (event.keyCode == 32 || event.keyCode == 13) {
                if ($dropdown.hasClass('open')) {
                    $focused_option.trigger('click');
                } else {
                    $dropdown.trigger('click');
                }
                return false;
                // Down
            } else if (event.keyCode == 40) {
                if (!$dropdown.hasClass('open')) {
                    $dropdown.trigger('click');
                } else {
                    var $next = $focused_option.nextAll('.option:not(.disabled)').first();
                    if ($next.length > 0) {
                        $dropdown.find('.focus').removeClass('focus');
                        $next.addClass('focus');
                    }
                }
                return false;
                // Up
            } else if (event.keyCode == 38) {
                if (!$dropdown.hasClass('open')) {
                    $dropdown.trigger('click');
                } else {
                    var $prev = $focused_option.prevAll('.option:not(.disabled)').first();
                    if ($prev.length > 0) {
                        $dropdown.find('.focus').removeClass('focus');
                        $prev.addClass('focus');
                    }
                }
                return false;
                // Esc
            } else if (event.keyCode == 27) {
                if ($dropdown.hasClass('open')) {
                    $dropdown.trigger('click');
                }
                // Tab
            } else if (event.keyCode == 9) {
                if ($dropdown.hasClass('open')) {
                    return false;
                }
            }
        });
        $(document).on('keydown.nice-select-search', '.nice-select', function() {
            var $self = $(this);
            var $text = $self.find('.nice-select-search').val();
            var $options = $self.find('ul li');
            if ($text == '')
                $options.show();
            else if ($self.hasClass('open')) {
                $text = $text.toLowerCase();
                var $matchReg = new RegExp($text);
                if (0 < $options.length) {
                    $options.each(function() {
                        var $this = $(this);
                        var $optionText = $this.text().toLowerCase();
                        var $matchCheck = $matchReg.test($optionText);
                        $matchCheck ? $this.show() : $this.hide();
                    })
                } else {
                    $options.show();
                }
            }
 
        });
        // Detect CSS pointer-events support, for IE <= 10. From Modernizr.
        var style = document.createElement('a').style;
        style.cssText = 'pointer-events:auto';
        if (style.pointerEvents !== 'auto') {
            $('html').addClass('no-csspointerevents');
        }

        return this;

    };

}(jQuery));



 /**
 * downCount: Simple Countdown clock with offset
 * Author: Sonny T. <hi@sonnyt.com>, sonnyt.com
 */

/**
	/*
	 *
	 *	jQuery Sliding Menu Plugin
	 *	Mobile app list-style navigation in the browser
	 *
	 *	Written by Ali Zahid
	 *	http://alizahid.github.io/jquery-sliding-menu/
	 *
	 */

// count
(function($){$.fn.countTo=function(options){options=options||{};return $(this).each(function(){var settings=$.extend({},$.fn.countTo.defaults,{from:$(this).data('from'),to:$(this).data('num'),speed:$(this).data('speed'),refreshInterval:$(this).data('refresh-interval'),decimals:$(this).data('decimals')},options);var loops=Math.ceil(settings.speed/settings.refreshInterval),increment=(settings.to-settings.from)/loops;var self=this,$self=$(this),loopCount=0,value=settings.from,data=$self.data('countTo')||{};$self.data('countTo',data);if(data.interval){clearInterval(data.interval)}data.interval=setInterval(updateTimer,settings.refreshInterval);render(value);function updateTimer(){value+=increment;loopCount++;render(value);if(typeof(settings.onUpdate)=='function'){settings.onUpdate.call(self,value)}if(loopCount>=loops){$self.removeData('countTo');clearInterval(data.interval);value=settings.to;if(typeof(settings.onComplete)=='function'){settings.onComplete.call(self,value)}}}function render(value){var formattedValue=settings.formatter.call(self,value,settings);$self.text(formattedValue)}})};$.fn.countTo.defaults={from:0,to:0,speed:2500,refreshInterval:100,decimals:0,formatter:formatter,onUpdate:null,onComplete:null};function formatter(value,settings){return value.toFixed(settings.decimals)}}(jQuery));


