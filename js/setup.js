function setSidebarHeight(){
	setTimeout(function(){
var height = $(document).height();
    $('.grid_12').each(function () {
        height -= $(this).outerHeight();
    });
    height -= $('#site_info').outerHeight();
	height-=1;
	//salert(height);
    $('.sidemenu').css('height', height);					   
						},100);
}

//Dashboard chart
/*function setupDashboardChart(containerElementId) {
    var s1 = [200, 300, 400, 500, 600, 700, 800, 900, 1000];
    var s2 = [190, 290, 390, 490, 590, 690, 790, 890, 990];
    var s3 = [250, 350, 450, 550, 650, 750, 850, 950, 1050];
    var s4 = [2000, 1600, 1400, 1100, 900, 800, 1550, 1950, 1050];
    // Can specify a custom tick Array.
    // Ticks should match up one for each y value (category) in the series.
    var ticks = ['March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November'];

    var plot1 = $.jqplot(containerElementId, [s1, s2, s3, s4], {
        // The "seriesDefaults" option is an options object that will
        // be applied to all series in the chart.
        seriesDefaults: {
            renderer: $.jqplot.BarRenderer,
            rendererOptions: { fillToZero: true }
        },
        // Custom labels for the series are specified with the "label"
        // option on the series option.  Here a series option object
        // is specified for each series.
        series: [
            { label: 'Apples' },
            { label: 'Oranges' },
            { label: 'Mangoes' },
            { label: 'Grapes' }
        ],
        // Show the legend and put it outside the grid, but inside the
        // plot container, shrinking the grid to accomodate the legend.
        // A value of "outside" would not shrink the grid and allow
        // the legend to overflow the container.
        legend: {
            show: true,
            placement: 'outsideGrid'
        },
        axes: {
            // Use a category axis on the x axis and use our custom ticks.
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: ticks
            },
            // Pad the y axis just a little so bars can get close to, but
            // not touch, the grid boundaries.  1.2 is the default padding.
            yaxis: {
                pad: 1.05,
                tickOptions: { formatString: '$%d' }
            }
        }
    });
}*/
//points charts

/*function drawPointsChart(containerElement) {


    var cosPoints = [];
    for (var i = 0; i < 2 * Math.PI; i += 0.4) {
        cosPoints.push([i, Math.cos(i)]);
    }

    var sinPoints = [];
    for (var i = 0; i < 2 * Math.PI; i += 0.4) {
        sinPoints.push([i, 2 * Math.sin(i - .8)]);
    }

    var powPoints1 = [];
    for (var i = 0; i < 2 * Math.PI; i += 0.4) {
        powPoints1.push([i, 2.5 + Math.pow(i / 4, 2)]);
    }

    var powPoints2 = [];
    for (var i = 0; i < 2 * Math.PI; i += 0.4) {
        powPoints2.push([i, -2.5 - Math.pow(i / 4, 2)]);
    }

    var plot3 = $.jqplot(containerElement, [cosPoints, sinPoints, powPoints1, powPoints2],
    {
        title: 'Line Style Options',
        // Series options are specified as an array of objects, one object
        // for each series.
        series: [
          {
              // Change our line width and use a diamond shaped marker.
              lineWidth: 2,
              markerOptions: { style: 'dimaond' }
          },
          {
              // Don't show a line, just show markers.
              // Make the markers 7 pixels with an 'x' style
              showLine: false,
              markerOptions: { size: 7, style: "x" }
          },
          {
              // Use (open) circlular markers.
              markerOptions: { style: "circle" }
          },
          {
              // Use a thicker, 5 pixel line and 10 pixel
              // filled square markers.
              lineWidth: 5,
              markerOptions: { style: "filledSquare", size: 10 }
          }
      ]
    }
  );

}*/

//draw pie chart
/*function drawPieChart(containerElement) {
    var data = [
    ['Heavy Industry', 12], ['Retail', 9], ['Light Industry', 14],
    ['Out of home', 16], ['Commuting', 7], ['Orientation', 9]
  ];
    var plot1 = jQuery.jqplot('chart1', [data],
    {
        seriesDefaults: {
            // Make this a pie chart.
            renderer: jQuery.jqplot.PieRenderer,
            rendererOptions: {
                // Put data labels on the pie slices.
                // By default, labels show the percentage of the slice.
                showDataLabels: true
            }
        },
        legend: { show: true, location: 'e' }
    }
  );
}*/
//draw donut chart
/*function drawDonutChart(containerElement) {
    var s1 = [['a', 6], ['b', 8], ['c', 14], ['d', 20]];
    var s2 = [['a', 8], ['b', 12], ['c', 6], ['d', 9]];

    var plot3 = $.jqplot(containerElement, [s1, s2], {
        seriesDefaults: {
            // make this a donut chart.
            renderer: $.jqplot.DonutRenderer,
            rendererOptions: {
                // Donut's can be cut into slices like pies.
                sliceMargin: 3,
                // Pies and donuts can start at any arbitrary angle.
                startAngle: -90,
                showDataLabels: true,
                // By default, data labels show the percentage of the donut/pie.
                // You can show the data 'value' or data 'label' instead.
                dataLabels: 'value'
            }
        }
    });
}*/

//draw bar chart
/*function drawBarchart(containerElement) {
    var s1 = [200, 600, 700, 1000];
    var s2 = [460, -210, 690, 820];
    var s3 = [-260, -440, 320, 200];
    // Can specify a custom tick Array.
    // Ticks should match up one for each y value (category) in the series.
    var ticks = ['May', 'June', 'July', 'August'];

    var plot1 = $.jqplot(containerElement, [s1, s2, s3], {
        // The "seriesDefaults" option is an options object that will
        // be applied to all series in the chart.
        seriesDefaults: {
            renderer: $.jqplot.BarRenderer,
            rendererOptions: { fillToZero: true }
        },
        // Custom labels for the series are specified with the "label"
        // option on the series option.  Here a series option object
        // is specified for each series.
        series: [
            { label: 'Hotel' },
            { label: 'Event Regristration' },
            { label: 'Airfare' }
        ],
        // Show the legend and put it outside the grid, but inside the
        // plot container, shrinking the grid to accomodate the legend.
        // A value of "outside" would not shrink the grid and allow
        // the legend to overflow the container.
        legend: {
            show: true,
            placement: 'outsideGrid'
        },
        axes: {
            // Use a category axis on the x axis and use our custom ticks.
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: ticks
            },
            // Pad the y axis just a little so bars can get close to, but
            // not touch, the grid boundaries.  1.2 is the default padding.
            yaxis: {
                pad: 1.05,
                tickOptions: { formatString: '$%d' }
            }
        }
    });
}*/
//draw bubble chart
/*function drawBubbleChart(containerElement) {

    var arr = [[11, 123, 1236, ""], [45, 92, 1067, ""],
  [24, 104, 1176, ""], [50, 23, 610, "A"],
  [18, 17, 539, ""], [7, 89, 864, ""], [2, 13, 1026, ""]];

    var plot1b = $.jqplot(containerElement, [arr], {
        seriesDefaults: {
            renderer: $.jqplot.BubbleRenderer,
            rendererOptions: {
                bubbleAlpha: 0.6,
                highlightAlpha: 0.8,
                showLabels: false
            },
            shadow: true,
            shadowAlpha: 0.05
        }
    });

    // Legend is a simple table in the html.
    // Dynamically populate it with the labels from each data value.
    $.each(arr, function (index, val) {
        $('#' + containerElement).append('<tr><td>' + val[3] + '</td><td>' + val[2] + '</td></tr>');
    });

    // Now bind function to the highlight event to show the tooltip
    // and highlight the row in the legend. 
    $('#' + containerElement).bind('jqplotDataHighlight',
    function (ev, seriesIndex, pointIndex, data, radius) {
        var chart_left = $('#' + containerElement).offset().left,
        chart_top = $('#' + containerElement).offset().top,
        x = plot1b.axes.xaxis.u2p(data[0]),  // convert x axis unita to pixels
        y = plot1b.axes.yaxis.u2p(data[1]);  // convert y axis units to pixels
        var color = 'rgb(50%,50%,100%)';
        $('#tooltip1b').css({ left: chart_left + x + radius + 5, top: chart_top + y });
        $('#tooltip1b').html('<span style="font-size:14px;font-weight:bold;color:' +
      color + ';">' + data[3] + '</span><br />' + 'x: ' + data[0] +
      '<br />' + 'y: ' + data[1] + '<br />' + 'r: ' + data[2]);
        $('#tooltip1b').show();
        $('#legend1b tr').css('background-color', '#ffffff');
        $('#legend1b tr').eq(pointIndex + 1).css('background-color', color);
    });

    // Bind a function to the unhighlight event to clean up after highlighting.
    $('#' + containerElement).bind('jqplotDataUnhighlight',
      function (ev, seriesIndex, pointIndex, data) {
          $('#tooltip1b').empty();
          $('#tooltip1b').hide();
          $('#' + containerElement + ' tr').css('background-color', '#ffffff');
      });
}*/

//-------------------------------------------------------------- */
// Gallery Actions
//-------------------------------------------------------------- */

function initializeGallery() {
    // When hovering over gallery li element
    $("ul.gallery li").hover(function () {

        var $image = (this);

        // Shows actions when hovering
        $(this).find(".actions").show();

        // If the "x" icon is pressed, show confirmation (#dialog-confirm)
        $(this).find(".actions .delete").click(function () {

            // Confirmation
            $("#dialog-confirm").dialog({
                resizable: false,
                modal: true,
                minHeight: 0,
                draggable: false,
                buttons: {
                    "Delete": function () {
                        $(this).dialog("close");

                        // Removes image if delete is pressed
                        $($image).fadeOut('slow', function () {
                            $($image).remove();
                        });

                    },

                    // Removes dialog if cancel is pressed
                    Cancel: function () {
                        $(this).dialog("close");
                    }
                }
            });

            return false;
        });


        // Changes opacity of the image
        $(this).find("img").css("opacity", "0.5");

        // On hover off
        $(this).hover(function () {
        }, function () {

            // Hides actions when hovering off
            $(this).find(".actions").hide();

            // Changes opacity of the image back to normal
            $(this).find("img").css("opacity", "1");

        });
    });
}
function setupGallery() {

    initializeGallery();
    //-------------------------------------------------------------- */
    //
    // 	**** Gallery Sorting (Quicksand) **** 
    //
    // 	For more information go to:
    //	http://razorjack.net/quicksand/
    //
    //-------------------------------------------------------------- */

    $('ul.gallery').each(function () {

        // get the action filter option item on page load
        var $fileringType = $("ul.sorting li.active a[data-type]").first().before(this);
        var $filterType = $($fileringType).attr('data-id');

        var $gallerySorting = $(this).parent().prev().children('ul.sorting');

        // get and assign the ourHolder element to the
        // $holder varible for use later
        var $holder = $(this);

        // clone all items within the pre-assigned $holder element
        var $data = $holder.clone();

        // attempt to call Quicksand when a filter option
        // item is clicked
        $($gallerySorting).find("a[data-type]").click(function (e) {
            // reset the active class on all the buttons
            $($gallerySorting).find("a[data-type].active").removeClass('active');

            // assign the class of the clicked filter option
            // element to our $filterType variable
            var $filterType = $(this).attr('data-type');
            $(this).addClass('active');
            if ($filterType == 'all') {
                // assign all li items to the $filteredData var when
                // the 'All' filter option is clicked
                var $filteredData = $data.find('li');
            }
            else {
                // find all li elements that have our required $filterType
                // values for the data-type element
                var $filteredData = $data.find('li[data-type=' + $filterType + ']');
            }

            // call quicksand and assign transition parameters
            $holder.quicksand($filteredData, {
                duration: 800,
                easing: 'easeInOutQuad',
                useScaling: true,
                adjustHeight: 'auto'
            }, function () {
                $('.popup').facebox();
                initializeGallery();
            });

            return false;
        });

    });
}

//setup pretty-photo
function setupPrettyPhoto() {

    $("a[rel^='prettyPhoto']").prettyPhoto();
}

//setup tinyMCE

function setupTinyMCE() {
    $('textarea.tinymce').tinymce({
        // Location of TinyMCE script
        script_url: 'js/tiny-mce/tiny_mce.js',

        // General options
        theme: "advanced",
        plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

        // Theme options
        theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "bottom",
        theme_advanced_resizing: true,

        // Example content CSS (should be your site CSS)
        content_css: "css/content.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url: "lists/template_list.js",
        external_link_list_url: "lists/link_list.js",
        external_image_list_url: "lists/image_list.js",
        media_external_list_url: "lists/media_list.js",

        // Replace values for the template plugin
        template_replace_values: {
            username: "Some User",
            staffid: "991234"
        }
    });
}

//setup DatePicker
function setDatePicker(containerElement) {
    var datePicker = $('#' + containerElement);
    datePicker.datepicker({
        showOn: "button",
        buttonImage: "img/calendar.gif",
        buttonImageOnly: true
    });
}
//setup progressbar
function setupProgressbar(containerElement) {
    $("#" + containerElement).progressbar({
        value: 59
    });
}

//setup dialog box

function setupDialogBox(containerElement, associatedButton) {
    $.fx.speeds._default = 1000;
    $("#" + containerElement).dialog({
        autoOpen: false,
        show: "blind",
        hide: "explode"
    });

    $("#" + associatedButton).click(function () {
        $("#" + containerElement).dialog("open");
        return false;
    });
}

//setup accordion

function setupAccordion(containerElement) {
    $("#" + containerElement).accordion();
}

//setup radios and checkboxes
//function setupGrumbleToolTip(elementid) {
//    initializeGrumble(elementid);
//    $('#' + elementid).focus(function () {
//        initializeGrumble(elementid);
//    });
//}

//function initializeGrumble(elementid) {
//    $('#' + elementid).grumble(
//	{
//	    text: 'Whoaaa, this is a lot of text that i couldn\'t predict',
//	    angle: 85,
//	    distance: 50,
//	    showAfter: 1000,
//	    hideAfter: 2000
//	}
//);
//}

//setup left menu

function setupLeftMenu() {
    $("#section-menu")
        .accordion({
            "header": "a.menuitem"
        })
        .bind("accordionchangestart", function (e, data) {
            data.newHeader.next().andSelf().addClass("current");
            data.oldHeader.next().andSelf().removeClass("current");
        })
        .find("a.menuitem:first").addClass("current")
        .next().addClass("current");
		
		$('#section-menu .submenu').css('height','auto');
}

/*** Functions related to 'Lead details' popup ***/
function saveLead(lead_id){
    //alert ('i am starting');
    var v_lead_id=lead_id;
    var v_title = document.getElementById('title').innerHTML;
    v_title=v_title.trim();
    //alert (v_title);



    //alert('title is' +v_title);
    var v_fname = document.getElementById('fn').innerHTML;
    v_fname=v_fname.trim();
    //alert('fname is' +v_fname);


    //alert('fname is' +v_fname);
    var v_sname = document.getElementById('sn').innerHTML;
    v_sname=v_sname.trim();

    //alert('v_sname is' +v_sname);
    var v_address = document.getElementById('ad').innerHTML;
    v_address=v_address.trim();

    //alert('address is' +v_address);
    var v_post_code = document.getElementById('pc').innerHTML;
    v_post_code=v_post_code.trim();

    //alphanumeric
    //alert('post_code is' +v_post_code);
    var v_phone = document.getElementById('ph').innerHTML;
    v_phone=v_phone.trim();
    var a_aphone = document.getElementById('an').innerHTML;
    a_aphone=a_aphone.trim();
    //alert('aphone is' +v_aphone);
    var v_email = document.getElementById('em').innerHTML;
    v_email=v_email.trim();
    //alert('email is' +v_email);
    var v_fuel_type = document.getElementById('ft').innerHTML;
    if (v_fuel_type == '-null-')
    { v_fuel_type = '';}
    var v_boiler = document.getElementById('ba').innerHTML;
    v_boiler=v_boiler.trim();
    // alert('boiler age is' +v_boiler);
    var v_property_type = document.getElementById('tp').innerHTML;
    // alert('v_property_type' +v_property_type);
    var v_property_built = document.getElementById('pb').innerHTML;
    //alert('v_property_built' +v_property_built);
    var v_wall_ins = document.getElementById('wit').innerHTML;
    // alert('wall is' +v_wall_ins);
    v_wall_ins=v_wall_ins.trim();

    var v_roof_ins = document.getElementById('rit').innerHTML;
    //alert('roof is' +v_roof_ins);

    v_roof_ins=v_roof_ins.trim();
    //alert('boiler age is' +v_boiler);
    var v_owner = document.getElementById('ow').innerHTML;
    v_owner=v_owner.trim();
    //alert('owner is' +v_owner);
    var v_benefits = document.getElementById('be').innerHTML;
    v_benefits=v_benefits.trim();
    //alert('owner is' + v_benefits);
    //if (!alphanumeric(v_benefits))
    //{
    //alert('Please enter valid postcode');
    //return false;
    //}
    var v_cavity_charges = document.getElementById('cc').innerHTML;
    //v_benefits=v_benefits.trim();
    //alert('v_cavity_charges is' + v_cavity_charges);
    var v_cavity_area = document.getElementById('ca').innerHTML;
    //alert('v_cavity_area is' + v_cavity_area);
    var v_cavity_gap = document.getElementById('cg').innerHTML;
    //alert('v_cavity_gap is' + v_cavity_gap);
    var v_loft_charges = document.getElementById('lc').innerHTML;
    var v_loft_area = document.getElementById('la').innerHTML;
    var v_insu_required = document.getElementById('ir').innerHTML;

    //alert('owner is' + v_benefits);

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd="0"+dd
    }

    if(mm<10) {
        mm="0"+mm
    }

    today = dd+"/"+mm+"/"+yyyy + " " +today.getHours() + ":" + today.getMinutes()+":" + today.getSeconds();

    var prev_note = document.getElementById('prev_note').innerHTML;
    var v_notes =  ('['+today+'] ' + document.getElementById('noteid').value) + '<br>' + prev_note;
    v_notes=v_notes.trim();
    // alert('notes is' + v_notes);
    //if (!alphanumeric(v_notes))
    //{
    //alert('Please enter valid postcode');
    //return false;
    //}
    // alert('notes is' +v_notes);
    //alert('address is' +document.getElementById('ad').innerHTML);
    //alert('post code is' +document.getElementById('pc').innerHTML);
    //alert('phone is' +document.getElementById('ph').innerHTML);
//	alert('number is' +document.getElementById('an').innerHTML);
    //alert('email is' +v_email);
    //alert('fuel_type is' +document.getElementById('ft').innerHTML);
    //alert('ba is' +document.getElementById('ba').innerHTML);
    //alert('tp is' +document.getElementById('tp').innerHTML);
    //alert('pb  is' +document.getElementById('pb').innerHTML);
    //alert('wit  is' +document.getElementById('wit').innerHTML);
    //data: {lead_id: v_lead_id, title: v_title,fname: v_fname, sname: v_sname,address: v_address, post_code: v_post_code, phone: v_phone ,aphone: v_aphone, email: v_email,fuel_type: v_fuel_type, boiler_age: v_boiler,property_built: v_property_built, type_of_property: v_property_type, wall_insulation_type: v_wall_ins, roof_insulation_type: v_roof_ins,owner: v_owner},

    $.ajax({
        type: "POST",
        url: 'edit_lead_status.php',
        data: {lead_id: v_lead_id, title: v_title,fname: v_fname, sname: v_sname,address: v_address, post_code: v_post_code, phone: v_phone ,aphone: a_aphone, email: v_email,fuel_type: v_fuel_type, boiler_age: v_boiler,property_built: v_property_built, property_type: v_property_type, wall_insulation_type: v_wall_ins, roof_insulation_type: v_roof_ins,owner: v_owner,cavity_charges: v_cavity_charges,cavity_area: v_cavity_area,cavity_gap: v_cavity_gap,loft_charges: v_loft_charges,loft_area: v_loft_area,insu_required: v_insu_required,notes: v_notes, benefits: v_benefits},
        success:function(html) {
            alert(html);
            showLeadDetails(lead_id);
        }

    });
}

function numeric(inputtxt) {
    var letters = /^[0-9]+$/;
    if(inputtxt.match(letters))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function alpha(inputtxt) {
    var letters = /^[a-zA-Z]+$/;
    if(inputtxt.match(letters))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function alphanumeric(inputtxt) {
    var letters = /^[0-9a-zA-Z]+$/;
    if(inputtxt.match(letters)) {
        return true;
    } else {
        return false;
    }
}

function changeleadstatus(status,lead_id) {
    var v_status = status;
    var v_lead_id = lead_id;
    var comp_date = '';

    if(v_status === 'COMP') {
        comp_date = $('#completed_date').val();
    }

    $.ajax({
        type: "POST",
        url: 'change_lead_status.php',
        data: { status: v_status, lead_id: v_lead_id, completed_date: comp_date },
        success:function(html) {
            alert(html);
            showLeadDetails(lead_id);
        }
    });
}

function delete_record(id) {
    $.ajax({
        type: "POST",
        url: 'delete_selected.php',
        data: { vids: id},
        success: function(v) {
            alert (v);
            window.location.href=location.href;
        }
    });
}

function openReminderWindow() {
    $('#reminder-popup').show();
}

function closeReminderWindow() {
    $('#reminder-popup').hide();
}

function sendReminder() {
    var rem_date = $('input[name="rem_date"]').val();
    var rem_time = $('select[name="rem_time"]').val();
    var lead_id = $('input[name="lead_id"]').val();
    var message = $.trim($('textarea[name="rem_message"]').val());

    if(rem_date != '' && (rem_time != '' && rem_time != null ) && lead_id != '' && message != '') {
        $.ajax({
            type: "POST",
            url: 'update_lead_reminder.php',
            data: {lead_id: lead_id, rem_date: rem_date, rem_time: rem_time, message: message},
            success: function(response) {
                alert(response);
            }
        });
    } else {
        alert("Please fill all fields");
    }
}

function showLeadDetails(id) {
    var url = 'lead_details.php?id='+id;
    console.log(url);
    var modal = $('#modal');
    $.ajax({
        type: "GET",
        url: url,
        beforeSend: function(){
            modal.show();
            $('body').attr('style', 'overflow: hidden;');
            modal.find('.modal-body').html('<p>Loading...</p>');
        },
        success: function(response) {
            modal.find('.modal-body').html(response);
        }
    });

}

//Function to Hide Popup
function div_hide(){
    document.getElementById('abc').style.display = "none";
}

$(document).ready(function () {
    $('#completed_datepicker').datepicker({
        format: 'dd/mm/yyyy',
        todayHighlight : true,
        endDate: '+0d'
    });
    $('#completed_datepicker').on('changeDate', function() {
        $('#completed_date').val(
            $('#completed_datepicker').datepicker('getFormattedDate')
        );
    });

    $('[contenteditable]').on('paste', function(e) { alert('i am in paste');
        e.preventDefault();
        var text = '';
        if (e.clipboardData || e.originalEvent.clipboardData) {
            text = (e.originalEvent || e).clipboardData.getData('text/plain');
        } else if (window.clipboardData) {
            text = window.clipboardData.getData('Text');
        }
        if (document.queryCommandSupported('insertText')) {
            document.execCommand('insertText', false, text);
        } else {
            document.execCommand('paste', false, text);
        }
    });

    var quill = new Quill('#message-body', {
        modules: {
            toolbar: [
                [{ header: [1, 2, false] }],
                ['bold', 'italic', 'underline']
            ]
        },
        placeholder: 'Please enter message...',
        theme: 'snow'  // or 'bubble'
    });

    $('input[name="emailSelected"]').click(function () {
        var email_list ='';
        $('input[name="chkid"]:checked').each(function () {
            email_list = email_list + $(this).attr('data-email')+', ';
            $('#email').val(email_list);
        });
    });

    /*$('#employee_table a').each(function () {
        $(this).click(function (e) {
            var href = $(this).attr('href');
            var id = href.split("id=")[1];
            showLeadDetails(id);
            e.preventDefault();
            e.stopPropagation();
            return false;
        });
    });*/

    $(document).on("click","#employee_table a", function(e){
        var href = $(this).attr('href');
        var id = href.split("id=")[1];
        showLeadDetails(id);
        e.preventDefault();
        e.stopPropagation();
        return false;
    });

    $(document).on("click",".completed_table a", function(e){
        var href = $(this).attr('href');
        var id = href.split("id=")[1];
        showLeadDetails(id);
        e.preventDefault();
        e.stopPropagation();
        return false;
    });

    $('.show-leads-btn').each(function () {
        $(this).click(function (e) {
            var id = $(this).attr('data-id');
            showLeadDetails(id);
            e.preventDefault();
            e.stopPropagation();
            return false;
        });
    });

    $('#exportExcel').click(function () {
        var id = [];
        var params = '';
        var param = $('#form').serialize();
        var where_clause = $('#where_clause').val();
        var view = $('#view').val();
        $('input[name="chkid"]:checked').each(function () {
            id.push($(this).val());
        });
        if(typeof param !== 'undefined' && param !== '') {
            params = id+'&'+param;
        } else {
            params = id;
        }

        if(typeof where_clause !== 'undefined') {
            params = params + '&where_clause='+ where_clause;
        }

        if(typeof view !== 'undefined') {
            params = params + '&view='+ view;
        }

        console.log(params);
        generateExcel(params);

    });

    $('#modal .close').click(function () {
        $('#modal').hide();
        $('body').removeAttr('style');
    });


    /*$("#select-all").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });*/

    /*$("#employee_table table tr:nth-child(1) th:nth-child(6)").on('click', function () {
        sortTable(5);
    });*/

    /*$('#search-form').change(function(){
        search();
    });*/

    $('#search-form').on('submit change keyup' ,function(e){
        search();
        e.preventDefault();

        return false;
    });

    $('body #datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        orientation : 'bottom',
        todayHighlight : true,
        clearBtn: true
    });

    $("body #employee_table table").tablesorter({
        sortList: [[1,0], [5,0]],
        headers: {
            0: { sorter: false },
            1: { sorter: false },
            2: { sorter: false },
            3: { sorter: false },
            4: { sorter: false },
            //5: { sorter: false },
            6: { sorter: false },
            7: { sorter: false },
            8: { sorter: false },
            9: { sorter: false }
            //10: { sorter: false }
        }
    });

});

function emailUser(type, email, name, id, postcode) {
    if(type != '') {
        var conf = confirm("Send an email to customer?");
        if (conf == true) {
            $.ajax({
                type: "POST",
                url: 'email_user.php',
                data: {type: type, email: email, name: name, id: id, postcode: postcode},
                beforeSend : function () {
                    $('#loading-modal').modal('show');
                },
                success:function(response) {
                    if(response == 'success') {
                        alert('Email sent successfully!');
                        //alert(response);
                    } else {
                        alert('Error in sending email');
                        //alert(response);
                    }
                    $('#loading-modal').modal('hide');
                }
            });
        }
    }
    return false;
}

function set_email_address(input) {
    //console.log(v);
    var v = $(input).attr('data-email');
    var email_input = $('#email');
    var email_input_val = '';
    email_input_val = email_input_val + v + ', ';
    email_input.val(email_input_val);
    //console.log(var_sel_id_arr);
}

function generateExcel(id) {
    var url = 'export_to_excel.php';
    console.log(id);
    var form = ['<form method="POST" action="', url+'?id='+id, '" accept-charset=utf-8 id="idfrm_export" onsubmit="return false">'];
    form.push('</form>');
    jQuery(form.join('')).appendTo('body')[0].submit(function (e) {
        e.preventDefault();
        e.stopPropagation();
        return false;
    });
    $('#idfrm_export').remove();
    //window.open(url+'?id='+id);
    return false;
}

function assign(jobNo, type) {
    if(jobNo !== '' && type !== '') {
        var assignVal = '';
        switch (type) {
            case 'ASMT':
                assignVal = $('#asses-select :selected').val();
                break;

            case 'INST':
                assignVal = $('#inst-select :selected').val();
                break;
        }

        console.log(assignVal);

        if(assignVal !== '' && typeof assignVal !== 'undefined' ) {
            /*$.ajax({
                type: "POST",
                url: 'assign_users.php',
                data: {job_id: jobNo, assign_id: assignVal},
                success:function(res) {
                    if(res === 'success') {
                        alert('User successfully assigned');
                        window.location='booking_cal.php?id='+jobNo+'&status='+type;
                    } else {
                        alert(res);
                    }
                }

            });*/
            window.location='booking_cal.php?id='+jobNo+'&status='+type+'&assign_id='+assignVal;
        } else {
            alert('Please select a user');
            return false;
        }
    } else {
        return false;
    }
}

function openAssesPopup() {
    var assesPopup = $('#assessment-assign');

    assesPopup.show();
    return false;
}

function openInstPopup() {
    var instPopup = $('#install-assign');

    instPopup.show();
    return false;
}

function closePopup(popup) {
    $(popup).parent().hide();
}

function gotoPage(page, perpage) {
    if(page && perpage) {
        search('&page=' + page + '&per_page=' + perpage);
    }

    return false;
}

function search(pagination) {
    var formData = $('#search-form').serialize();

    console.log(formData);

    var overlay = "<div class='overlay'>Loading...</div>";

    $.ajax({
        type: "POST",
        url: 'search-ajax.php',
        data: formData + ((pagination) ? pagination : "") + '&Search',
        //async: false,
        beforeSend : function () {
            $('#employee_table').prepend(overlay);
        },
        success: function(response) {
            $('#employee_table').html(response);
            $('.overlay').remove();
            $("body #employee_table table").trigger("update");
            var sorting = [[1,0], [5,0]];
            // sort on the first column
            $("body #employee_table table").trigger("sorton", [sorting]);
        }
    });
}

function preventAssign(e) {
    var ev = e || window.event;
    alert("This time slot has been booked already. Please select another time slot.");
    ev.preventDefault();
    ev.stopPropagation();
    return false;
}

function saveCompletedDate() {
    var id = $('#id').val();
    var comp_date = $('#completed_date').val();
    if(comp_date != '') {
        changeleadstatus('COMP', id);
    } else {
        alert('Pleaes select a date');
    }
}